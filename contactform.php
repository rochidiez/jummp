<?php

$pack = $_REQUEST;
extract($pack);

// if(!$siteid) die("Falta identificación del sitio (siteid)");
// if(!$recipient) die("Falta destinatario (recipient)");
// if(!$redirect) die("Falta redireccionamiento (redirect)");

foreach($pack as $name => $value){
	$msg[] = $name . " : " . utf8_decode($value);
}

$to      = $recipient;
$subject = 'Contacto desde (' . $siteid . ')';
$message = implode("\n",$msg);
$headers = 'From: noreply@jummp.fit' . "\r\n" .
    'Reply-To: agus@jummp.fit' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

echo "<p>Redirigiendo a {$redirect}</p>
<script>
	setTimeout(function(){
		location.href = '$redirect';
	},100)
</script>";
