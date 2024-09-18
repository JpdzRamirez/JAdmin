<div>

    <div id="modal" class="modal">
        <article class="modal-container">
            <header class="modal-container-header">
                <h1 class="modal-container-title">
                    <img src="{{asset('assets/img/welcome.svg')}}" alt="Bienvenido" width="50px" height="50px">
                    Mensaje de Bienvenida
                </h1>
                <button class="icon-button" id="close-modal-button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path fill="currentColor" d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" />
                    </svg>
                </button>
            </header>
            <section class="modal-container-body rtf d-flex flex-column align-items-center">
                <lottie-player src="{{ asset('assets/lottie/bienvenido.json') }}" background="transparent"  speed="1"  style="width: 300px; height: 300px;" loop nocontrols autoplay></lottie-player>
                <p class="text-center">✌Bienvenidos al portal de arrivesafe, creado para realizar transacciones de continegnecia en torno a la facturación de vales en ICON</p>
            </section>
            <footer class="modal-container-footer">
                <code>❤ ArriveSafe Development Team</code>
            </footer>
        </article>
    </div>
    @section('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                    document.getElementById('close-modal-button').addEventListener('click', function() {
                    document.getElementById('modal').style.display = 'none';
                });
            });
        </script>
    @endsection
</div>