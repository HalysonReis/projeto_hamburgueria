let btn_login = document.getElementById("btn_login")

let formulario = document.getElementById("formulario")

let icon_olho = document.getElementById('toggleSenha')
let input_senha = document.getElementById("senha")

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


btn_login.addEventListener('click', async (e) => {
    e.preventDefault()

    const formData = new FormData(formulario)

    const request = new Request("./login/usuario", {
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

    window.location.replace("./listar")
})