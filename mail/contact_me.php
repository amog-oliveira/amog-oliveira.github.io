<?php
// Check for empty fields
if(empty($_POST['name']) || empty($_POST['email']) || /*<empty($_POST['phone']) ||*/ empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
//$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = "amandam.oliveirag@gmail.com"; // Add your email address inbetween the "" replacing yourname@yourdomain.com - This is where the form will send a message to.
$subject = "Formulário de Contato Website:  $name";
$body = "Você recebeu uma nova mensagem do formulário de contato do seu website.\n\n"."Aqui estão os detalhes:\n\nComo eu posso te chamar?: $name\n\nQual o seu melhor email?: $email\n\nComo eu posso colaborar com o seu projeto?:\n$message";
$header = "De: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$header .= "Responder a: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
