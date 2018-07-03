function confirmDelete(e, name, url) {
    e.preventDefault();
    swalMaterial({
        title: '¿Desea eliminar el elemento?',
        text: "Está apunto de eliminar el registro de "+name+".",
        type: 'warhning',
        showCancelButton: true,
        confirmButtonText: '<i class="material-icons">thumb_up</i>  Eliminar',
        cancelButtonText: '<i class="material-icons">thumb_down</i>  Cancelar',
    }).then((result) => {
        if (result.value) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
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