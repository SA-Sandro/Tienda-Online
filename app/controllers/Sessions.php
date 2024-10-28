<?php

class Sessions
{
    public function __construct()
    {
        session_start();
    }

    public function cerrarSesion()
    {
        unset($_SESSION["usuario"]);
        unset($_SESSION["rol"]);

        header('Location:'.URL.'/Views/iniciarSesion');
    }
}




?>