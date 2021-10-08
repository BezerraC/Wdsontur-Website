<?php 


$name = utf8_encode($_POST['name']);
$partida = utf8_encode($_POST['partida']);
$phone = utf8_encode($_POST['phone']);
$chegada = utf8_encode($_POST['chegada']);
$email = utf8_encode($_POST['email']);
$adultos = utf8_encode($_POST['adultos']);
$kids = utf8_encode($_POST['kids']);
$message = utf8_encode($_POST['message']);


require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();

//Configuracoes do servidor de email

$mail->Host = "cpl03.main-hosting.eu";
$mail->Port = "465";
$mail->SMTPSecure = "ssl";
$mail->SMTPAuth = "true";
$mail->Username = "admin@wdsontur.com.br";
$mail->Password = "wdsonturAL3421";

//configuracao da mensagem

$mail->setFrom($mail->Username, "Wdstuor"); // Remetente
$mail->addAddress('wdsonturAL@gmail.com'); // Destinatario
$mail->Subject = "Agendamento Transfer"; // Assunto e-mail

$conteudo_email = "
Você recebeu uma mensagem de: $name E-mail: $email Telefone: $phone
<br><br>
Dia e hora de partida: $partida  <br><br>
Dia e hora de chegada: $chegada <br><br>
Quantidade de adultos: $adultos <br><br>
Quantidade de crianças: $kids <br><br>
Mensagem: <br>
$message
";

$mail->IsHTML(true);
$mail->Body = $conteudo_email;

if ($mail->send()){
  echo "E-mail enviado com sucesso!";
}else {
  echo "Falha ao enviar o e-mail" . $mail->ErrorInfo;
}