<?php

if(isset($_POST['email'])) {

    $email_to = "engenharia@lacerdasouza.com.br";
 
    $email_subject = "Contato Site";

 
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['message'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 
     
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
  
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Name: ".clean_string($name)."\n";
 
    $email_message .= "Email: ".clean_string($email)."\n";
 
    $email_message .= "Message: ".clean_string($message)."\n";

 
  // create email headers
   
  $headers = 'From: '.$email_to."\r\n".
   
  'Reply-To: '.$email_to."\r\n" .
   
  'X-Mailer: PHP/' . phpversion();
   
      /* Verifica qual é o sistema operacional do servidor para ajustar o cabeçalho de forma correta. Não alterar */
     if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
     elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
     else die("Este script não está preparado para funcionar com o sistema operacional de seu servidor");
     /* Montando o cabeçalho da mensagem */
     $headers = "MIME-Version: 1.1".$quebra_linha.
     "Content-type: text/html; charset=iso-8859-1".$quebra_linha .
     "From: ".$email_to.$quebra_linha.
     "Reply-To: ".$email_to.$quebra_linha;
     // Note que o e-mail do remetente será usado no campo Reply-To (Responder Para)

     /* Enviando a mensagem */
     mail($email_to, $email_subject, $email_message, $headers);
     $str_msg = 'Sua mensagem foi enviada com sucesso!';
     echo $str_msg;
 }
?>