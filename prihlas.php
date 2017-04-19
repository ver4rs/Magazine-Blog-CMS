<?php

require 'db.php';

if (isset($_SESSION['user_id'])) {
	header('Location: /');
	exit();
}

require 'stranka/hlava.php';
require 'stranka/vrch.php';
require 'stranka/telo1.php';




?>
<div class="form">
	<h3 id="formtitul">Prihlásenie</h3>
	<p id="formtext">Ešte tu niesi, vyskúšaj bezplatnú <a href="register.php">registráciu</a>.</p>
	<p id="formerror">
	<?php
		if (isset($_GET['error'])) {
			echo $_GET['error'];
		}
	?>
	</p>
	<form action="../admin/ludia/ludiaForm.php" method="post">

			<p>
				<label for="prihlasmeno">E-mail:</label>
				<input type="text" name="logmeno" placeholder="Email" id="logmeno">
			</p>
			<p>
				<label for="prihlasheslo">Heslo:</label>
				<input type="password" name="logheslo" placeholder="*****" id="logheslo">
			</p>
			<p>

				<input type="submit" name="odosli" value="Prihlásiť" id="prihlasit">
			</p>

	</form>


	<p id="formspod"><a href="#">Zabudli ste heslo</a></p>
</div>

<?php

require 'stranka/telo2.php';
# spod stranky
require 'stranka/spod.php';
?>
