<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'libs/PHPMailer/src/Exception.php';
require 'libs/PHPMailer/src/PHPMailer.php';
require 'libs/PHPMailer/src/SMTP.php';
require 'libs/phpqrcode/qrlib.php';

$tmp_dir = 'tmp/';

$mail = new PHPMailer(true);

try {
 
                  
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'cine.noreply@gmail.com';                    
    $mail->Password   = 'khqesduljcnkzztr';                             
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;                                    

  
    $mail->setFrom('cine.noreply@gmail.com', 'Cinemax');

    $mail->addAddress($_POST['correo']);        

    $nombre = $_POST['nombre'];
    $id = $_POST['id_compra'];
    $asientos = explode("-", $id)[1];
    $dir_to_qr = $tmp_dir.$id.'.png';
    QRcode::png($id, $dir_to_qr);
    
    $mail->isHTML(true);                                 
    $mail->Subject = 'Reserva de asientos';
    $mail->Body = "<h3>Hola, ".$nombre."</h3>"
                ."Has reservado los siguientes asientos: <b>".$asientos."</b>"
                ."<br><br><img src='cid:qr'><br><br>"
                ."Gracias por usar nuestro servicio";
    $mail->addEmbeddedImage($dir_to_qr, 'qr');
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>