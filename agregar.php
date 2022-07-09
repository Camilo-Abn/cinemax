<!--MODAL AGREGAR-->
<div class="modal fade" id="modal_agregarPelicula" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="ModalTitulo">Añadir una pelicula</h5>
        </div>
        <div class="modal-body">
            <form method="POST" id="form_agregar" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" value="">
                <section class="main row d-flex justify-content-center">
                    <article class="col-md-4">
                        <div class="form-group">
                            <label for="portada">Portada</label>
                            <input type="file" class="form-control-file" id="portada" name="portada" accept="image/png, image/jpeg, image/jpg"><br>
                            <div class="image-preview" id="imagePreview">
                                <img class="image-preview__image" src="" alt="" class="img-fluid rounded shadow-sm d-block">
                                <span class="image-preview__default-text">Vista previa de portada</span>
                            </div>
                        </div>
                    </article>
                    <aside class="col-md-8">
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
                            <input type="number" min="1" max="500" class="form-control" id="duracion" name="duracion" required>
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
                                <button class="btn btn-primary">Subir función</button>
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
    class PreviewImage {
        constructor(fileInput, previewImage, previewDefaultText){
            this.fileInput = fileInput;
            this.previewImage = previewImage;
            this.previewDefaultText = previewDefaultText;
        }
    
        init(){
            this.fileInput.addEventListener('change', (e) => {
                this.readFile(e);
            });
        }
        
        readFile(e){
            if (e.target.files[0]) {
                var file = e.target.files[0];
                this.previewDefaultText.style.display = "none";
                this.previewImage.style.display = "block";
    
                var reader = new FileReader();
                reader.onload = (e) => {
                    this.previewImage.setAttribute("src", e.target.result);
                };
                reader.readAsDataURL(file);
            } else {
                this.showDefaultImage()
            }
        }

        showDefaultImage(){
            this.previewDefaultText.style.display = null;
            this.previewImage.style.display = null;
            this.previewImage.setAttribute("src", "");
        }
    }

    inputFile = document.querySelector('#portada');
    previewContainer = document.getElementById('imagePreview');
    previewImage = previewContainer.querySelector(".image-preview__image");
    previewDefaultText = previewContainer.querySelector(".image-preview__default-text");

    vistaPreviaAgregar = new PreviewImage(inputFile, previewImage, previewDefaultText);
    vistaPreviaAgregar.init();
</script>
