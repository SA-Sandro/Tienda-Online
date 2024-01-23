<?php

class Usuarios
{

    private $config;
    private $cn = null;

    public function __construct()
    {
        try {
            $this->config = parse_ini_file(__DIR__ . '/../config/config.ini');
            $this->cn = new PDO(
                $this->config['dns'],
                $this->config['usuario'],
                $this->config['clave'],
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
            );
        } catch (PDOException $e) {
            echo "Error de conexión:" . $e->getMessage();
        }
    }


    public function registrarUsuario($params)
    {
        try {
            $sql = "INSERT INTO `usuarios` (`nombre_usuario`, `correo`, `clave`) VALUES (:nombre, :correo, :clave)";
            $resultado = $this->cn->prepare($sql);
            $_array = array(
                ':nombre' => $params['nombre_usuario'],
                ':correo' => $params['correo'],
                ':clave' => $params['clave']
            );

            if ($resultado->execute($_array)) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo 'No se pudo registrar al usuario' . $e->getMessage();


        }
    }
    public function iniciarSesion($params){
        try{
            $usuario = $params['nombre_usuario'];
            $clave = $params['clave'];

            $sql = 'SELECT * FROM usuarios WHERE nombre_usuario = :nombre_usuario AND clave = :clave';
            $resultado = $this->cn->prepare($sql);
            $_array = array(
                ':nombre_usuario'=> $usuario,
                ':clave'=> $clave
            );

            if ($resultado->execute($_array)) {
                return $resultado->fetch();
            }else{
                return false;
            };

        }catch(PDOException $e) {
            echo 'No se pudo iniciar sesión'. $e->getMessage();
        }
    }
}
?>