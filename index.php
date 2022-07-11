<?php

$mysqli = mysqli_connect("localhost", "root", "", "cine") or die($mysqli->connect_error);
$sql = "SELECT * FROM peliculas";
$result = mysqli_query($mysqli, $sql);
$peliculas = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($mysqli);

session_start();
include_once('database.php');

?>

<!DOCTYPE html>
<html>
<!-- desde la línea 10 hasta la 28 incluirla en un archivo php-->
<head>
    <title>Cinemax</title>
    <link rel="stylesheet" href="css/cartelera.css">
    <script type="text/javascript" src="assets/libs/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="index.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="viewport" content="width=device-width,
        user-scalable=no, initial-scale=1.0, maximum-scale=1.0,
        minimum-scale=1.0">
</head>

<body>
    <?php if (!empty($message)) : ?>
        <p><?= $message ?></p>
    <?php endif; ?>

    <div>
        <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Soy empleado</button>

        <div id="id01" class="modal">

            <form class="modal-content animate" id="form_signin" method="post">

                <div class="container">
                    <label for="uname"><b>Usuario</b></label>
                    <input type="email" placeholder="correo@ejemplo.com" name="email" id='email' required>

                    <label for="psw"><b>Contraseña</b></label>
                    <input type="password" placeholder="*******" name="password" id='password' required>

                    <button type="submit">Entrar</button>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="container-all">

        <h1> Cartelera</h1>
        <div class="row">
            <?php foreach ($peliculas as $pelicula) { ?>
                <div class="Pelicula">
                    <div class="Portada">
                        <img src=<?php echo htmlspecialchars($pelicula['portada']); ?> alt="">
                    </div>
                    <div>
                        <h2 class="sub-title"><?php echo htmlspecialchars($pelicula['titulo']); ?></h2>
                        <div class="Titulo">
                            <p1>Titulo:</p1>
                            <p><?php echo htmlspecialchars($pelicula['titulo']); ?></p>
                        </div>
                        <div>
                            <p1>Director:</p1>
                            <p><?php echo htmlspecialchars($pelicula['director']); ?></p>
                        </div>
                        <div>
                            <p1>Reparto:</p1>
                            <p><?php echo htmlspecialchars($pelicula['reparto']); ?></p>
                        </div>
                        <div>
                            <p1>Sinopsis: </p1>
                            <p> <?php echo htmlspecialchars($pelicula['sinopsis']); ?></p>
                        </div>
                        <div>
                            <p1>Duracion:</p1>
                            <p><?php echo htmlspecialchars($pelicula['duracion']); ?> minutos</p>
                        </div>
                        <div class="Fechas">
                            <select id="dia hora">
                                <option value="<?php echo htmlspecialchars($pelicula['fechas']); ?>"><?php echo htmlspecialchars($pelicula['fechas']); ?></option>
                            </select>
                            <button id=<?php echo htmlspecialchars($pelicula['id']); ?> onClick=reservar(this.id) class="reservar_boton">Reservar</button>
                        </div>
                    </div>
                </div>
                <hr>
            <?php } ?>
</body>
</html>