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
                $('#id_pelicula').text(data[0]['id']);
                $('#titulo_pelicula').text(data[0]['titulo']);
            }
        }
    });
}

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
                    document.querySelector("#form_agregar").reset();
                    $('#anadir').modal('hide');
                } else {
                    alert("Error al agregar pelicula");
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
            } else {
                console.log("Error al eliminar pelicula");
            }
    }})
}