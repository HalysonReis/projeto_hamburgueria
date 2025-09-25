

let btn_confirmar_update = document.getElementById('btn_confirmar')

btn_confirmar_update.innerText = 'Editar'

const idBurguer = new URLSearchParams(window.location.search).get('id')

async function getBurguer() {
    const request = new Request('./editar/'+idBurguer)

    let dataRequest = await fetchData(request);

    if(!dataRequest.success){
        Swal.fire({
            title: dataRequest.message,
            icon: "error",
            draggable: true
        });
        setInterval(() => {window.location.replace('./listar')}, 3000)
    }

    let dataBurguer = dataRequest.data

    let img_preview = document.getElementById('img_preview')
    let input_nome = formulario.elements['nome']
    let input_descricao = formulario.elements['descricao']
    let input_preco = formulario.elements['preco']

    img_preview.src = dataBurguer.src_imagem
    img_preview.style.display = 'block'
    input_nome.value = dataBurguer.nome
    input_descricao.value = dataBurguer.descricao
    input_preco.value = dataBurguer.preco
}


document.addEventListener('DOMContentLoaded', getBurguer)

btn_cancel.addEventListener('click', getBurguer)

btn_confirmar_update.addEventListener('click', async (e) => {
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

            const request = new Request("./produto/editar/"+idBurguer, {
                method: "POST",
                body: formData
            })

            let dataRequest = await fetchData(request)

            if(!dataRequest.success){
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
                text: "Burger editado com sucesso!",
            });

            setInterval(() => {window.location.reload()}, 3000)
        } else if (result.isDenied) {
            Swal.fire("Alterações não salvas", "", "info");
        }
    });


})