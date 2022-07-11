<?php
include_once('../database.php');
$message = '';
session_start();
switch($_REQUEST["op"]){
    case 'agregarEmpleado':
        if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password2'])) {
            $sql = "INSERT INTO users (email, password) VALUES (:email,:password)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $_POST['email']);
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $stmt->bindParam(':password', $password);
            if ($stmt->execute()) {
                $message = 'El empleado ha sido creado satisfactoriamente.';
                echo 1;
            } else {
                $message = 'Ha ocurrido un error, verifique bien los datos ingresados.';
                echo 0;
            }
        }
        break;
    case 'login':
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                if (password_verify($_POST['password'], $user['password'])) {
                    $_SESSION['user'] = $user;
                    echo 1;
                } else {
                    $message = 'La contraseña es incorrecta.';
                    echo 0;
                }
            } else {
                $message = 'El usuario no existe.';
                echo 0;
            }
        }
        break;
    case 'eliminarEmpleado':
        if (!empty($_POST['id'])) {
            $sql = "DELETE FROM users WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $_POST['id']);
            if ($stmt->execute()) {
                $message = 'El empleado ha sido eliminado satisfactoriamente.';
                echo 1;
            } else {
                $message = 'Ha ocurrido un error, verifique bien los datos ingresados.';
                echo 0;
            }
        }
        break;
    }
?>