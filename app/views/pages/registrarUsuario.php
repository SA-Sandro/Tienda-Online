<?php require_once APP . '/views/inc/header.php' ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="http://localhost/Tienda-online/">
        <img src="http://localhost/Tienda-online/public/img/logotipo.jpeg" alt="logotipo" width="70">
        <span>Green Clothes</span>
    </a>
    <button class="navbar-toggler mx-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto text-center">
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/Tienda-online">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/Tienda-online/Views/tienda">Tienda</a>
            </li>
            <li class="nav-item  dropdown">
                <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Opciones de cliente
                </a>
                <div class=" reducir dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="../Views/iniciarSesion"><i class="bi bi-box-arrow-in-right"></i> Iniciar sesión</a>
                    <a class="dropdown-item" href="../Views/registrarUsuario"><i class="bi bi-person-add"></i> Registrarse</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<div class="d-flex justify-content-center">
    <div class="titulo my-4 text-center">
        Registrar usuario
    </div>
</div>
<form class="formulario container my-2" method="POST" action="../Models/registrarUsuario">
    <div class="divPrincipal">
        <div class="mb-3">
            <label class="form-label">Nombre de usuario </label>
            <input autofocus name="usuario" required class="form-control" type="text" placeholder="Escribe aquí...">
        </div>
        <div>
            <label class="form-label">Correo electrónico</label>
            <input required name="correo" class="form-control" type="email" placeholder="Correo electrónico...">


        </div>
        <div class="data_client mb-3 d-flex flex-column justify-content-center">
            <label class="form-label">Contraseña
                <input required name="clave" class="valorContraseña1 form-control" id="name" type="password" placeholder="Escribe aquí...">

            </label>

            <label class="form-label">Confirmar contraseña
                <input required class="nuevaContra form-control" type="password" placeholder="Escribe aquí...">
            </label>
        </div>
        <div class="text-center">
            <a>
                <input type="submit" class="botonSubmit btn btn-primary" value="Registrarse">
                </input>
            </a>
            <p class="form-text my-3" id="allGood"></p>
        </div>
    </div>
</form>
<footer class="seccion-oscura d-flex flex-column align-items-center justify-content-center">
    <img class="footer-icono" src="http://localhost/Tienda-online/public/img/logotipo.jpeg" alt="Logo de la página web">
    <p class="footer-texto text-center">GREEN CLOTHES
    </p>
    <div class="iconos-redes-sociales d-flex flex-wrap align-items-center justify-content-center">
        <a href="#" target="_blank" rel="noopener noreferrer"><i class="bi bi-instagram"></i></a>
        <a href="#" target="_blank" rel="noopener noreferrer"><i class="bi bi-twitter-x"></i></a>
        <a href="#" target="_blank" rel="noopener noreferrer"><i class="bi bi-github"></i></a>
        <a href="#" target="_blank" rel="noopener noreferrer"><i class="bi bi-linkedin"></i></a>
    </div>
    <div class="derechos-autor">Creado por Sandro Suárez Aranda (2023) &#169</div>
</footer>
<script>
    let formulario = document.querySelector(".formulario");
    formulario.addEventListener("submit", async function(event) {
        event.preventDefault();

        let valorContraseña = document.querySelector(".nuevaContra").value;
        let valorContraseña1 = document.querySelector(".valorContraseña1").value;
        let falloContraseña = document.querySelector("#allGood");
        valorContraseña !== valorContraseña1 ? validarContraseña() : sendDatatoPhp();


        function validarContraseña() {


            falloContraseña.innerHTML = 'Las contraseñas no coinciden'


            setTimeout(() => {
                document.querySelector("#allGood").innerHTML = ""
            }, 4000);
        }

        function sendDatatoPhp() {
            let dataForm = new FormData(formulario);

            let init = {
                method: formulario.method,
                body: dataForm
            };

            fetch(formulario.action, init)
                .then(function(response) {
                    if (!response.ok) {
                        throw new Error("Error en la solicitud. Código HTTP: " + response.status);
                    } else {
                        falloContraseña.innerHTML = 'Se ha registrado correctamente';
                        setTimeout(() => {
                            window.location.href = '../Views/iniciarSesion'
                        }, 4000);
                    }

                });


        }



    });
</script>
<?php require_once APP . '/views/inc/footer.php' ?>