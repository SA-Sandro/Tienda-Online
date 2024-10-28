<?php

class Carrito
{

    public function agregarRopa($id, $ropas, $cantidad = 1)
    {
        session_start();
        $_SESSION['carrito'][$_SESSION['usuario']][$id] = array(
            'id' => $id,
            'nombre_ropa' => $ropas['nombre_ropa'],
            'descripcion' => $ropas['descripcion'],
            'foto' => $ropas['foto'],
            'precio' => $ropas['precio'],
            'cantidad' => $cantidad
        );

        header('Location: ' . URL . '/Views/carrito');
    }

    public function actualizarRopa($id, $cantidad = FALSE)
    {
        if ($cantidad) {
            $_SESSION['carrito'][$_SESSION['usuario']][$id]['cantidad'] = $cantidad;
        } else {
            $_SESSION['carrito'][$_SESSION['usuario']][$id]['cantidad'] = (int) $_SESSION['carrito'][$_SESSION['usuario']][$id]['cantidad'] + 1;
        }
        header('Location: ' . URL . '/Views/carrito');
    }

    public function disminuirCantidad($id)
    {
        session_start();
        $_SESSION['carrito'][$_SESSION['usuario']][$id]['cantidad'] -= 1;
        return $_SESSION['carrito'][$_SESSION['usuario']][$id]['cantidad'];
    }

    public function aumentarCantidad($id)
    {
        session_start();
        $_SESSION['carrito'][$_SESSION['usuario']][$id]['cantidad'] += 1;
        return $_SESSION['carrito'][$_SESSION['usuario']][$id]['cantidad'];
    }

    public function eliminarDelCarrito($id)
    {
        session_start();
        if (isset($_SESSION['carrito'][$_SESSION['usuario']][$id])) {
            unset($_SESSION['carrito'][$_SESSION['usuario']][$id]);
        }
    }
}
