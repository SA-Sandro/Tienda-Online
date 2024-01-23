<?php require_once APP . '/views/inc/header.php' ?>
<?php require_once APP . '/views/inc/validacionCliente.php' ?>
<?php
if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
    $nProductsOnCart = isset($_SESSION['carrito'][$_SESSION['usuario']]) ? count($_SESSION['carrito'][$_SESSION['usuario']]) : 0;
} else {
    $nProductsOnCart = 0;
}
?>
<header>
    <nav id="navegador" class=" navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="http://localhost/Tienda-online/Views/inicioCliente">
            <img class="header-icono" src="http://localhost/Tienda-online/public/img/logotipo.jpeg" alt="logotipo" width="70">
            <span>Green Clothes</span>
        </a>
        <button class="navbar-toggler mx-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto text-center d-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Tienda-online/Views/inicioCliente">Inicio <span class="sr-only"></span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link active" href="http://localhost/Tienda-online/Views/clientMarket">Tienda</a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $usuario ?>
                    </a>
                    <div class=" reducir dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= URL ?>/Sessions/cerrarSesion"><i class="bi bi-box-arrow-in-right"></i>
                            Cerrar sesión
                        </a>
                    </div>
                </li>
                <li>
                    <div class="divCarrito p-4 mx-4 rounded">
                        <a href="<?= URL ?>/Views/carrito" type="button" class="btn btn-primary position-relative p-2">
                            <i class="bi bi-cart"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?= $nProductsOnCart ?>
                            </span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>

<main class="my-5">

    <div class="container">
        <div>
            <section class="p-3 d-flex justify-content-center">
                <div class="text-center tituloTienda">Tienda</div>
            </section>
            <section>
                <div class="productos">
                    <?php
                    require_once 'C:\xampp\htdocs\Tienda-Online\app\controllers\Models.php';
                    $models = new Models();
                    $data = $models->cargarRegistros();
                    foreach ($data as $registros) {
                    ?>
                        <div class="producto d-flex flex-column justify-content-center mt-4 ">
                            <div class="divImagen d-flex justify-content-center mt-2">
                                <img class="img-fluid" src="<?= URL ?>/public/img/<?= $registros['foto'] ?>" alt="aceite variedad Picual" width="200px">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <div class="nombreProducto text-center">
                                    <?php print $registros['nombre_ropa'] ?>
                                </div>
                                <div class="descripcion text-center p-1">
                                    <?php print $registros['descripcion'] ?>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center text-center p-4">
                                <div class="precio mx-3">
                                    <?php print $registros['precio'] ?>€
                                </div>
                                <a href="<?= URL ?>/Models/gestionCarrito?id=<?= $registros['id'] ?>" type="button" class="addToCart">Añadir al carrito <i class="bi bi-chevron-right"></i></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </section>
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