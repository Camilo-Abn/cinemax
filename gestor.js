function init(){
    getData()
}
function getData(){
    table = $('#lista_peliculas').DataTable({
        language : {
            url: 'assets/plugins/DataTables-1.12.1/es-ES.json'
        },
        pageLength: 10,
        responsive: true,
        processing: true,
        ajax: "controller/CtrlPeliculas.php?op=listar_peliculas",
    });
}

function obtProductoPorId(id){
    parametros = {
        "id": id
    }
    $.ajax({
        data: parametros,
        url:'controller/CtrlPeliculas.php?op=obtProductoPorId',
        type:'POST',
        beforeSend: function(){},
        success: function(response){
            data = $.parseJSON(response);
            if (data.length > 0){
                $('#id').val(data[0]['id']);
                $('#id_pelicula').text(data[0]['id']);
                $('#titulo_pelicula').text(data[0]['titulo']);
                $('#preview_portada').attr('src',data[0]['portada']);
                $('#edit_titulo').val(data[0]['titulo']);
                $('#edit_director').val(data[0]['director']);
                $('#edit_reparto').val(data[0]['reparto']);
                $('#edit_sinopsis').val(data[0]['sinopsis']);
                $('#edit_duracion').val(data[0]['duracion']);
                $('#edit_fecha').val(data[0]['fechas']);
                $('#edit_precio').val(data[0]['precio']);
            }
        }
    });
}

$(document).ready(function(){
    $('#form_editar').on('submit',function(e){
        e.preventDefault();
        var fd = new FormData($(this)[0]);
        fd.set('id', $('#id').val()); //Por alguna razon el formdata no recibe el id hidden asi que lo inserto tal cual
        $.ajax({
            data: fd,
            url: 'controller/CtrlPeliculas.php?op=editarPelicula',
            type:'POST',
            contentType: false,
            processData: false,
            beforeSend: function(){},
            success: function(response){
                if (response == 1){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'La función se editó correctamente',
                        showConfirmButton: false,
                        timer: 1000
                      })
                    document.querySelector("#edit_portada").value = "";
                    table.ajax.reload();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Algo salió mal',
                        footer: 'Error'+response
                      })
                }
            }
        });
    });
});

$(document).ready(function(){
    $('#form_agregar').on('submit',function(e){
        e.preventDefault();
        var fd = new FormData($(this)[0]);
        
        $.ajax({
            data: fd,
            url: 'controller/CtrlPeliculas.php?op=agregarPelicula',
            type:'POST',
            contentType: false,
            processData: false,
            beforeSend: function(){},
            success: function(response){
                if (response == 1){
                    
                    table.ajax.reload();
                    //Reseteo el formulario
                    document.querySelector("#form_agregar").reset();
                    $('#modal_agregarPelicula').modal('hide');
                    document.querySelector("#imagePreview > img").src = "";
                    vistaPreviaAgregar.showDefaultImage()

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'La función se agregó correctamente',
                        showConfirmButton: false,
                        timer: 1000
                      })
                } else {
                    console.log(response);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Algo salió mal',
                      })
                }
            }
        });
    });
});

function eliminarPelicula(){
    id = $('#id_pelicula').text();
    parametros = {
        "id": id
    }
    $.ajax({
        data: parametros,
        url:'controller/CtrlPeliculas.php?op=eliminarPelicula',
        type:'POST',
        beforeSend: function(){},
        success: function(response){
            if(response == 1){
                table.ajax.reload();
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'La pelicula se eliminó correctamente',
                    showConfirmButton: false,
                    timer: 1500
                  })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Algo salió mal'
                  })
            }
    }})
}