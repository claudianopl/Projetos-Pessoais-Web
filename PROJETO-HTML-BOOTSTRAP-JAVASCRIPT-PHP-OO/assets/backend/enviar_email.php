<?php
  // inciando sessão
  session_start();
  // importando a configuração do email
  require_once "configurar_email.php";
  // importando a biblioteca
  require "../biblioteca/PHPMailer/Exception.php";
	require "../biblioteca/PHPMailer/OAuth.php";
	require "../biblioteca/PHPMailer/PHPMailer.php";
	require "../biblioteca/PHPMailer/POP3.php";
	require "../biblioteca/PHPMailer/SMTP.php";
	// Importando as classes
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

  // usando PHPMailer 
  $mail = new PHPMailer(true);

try {
  //Configurações do servidor
  $mail->SMTPDebug = false; // Ativar saída de depuração detalhada
  $mail->isSMTP(); // Enviar usando SMTP
  $mail->Host = 'smtp.gmail.com'; // Definir o servidor SMTP para enviar
  $mail->SMTPAuth   = true; // Ativar autenticação SMTP
  $mail->Username   = 'emailParaReceberOSuporte@email.com'; // Nome de usuário SMTP
  $mail->Password   = 'Senha'; // Senha de usuário SMTP
  $mail->SMTPSecure = 'tls ';// Ativar criptografia TLS
  $mail->Port       = 587; // Porta TCP à qual se conectar

  //Destinatários
  $mail->setFrom('emailParaReceberOSuporte@email.com', $assunto_usuario);
  $mail->addAddress('emailParaReceberOSuporte@email.com'); // Adicionando destinatário
  $mail->addReplyTo("$email_usuario", "Res: $assunto_usuario"); // Repondendo ao email do cliente
  // Anexos
  //$mail->addAttachment('/var/tmp/file.tar.gz'); // Adicionar Anexos
  //$mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Nome opcional
  // Conteúdo
  $mail->isHTML(true);  // Definir formato de email para HTML
  $mail->Subject = $assunto_usuario;  // Assunto da mensagem
  $mail->Body = $corpo; // Corpo da mensagem
  $mail->send();
  // Enviando sucesso para sessão
  $_SESSION['codigo_status'] = 1;
  $_SESSION['mensagem'] = 'Email enviado com sucesso, aguarde que já retornaremos a sua mensagem.';
  header('Location: ../../mensagem.php');
  // Enviando error para sessão
} catch (Exception $e) {
  $_SESSION['codigo_status'] = 2;
  $_SESSION['mensagem'] = "Um error inesperado aconteceu, tente novamente mais tarde. <br>";
  $_SESSION['mensagem'] .= "Detalhe: {$mail->ErrorInfo}";
  header('Location: ../../mensagem.php');
}
?>
