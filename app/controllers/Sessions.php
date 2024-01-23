<?php

class Sessions
{
    public function __construct()
    {
        session_start();
    }


    public function cerrarSesion()
    {
        //Hay que eliminar solamente la sesión de usuario. Para que el carrito permanezca.
        unset($_SESSION["usuario"]);
        unset($_SESSION["rol"]);

        header('Location:'.URL.'/Views/iniciarSesion');
    }
}




?>