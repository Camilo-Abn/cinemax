$(document).ready(function(){
    $('#form_eliminar').on('submit',function(e){
        e.preventDefault();
        id = document.getElementById('id').value;
        email = document.getElementById('email').value;
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
                            Swal.fire('No se ha eliminado el empleado', '', 'info')
                        }
                    }
                })
            }
        });

    })
});

