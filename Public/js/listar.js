let conteiner_cards = document.getElementById("conteiner_cards")

function deletar(id) {
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn_form btn_sweet_confirm",
            cancelButton: "btn_form btn_sweet_cancel"
        },
        buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
        title: "Tem certeza que quer excluir?",
        text: "Não tem como reverter.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sim, excluir!",
        cancelButtonText: "Não, cancelar!",
        reverseButtons: true
        }).then(async (result) => {
        if (result.isConfirmed) {

            const request = new Request(`./produto/deletar/${id}`,{
                method: "POST"
            });

            dataRequest = await fetchData(request);

            console.log(dataRequest)

            if(!dataRequest.success){
                swalWithBootstrapButtons.fire({
                    title: "Sinto Muito!",
                    text: dataRequest.message,
                    icon: "error"
                });
                return
            }


            swalWithBootstrapButtons.fire({
            title: "Excluído!",
            text: "Burguer excluído!",
            icon: "success"
            });

            setInterval(() => {window.location.reload()}, 3000)
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire({
            title: "Cancelado",
            text: "Burguer não foi excluído!",
            icon: "error"
            });
        }
        });
}

document.addEventListener('DOMContentLoaded', async () => {
    const request = new Request("./listar/todos");
    
    let dataRequest = await fetchData(request);

    if(!dataRequest.success){
        conteiner_cards.innerHTML = `<h1>${dataRequest.message}</h1>`;
        return
    }

    let dataBurguer = dataRequest.data

    dataBurguer.forEach(burguer => {
        conteiner_cards.innerHTML += `
        <div class="card_item">
            <div class="content_editar_lanche">
                <i class="bi bi-trash icon icon_deletar" onclick="deletar(${burguer.id_burguer})" id="icon_deletar"></i>
                <a href="./editar?id=${burguer.id_burguer}" class="link_editar_lanche"><i class="bi bi-pencil-square icon icon_editar"></i></a>
            </div>
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


