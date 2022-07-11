const boton = document.querySelector('#formulario');
boton.addEventListener('submit', aplicar);

function aplicar(e) {
    email = document.getElementById('email').value;
    password = document.getElementById('password').value;
    password2 = document.getElementById('password2').value;
    e.preventDefault();
    Swal.fire({
        icon: 'question',
        title: 'Confirmación',
        text: '¿Estás seguro de querer registrar al empleado ' + email +'?',
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Registrar',
        cancelButtonText: 'Cancelar',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                data: {
                    email: email,
                    password: password,
                    password2: password2
                },
                url: 'controller/CtrlEmpleados.php?op=agregarEmpleado',
                type: 'POST',
                beforeSend: function() {},
                success: function(response) {
                    console.log(response);
                    if (response == 1) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Registro exitoso',
                            text: 'Se ha registrado correctamente',
                        })
                        document.querySelector("#formulario").reset();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Algo salió mal',
                            footer: 'Error: ' + response
                        })
                    }
                }
            });
        }
    });

}
