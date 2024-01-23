<?php

class Categorias
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


    public function cargarCategorias(){

        $sql = 'SELECT * FROM categoria_ropa';

        $resultado = $this->cn->prepare($sql);

        if ($resultado->execute()) {
            return $resultado->fetchAll();
        } else {
            return false;
        }

    }
    public function cargarCategoriasPorId($id){

        $sql = 'SELECT * FROM categoria_ropa WHERE categoria_ropa.id = :id';

        $resultado = $this->cn->prepare($sql);
        
        $_array = array(
            ':id' => $id
        );
        if ($resultado->execute($_array)) {
            return $resultado->fetch();
        } else {
            return false;
        }

    }
}
?>