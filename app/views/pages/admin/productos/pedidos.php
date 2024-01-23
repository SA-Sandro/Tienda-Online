<?php require_once APP . '/views/inc/header.php' ?>
<?php require_once APP . '/views/inc/cambioCategoria.php' ?>
<?php require_once APP . '/views/inc/validacionAdmin.php' ?>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="http://localhost/Tienda-online/Views/productosAdmin">
            <img src="http://localhost/Tienda-online/public/img/logotipo.jpeg" alt="logotipo" width="70">
            <span>Green Clothes</span>
        </a>
        <button class="navbar-toggler mx-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
<main class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between">
                <div class="sec_titulo">
                    Listado de pedidos
                </div>
                <div class="div_btn">
                    <a class="btn btn-primary rounded" href=<?= URL . '/Views/addProducto' ?>><i
                            class="bi bi-bag-plus-fill"></i> Añadir</a>
                </div>
            </div>
            <div class="div_table my-5 table-responsive">
                <table class="table table-bordered align-middle">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th class="cliente" scope="col">Cliente</th>
                            <th class="correo" scope="col">Correo</th>
                            <th class="telefono" scope="col">Teléfono</th>
                            <th class="nPedido" scope="col">Nº Pedido</th>
                            <th scope="col">Total</th>
                            <th class="fecha" scope="col">Fecha</th>
                            <th class="detalles" scope="col">Ver detalles</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once(APP . '\models\Pedidos.php');
                        $model = new Pedidos();
                        $pedidos = $model->mostrar();
                        $num_registros = count($pedidos);
                        $contador = 0;
                        //IMPLEMENTAR FUNCIONALIDAD DE LOS DETALLES DEL PEDIDO
                        if ($num_registros > 0) {
                            foreach ($pedidos as $row) {
                                $contador++;
                                ?>
                                <tr class="text-center">
                                    <th scope="row">
                                        <?= $contador ?>
                                    </th>
                                    <td>
                                        <?= $row['nombre'] . $row['apellidos'] ?>
                                    </td>
                                    <td>
                                        <?= $row['correo'] ?>
                                    </td>
                                    <td>
                                        <?= $row['telefono'] ?>
                                    </td>
                                    <td>
                                        <?= $row['id'] ?>
                                    </td>
                                    <td>
                                        <?= $row['total'] ?>€
                                    </td>
                                    <td>
                                        <?= $row['fecha'] ?>
                                    </td>
                                    <td>
                                        <a href="<?= URL ?>/Views/verDetallePedidos?id=<?= $row['id']?>"
                                            class="btn btn-warning btn-sm"><i class="bi bi-eye"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr class="text-center">
                                <td colspan="9" class="text-uppercase">No hay registros en la base de datos</td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
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