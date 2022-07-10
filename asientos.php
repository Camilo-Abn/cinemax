<?php
$id = $_GET['id'];

$mysqli = mysqli_connect("localhost", "root", "", "cine") or die($mysqli->connect_error);
$sql = "SELECT * FROM peliculas WHERE id = $id";
$result = mysqli_query($mysqli, $sql);
$pelicula = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($mysqli);

$titulo = $pelicula[0]['titulo'];
$portada = $pelicula[0]['portada'];
$fecha = $pelicula[0]['fechas'];
$precio = $pelicula[0]['precio'];
$asientos = explode(",", $pelicula[0]['asientos']);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/asientos.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/libs/qrcode.js"></script>
    <script type="text/javascript" src="asientos.js"></script>
  </head>
<body>
    <div class="container">
        <section class="content">
            <div class="row">
                <!-- INFO PELICULA -->
                <div class="col-md-4">
                    <div class="grid support">
                        <div class="grid-body">
                            <h2 class="cut-text"><?php echo $titulo; ?></h2>
                            <hr>
                            <img src="<?php echo $portada; ?>">
                            <hr>
                            <p><strong>FECHA Y HORA</strong></p>
                            <ul class="support-label">
                                <li><?php echo $fecha; ?></li>
                            </ul>
                            <hr>
                            <p><strong>PRECIO POR ASIENTO</strong></p>
                            <ul class="support-label">
                                <li><?php echo $precio; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- END INFO PELICULA -->
                <!-- ASIENTOS -->
                <div class="col-md-7">
                    <div class="grid support-content">
                        <div class="grid-body">
                            <h2>Escoja sus butacas</h2>
                            
                            <hr>                        
                            <div class="row">
                                <div class="seccion-asientos">      
                                    <div id=sala class="sala">
                                        <div class="screen">
                                            <p class="center white" >PANTALLA</p>
                                        </div>
                                        <?php
                                        $contador = 0;
                                        $columnas = array(1,2,3,4,5,6,7,8,9,10,11);
                                        $filas = array("A", "B", "C", "D", "E","F");
                                        foreach ($filas as $fila){
                                            echo '<div id="fila-'.$fila.'" class="fila">';
                                            foreach($columnas as $columna){
                                                if ($asientos[$contador] == 1)
                                                    echo '<div id="'.$fila.$columna.'" class="asiento ocupado"></div>';
                                                else echo '<div id="'.$fila.$columna.'" class="asiento"></div>';
                                                $contador ++;
                                            }
                                            echo '</div>';
                                        }?>
                                    </div>
                                    <div>
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
                                </div>
                            </div>
                        </div>
                        <form id="comprar">
                            <button onclick="window.location.href = 'index.php'" type="button" class="btn btn-lg btn-secondary">Cancelar</button>
                            <input type="hidden" id="idPelicula" value="<?php echo $id; ?>">
                            <input type="hidden" id="precioPelicula" value="<?php echo $precio; ?>">
                            <button id="btnComprar" type="submit" class="btn btn-lg btn-primary" disabled>Comprar</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>