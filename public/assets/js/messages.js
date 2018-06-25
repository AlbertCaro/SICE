const swalMaterial = swal.mixin({
    confirmButtonClass: 'btn btn-success',
    cancelButtonClass: 'btn btn-danger',
    buttonsStyling: false,
});

const toast = swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000,
    showCloseButton: true
});

function confirmDelete(e, name, url) {
    e.preventDefault();
    swalMaterial({
        title: '¿Desea eliminar el elemento?',
        text: "Está apunto de eliminar el registro de "+name+".",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: '<i class="material-icons">thumb_up</i>  Eliminar',
        cancelButtonText: '<i class="material-icons">thumb_down</i>  Cancelar',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                data: { '_method' : 'DELETE' },
                type: 'post',
                url: url,
            }).done(function () {
                toast({
                    title: 'Eliminado correctamente.',
                    type: 'success'
                });
                loadTable(e, false);
            }).fail(function () {
                toast({
                    title: 'No se ha podido eliminar el elemento.',
                    type: 'error'
                });
                loadTable(e, false);
            })
        }
    })
}