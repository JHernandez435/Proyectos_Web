<link rel="stylesheet" href="vistas/css/estilos.css">


<div class="contenedor">
    <div class="contenedor_tarjeta">
        <!-- <a href="http://www.falconmasters.com"> -->
            <figure id="tarjeta">
                <img src="img/1.jpg" class="frontal" alt="">
                <figcaption class="trasera">
                    <h2 class="titulo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut, vero!</h2>
                    <hr>

                    <model-viewer src="img/Astronaut.glb" camera-controls shadow-intensity="4.8" exposure="2" auto-rotate>

                        <div class="progress-bar hide" slot="progress-bar">
                            <div class="update-bar"></div>
                        </div>
                        <button slot="ar-button" id="ar-button">
                            View in your space
                        </button>
                        <div id="ar-prompt">
                            <img src="https://modelviewer.dev/shared-assets/icons/hand.png">
                        </div>
                    </model-viewer>

                    <!-- Use it like any other HTML element -->
                </figcaption>
            </figure>
        </a>
    </div>

    <div class="contenedor_tarjeta">
        <a href="http://www.falconmasters.com">
            <figure id="tarjeta">
                <img src="img/2.jpg" class="frontal" alt="">
                <figcaption class="trasera">
                    <h2 class="titulo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut, vero!</h2>
                    <hr>
                    <center><img src="img/astronauta.png" width="200" height="160" alt=""></center>
                </figcaption>
            </figure>
        </a>
    </div>

    <div class="contenedor_tarjeta">
        <a href="http://www.falconmasters.com">
            <figure id="tarjeta">
                <img src="img/3.jpg" class="frontal" alt="">
                <figcaption class="trasera">
                    <h2 class="titulo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut, vero!</h2>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis cupiditate voluptates ipsum suscipit, aspernatur eum, amet nemo architecto nihil corrupti.</p>
                </figcaption>
            </figure>
        </a>
    </div>
</div>