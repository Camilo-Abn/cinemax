$(document).ready(function (){
    const sala = document.getElementById('sala');
    const asientos = document.querySelectorAll('.fila .asiento:not(.ocupado)');
    const idPelicula = document.querySelector("#idPelicula").value;
    const precio = document.querySelector("#precioPelicula").value;
    
    function getAsientosSeleccionados(){
        const asientosSeleccionados = document.querySelectorAll('.fila .asiento.seleccionado');
        if (asientosSeleccionados.length > 0){
            $('#btnComprar').prop('disabled', false);
            return [...asientosSeleccionados].map(asiento => asiento.id);
        } else {
            $('#btnComprar').prop('disabled', true);
            return [];
        }
    }

    sala.addEventListener('click', (e) => {
        if(e.target.classList.contains('asiento') && !e.target.classList.contains('ocupado')){
            e.target.classList.toggle('seleccionado');
        }
        getAsientosSeleccionados();
    });

    $('#comprar').on('submit',function(e){
        e.preventDefault();
        var asientos = getAsientosSeleccionados();
        Swal.fire({
            title: 'Confirmación',
            text: "Estas comprando el/los siguientes asiento(s): " + asientos.join(', '),
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Comprar',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Pago',
                    html: '<input id="swal-input1" class="swal2-input" placeholder=Rut><br>'+
                    '<input id="swal-input2" class="swal2-input" placeholder=Correo><br>'+
                    '<b>Datos de transferencia:</b><br>'+
                    'Banco: Banco Estado<br>'+
                    'Cuenta: 123456789<br>'+
                    'Nombre: Cinemax<br>'+
                    'Monto: '+precio*asientos.length,
                    showCancelButton: true,
                    confirmButtonText: 'Confirmar pago',
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        return true;
                    },
                  }).then((result) => {
                    if (result.isConfirmed) {
                        const codigo = generarCodigo(asientos)
                        Swal.fire({
                        title: 'Compra realizada',
                        html: 'El codigo que verifica su compra es: <b>'+codigo+'</b><hr><div id="qrcode"></div><hr>',
                        }).then(function(){
                            window.location = "index.php";
                        })
                        new QRCode(document.getElementById("qrcode"), codigo);
                        actualizarAsientos();
                    }
                  })
                }
          })
    }); 
    function generarCodigo(idAsientos){
        var codigo = idPelicula+"-";
        for (var i = 0; i < idAsientos.length; i++) {
            codigo += idAsientos[i];
        }
        return codigo;
    }

    function actualizarAsientos(){
        const asientos = document.querySelectorAll('.fila .asiento');
        var asientosNuevo = [];
        for (var i = 0; i < asientos.length; i++) {
            if (asientos[i].classList.contains('ocupado') || asientos[i].classList.contains('seleccionado')){
                asientosNuevo.push(1);
            } else {
                asientosNuevo.push(0);
            }
        }
        $.ajax({
            data: {"id": idPelicula, "asientos": asientosNuevo},
            url:'controller/CtrlPeliculas.php?op=actualizarAsientos',
            type:'POST',
            beforeSend: function(){},
            success: function(response){
            }
        });
    }   
});
