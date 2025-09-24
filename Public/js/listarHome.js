let conteiner_cards = document.getElementById("conteiner_cards")

document.addEventListener('DOMContentLoaded', async () => {
    const request = new Request("./listar/todos");
    
    let dataRequest = await fetchData(request);

    if(!dataRequest.sucess){
        conteiner_cards.innerHTML = `<h1>${dataRequest.message}</h1>`;
    }

    let dataBurguer = dataRequest.data

    dataBurguer.forEach(burguer => {
        conteiner_cards.innerHTML = `
        <div class="card_item">
            <div class="content_img_lanche">
                <img src="${burguer.src_imagem}" class="img_lanche">
            </div>
            <div class="content_info_lanche">
                <p class="title_lanche">${burguer.id_burguer} - ${burguer.nome}</p>
                <span class="sobre_lanche">${burguer.descricao}</span>
                <div class="content_preco">
                    <span class="text_preco">A partir de:</span>
                    <p class="preco_lanche">R$${burguer.preco}</p>
                </div>
            </div>
        </div> 
        `
    });
})