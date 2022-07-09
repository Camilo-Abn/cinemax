<!--MODAL ELIMINAR-->
<div class="modal fade" id="modal_eliminarPelicula" tabindex="-1" role="dialog" aria-labelledby="modal_eliminarPelicula" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_eliminarPelicula">Eliminar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Está seguro de eliminar la película?</p>
                <label> ID: </label>
                <i id="id_pelicula"></i><br>
                <label> Titulo: </label>
                <i id="titulo_pelicula"></i>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" onClick="eliminarPelicula()" class="btn btn-danger" data-dismiss="modal">Eliminar</button>
            </div>
        </div>
    </div>
</div>