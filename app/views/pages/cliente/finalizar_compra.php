<?php require_once APP . '/views/inc/header.php' ?>
<?php require_once APP.'/views/inc/validacionCliente.php'?>
<?php
$_SESSION['total'] = $_GET['total'];
?>
<header class="">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="http://localhost/Tienda-online/Views/inicioCliente">
            <img src="http://localhost/Tienda-online/public/img/logotipo.jpeg" alt="logotipo" width="70">
            <span>Green Clothes</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto text-center">
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Tienda-online/Views/inicioCliente">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>/Views/clientMarket">Tienda</a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $usuario ?>
                    </a>
                    <div class=" reducir dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= URL ?>/Sessions/cerrarSesion"><i
                                class="bi bi-box-arrow-in-right"></i>
                            Cerrar sesión
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<main>
    
    <div class="container p-5">
        <div class="main-form">
            <div class="divPrincipal">
                <div class="col-md-12">
                    <fieldset>
                        <legend>Completar datos </legend>
                        <form action="<?=URL?>/Models/completarPedido" method="POST">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input class="form-control" type="text" name="nombre" id="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="ape">Apellidos</label>
                                <input class="form-control" type="text" name="apellidos" id="ape" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Correo electrónico</label>
                                <input class="form-control" type="email" name="email" id="email" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Teléfono</label>
                                <input class="form-control" type="number" name="numero" id="phone" required>
                            </div>
                            <div class="form-group">
                                <label for="comen">Comentario</label>
                                <textarea class="form-control" type="text" name="comentario" id="comen"></textarea>
                            </div>
                            <input name="total" type="hidden" value="<?= $_SESSION['total']?>">
                            <div class="my-3 text-center">
                                <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                            </div>
                        </form>
                    </fieldset>
                </div>
            </div>
        </div>
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