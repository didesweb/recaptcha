<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Didesweb, reCaptcha de Google</title>
<head>
<body>
	<?php
		require_once('recaptchalib.php');
		$publickey = "Tu_clave_publica";
		$privatekey = "Tu_clave_secreta";
		$resp = null;
		if ($_POST) {
			$resp = recaptcha_check_answer ($privatekey, 
			$_SERVER["REMOTE_ADDR"],
			$_POST["recaptcha_challenge_field"],
			$_POST["recaptcha_response_field"]);
			if ($resp->is_valid) {
				echo "CORRECTO";
			} else {
				echo "CAPTCHA INCORRECTO";
			} 
		} 
	?> 
	<form action="" method="post">
		<?php
			echo recaptcha_get_html($publickey);
		?> 
		<br>
		<input type="submit" value="Enviar">
	</form>
</body>
</html>
