<!--MODAL EDITAR-->
<div class="modal fade" id="modal_editarPelicula" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="ModalTitulo">Editar</h5>
        </div>
        <div class="modal-body">
            <form method="POST" id="form_editar" enctype="multipart/form-data">
                <input type="hidden" id="id">
                <section class="main row d-flex justify-content-center">
                    <article class="col-md-4">
                        <div class="form-group">
                            <label for="portada">Portada</label>
                            <input type="file" class="form-control-file" id="edit_portada" name="portada" accept="image/png, image/jpeg, image/jpg"><br>
                            <div class="image-preview" id="imagePreviewEditar">
                                <img id="preview_portada" class="image-preview__image img-fluid rounded shadow-sm d-block" src="" alt="">
                                <span class="image-preview__default-text"></span>
                            </div>
                        </div>
                    </article>
                    <aside class="col-md-8">
                        <div class="form-group">
                            <label for="titulo">Titulo</label>
                            <input type="text" class="form-control" id="edit_titulo" name="titulo" placeholder="Titulo" required>
                        </div>
                        <div class="form-group">
                            <label for="director">Director</label>
                            <input type="text" class="form-control" id="edit_director" name="director" placeholder="Director" required>
                        </div>
                        <div class="form-group">
                            <label for="reparto">Reparto</label>
                            <input type="text" class="form-control" id="edit_reparto" name="reparto" placeholder="Reparto" required>
                        </div>
                        <div class="form-group">
                            <label for="sinopsis">Sinopsis</label>
                            <textarea class="form-control" id="edit_sinopsis" name="sinopsis" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="duracion">Duracion</label>
                            <input type="number" min="1" max="500" class="form-control" id="edit_duracion" name="duracion" required>
                        </div>
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input type="datetime-local" class="form-control" id="edit_fecha" name="fecha" placeholder="Fecha de estreno" required>
                        </div>
                        <div class="form-group">
                            <label for="precio"> Precio: </label>
                            <input type="number" min="1" max="9999" id="edit_precio" name="precio" value="" required><br>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group">
                                <button class="btn btn-primary">Guardar cambios</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </aside>
                </section>
            </form>
        </div>
    </div>
  </div>
</div>

<script>
    inputFile = document.querySelector('#edit_portada');
    previewContainer = document.getElementById('imagePreviewEditar');
    previewImage = previewContainer.querySelector(".image-preview__image");
    previewDefaultText = previewContainer.querySelector(".image-preview__default-text");

    vistaPreviaEditar = new PreviewImage(inputFile, previewImage, previewDefaultText);
    vistaPreviaEditar.init();
</script>
