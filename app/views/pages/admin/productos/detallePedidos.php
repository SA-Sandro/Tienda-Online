<?php require_once APP . '/views/inc/header.php' ?>
<?php require_once APP . '/views/inc/validacionAdmin.php' ?>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="http://localhost/Tienda-online/Views/productosAdmin">
            <img src="http://localhost/Tienda-online/public/img/logotipo.jpeg" alt="logotipo" width="70">
            <span>Green Clothes</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto text-center">
                <li class="nav-item ">
                    <a class="nav-link" href="http://localhost/Tienda-online/Views/productosAdmin">Productos</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/Tienda-online/Views/pedidos">Pedidos</a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $usuario ?>
                    </a>
                    <div class=" reducir dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= URL ?>/Sessions/cerrarSesion"><i
                                class="bi bi-box-arrow-in-right"></i>
                            Cerrar sesión</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<main class="container my-5">
    <?php

    require_once(APP . '\models\Pedidos.php');
    $model = new Pedidos();
    $detallesPedido = $model->mostrarDetallePedidos($datos['id']);
    ?>
    <section class="section_info">

        <fieldset>
            <legend>Información de la compra</legend>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input class="form-control" type="text" id="nombre" value="<?= $detallesPedido[0]['nombre'] ?>" disabled>
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input class="form-control" type="text" id="apellidos" value="<?= $detallesPedido[0]['apellidos'] ?>" disabled>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" id="email" value="<?= $detallesPedido[0]['correo'] ?>" disabled>
            </div>
        </fieldset>
    </section>

    <section class="section_tablaProductos my-3">
        <div class="row">
            <div class="col-md-12">
                <fieldset class="d-flex justify-content-between">
                    <legend class="sec_titulo">
                        Detalles del pedido
                    </legend>
                </fieldset>
                <div class="container div_table table-responsive">
                    <table class="table table-bordered align-middle ">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th class="producto" scope="col">Producto</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Cantidad</th>
                                <th class="totalProducto" scope="col">Total producto</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $num_registros = count($detallesPedido);
                            $contador = 0;
                            //IMPLEMENTAR FUNCIONALIDAD DE LOS DETALLES DEL PEDIDO
                            if ($num_registros > 0) {
                                foreach ($detallesPedido as $row) {
                                    $total_producto = $row['precio'] * $row['cantidad'];
                                    $contador++;
                            ?>
                                    <tr class="text-center">
                                        <th scope="row">
                                            <?= $contador ?>
                                        </th>
                                        <td>
                                            <?= $row['nombre_ropa'] ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($row['foto'] == '') {
                                                $row['foto'] = '111';
                                            }
                                            $file_path = __DIR__ . '/../../../../../public/img/' . $row['foto'];
                                            if (file_exists($file_path)) {
                                            ?>
                                                <img src="<?= URL ?>/public/img/<?= $row['foto'] ?>" width="100px">
                                            <?php
                                            } else {
                                            ?>
                                                <img src="<?= URL ?>/public/img/NOIMAGE.jpeg" width="100px">
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?= $row['precio'] ?>€
                                        </td>
                                        <td>
                                            <?= $row['cantidad'] ?>
                                        </td>
                                        <td>
                                            <?= $total_producto ?>€
                                        </td>
                                    </tr>
                            <?php
                                }
                            } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div>
        <div class="form-group my-3">
            <label for="total">Total</label>
            <input class="form-control" type="text" id="total" value="<?= $detallesPedido[0]['total'] ?>€" disabled>
        </div>
        <div class="text-center my-3">
            <a type="button" href="<?=URL?>/Views/pedidos" class="btn btn-success">Volver</a>
        </div>
        </div>
    </section>
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