<?php

$id = $_GET['id'];

$mysqli = mysqli_connect("localhost", "root", "", "cine") or die($mysqli->connect_error);
$sql = "SELECT * FROM peliculas WHERE id = $id";
$result = mysqli_query($mysqli, $sql);
$pelicula = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($mysqli);

$portada = $pelicula[0]['portada'];
$fecha = $pelicula[0]['fechas'];
$asientos = explode(",", $pelicula[0]['asientos']);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/asientos.css" />
    <script type="text/javascript" src="asientos.js"></script>
  </head>
  <body>

    <h1 class="titulo reservando">Reservando</h1>
    <table>
        <tr>
            <th>Pelicula</th>
            <th>Horario</th>
            <th>Asientos</th>
        </tr>
        <tr>
            <td><img src="<?php echo htmlspecialchars($portada);?>" alt=""></td>
            <td>
                <ul class="horarios">
                    <li>
                        <div class="hora escogida">
                        <small><?php echo htmlspecialchars($fecha);?></small></div>
                    </li>
                </ul>
            </td>
            <td>
            <div class="seccion-asientos">      
                <div class="sala">
                    <?php
                    $contador = 0;
                    $columnas = 11;
                    $filas = 6;
                    for($i = 0; $i < $filas; $i++){
                        echo '<div class="fila">';
                        for($j = 0; $j < $columnas; $j++){
                            if ($asientos[$contador] == 1)
                                echo '<div class="asiento ocupado"></div>';
                            else echo '<div class="asiento"></div>';
                            $contador ++;
                        }
                        echo '</div>';
                    }?>
                    
                </div>
                <ul class="leyenda">
                    <li>
                        <div class="asiento"></div>
                        <small>Sin seleccionar</small>
                    </li>
            
                    <li>
                        <div class="asiento seleccionado"></div>
                        <small>Seleccionado</small>
                    </li>
            
                    <li>
                        <div class="asiento ocupado"></div>
                        <small>Ocupado</small>
                    </li>
                </ul>
            </div>
            </td>
        </tr>
    </table>
    <div class="flex-parent jc-center">
        <button onClick=location.href='index.php' class="button-1 cancelar">Cancelar</button>
        <button type="submit" class="button-1">Pagar</button>
    </div>
  </body>
</html>