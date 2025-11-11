<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Logowanie</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>

<div class="pure-g" style="margin: 2em auto; max-width: 320px;">
	<div class="pure-u-1" style="text-align: center; margin-bottom: 1em;">
		<form action="<?php print(_APP_ROOT); ?>/app/security/login.php" method="post" class="pure-form pure-form-stacked">
			<legend><h2>Logowanie</h2></legend>
			<fieldset>
				<label for="id_login">Login:</label>
				<input id="id_login" type="text" name="login" value="<?php out($form['login']); ?>" class="pure-input-1" />
				<label for="id_pass">Hasło:</label>
				<input id="id_pass" type="password" name="pass" class="pure-input-1" />
			</fieldset>
			<input type="submit" value="Zaloguj" class="pure-button pure-button-primary pure-input-1"/>
		</form>

		<?php if (isset($messages) && count($messages) > 0): ?>
			<ol class="pure-menu-list" style="background: #f88; border-radius: 5px; padding: 10px 15px; color: #600; margin-top: 1em;">
				<?php foreach ($messages as $msg): ?>
					<li class="pure-menu-item"><?= $msg ?></li>
				<?php endforeach; ?>
			</ol>
		<?php endif; ?>
	</div>
</div>

</body>
</html>
