let formulario = document.getElementById('formulario')
let input_senha = document.getElementById("senha")
let icon_olho = document.getElementById('toggleSenha')

let btn_cancel = document.getElementById('btn_cancel')

async function getUser() {
    const request = new Request('./usuario/listar');

    let dataRequest = await fetchData(request);

    
    if(!dataRequest.success){
        Swal.fire({
            title: dataRequest.message,
            icon: "error",
            draggable: true
        });
        setInterval(() => {window.location.replace('./listar')}, 3000)
    }
    
    let dataUsuario = dataRequest.data
    
    formulario.elements['email'].value = dataUsuario.email
    formulario.elements['instragram'].value = dataUsuario.instagram
    formulario.elements['endereco'].value = dataUsuario.endereco
    formulario.elements['hora'].value = dataUsuario.horario
}

document.addEventListener('DOMContentLoaded', getUser)

btn_cancel.addEventListener('click', getUser)

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


let btn_confirmar_update = document.getElementById('btn_confirmar')

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

            const request = new Request("./usuario/editar", {
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
                text: "Usuário editado com sucesso!",
            });

            setInterval(() => {window.location.reload()}, 3000)
        } else if (result.isDenied) {
            Swal.fire("Alterações não salvas", "", "info");
        }
    });


})