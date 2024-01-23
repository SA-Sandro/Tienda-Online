<?php
session_start();
if (!isset($_SESSION['rol']) && !isset($_SESSION['usuario'])) {
    header('Location: ' . URL . '/Views/iniciarSesion');
    exit(); 
}

if ($_SESSION['rol'] !== "Cliente") {
    header('Location: ' . URL . '/Views/productosAdmin');
    exit(); 
}

$usuario = $_SESSION['usuario'];