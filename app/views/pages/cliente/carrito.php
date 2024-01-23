<?php require_once APP . '/views/inc/header.php' ?>
<?php require_once APP . '/views/inc/validacionCliente.php' ?>
<?php
if (isset($_SESSION['carrito'])) {
    count($_SESSION['carrito'][$_SESSION['usuario']]) >= 1 ? $nProductsOnCart = count($_SESSION['carrito'][$_SESSION['usuario']]) :   $nProductsOnCart = 0;
} else {
    $nProductsOnCart = 0;
}
?>
<header class="">
    <nav id="navegador" class=" navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="http://localhost/Tienda-online/Views/inicio">
            <img class="header-icono" src="http://localhost/Tienda-online/public/img/logotipo.jpeg" alt="logotipo" width="70">
            <span>Green Clothes</span>
        </a>
        <button class="navbar-toggler mx-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto text-center d-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Tienda-online/Views/inicio">Inicio <span class="sr-only"></span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="http://localhost/Tienda-online/Views/tienda">Tienda</a>
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
                        <a href="<?= URL ?>/Views/carrito" type="button" class="btn btn-primary position-relative p-2 active">
                            <i class="bi bi-cart"></i>
                            <span class="valorCarrito position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?= $nProductsOnCart ?>
                            </span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<main>
    <section class="d-flex justify-content-center mt-5">
        <div class="tituloCarrito">Carrito de la compra</div>
    </section>
    <section class="seccionTabla container p-3 ">
        <?php
        $total = 0;
        if (isset($_SESSION['carrito'][$_SESSION['usuario']]) && !empty($_SESSION['carrito'][$_SESSION['usuario']])) {

            foreach ($_SESSION['carrito'][$_SESSION['usuario']] as $datos) {

                $total = $total + (int) ($datos['precio'] * (int) $datos['cantidad']);
        ?>
                <div class="producto container d-flex m-5" id="producto_<?= $datos['id'] ?>">
                    <div>
                        <div class="text-center">
                            <?php
                            if ($datos['foto'] == '') {
                                $datos['foto'] = '111';
                            }
                            $file_path = __DIR__ . '/../../../../public/img/' . $datos['foto'];

                            if (file_exists($file_path)) {
                            ?>
                                <img class="img-fluid" src="<?= URL ?>/public/img/<?= $datos['foto'] ?>" width="300px">
                            <?php
                            } else {
                            ?>
                                <img class="img-fluid" src="<?= URL ?>/public/img/NOIMAGE.jpeg" width="300px">
                            <?php
                            }
                            ?>
                        </div>
                        <div class="d-flex justify-content-center">

                            <a class="btn btn-primary mx-1 disminuir" data-id="<?= $datos['id'] ?>"><i class="bi bi-dash"></i></a>
                            <input class="tamañoInput" disabled type="text" id="valorInput_<?= $datos['id'] ?>" value="<?= $datos['cantidad'] ?>">
                            <a class="btn btn-primary mx-1 aumentar" data-id="<?= $datos['id'] ?>"><i class="bi bi-plus"></i></a>
                        </div>
                    </div>
                    <div class="nombre_precio m-3">
                        <div>
                            <div class="nombreProducto">
                                <?= $datos['nombre_ropa'] ?>
                            </div>
                            <div class="precio">
                                <?= $datos['precio'] ?>€
                            </div>
                        </div>
                        <div class="divEliminar mt-3">
                            <a class="eliminarProducto btn btn-danger" type="button" data-id="<?= $datos['id'] ?>">Eliminar</a>
                        </div>
                    </div>
                </div>

            <?php } ?>
            <div class="totalCarrito">
                Total del pedido: <?= $total ?>€
            </div>
            <section class="botonesCompra container d-flex justify-content-center py-5">

                <div class="pull-left mx-2">
                    <a class="btn btn-success text-white" href="<?= URL ?>/Views/clientMarket"> Seguir añadiendo productos al
                        carrito</a>
                </div>
                <div class="pull-rigth mx-2">
                    <a class="btn btn-danger text-white" href="<?= URL ?>/Views/finalizarCompra?total=<?= $total ?>">Finalizar compra</a>
                </div>
            </section>
        <?php } else { ?>
            <div class="text-center">Todavía no tienes productos en el carrito</div>

            <section class="botonesCompra container d-flex justify-content-center py-5">
                <div class="pull-left mx-2">
                    <a class="btn btn-success text-white" href="<?= URL ?>/Views/clientMarket"> Añadir productos al
                        carrito</a>
                </div>
            </section>
        <?php
        }
        ?>
        <?php
        if (isset($_SESSION['carrito'])) {
        ?>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let aumentarBotones = document.querySelectorAll(".aumentar");
            let disminuirBotones = document.querySelectorAll(".disminuir");
            let eliminarProducto = document.querySelectorAll(".eliminarProducto")

            aumentarBotones.forEach(function(aumentarBoton) {
                aumentarBoton.addEventListener("click", function() {
                    let idActual = aumentarBoton.getAttribute('data-id');
                    let valorInput = document.querySelector(`#valorInput_${idActual}`);
                    enviarSolicitud('aumentarCantidad', idActual, valorInput);
                });
            });

            disminuirBotones.forEach(function(disminuirBoton) {
                disminuirBoton.addEventListener("click", function() {
                    let idActual = disminuirBoton.getAttribute('data-id');
                    let valorInput = document.querySelector(`#valorInput_${idActual}`);
                    if (valorInput.value == '1') {
                        enviarSolicitud('eliminarProductoCarrito', idActual, valorInput);
                    } else {
                        enviarSolicitud('disminuirCantidad', idActual, valorInput);
                    }
                });
            });

            eliminarProducto.forEach(function(eliminar) {
                eliminar.addEventListener("click", function() {
                    let idActual = eliminar.getAttribute('data-id');
                    enviarSolicitud('eliminarProductoCarrito', idActual);
                })
            });

            function enviarSolicitud(accion, id, valorInput) {
                let request = new XMLHttpRequest();

                request.onreadystatechange = function() {
                    if (request.readyState === 4) {
                        if (request.status === 200) {
                            if (accion === 'disminuirCantidad' || accion === 'aumentarCantidad') {
                                valorInput.value = request.responseText;
                            } else {
                                if (valorInput.value == '1') {
                                    document.getElementById('producto_' + id).remove();
                                    document.querySelector(".valorCarrito").innerHTML = '<?= $nProductsOnCart - 1 ?>';
                                    if (<?= $nProductsOnCart ?> == 1) {
                                        document.querySelector(".seccionTabla").innerHTML = '<div class="text-center">Todavía no tienes productos en el carrito</div>'
                                        document.querySelector('.seccionTabla').innerHTML += '<section class="botonesCompra container d-flex justify-content-center py-5><div class="pull-left mx-2"><a class="btn btn-success text-white m-3" href="<?= URL ?>/Views/clientMarket"> Añadir productos al carrito</a></div></section>';
                                        document.querySelector(".valorCarrito").innerHTML = '<?= $nProductsOnCart - 1 ?>';
                                    }
                                }
                            }
                        }
                    }
                };

                request.open('GET', 'http://localhost/Tienda-online/Models/' + accion + '?id=' + id, true);
                request.send();
            }
        });
    </script>

<?php } ?>
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