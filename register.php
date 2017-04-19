<?php

require 'db.php';

if (isset($_SESSION['user_id'])) {
	header('Location: /');
	exit();
}



require 'stranka/hlava.php';
require 'stranka/vrch.php';
require 'stranka/telo1.php';

if (isset($_GET['akcia'])) {
	if ($_GET['akcia'] == 'dokonc') {
		?>
		<div id="akciaDokonc">
			<h3>Registrácia bola úspešne dokončená</h3>
			<p id="formtext">Boli ste úspešne zaregistrovaný na náš portál. Na Váš e-mail bola odoslaná správa s prihlasovacími údajmy na úschovu.</p>
	        <p id="formtext">Váš účet ešte nieje aktívny. <span style="color:red; ">Aktivujte si ho!</span> </p>
		</div>
		<?php
	}
	elseif ($_GET['akcia'] == 'aktivacia') {
		# AKTIVACIA

		# meno_url
		$meno_url = htmlentities($_GET['meno']);

		# user_id
		$user_id = htmlentities($_GET['uzivatel']);

		# heslo
		$heslo = htmlentities($_GET['heslo']);

		# cas date H:i:s
		$cas = htmlentities($_GET['cas']);
		$hodina = substr($cas, 0, -(strlen($cas) - strpos($cas, ':')));
		$minuta = substr($cas, strpos($cas, ':')+1, -(strlen($cas) - strrpos($cas, ':')));

		# email
		$email = htmlentities($_GET['email']);

		//echo $meno_url . ' - ' . $user_id . ' - ' . $heslo . '  -  ' . $cas . '  -  ' . $email;

		# NACITAME
		$nac = mysql_query('SELECT user_id, meno_url, password, user_cas, user_typ, email, user_typ
							FROM user
							WHERE user_id = "' . mysql_real_escape_string($user_id) . '" AND
								meno_url = "' . mysql_real_escape_string($meno_url) . '" AND
								password = "' . mysql_real_escape_string($heslo) . '" AND
								email = "' . mysql_real_escape_string($email) . '" AND
								EXTRACT(HOUR FROM user_cas)= "' . mysql_real_escape_string($hodina) . '" AND
								EXTRACT(MINUTE FROM user_cas)= "' . mysql_real_escape_string($minuta) . '"
							ORDER BY user_id DESC ');

		if (mysql_num_rows($nac) != '0') {
			# EXISTUJE
			$riadok = mysql_fetch_array($nac);

			$typ = 1;
			# ULOZIME ZMENIME TYP KONTA
			$zmen = mysql_query('UPDATE user SET user_typ = "' . mysql_real_escape_string($typ) . '"
									WHERE user_id = "' . mysql_real_escape_string($riadok['user_id']) . '" ');
			?>
			<div id="akciaDokonc">
				<h3>Práve ste úspešne aktivovali svoj účet</h3>
				<p id="formtext">Váš účet bol úspešne aktivovaný na našom portále. </p>
	        	<p id="formtext">Teraz sa môžete <a href="<?php echo urlAdresa; ?>prihlas.php">Prihlásiť</a></p>
			</div>
			<?php
		}
		else {
			# NEEXISTUJE
			?>
			<div id="akciaDokonc">
				<h3>Aktivácia účtu nevyšla.</h3>
				<p id="formtext">Účet nemáte aktivovaný, skúste to neskôr.</p>
			</div>
			<?php
		}
		mysql_free_result($nac);
	}
	else {
		?>
		<div id="akciaDokonc">
			<h3>Neviem o čo sa pokúšate.</h3>
			<p id="formtext">To čo hľadáte som nenašiel, ak máš pocit že niečo nefunguje tak napiš adminovi.</p>
		</div>
		<?php
	}
}
else {



?>
<div class="form">
	<h3>Registrácia</h3>
  <p id="formtext">Ďakujeme Vám.</p>
  <p id="formerror">
  <?php
if (isset($_GET['error'])) {
	echo $_GET['error'];
}
  ?>
  </p>
  <form action="admin/ludia/ludiaForm.php" method="post">
	<table>
	 	<tr>
      		<td><label for="prihlasemail">E-mail: </label></td>
		 	<td><input type="text" name="logemail" id="email" id="validate"  placeholder="Email"><span id="validEmail"></span></td>
      	</tr>
	  	<tr>
      		<td><label for="prihlasheslo">Heslo: </label></td>
	  		<td><input type="password" name="logheslo1" id="logheslo1"></td>
      	</tr>
	  	<tr>
      		<td><label for="prihlasheslo">Zopakuj heslo: </label></td>
	  		<td><input type="password" name="logheslo2" id="logheslo2"></td>
    	</tr>
	  	<tr>
      		<td><label for="prihlasmeno">Vaše meno: </label></td>
	  		<td><input type="text" name="logmeno" id="meno" placeholder="Vaše celé meno"></td>
    	</tr>
	  	<tr>
      		<td><label for="prihlaswebsite">Website :</label></td>
	  		<td><input type="text" name="logwebsite" id="logwebsite" placeholder="website"></td>
    	</tr>
    	<tr>
      		<td><label for="prihlaspohlavie">Pohlavie: </label></td>
      		<td><input type="radio" name="pohlavie" value="1" checked="checked"> Muž
      			<input type="radio" name="pohlavie" value="2" > Žena<br></td>
    	</tr>
    	</tr>
	  		<td></td>
	  		<td>Zaregistrovaním súhlasite s podmienkami používania.</td>
	  	<tr>
	  	<tr>
	     		<td> </td>
	     		<td><input type="submit" name="odosli" id="register" value="Registrovať"></td>
	 </table>
  </form>

</div>
<?php
}

require 'stranka/telo2.php';
# spod stranky
require 'stranka/spod.php';

?>

