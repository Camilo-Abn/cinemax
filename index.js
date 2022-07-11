function reservar(id){
    window.location.replace('asientos.php?id='+id);
}

$(document).ready(function(){
    $('#form_signin').submit(function(e){
        e.preventDefault();
        const email = $('#email').val();
        const password = $('#password').val();
        $.ajax({
            url: 'controller/CtrlEmpleados.php?op=login',
            type: 'POST',
            data: {email: email, password: password},
            success: function(response){
                if(response == 1){
                    window.location.replace('gestor.php');
                }else{
                    console.log(response);
                    Swal.fire({
                        icon: 'error', 
                        title: 'Oops...', 
                        text: '¡Los datos ingresados no coinciden!'
                    });
                }
            }
        });
    });
});
