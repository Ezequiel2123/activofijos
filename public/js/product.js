destroy = function(e) {
    let url = e.getAttribute('url');
    let token = e.getAttribute('token');

    Swal.fire({
        icon: 'question',
        title: '¿Desea continuar?',
        text: 'El producto será eliminado',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sí'
    }).then((res) => {
        if (res.isConfirmed) {
            const request = new XMLHttpRequest();
            request.open('DELETE', url);
            request.setRequestHeader('X-CSRF-TOKEN', token);

            request.onload = () => {
                if (request.status == 200) {
                    e.closest('tr').remove();
                    Swal.fire({
                        icon: 'success',
                        text: 'Producto eliminado'
                    });
                } else {
                    // Manejo de error si la respuesta no es 200
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'No se pudo eliminar el producto. Inténtalo de nuevo.'
                    });
                }
            };

            request.onerror = (err) => {
                // Manejo de error de la solicitud
                console.error('Error de solicitud:', err);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un error al intentar eliminar el producto.'
                });
            };

            request.send();
        }
    });
}
