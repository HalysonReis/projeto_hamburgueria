let formulario = document.getElementById('formulario')
let input_senha = document.getElementById("senha")
let icon_olho = document.getElementById('toggleSenha')

let btn_cancel = document.getElementById('btn_cancel')

btn_cancel.addEventListener('click', () => {
    formulario.reset();
    preview.src = ''
    preview.style.display = "none"
})

icon_olho.addEventListener('click', () => {
    if(icon_olho.classList.contains('bi-eye')){
        icon_olho.classList.remove('bi-eye')
        icon_olho.classList.add('bi-eye-slash')
        input_senha.type = 'password'
    }else{
        icon_olho.classList.remove('bi-eye-slash')
        icon_olho.classList.add('bi-eye')
        input_senha.type = 'text'
    }
}) 

input_senha.addEventListener('keyup', () => {
    document.getElementById('digitos').style.color = 'rgb(255, 113, 113)'
    document.getElementById('numero').style.color = 'rgb(255, 113, 113)'
    document.getElementById('simbolo').style.color = 'rgb(255, 113, 113)'
    document.getElementById('maiuscula').style.color = 'rgb(255, 113, 113)'
    if(input_senha.value.length >= 8){
        document.getElementById('digitos').style.color = '#007E70'
    }

    var numeros = /[0-9]/;
    var simbolo = /[!|@|#|$|%|^|&|*|(|)|-|_]/;
    var letrasMaiusculas = /[A-Z]/;

    if(numeros.test(input_senha.value)){
        document.getElementById('numero').style.color = '#007E70'
    }

    if(simbolo.test(input_senha.value)){
        document.getElementById('simbolo').style.color = '#007E70'
    }

    if(letrasMaiusculas.test(input_senha.value)){
        document.getElementById('maiuscula').style.color = '#007E70'
    }
    
})