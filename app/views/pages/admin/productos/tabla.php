<?php require_once APP . '/views/inc/header.php' ?>
<?php require_once APP . '/views/inc/cambioCategoria.php' ?>
<?php require_once APP . '/views/inc/validacionAdmin.php'?>
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
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/Tienda-online/Views/productosAdmin">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Tienda-online/Views/pedidos">Pedidos</a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="<?= URL ?>/Views/productosAdmin" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bienvenido
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
<main class="container-fluid my-5">
    <div class="d-flex justify-content-between mb-5">
        <div class="sec_titulo">
            Listado de productos
        </div>
        <div class="div_btn">
            <a class="btn btn-primary rounded" href=<?=URL.'/Views/addProducto' ?>><i
                    class="bi bi-bag-plus-fill"></i> Añadir</a>
        </div>
    </div>
    <div class=" div_table  table-responsive">
        <table class="table table-bordered align-middle ">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th class="nombre" scope="col">Nombre</th>
                    <th scope="col">Categoría</th>
                    <th class="descripcion" scope="col">Descripción</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Precio</th>
                    <th class="fecha" scope="col">Fecha</th>
                    <th scope="col">Eliminar</th>
                    <th scope="col">Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once(APP . '\controllers\Models.php');
                $model = new Models();
                $data = $model->cargarRegistros();
                $num_registros = count($data);
                if ($num_registros > 0) {
                    
                    foreach ($data as $row) {
                        $categoria = nombreCategoria($row['categoria_id']);
                        ?>
                        <tr class="text-center">
                            <th scope="row">
                                <?= $row['id'] ?>
                            </th>
                            <td >
                                <?= $row['nombre_ropa'] ?>
                            </td>
                            <td>
                                <?=  $categoria['categoria'] ?>
                            </td>
                            <td>
                                <?= $row['descripcion'] ?>
                            </td>
                            <td>
                                <?php
                                if ($row['foto'] == '') {
                                    $row['foto'] = '111';
                                }
                                $file_path =__DIR__. '/../../../../../public/img/'.$row['foto'];
                                if (file_exists($file_path)) {
                                    ?>
                                    <img src="<?= URL?>/public/img/<?= $row['foto'] ?>" width="100px">
                                    <?php
                                } else {
                                    ?>
                                    <img src="<?= URL?>/public/img/NOIMAGE.jpeg" width="100px">
                                    <?php
                                }
                                ?>
                            </td>
                            <td>
                                <?= $row['precio'] ?>€
                            </td>
                            <td>
                                <?= $row['fecha'] ?>
                            </td>
                            <td class="">
                                <a href="<?= URL ?>/Models/eliminarProducto?id=<?=$row['id']?>" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                            </td>
                            <td>
                                <a class="btn btn-success btn-sm" href="<?= URL ?>/Views/actualizarRegistro?id=<?=$row['id']?>"><i
                                        class="bi bi-pencil-fill"></i></a>
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