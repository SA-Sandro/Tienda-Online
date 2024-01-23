<?php require_once APP . '/views/inc/header.php' ?>
<?php require_once APP . '/views/inc/validacionCliente.php' ?>
<header>
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
                        <a class="dropdown-item" href="<?= URL ?>/Sessions/cerrarSesion?id=inicioSesion"><i
                                class="bi bi-box-arrow-in-right"></i>
                            Cerrar sesión
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<main class="container p-5 display-5">
    <div class="divGray p-5 jumbotron text-center">
        <p>¡Gracias por realiar el pedido!</p>
        <a class="btn btn-primary btn-block" href="<?=URL?>/Views/inicioCliente">Regresar</a>
    </div>
</main>















<?php require_once APP . '/views/inc/footer.php' ?>