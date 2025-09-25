let conteiner_cards = document.getElementById("conteiner_cards")

document.addEventListener('DOMContentLoaded', async () => {
    const request1 = new Request("./usuario/listar/home");

    let dataRequest1 = await fetchData(request1);

    let dataUser = dataRequest1.data

    console.log(dataUser)

    document.getElementById('text_rua').innerText = dataUser.endereco
    document.getElementById('horario_text').innerText = dataUser.horario.slice(0, 5)
    document.getElementById('instagram').innerText = dataUser.instagram


    const request2 = new Request("./listar/todos");
    
    let dataRequest = await fetchData(request2);

    conteiner_cards.innerHTML = ''

    if(!dataRequest.success){
        conteiner_cards.innerHTML = `<h1>${dataRequest.message}</h1>`;
        return
    }

    let dataBurguer = dataRequest.data

    dataBurguer.forEach(burguer => {
        conteiner_cards.innerHTML += `
        <div class="card_item">
            <div class="content_img_lanche">
                <img src="${burguer.src_imagem}" class="img_lanche">
            </div>
            <div class="content_info_lanche">
                <p class="title_lanche">${burguer.nome}</p>
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