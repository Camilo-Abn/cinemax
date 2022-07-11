<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/registro.css">
    <title>Editar Empleado</title>
</head>

<body>
    <button onclick="window.location.href = 'empleados.php'" class='salir' style="float: left; width:auto;">SALIR</button>
    <center>
        <h1 class='margen'> Editando Empleado</h1>
    </center>
    <?php
    $id = $_GET['id'];
    $email = $_GET['email'];
    ?>
    <center>
        <main>
            <form action="js/update_empleado.php" class="formulario" method="POST">
                <table>
                    <div class="formulario__grupo" id="grupo__email">
                        <tr>
                            <label class="formulario__label">Correo Electrónico</label>
                            <div class="formulario__grupo-input">
                                <input class="formulario__input" type="email" name="email" id="email" value="<?= $email ?>">
                            </div>
                        </tr>
                        <tr>
                            <label class="formulario__label">ID: <?= $id ?></label>
                        </tr>
                    </div>
                    <tr>
                        <div class="formulario__grupo formulario__grupo-btn-enviar">
                            <button class="formulario__btn" type="submit" value="Submit">Editar Empleado</button>
                        </div>
                    </tr>
                </table>

            </form>

        </main>
    </center>
</body>

</html>