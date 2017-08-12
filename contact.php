<?php

if(isset($_POST['email'])) {

    $email_destino = "engenharia@lacerdasouza.com.br";
 
    $assunto = "Contato Site";

 
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
  
    //$email_destino = 'Web e Ponto <contato@webeponto.com.br>';
    $message  = utf8_decode( '
        <!doctype html>
<html>
<head>
<meta charset="utf-8" />
</head>
<body>
  Mensagem Automática enviada no dia '.$data_envio.' às '.$hora_envio.'!<br><br>
              <table id="email" width="50%" border="1">
                <tr>
                    <td>
                        Nome: '.$name.'
                    </td>
                </tr>
                <tr>
                    <td>
                        Email: '.$email.'
                    </td>
                </tr>
                <tr>
                    <td>
                        Assunto: '.$assunto.'
                    </td>
                </tr>
                <tr>
                    <td>
                        Mensagem: '.$message.'
                    </td>
                </tr>
            </table>      
                
  </body>
</html>
        ');
        //remetente
        $emailsender = 'engenharia@lacerdasouza.com.br';
        
    /* Verifica qual é o sistema operacional do servidor para ajustar o cabeçalho de forma correta. Não alterar */
        if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
        elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
        else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
        
        /* Montando o cabeçalho da mensagem */
        $headers = "MIME-Version: 1.1".$quebra_linha.
        "Content-type: text/html; charset=iso-8859-1".$quebra_linha .
        "From: ".$emailsender.$quebra_linha.
        "Reply-To: ".$emailsender.$quebra_linha;
        // Note que o e-mail do remetente será usado no campo Reply-To (Responder Para)
        
        /* Enviando a mensagem */
        //Verificando qual é o MTA que está instalado no servidor e efetuamos o ajuste colocando o paramentro -r caso seja Postfix
        if(!mail($email_destino, '[Contato] - '.$nome, $message, $headers ,"-r".$emailsender)){ // Se for Postfix
            $headers .= "Return-Path: " . $emailsender . $quebra_linha; // Se "não for Postfix"
        mail($email_destino, $assunto, $menssage, $headers);
        //$str_msg = 'Sua mensagem foi enviada com sucesso!'; 
        //echo $str_msg;
        }
}
?>