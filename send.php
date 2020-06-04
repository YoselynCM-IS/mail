<?php
/***librerias phpmailer**/
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* Exception class. */
require 'PHPMailer/src/Exception.php';

/* The main PHPMailer class. */
require 'PHPMailer/src/PHPMailer.php';

/* SMTP class, needed if you want to use SMTP. */
require 'PHPMailer/src/SMTP.php';
/**********/

$imagen = $_POST["imagen"];
$ea1_regGP = $_POST["ea1_regGP"];
$ea1_regCA = $_POST["ea1_regCA"];
$ea1_regND = $_POST["ea1_regND"];
$ea1_regCD = $_POST["ea1_regCD"];
$ea1_regNA = $_POST["ea1_regNA"];
/*
echo $imagen;
echo "<br>";
echo $ea1_regGP;
echo "<br>";
echo $ea1_regCA;
echo "<br>";
echo $ea1_regND;
echo "<br>";
echo $ea1_regCD;
echo "<br>";
echo $ea1_regNA;
echo "<br>";
//die("fin");
**/
$imagen = preg_replace('#^data:image/[^;]+;base64,#', '', $imagen); 



$mensaje = '<b>English Aware 1</b><br><b>Student name: </b>'.$ea1_regNA.'<br><b>Group: </b> '.$ea1_regGP.'<br><b>Teacher: </b>'.$ea1_regND;

$para = "jabocho@gmail.com";
$para2 = "jabocho@gmail.com";
$asunto = 'English Aware 1: Activity';				
//Create a new PHPMailer instance
$mail = new PHPMailer();
$mail->IsSMTP();
//Agregar la imagen
$decode = base64_decode($imagen);
$mail->addStringAttachment($decode, "Activity.png", "base64", "image/png");
$mensaje .= '<br><img src="https://majesticeducacion.com.mx/nuevo/wp-content/uploads/2018/08/logo-header-majesticeducacion.png">';
 
//Configuracion servidor mail

$mail->From = "test@lgruiz.com"; //remitente
$mail->FromName = "Majestic Education";//nombre remitente
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl'; //seguridad
$mail->Host = "servidor1313.il.controladordns.com"; // servidor smtp
$mail->Port = 465; //puerto
$mail->Username ='test@lgruiz.com'; //nombre usuario
$mail->Password = 'u1Y2dp0[WIP~'; //contraseña



 
//Agregar destinatario
$mail->AddAddress($para);
$mail->AddAddress($para2);
$mail->Subject = $asunto;
$mail->IsHTML(true);
$mail->Body = $mensaje;


 
//Avisar si fue enviado o no y dirigir al index
if ($mail->Send()) {
    echo'<script type="text/javascript">
           alert("Sent correctly");
		   window.history.back();
        </script>';
} else {
	echo $mail->ErrorInfo;
    echo'<script type="text/javascript">
           alert("Not sent, try again");
        </script>';
}
?>