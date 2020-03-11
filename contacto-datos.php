<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

if (
    !empty($_POST['nombre']) &&
    !empty($_POST['email'])
) {

    //Configuración
    $destino = "ceci.albero@gmail.com";
    //

    $nombre   = $_POST['nombre'];
    $email    = $_POST['email'];
    $consulta = !empty($_POST['consulta']) ? $_POST['consulta'] : false;

    require 'lib/PHPMailer.php';
    require 'lib/SMTP.php';
    require 'lib/Exception.php';

    $mail = new PHPMailer(true); // Passing `true` enables exceptions
    try {

        $mensaje = "\nNombre: " . $nombre;
        $mensaje .= "\nE-mail: " . $email;
        $mensaje .= "\nConsulta: " . $consulta;
        $asunto = "Mensaje enviado por sitio DG Service: " . $nombre;

        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'c0270268.ferozo.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'no-reply@c0270268.ferozo.com';
        $mail->Password   = '5IDcXF6K8e';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer'       => false,
                'verify_peer_name'  => false,
                'allow_self_signed' => true,
            ),
        );

        //Recipients
        $mail->setFrom('no-reply@c0270268.ferozo.com', $nombre);
        $mail->addAddress($destino);

        //Content
        $mail->isHTML(false);
        $mail->Subject = $asunto;
        $mail->Body    = $mensaje;
        // $mail->AltBody = $mensaje;

        $mail->send();
        echo 1;
    } catch (Exception $e) {
    	echo 0;
        error_log('Message could not be sent. Mailer Error: ', $mail->ErrorInfo);
    }
} else {
	echo -1;
}
