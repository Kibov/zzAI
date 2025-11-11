<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Kalkulator Kredytów</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>

<div class="pure-g" style="margin: 2em auto; max-width: 400px;">
	<div class="pure-u-1" style="text-align: right; margin-bottom: 1em;">
		<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
	</div>

	<div class="pure-u-1">
		<form action="<?php print(_APP_ROOT); ?>/app/calc.php" method="post" class="pure-form pure-form-stacked">
			<legend><h2>Kalkulator kredytów</h2></legend>
			<fieldset>
				<label for="id_x">Kwota:</label>
				<input id="id_x" type="text" name="x" value="<?php out($x) ?>" class="pure-input-1" />
				<label for="id_years">Lata:</label>
				<input id="id_years" type="text" name="years" value="<?php out($years) ?>" class="pure-input-1" />
				<label for="id_y">Oprocentowanie:</label>
				<input id="id_y" type="text" name="y" value="<?php out($y) ?>" class="pure-input-1" />
			</fieldset>	
			<input type="submit" value="Oblicz" class="pure-button pure-button-primary pure-input-1" />
		</form>

		<?php if (isset($messages) && count($messages) > 0): ?>
		<div class="pure-u-1" style="margin-top: 1em;">
			<ol class="pure-menu-list" style="background: #f88; border-radius: 5px; padding: 10px 15px; color: #600;">
				<?php foreach ($messages as $msg): ?>
					<li class="pure-menu-item"><?= $msg ?></li>
				<?php endforeach; ?>
			</ol>
		</div>
		<?php endif; ?>

		<?php if (isset($result)): ?>
		<div class="pure-u-1" style="margin-top: 1em; padding: 15px; background: #ff0; border-radius: 5px; font-weight: bold; text-align: center;">
			Wynik: <?= $result ?>
		</div>
		<?php endif; ?>
	</div>
</div>

</body>
</html>
