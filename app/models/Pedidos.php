<?php

class Pedidos
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
        $sql = 'INSERT INTO pedidos (id_cliente, total, fecha) 
        VALUES (:id_cliente, :total, :fecha)';

        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ':id_cliente' => $_params['id_cliente'],
            ':total' => $_POST['total'],
            ':fecha' => $_params['fecha']
        );

        if ($resultado->execute($_array)) {
            return $this->cn->lastInsertId();
        }
    }

    public function registrarDetallePedidos($_params)
    {
        $sql = 'INSERT INTO detalle_pedidos (pedido_id, producto_id, precio, cantidad) 
        VALUES (:pedido_id, :producto_id, :precio,:cantidad)';

        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ':pedido_id' => $_params['pedido_id'],
            ':producto_id' => $_params['producto_id'],
            ':precio' => $_params['precio'],
            ':cantidad' => $_params['cantidad']
        );

        if ($resultado->execute($_array)) {
            return true;
        }
    }

    public function mostrar(){

        $sql = 'SELECT p.id,c.nombre,c.apellidos,c.correo,c.telefono, p.total,p.fecha 
        FROM pedidos p INNER JOIN clientes c 
        ON p.id_cliente=c.id ORDER BY p.id DESC';

        $resultado = $this->cn->prepare($sql);

        if ($resultado->execute()) {
            return $resultado->fetchAll();
        }
        
    }

    public function mostrarDetallePedidos($id){
        
        $sql = 'SELECT c.nombre, c.apellidos, c.correo, c.telefono, p.total, p.fecha, r.nombre_ropa, r.foto, r.precio, dp.cantidad 
        FROM clientes c INNER JOIN pedidos p ON c.id=p.id_cliente
        INNER JOIN detalle_pedidos dp ON p.id = dp.pedido_id
        INNER JOIN ropas r ON r.id = dp.producto_id
        WHERE dp.pedido_id = :id';
        
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ':id' => $id
        );
        if ($resultado->execute($_array)) {
            return $resultado->fetchAll();
        }
    }
}
