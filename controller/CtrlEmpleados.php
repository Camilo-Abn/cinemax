<?php
include_once('../database.php');
$message = '';
session_start();

switch($_REQUEST["op"]){
    case 'agregarEmpleado':
        if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password2'])) {
            $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
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
        if (isset($_SESSION['user_id'])) {
            if (!empty($_POST['email']) && !empty($_POST['password'])) {
                $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
                $records->bindParam(':email', $_POST['email']);
                $records->execute();
                $results = $records->fetch(PDO::FETCH_ASSOC);
        
                if($results){
                    if (password_verify($_POST['password'], $results['password'])) {
                        $_SESSION['user_id'] = $results['id'];
                        echo 1;
                    } else {
                        echo 0;
                    }
                }
            }
        }
    }
?>