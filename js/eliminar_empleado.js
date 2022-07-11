$(document).ready(function(){
    
    $('form').on('submit',function(e){
        e.preventDefault();
        var form = $(this).attr('id');
        form = document.getElementById(form);
        input = form.getElementsByTagName('input')
        id = input.id.value;
        email = input.email.value;
        Swal.fire({
            title: '¿Estás seguro de querer eliminar el empleado?',
            showDenyButton: true,
            confirmButtonText: 'SÍ',
            denyButtonText: 'NO',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    data: {
                        id: id,
                        email: email,
                    },
                    url: './controller/CtrlEmpleados.php?op=eliminarEmpleado',
                    type: 'POST',
                    beforeSend: function () { },
                    success: function (response) {
                        console.log(response);
                        if (response == 1) {
                            Swal.fire({
                                title: '¡Empleado eliminado!',
                                text: 'El empleado ha sido eliminado correctamente.',
                                type: 'success',
                                confirmButtonText: 'ACEPTAR',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = './empleados.php';
                                }
                            });
                        } else {
                            Swal.fire('No se ha eliminado el empleado', '', 'error')
                        }
                    }
                })
            }
        });

    })
});

