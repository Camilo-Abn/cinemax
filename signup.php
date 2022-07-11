<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Cinemax</title>
    <link rel="stylesheet" href="css/registro.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
<center>
    <center>
        <button onclick="window.location.href = 'gestor.php'" class='salir' style="float: left; width:auto;">SALIR</button>
        <button onclick="window.location.href = 'empleados.php'" class='salir' style="float: right; width:auto;">EMPLEADOS</button>
        <center>
            <main>
                <h1 style="margin-bottom: 40px">Registre un Empleado</h1>
                <form action="" class="formulario" id="formulario" method="POST">

                    <!-- GRUPO EMAIL -->
                    <div class="formulario__grupo" id="grupo__email">
                        <label class="formulario__label">Correo Electrónico</label>
                        <div class="formulario__grupo-input">
                            <input type="email" class="formulario__input" name="email" id="email" placeholder="correo@ejemplo.com" required>
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">El correo solo puede contener letras, números, puntos, guiones y guión bajo.</p>
                    </div>

                    <!-- GRUPO PASSWORD -->
                    <div class="formulario__grupo" id="grupo__password">
                        <label class="formulario__label">Contraseña</label>
                        <div class="formulario__grupo-input">
                            <input type="password" class="formulario__input" name="password" id="password" placeholder="Contraseña" required>
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">La contraseña debe tener de 4 a 12 carácteres.</p>
                    </div>

                    <!-- GRUPO PASSWORD2 -->
                    <div class="formulario__grupo" id="grupo__password2">
                        <label class="formulario__label">Confirme Contraseña</label>
                        <div class="formulario__grupo-input">
                            <input type="password" class="formulario__input" name="password2" id="password2" placeholder="Confirme la contraseña" required>
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
                    </div>

                    <div class="formulario__grupo formulario__grupo-btn-enviar">
                        <button type="submit" value="Submit" class="formulario__btn" id="enviar">Registrar</button>
                    </div>
                </form>
            </main>
            <script src="js/formulario.js"></script>
            <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="js/sweetalert.js"></script>

        </center>
</body>

</html>