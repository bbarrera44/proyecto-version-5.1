<?php 
	require("phpmailer/class.phpmailer.php");
	require("phpmailer/class.smtp.php");
$mail = new PHPMailer();

$mail->IsSMTP();
$mail->Host = "smtp.gmail.com"; 
$mail->SMTPAuth = true;
$mail->Port = 465; 

$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Username = "sebasena995@gmail.com"; 
$mail->Password = "yAm3Ay1v"; 
$mail->setFrom = "sebasena995@gmail.com"; 
$mail->FromName = "Administrador"; 
$mail->AddAddress($_POST['correo']);  
$mail->IsHTML(true);  
$mail->Subject = "Recuperacion de correo"; 
$body = "Recuperacion de contraseña";
$body = "Su contraseña es ".$reg['contrasena']; 
$mail->Body = $body; 
if($mail->Send()){
setcookie("correoo","<script>alert('El correo fue enviado');</script>",time()+(60*60),"/");
 header("location: ../vistas/recuperarcontrasena.php");}
else{ 
setcookie("correoo","<script>alert('Hubo un problema al enviar al correo');</script>",time()+(60*60),"/");
 header("location: ../vistas/recuperarcontrasena.php");
echo $mail->ErrorInfo;
}
?>