<?php
class Models extends Control
{
    public function addProducto()
    {
        $date = date("Y-m-d H:i:s");
        $models = new Models();
        $ropa_model = $models->load_model('Ropas');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (
                isset($_POST["nombre_producto"]) && isset($_POST["descripcion"]) && isset($_POST["categoria_id"])
                && isset($_FILES["foto"]) && isset($_POST["precio"])
            ) {
                $params = array(
                    "nombre_producto" => $_POST["nombre_producto"],
                    "descripcion" => $_POST["descripcion"],
                    "categoria_id" => $_POST["categoria_id"],
                    "foto" => $_FILES['foto']['name'],
                    "precio" => $_POST["precio"],
                    "fecha" => $date
                );
                $addProducto = $ropa_model->registrar($params);
                if ($addProducto) {
                    header("Location:" . URL . "/Views/productosAdmin");
                } else {
                    print 'Error al registrar la película';
                }
            }
        }
    }

    public function updateProducto()
    {
        $models = new Models();
        $ropa_model = $models->load_model('Ropas');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (
                isset($_POST["nombre_producto"]) && isset($_POST["descripcion"]) && isset($_POST["categoria_id"])
                && !empty($_FILES['imagensita']['name']) && isset($_POST["precio"])
            ) {
                $params = array(
                    "id" => $_POST["id"],
                    "nombre_producto" => $_POST["nombre_producto"],
                    "descripcion" => $_POST["descripcion"],
                    "categoria_id" => $_POST["cat_id"],
                    "foto" => $_FILES['imagensita']['name'],
                    "precio" => $_POST["precio"],
                );
                $actualizar = $ropa_model->actualizar($params);
                if ($actualizar) {
                    header("Location:" . URL . "/Views/productosAdmin");
                } else {
                    print 'Error al actualizar la película';
                }
            } else {
                $params = array(
                    "id" => $_POST["id"],
                    "nombre_producto" => $_POST["nombre_producto"],
                    "descripcion" => $_POST["descripcion"],
                    "categoria_id" => $_POST["cat_id"],
                    "foto" => $_POST['hiddenFoto'],
                    "precio" => $_POST["precio"],
                );
                $actualizar = $ropa_model->actualizar($params);
                if ($actualizar) {
                    header("Location:" . URL . "/Views/productosAdmin");
                } else {
                    print 'Error al actualizar la película';
                }
            }
        }
    }

    public function eliminarProducto()
    {
        $id = $_GET['id'];
        print $id;
        $models = new Models();
        $ropa_model = $models->load_model('Ropas');
        $eliminar = $ropa_model->eliminar($id);

        if ($eliminar) {
            header('Location:' . URL . '/Views/productosAdmin');
        } else {
            print 'No se ha podido eliminar el producto';
        }
    }

    public function cargarRegistros()
    {
        $models = new Models();
        $ropa_model = $models->load_model('Ropas');

        $listado_ropas = $ropa_model->mostrar();
        return $listado_ropas;
    }

    public function cargarRegistrosPorId($id)
    {
        $models = new Models();
        $ropa_model = $models->load_model('Ropas');

        $listado_ropas = $ropa_model->mostrarPorId($id);
        return $listado_ropas;
    }

    public function cargarCategoriasPorId($id)
    {
        $models = new Models();
        $ropa_model = $models->load_model('Categorias');

        $categoria = $ropa_model->cargarCategoriasPorId($id);

        return $categoria;
    }

    public function cargarCategorias($models)
    {

        $categoria_model = $models->load_model('Categorias');
        $resultado = $categoria_model->cargarCategorias();

        return $resultado;
    }

    public function registrarUsuario()
    {
        $models = new Models();
        $usuarios_model = $models->load_model('Usuarios');

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST["usuario"]) && isset($_POST["correo"]) && isset($_POST["clave"])) {
                $params = array(
                    "nombre_usuario" => $_POST["usuario"],
                    "correo" => $_POST["correo"],
                    "clave" => $_POST["clave"]
                );
                $registrar = $usuarios_model->registrarUsuario($params);
                if ($registrar) {
                    header('Location:' . URL . '/Views/iniciarSesion');
                }
            }
        }
    }

    public function iniciarSesion()
    {
        session_start();
        $models = new Models();
        $usuarios_model = $models->load_model('Usuarios');

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST["usuario"]) && isset($_POST["clave"])) {
                $params = array(
                    "nombre_usuario" => $_POST["usuario"],
                    "clave" => $_POST["clave"]
                );

                $iniciar = $usuarios_model->iniciarSesion($params);
                manejoSesiones($iniciar);
            }
        }
    }

    public function gestionCarrito()
    {
        session_start();

        $models = new Models();
        $carrito_model = $models->load_model('Carrito');
        $ropa_model = $models->load_model('Ropas');

        if (isset($_GET["id"])) {
            $id = $_GET["id"];

            $ropas = $ropa_model->mostrarPorId($id);

            if (isset($_SESSION['carrito'][$_SESSION['usuario']])) {
                if (array_key_exists($id, $_SESSION['carrito'][$_SESSION['usuario']])) {
                    $carrito_model->actualizarRopa($id);
                } else {
                    $carrito_model->agregarRopa($id, $ropas);
                }
            } else {
                $carrito_model->agregarRopa($id, $ropas);
            }
        }
    }

    public function disminuirCantidad()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];

            $models = new Models();
            $carritos_model = $models->load_model('Carrito');
            $nuevoValor = $carritos_model->disminuirCantidad($id);
            echo $nuevoValor;
        }
    }

    public function aumentarCantidad()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];

            $models = new Models();
            $carritos_model = $models->load_model('Carrito');
            $nuevoValor = $carritos_model->aumentarCantidad($id);
            echo $nuevoValor;
        }
    }

    public function eliminarProductoCarrito()
    {
        $id = $_GET['id'];
        $models = new Models();
        $carritos_model = $models->load_model('Carrito');

        $carritos_model->eliminarDelCarrito($id);
    }

    public function completarPedido()
    {
        session_start();
        $models = new Models();
        $cliente_model = $models->load_model('Clientes');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
                print_r($_SESSION);
                if (
                    isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["email"])
                    && isset($_POST['numero']) && isset($_POST["comentario"])
                ) {
                    $total = $_POST["total"];
                    $params = array(
                        "nombre" => $_POST["nombre"],
                        "apellidos" => $_POST["apellidos"],
                        "email" => $_POST["email"],
                        "numero" => $_POST['numero'],
                        "comentario" => $_POST["comentario"]
                    );
                    $id_cliente = $cliente_model->registrar($params);
                }

                $pedido_model = $models->load_model("Pedidos");
                $params = array(
                    "id_cliente" => $id_cliente,
                    "total" => $total,
                    "fecha" => date("Y-m-d H:i:s")
                );
                $pedido_id = $pedido_model->registrar($params);

                $pedido_model = $models->load_model("Pedidos");
                foreach ($_SESSION['carrito'][$_SESSION['usuario']] as $data) {
                    $params = array(
                        "pedido_id" => $pedido_id,
                        "producto_id" => $data['id'],
                        "precio" => $data['precio'],
                        "cantidad" => $data['cantidad'],
                    );
                    $estadoPedido = $pedido_model->registrarDetallePedidos($params);
                    if ($estadoPedido) {
                        $_SESSION['carrito'][$_SESSION['usuario']] = array();
                        header("Location:" . URL . "/Views/gracias_pedido");;
                    } else {
                        print 'Algo no fue bien';
                    }
                }
            }
        }
    }

    public function registrarPedido()
    {
        $models = new Models();
        $cliente_model = $models->load_model('Pedidos');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (
                isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["email"])
                && isset($_POST['numero']) && isset($_POST["comentario"])
            ) {
                $params = array(
                    "nombre" => $_POST["nombre"],
                    "apellidos" => $_POST["apellidos"],
                    "email" => $_POST["email"],
                    "numero" => $_POST['numero'],
                    "comentario" => $_POST["comentario"]
                );
                $addCliente = $cliente_model->registrar($params);
                if ($addCliente) {
                    header("Location:" . URL . "/Views/productosAdmin");
                } else {
                    print 'Error al registrar el cliente';
                }
            }
        }
    }
}

function manejoSesiones($data)
{
    $_SESSION["rol"] = validarRol($data);
    $_SESSION["usuario"] = asignarUsuario($data);
    if ($_SESSION["rol"] === "Administrador") {
        header("Location: " . URL . "/Views/productosAdmin");
    } else {
        header("Location: " . URL . "/Views/inicioCliente");
    }
}

function validarRol($data)
{
    switch ($data["rol_id"]) {

        case "1":
            return "Administrador";
        case "2":
            return "Cliente";
        default:
    }
}

function asignarUsuario($data)
{
    $nombreUsuario = $data[1];
    return $nombreUsuario;
}
