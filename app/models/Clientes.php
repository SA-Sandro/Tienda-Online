<?php

class Clientes
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
    public function registrar($_params)
    {
        $sql = 'INSERT INTO clientes (nombre, apellidos, correo, telefono, comentario) 
        VALUES (:nombre, :apellidos, :email, :numero, :comentario)';

        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ':nombre' => $_params['nombre'],
            ':apellidos' => $_params['apellidos'],
            ':email' => $_params['email'],
            ':numero' => $_params['numero'],
            ':comentario' => $_params['comentario']
        );

        if ($resultado->execute($_array)) {
            return $this->cn->lastInsertId();
        }
    }
}
?>