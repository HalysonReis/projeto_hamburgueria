let icon_deletar = document.getElementById('icon_deletar')

icon_deletar.addEventListener('click', () => {
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
    }).then((result) => {
    if (result.isConfirmed) {
        swalWithBootstrapButtons.fire({
        title: "Excluído!",
        text: "Lanche excluído!",
        icon: "success"
        });
    } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire({
        title: "Cancelado",
        text: "Lanche não foi excluído!",
        icon: "error"
        });
    }
    });
})