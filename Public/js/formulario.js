let formulario = document.getElementById('formulario')

let input_img_preview = document.getElementById('img_lanche')
let preview = document.getElementById('img_preview')
let max_int_palavra = document.getElementById('max_int_palavra')
let area_descricao = document.getElementById('descricao')

let input_preco = document.getElementById("preco")

function ReadImage(){
    if(this.files && this.files[0]){
        let file = new FileReader();
        file.onload = function(e){
            preview.style.display = "block"
            preview.src = e.target.result;
        }
        file.readAsDataURL(this.files[0]);
    }
}

input_img_preview.addEventListener('change', ReadImage, false)


area_descricao.addEventListener('keyup', () => {
    let max_letras = parseInt(max_int_palavra.dataset.number)
    let menos = max_letras - area_descricao.value.length
    max_int_palavra.innerText = menos
})


input_preco.addEventListener('input', () => {
  input_preco.value = input_preco.value
    .replace(/[^0-9,]/g, '') 
    .replace(/,+/g, ',') 
    .replace(/(,\d{2})\d+$/, '$1'); 
});

let btn_cancel = document.getElementById('btn_cancel')

btn_cancel.addEventListener('click', () => {
    formulario.reset();
    preview.src = ''
    preview.style.display = "none"
})

