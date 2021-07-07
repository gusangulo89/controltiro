<?php
include "phpmailer/class.phpmailer.php";
include "phpmailer/class.smtp.php";
    
   
    $nombre  = $_POST['nombre'];
    $correo  = $_POST['email'];
    $mensaje = $_POST['message'];

    $email_user = "adriangustavo602@gmail.com";
    $email_password = '$gustavo1989$';
    $the_subject = "mail no.reply SISAN";
    $address_to = "gusangulomele89@gmail.com";
    $from_name = "Gustavo Angulo";
    $phpmailer = new PHPMailer();
    try{
        //---------- datos de la cuenta de Gmail -------------------------------
        $phpmailer->Username = $email_user;
        $phpmailer->Password = $email_password;
        //-----------------------------------------------------------------------
        // $phpmailer->SMTPDebug = 1;
        $phpmailer->SMTPSecure = 'tsl';
        $phpmailer->Host = "smtp.gmail.com"; // GMail
        $phpmailer->Port = 587;
        $phpmailer->IsSMTP(); // use SMTP
        $phpmailer->SMTPAuth = true;

        $phpmailer->setFrom($phpmailer->Username,$from_name);
        $phpmailer->AddAddress($address_to); // recipients email

        $phpmailer->Subject = $the_subject;
        $phpmailer->Body .= "<h1 style='color:#3498db;'>Mensaje de SISAN v. 3.0!</h1>";
        $phpmailer->Body .= "<h2 style='#191970;'>Mi nombre es: ". $nombre ."</h2>";
        $phpmailer->Body .= "<p>". $mensaje ."</p>";
        $phpmailer->Body .= "mi correo electronico es: " .$correo;
        $phpmailer->Body .= "<p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";
        $phpmailer->IsHTML(true);

        $phpmailer->Send();
        
        echo "<script> window.history.back(); </script>";
        echo "<script>
                    $('#graciasContacto').modal('show');
             </script>";
         
    }catch (Exception $e){
        
        echo "<script> alert('Error al enviar mensaje: ". $phpmailer->ErrorInfo ."');";
        
        //sentencia JavaScript para retornar a la p�gina anterior
        echo "<script> window.history.back(); </script>"; 
    }
    
?>