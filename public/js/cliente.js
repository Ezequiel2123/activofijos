destroy = function(e) {
    let url = e.getAttribute('url');
    let token = e.getAttribute('token');

    Swal.fire({
        icon: 'question',
        title: '¿Desea continuar?',
        text: 'El cliente será eliminado',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sí'
    }).then((res) => {
        if (res.isConfirmed) {
            const request = new XMLHttpRequest();
            
            // Abrir solicitud con el método DELETE
            request.open('DELETE', url);
            
            // Establecer encabezados
            request.setRequestHeader('X-CSRF-TOKEN', token);
            request.setRequestHeader('Content-Type', 'application/json');
            
            // Cuando la solicitud sea exitosa
            request.onload = () => {
                if (request.status === 200) {
                    // Verificar respuesta JSON
                    let response = JSON.parse(request.responseText);
                    
                    if (response.res) {
                        // Eliminar fila de la tabla
                        e.closest('tr').remove();

                        // Mostrar mensaje de éxito
                        Swal.fire({
                            icon: 'success',
                            text: 'Cliente eliminado con éxito'
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            text: 'No se pudo eliminar el cliente'
                        });
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        text: 'Error al procesar la solicitud'
                    });
                }
            };

            // Manejar errores de la solicitud
            request.onerror = () => {
                Swal.fire({
                    icon: 'error',
                    text: 'Hubo un error en la solicitud. Intente nuevamente'
                });
            };

            // Enviar la solicitud
            request.send();
        }
    });
}
