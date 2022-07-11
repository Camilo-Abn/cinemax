<?php
$id = $_POST['id'];
$email = $_POST['email'];

$cnx = mysqli_connect("localhost", "root", "", "cine");
$sql = "UPDATE users set email='$email' where id like $id";
$rta = mysqli_query($cnx,$sql);
if (!$rta){
    header("Location: ../editar_empleado.php");
} else{
    header("Location: ../empleados.php");
}
?>