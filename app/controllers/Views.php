<?php
class Views extends Control
{

    public function inicio()
    {
        $datos = [
            "title" => "Inicio",
            "css" => "assets/css/estilosGenerales.css",
            "cssIni" => "assets/css/estilosInicio.css"
        ];
        $this->load_view('inicio', $datos);
    }

    public function tienda()
    {
        $datos = [
            "title" => "Tienda",
            "css" => "assets/css/estilosGenerales.css",
            "cssIni" => "assets/css/estilosTiendaInicio.css"
        ];
        $this->load_view('tienda', $datos);
    }
    public function registrarUsuario()
    {
        $datos = [
            "title" => "Registrar usuario",
            "css" => "assets/css/registrar.css",
            "cssIni" => "assets/css/estilosGenerales.css"
        ];
        $this->load_view('registrarUsuario', $datos);
    }

    public function iniciarSesion()
    {
        $datos = [
            "title" => "Iniciar sesión",
            "css" => "assets/css/iniciarSesion.css",
            "cssIni" => "assets/css/estilosGenerales.css"
        ];
        $this->load_view('iniciarSesion', $datos);
    }
    public function productosAdmin()
    {

        $datos = [
            "title" => "Listado de productos",
            "css" => "assets/css/admin/productosAdmin.css",
            "cssIni" => "assets/css/estilosGenerales.css"
        ];
        $this->load_view('admin/productos/tabla', $datos);

    }
    public function addProducto()
    {
        $datos = [
            "title" => "Añadir productos",
            "css" => "assets/css/admin/addProducto.css",
            "cssIni" => "assets/css/estilosGenerales.css"
        ];
        $this->load_view('admin/productos/addProducto', $datos);

    }
    public function actualizarRegistro()
    {
        $id = $_GET['id'];
        $datos = [
            "title" => "Actualizar producto",
            "css" => "assets/css/admin/addProducto.css",
            "cssIni" =>"assets/css/estilosGenerales.css",
            "idProducto" => $id
        ];
        $this->load_view('admin/productos/actualizarRegistro', $datos);

    }
    public function pedidos()
    {
        $datos = [
            "title" => "Pedidos",
            "css" => "assets/css/admin/pedidos.css",
            "cssIni" => "assets/css/estilosGenerales.css"
        ];
        $this->load_view('admin/productos/pedidos', $datos);

    }
    public function verDetallePedidos()
    {
        if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $datos = [
            "title" => "Detalles del pedido",
            "css" => "assets/css/admin/detallePedidos.css",
            "cssIni" => "assets/css/estilosGenerales.css",
            "id"=> $id
        ];
        $this->load_view('admin/productos/detallePedidos', $datos);
        }
    }
    //CLIENTE
    public function inicioCliente()
    {
        $datos = [
            "title" => "Inicio",
            "css" => "assets/css/cliente/inicioCliente.css",
            "cssIni" => "assets/css/estilosGenerales.css"
        ];
        $this->load_view('cliente/inicio', $datos);
    }

    public function clientMarket()
    {
        $datos = [
            "title" => "Tienda",
            "css" => "assets/css/cliente/tienda.css",
            "cssIni" => "assets/css/estilosGenerales.css"
        ];
        $this->load_view('cliente/market', $datos);
    }

    public function carrito()
    {
        if (isset($_GET['id'])) {
            $datos = [
                "title" => "Carrito del cliente",
                "css" => "assets/css/cliente/carrito.css",
                "cssIni" =>"assets/css/estilosGenerales.css",
                "idProducto" => $_GET['id']
            ];
        }else{
            $datos = [
                "title" => "Carrito del cliente",
                "css" => "assets/css/cliente/carrito.css",
                "cssIni" => "assets/css/estilosGenerales.css"
            ]; 
        }
        $this->load_view('cliente/carrito', $datos);
    }


    public function finalizarCompra(){
        $datos = [
            "title" => "Finalizar compra",
            "css" => "assets/css/cliente/finalizar_compra.css",
            "cssIni" => "assets/css/estilosGenerales.css"
        ];
        $this->load_view('cliente/finalizar_compra', $datos);
    }

    public function gracias_pedido(){
        $datos = [
            "title" => "Fin del pedido",
            "css" => "assets/css/cliente/gracias.css",
            "cssIni" => "assets/css/estilosGenerales.css"
        ];
        $this->load_view('cliente/gracias_pedido', $datos);
    }
}
