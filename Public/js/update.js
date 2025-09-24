// Swal.fire({
//   title: "Do you want to save the changes?",
//   showDenyButton: true,
//   showCancelButton: true,
//   confirmButtonText: "Save",
//   denyButtonText: `Don't save`
// }).then((result) => {
//   /* Read more about isConfirmed, isDenied below */
//   if (result.isConfirmed) {
//     Swal.fire("Saved!", "", "success");
//   } else if (result.isDenied) {
//     Swal.fire("Changes are not saved", "", "info");
//   }
// });

let btn_confirmar_update = document.getElementById('btn_confirmar')

btn_confirmar_update.innerText = 'Editar'

const idBurguer = new URLSearchParams(window.location.search).get('id')


document.addEventListener('DOMContentLoaded', async () => {
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
})