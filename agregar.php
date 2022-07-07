<!--MODAL AREGRAR-->
<div class="modal fade" id="anadir" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="ModalTitulo">Añadir una pelicula</h5>
        </div>
        <div class="modal-body">
            <form method="POST" id="form_agregar" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="portada">Portada</label>
                    <input type="file" class="form-control-file" id="portada" name="portada" required>
                </div>
                <div class="form-group">
                    <label for="titulo">Titulo</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" required>
                </div>
                <div class="form-group">
                    <label for="director">Director</label>
                    <input type="text" class="form-control" id="director" name="director" placeholder="Director" required>
                </div>
                <div class="form-group">
                    <label for="reparto">Reparto</label>
                    <input type="text" class="form-control" id="reparto" name="reparto" placeholder="Reparto" required>
                </div>
                <div class="form-group">
                    <label for="sinopsis">Sinopsis</label>
                    <textarea class="form-control" id="sinopsis" name="sinopsis" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="duracion">Duracion</label>
                    <input type="number" min="1" max="500" class="form-control" id="duracion" name="duracion" placeholder="Duracion" required>
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="datetime-local" class="form-control" id="fecha" name="fecha" placeholder="Fecha de estreno" required>
                </div>
                <div class="form-group">
                    <label for="precio"> Precio: </label>
                    <input type="number" min="1" max="9999" id="precio" name="precio" value="" required><br>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button class="btn btn-primary">Añadir</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
