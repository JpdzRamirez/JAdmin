<div>
        <!-- Portfolio Grid Items-->
        <div class="row justify-content-center">
            <!-- Portfolio Item 1-->
   
            <!-- Manual Section-->
            <section class="page-section rounded bg-info border border-black text-white mb-0" id="about">
                <div class="container">
                    <!-- About Section Heading-->
                    <h2 class="page-section-heading text-center text-uppercase text-white">Manual de Uso</h2>
                    <!-- Icon Divider-->
                    <div class="divider-custom divider-light">
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                        <div class="divider-custom-line"></div>
                    </div>
                    <!-- About Section Content-->
                    <div class="row">
                        <div class="col-lg-4 ms-auto">
                            <p class="lead">Esta herramienta lee el archivos JSON creando en el paso anterior y lo prepara
                                 para enviarlo a ICON.</p>
                        </div>
                        <div class="col-lg-4 me-auto">
                            <p class="lead">Permite eliminar cáracteres no deseados
                                <br> Solo se necesitas cargar el archivo.
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container p-1 d-flex justify-content-center gap-2 border border-light border-end-0 border-start-0">
                            <h1 class="my-4">Sanitizer</h1>
                            <form action="{{ route('icon.sanitizar') }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="mb-3">
                                    <label for="jsonFile" class="form-label">Selecciona el archivo JSON</label>
                                    <input class="form-control" type="file" id="jsonFile" name="jsonFile" accept=".json" required>
                                </div>
                                <button type="submit" class="btn btn-outline-warning">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
</div>
