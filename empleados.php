<?php
    include_once('database.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/registro.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Empleados</title>
</head>
<body>
    <button onclick="window.location.href = 'gestor.php'" class='salir' style="float: left; width:auto;">SALIR</button>
    <center>
        <h1 class='margen'> LISTADO DE EMPLEADOS</h1>
    </center>
    <div class="container right d-flex justify-content-center">
        <div class="row">
            <div class="">
                <div class="table-responsive">
                    <table id="tabla" class="table table-striped table-bordered" style="width:100%">
                    <thread>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thread>
                    <tbody>
                        <?php
                        $cnx = mysqli_connect("localhost", "root", "", "cine");
                        $sql = "SELECT id, email FROM users order by id desc";
                        $rta = mysqli_query($cnx,$sql);
                        while($mostrar = mysqli_fetch_row($rta)) {
                        ?>
                        <tr>
                           <td><?php echo $mostrar['0']?></td>
                           <td><?php echo $mostrar['1']?></td>
                           
                           <th><a href="editar_empleado.php?id=<?php echo $mostrar['0'] ?>"class="btn btn-info">Editar </a>
                           <a href="eliminar_empleado.php?id=<?php echo $mostrar['1'] ?>"class="btn btn-danger">Eliminar </a></th>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</table>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</body>
</html>