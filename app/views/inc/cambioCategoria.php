<?php

function nombreCategoria($id)
{
    require_once 'C:\xampp\htdocs\Tienda-Online\app\controllers\Models.php';
    $models = new Models();
    $data = $models->cargarCategoriasPorId($id);
    
    return $data;


}
?>