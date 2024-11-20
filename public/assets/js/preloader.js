    /**
     * Preloader
     */
    const preloader = document.querySelector("#preloader");
    if (preloader) {
        window.addEventListener("load", () => {
            // Añadir clase de fade-out
            preloader.classList.add("fade-out");
            // Esperar a que termine la animación antes de eliminarlo
            setTimeout(() => {
                preloader.remove();
              }, 1000);
        });
    }
