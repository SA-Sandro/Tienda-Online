<?php
class Ropas
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
        $sql = 'INSERT INTO ropas (nombre_ropa, descripcion, foto, precio, categoria_id, fecha) 
        VALUES (:nombre_ropa, :descripcion, :foto, :precio, :categoria_id, :fecha)';

        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ':nombre_ropa' => $_params['nombre_producto'],
            ':descripcion' => $_params['descripcion'],
            ':foto' => $_params['foto'],
            ':precio' => $_params['precio'],
            ':categoria_id' => $_params['categoria_id'],
            ':fecha' => $_params['fecha']
        );

        if ($resultado->execute($_array)) {
            return true;
        }
    }

    public function actualizar($_params)
    {
        $sql = 'UPDATE ropas SET nombre_ropa=:nombre_ropa ,descripcion=:descripcion, foto=:foto, precio=:precio,categoria_id=:categoria_id WHERE ropas.id = :id;';

        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ':id' => $_params['id'],
            ':nombre_ropa' => $_params['nombre_producto'],
            ':descripcion' => $_params['descripcion'],
            ':foto' => $_params['foto'],
            ':precio' => $_params['precio'],
            ':categoria_id' => $_params['categoria_id'],
        );
        if ($resultado->execute($_array)) {
            return true;
        } else {
            
            return false;
        }
    }

    public function eliminar($id)
    {
        $sql = 'DELETE FROM ropas WHERE ropas.id= :id ';
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ':id' => $id
        );
        if ($resultado->execute($_array)) {
            return true;
        } else {
            return false;
        }
    }

    public function mostrar()
    {
        $sql = 'SELECT ropas.id,nombre_ropa,categoria_id,descripcion,foto,precio,fecha 
        FROM `ropas` INNER JOIN categoria_ropa ON ropas.categoria_id = categoria_ropa.id 
        GROUP BY ropas.id DESC';

        $resultado = $this->cn->prepare($sql);

        if ($resultado->execute()) {
            return $resultado->fetchAll();
        } else {
            return false;
        }

    }
    
    public function mostrarPorId($id)
    {
        $sql = 'SELECT * FROM `ropas` WHERE ropas.id = :id';

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
