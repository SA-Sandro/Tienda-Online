<?php require_once APP . '/views/inc/header.php' ?>
<?php require_once APP . '/views/inc/validacionAdmin.php'?>
<?php
$usuario = $_SESSION['usuario'];
require_once 'C:\xampp\htdocs\Tienda-Online\app\controllers\Models.php';
$model = new Models();
$id = $_GET['id'];
$datos = $model->cargarRegistrosPorId($id);
?>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="http://localhost/Tienda-online/Views/inicioAdmin">
            <img src="http://localhost/Tienda-online/public/img/logotipo.jpeg" alt="logotipo" width="70">
            <span>Green Clothes</span>
        </a>
        <button class="navbar-toggler mx-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto text-center">
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>/Views/inicioAdmin">Inicio <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= URL ?>/Views/productosAdmin">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pedidos</a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $usuario ?>
                    </a>
                    <div class=" reducir dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= URL ?>/views/inc/cerrarSesion.php"><i
                                class="bi bi-box-arrow-in-right"></i>
                            Cerrar sesión</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>

<main class="container my-5">

    <form action="<?= URL ?>/Models/updateProducto" method="POST" enctype="multipart/form-data" class="formulario">
        <input type="hidden" name="id" value="<?= $id ?>">


        <div class="form-group">
            <label for="id_nombre">Nombre del producto</label>
            <input name="nombre_producto" type="text" class="form-control" id="id_nombre"
                placeholder="Ej. Camiseta corta..." value=<?= $datos['nombre_ropa'] ?>>
        </div>
        <div class="form-group">
            <label for="id_descrip">Descripción</label>
            <textarea name="descripcion" type="text" class="form-control"
                id="id_descrip"><?= $datos['descripcion'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="id_categoria">Categoría</label>
            <select class="form-control" name="cat_id" id="id_categoria">
                <option selected disabled value="">--SELECCIONE--</option>
                <?php
                require_once 'C:\xampp\htdocs\Tienda-Online\app\controllers\Models.php';
                $models = new Models();
                $data = $models->cargarCategorias($models);
                foreach ($data as $categorias) {
                        ?>
                        <option value="<?= $categorias['id'] ?>" 
                            <?=$datos['categoria_id'] === $categorias['id'] ? 'selected' : '' ?>>
                            <?php print $categorias['categoria']?>
                        </option>  
                   <?php }
                 ?>
            </select>
            <input type="hidden" name="categoria_id" value="<?= $datos['categoria_id'] ?>">
        </div>
        <div class="form-group">
            <label for="id_foto">Foto</label><br>
            <input type="file" id="id_foto" name="imagensita">
            <input type="hidden" name="hiddenFoto" value=<?=$datos['foto']?>>
        </div>
        <div class="form-group">
            <label for="id_precio">Precio</label>
            <input name="precio" type="number" step="0.01" class="form-control" id="id_precio" placeholder="0.00"
                value=<?= $datos['precio'] ?>>
        </div>
        <div class="m-auto">
            <button type="submit" class="btn btn-primary">Actualizar </button>
            <a href="<?= URL ?>/Views/productosAdmin" type="submit" class="btn btn-primary">Cancelar</a>
        </div>
    </form>
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