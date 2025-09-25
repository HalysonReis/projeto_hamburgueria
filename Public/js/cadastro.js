let btn_confirmar = document.getElementById('btn_confirmar')

btn_confirmar.addEventListener('click', async (e) => {
    e.preventDefault()

    
    Swal.fire({
        title: "Você quer salvar as alterações?",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: "Salvar",
        denyButtonText: `Não Salvar`
    }).then(async (result) => {
        if (result.isConfirmed) {
            const formData = new FormData(formulario)

            const request = new Request("./produto/cadastrar", {
                method: "POST",
                body: formData
            })

            let dataRequest = await fetchData(request)

            
            if(!dataRequest.success){
                console.log(dataRequest)
                Swal.fire({
                    icon: "error",
                    title: "Sinto muito!",
                    text: dataRequest.message,
                });
                return
            }

            Swal.fire({
                icon: "success",
                title: "Sucesso!",
                text: "Burger cadastrado com sucesso!",
            });

            // setInterval(() => {window.location.reload()}, 3000)
        } else if (result.isDenied) {
            Swal.fire("Alterações não salvas", "", "info");
        }
    });


})