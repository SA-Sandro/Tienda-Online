<?php require_once APP . '/views/inc/header.php' ?>
<?php
session_start();
session_destroy();
session_unset();


?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <a class="navbar-brand" href="http://localhost/Tienda-online/Views/inicio">
        <img class="header-icono" src="http://localhost/Tienda-online/public/img/logotipo.jpeg" alt="logotipo" width="70">
        <span>Green Clothes</span>
    </a>
    <button class="navbar-toggler mx-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto text-center">
            <li class="nav-item ">
                <a class="nav-link active" href="http://localhost/Tienda-online/Views/inicio">Inicio <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/Tienda-online/Views/tienda">Tienda</a>
            </li>
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Opciones de cliente
                </a>
                <div class=" reducir dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href=<?= URL . '/Views/iniciarSesion' ?>> <i class="bi bi-box-arrow-in-right"></i> Iniciar sesión</a>
                    <a class="dropdown-item" href=<?= URL . '/Views/registrarUsuario' ?>><i class="bi bi-person-add"></i>
                        Registrarse</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<main>
    <div class="maxAncho">
        <section class="historia p-1 mt-4">
            <div class="ancho d-flex flex-column justify-content-center align-items-center mx-5">
                <h1 data-i18n-key="historia">HISTORIA</h1>
                <p data-i18n-key="descripcionHistoria">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam accumsan dui tellus, vel feugiat
                    mi eleifend a. Maecenas tortor arcu, blandit vitae convallis eu, luctus tincidunt risus. Nullam
                    semper sollicitudin feugiat. Etiam bibendum blandit nulla, vitae mattis ligula luctus mattis.
                    Vestibulum a pretium ex. Sed egestas neque eget diam rutrum, id pharetra sem euismod. Nunc consequat
                    pulvinar ex sit amet bibendum. Nam vel tellus posuere, semper nunc eget, fermentum lacus. Nullam
                    sed tortor sapien. Nunc venenatis posuere scelerisque. Etiam sodales vulputate diam in feugiat. Nam
                    eu posuere elit.
                </p>
            </div>
            <div class="text-center mt-3">
                <img class="img-fluid" src="http://localhost/Tienda-online/public/img/imagenes_varias/ropaeco.JPG " alt="Historia GreenClothes" width="400px" height="350px">
            </div>
        </section>
        <section class="mision p-1 mt-4">
            <div class="ancho d-flex flex-column justify-content-center align-items-center mx-5">
                <h1 data-i18n-key="mision">MISIÓN</h1>
                <p data-i18n-key="descripcionMision">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam accumsan dui tellus, vel feugiat
                    mi eleifend a. Maecenas tortor arcu, blandit vitae convallis eu, luctus tincidunt risus. Nullam
                    semper sollicitudin feugiat. Etiam bibendum blandit nulla, vitae mattis ligula luctus mattis.
                    Vestibulum a pretium ex.
                </p>
            </div>
            <div class="text-center mt-3">
                <img class="img-fluid" src="http://localhost/Tienda-online/public/img/imagenes_varias/mision.JPG" alt="Misión de GreenClothes" width="400px" height="350px">
            </div>

        </section>
        <section class="servicios d-flex flex-column justify-content-center mt-4">
            <div class="pb-3 text-center">
                <h1 data-i18n-key="servicios">SERVICIOS</h1>
            </div>
            <div id="carouselExampleCaptions" class="carousel carousel-dark slide">
                <div id="carouselExampleCaptions" class="carousel carousel-dark slide">
                    <div class="carousel-indicators bottom-">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container text-center">
                                <img class="rounded-circle" src="http://localhost/Tienda-online/public/img/imagenes_varias/servicio1.PNG" alt="Servicio nº1">
                                <h3 data-i18n-key="molienda" class="pt-4">Lore ipsum dolor sit</h3>
                                <p data-i18n-key="textoMolienda" class=" text-center">
                                    Uno de nuestros principales Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam accumsan dui tellus,
                                    vel feugiat mi eleifend a. Maecenas tortor arcu, blandit vitae convallis eu, luctus tincidunt risus.
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="container text-center">
                                <img class="testimonio-imagen rounded-circle" src="http://localhost/Tienda-online/public/img/imagenes_varias/servicio2.JPG" alt="Servicio nº2">
                                <h3 data-i18n-key="exportacion" class="pt-4">Lore ipsum dolor sit</h3>
                                <p data-i18n-key="textoExportacion" class=" text-center">
                                    Uno de nuestros principales Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam accumsan dui tellus,
                                    vel feugiat mi eleifend a. Maecenas tortor arcu, blandit vitae convallis eu, luctus tincidunt risus.
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="container text-center">
                                <img class="rounded-circle" src="http://localhost/Tienda-online/public/img/imagenes_varias/servicio3.WEBP" alt="Servicio nº3">
                                <h3 data-i18n-key="venta" class="pt-4">Lore ipsum dolor sit</h3>
                                <p data-i18n-key="textoVenta" class=" text-center">
                                    Uno de nuestros principales Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam accumsan dui tellus,
                                    vel feugiat mi eleifend a. Maecenas tortor arcu, blandit vitae convallis eu, luctus tincidunt risus.
                                </p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden"></span>
                    </button>
                </div>
        </section>
    </div>
</main>
<footer class="seccion-oscura d-flex flex-column align-items-center justify-content-center">
    <img class="footer-icono" src="http://localhost/Tienda-online/public/img/logotipo.jpeg" alt="Logo de la página web">
    <p class="footer-texto text-center">GREEN CLOTHES
    </p>
    <div class="iconos-redes-sociales d-flex flex-wrap align-items-center justify-content-center">
        <a href="#" target="_blank" rel="noopener noreferrer"><i class="bi bi-instagram"></i></a>
        <a href="#" target="_blank" rel="noopener noreferrer"><i class="bi bi-twitter-x"></i></a>
        <a href="#" target="_blank" rel="noopener noreferrer"><i class="bi bi-github"></i></a>
        <a href="#" target="_blank" rel="noopener noreferrer"><i class="bi bi-linkedin"></i></a>
    </div>
    <div class="derechos-autor">Creado por Sandro Suárez Aranda (2023) &#169</div>
</footer>
<?php require_once APP . '/views/inc/footer.php' ?>
