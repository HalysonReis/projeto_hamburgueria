async function fetchData(request) {
    try {
    const response = await fetch(request);
    if(!response.ok){
        const errorMessages = {
            400: "Dados inválidos. Verifique os campos e tente novamente.",
            404: "O recurso solicitado não foi encontrado.",
            408: "Tempo de requisição excedido. Tente novamente.",
            409: "Já existe um registro com esses dados.",
            422: "Alguns dados não são válidos. Corrija e tente novamente.",
            500: "Erro interno. Tente novamente mais tarde.",
            502: "Serviço temporariamente indisponível. Tente novamente mais tarde.",
            503: "Servidor em manutenção. Tente novamente mais tarde.",
            504: "O servidor demorou muito para responder. Tente novamente."
        };

        const menssagemAmigavel = errorMessages[response.status] || "Não foi possivel realizar essa ação"

        throw {name: "HTTPError", status: response.status , message: menssagemAmigavel}

    }
    const contentType = response.headers.get("content-type");
    if(!contentType || !contentType.includes("application/json")){
        throw {name: "InvalidContentType", message: "A requisição não é um JSON"}
    }       
    let dataResponse = await response.json(); 
    if (!dataResponse.success) {
        return {
            success: false,
            message: dataResponse.message
        };
    }
    return {
        success: true,
        data: dataResponse.data
    };

    } catch (error) {
        console.log("Ocorrue um erro: ",error);

        return {
            success: false,
            type: error.name || "UnknownError",
            message: error.message,
        }
    }
}