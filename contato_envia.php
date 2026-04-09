<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'inc/Exception.php';
require 'inc/PHPMailer.php';
require 'inc/SMTP.php';

include_once 'inc/inc.config.php';

$varname        = htmlspecialchars($_POST["name"]);
$varemail       = htmlspecialchars($_POST["email"]);
$vartel         = htmlspecialchars($_POST["phone"]);
$varsubject     = htmlspecialchars($_POST["subject"]);
$varmessage     = htmlspecialchars($_POST["message"]);
if (isset($_POST["zoiao"])) {
    $varzoiao       = htmlspecialchars($_POST["zoiao"]);
} else {
    $varzoiao = "";
}


if ($varzoiao != "") {
    # code...
    echo '<img src="https://www.bloominprojetos.com.br/roberto/you_shall_not_pass.jpg" style=" display:block; margin:0 auto; " alt="you shall not pass!!!" title="you shall not pass!!!">';
    die();
}
if (preg_match_all("/http/i", implode($_POST), $out) > 0) {
    $spam = true;
}
if (!empty($spam)) {
    echo ("<script>alert('Desculpe, mas esta mensagem parece ser SPAM! \\nFavor não inserir links!');</script>");
    echo ("<script>window.location = 'fale-conosco/'</script>");
    die();
}

/*
if (isset($_POST['g-recaptcha-response'])) {
    $captcha_data = $_POST['g-recaptcha-response'];
}
if (!$captcha_data) {
    echo ("<script>alert('Por favor, confirme o reCAPTCHA.');</script>");
    echo ("<script>window.location = 'fale-conosco/'</script>");    
    exit;
}
$resposta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".CONF_RECAPTCHA_SECRET."&response=".$captcha_data."&remoteip=".$_SERVER['REMOTE_ADDR']);
if ($resposta.success) {
*/


$mail = new PHPMailer();
$mail->IsSMTP(); // Define que a mensagem será SMTP
//$mailer->SMTPDebug = 2; // Você pode habilitar esta opção caso tenha problemas. Assim pode identificar mensagens de erro.
//$mail->SMTPSecure = 'tls'; //tipo de autenticação do SMTP
$mail->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true)); // Configurações de compatibilidade para autenticação em TLS 
$mail->Host = CONF_MAIL_HOST; // Endereço do servidor SMTP    
$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
$mail->Username = CONF_MAIL_USER; // Usuário do servidor SMTP
$mail->Port = CONF_MAIL_PORT;
$mail->Password = CONF_MAIL_PASS; // Senha do servidor SMTP
$mail->From = CONF_MAIL_USER; // Seu e-mail
$mail->FromName = $varname; // Nome do solicitante
$mail->AddReplyTo($varemail); // Responde para o e-mail do solicitante

if (DEBUG_EMAIL == true) {
    $mail->AddAddress(CONF_MAIL_TESTER);
} else {
    $mail->AddAddress(CONF_MAIL_SENDER);
}

//$mail->AddCC('teste@bloomin.com.br'); // Copia
$mail->AddBCC('formularios@bloomin.com.br', CONF_SITE_NAME); // Cópia Oculta

// //Anexo
// // Array com as extensões permitidas
// // Imagens comuns, Docs word, pdf
// $extensoes_permitidas = array('.jpg', '.jpeg', '.gif', '.png', '.bmp', '.webp', '.eps',  '.tif', '.tiff', '.raw', '.cr2', '.nef', '.orf', '.sr2', '.doc', '.dot', '.docx', '.dotx', '.docm', '.dotm', '.pdf');

// // Faz a verificação da extensão do arquivo enviado
// $formatodoarquivo = strrchr($_FILES['arquivo1']['name'], '.');

// // Faz a validação do arquivo enviado
// if (in_array($formatodoarquivo, $extensoes_permitidas) === true) {
//     $path1 = $_FILES['arquivo1']['tmp_name'];

//     if (!empty($_FILES['arquivo1']['name'])) {
//         // $mail->AddAttachment($path1, $_FILES['arquivo1']['name']);
//         $mail->AddAttachment($path1, '=?UTF-8?B?' . base64_encode($_FILES['arquivo1']['name']) . '?='); // Com caracteres especiais
//     }
// } else {
//     echo ("<script>alert('Extensão de arquivo não permitida! Envie uma arquivo válido');</script>");
//     echo ("<script>window.location = 'fale-conosco/'</script>");
// }


// Define os dados técnicos da Mensagem
$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
$mail->CharSet = 'UTF-8'; // Charset da mensagem (opcional)

$mail->Subject  = '=?UTF-8?B?' . base64_encode($varsubject . " - " . CONF_SITE_NAME) . '?=';
$mail->Body = "<strong>Nome: </strong>" . $varname;
$mail->Body .= "<br><strong>E-mail: </strong>" . $varemail;
$mail->Body .= "<br><strong>Telefone: </strong>" . $vartel;
$mail->Body .= "<br><strong>Assunto: </strong>" . $varsubject;
$mail->Body .= "<br><strong>Mensagem: </strong>" . $varmessage;


$mail->AltBody = "Este é o corpo da mensagem de teste, em Texto Plano! \r\n";
//$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo
// Envia o e-mail
$enviado = $mail->Send();
// Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();

// Exibe uma mensagem de resultados
if ($enviado) {
    echo ("<script>alert('Mensagem Enviada!');</script>");
    echo ("<script>window.location = 'obrigado'</script>");
} else {
    echo "Não foi possível enviar o e-mail.<br /><br />";

    echo "<b>Informações do erro:</b> <br />" . $mail->ErrorInfo;
}

//}

?>