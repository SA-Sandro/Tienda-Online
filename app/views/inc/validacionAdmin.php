<?php
session_start();
if (!isset($_SESSION['rol'])&& !isset($_SESSION['usuario'])) {
    header('Location:' . URL . '/Views/iniciarSesion');
} else {
    if ($_SESSION['rol'] !== "Administrador") {
        header('Location: ' . URL . '/Views/inicioCliente');
    }
    $usuario = $_SESSION['usuario'];
}
?>