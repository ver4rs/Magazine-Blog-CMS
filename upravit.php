<?php


require 'db.php'; //DB

if (!isset($_SESSION['user_id'])) {
	header('Location: ../../prihlas.php');
	exit();
}

require 'stranka/hlava.php';

########## NEPOTREBUJEM BOLO TAM NACITANIE TU HO DAM ##########

#ZOBRAZENIE
//zobrazenie
$ludia = mysql_query('SELECT  user_id, email, password, meno, website, pohlavie, user_mesto, user_popis, user_obrazok FROM user WHERE user_id="' . mysql_real_escape_string($_SESSION['user_id']) . '"');
if (mysql_num_rows($ludia) != '0') {
	$riadok = mysql_fetch_array($ludia);
	extract($riadok);
}
else {
	header('Location: prihlas.php');
	exit();
}
mysql_free_result($ludia);

$cesta_ludia = 'admin/obrazok/uzivatel/normal/' . $user_obrazok . '.jpg';
//require 'admin/ludia/zmenProfil.php'; // skript na zonbrazenie profilu, nacitanie informacii dom  inputov
//echo zobrazProfil();  // funkcia na zobrazenie profilu, nacitanie informacii dom  inputov


require 'stranka/vrch.php';
require 'stranka/telo1.php';
?>

	<!--  upload obrazok   -->
	<script type="text/javascript" src="js/uploadImage/jquery.min.js"></script>
	<script type="text/javascript" src="js/uploadImage/jquery.form.js"></script>

	<script type="text/javascript" >
	 $(document).ready(function() {

	            $('#obrazokUloz').live('change', function()			{
				           $("#preview").html('');
				    $("#preview").html('<img src="js/uploadImage/loader.gif" alt="Uploading...."/>');
				$("#imageform").ajaxForm({
							target: '#preview'
			}).submit();

				});
	        });
	</script>
	<!--  koniec upload obrazok   -->



<div class="form">
	<h3 id="profiltitul">Zmena profilu</h3>

	<?php
		if (isset($_GET['error'])) {
			echo '<p id="formerror">' . $_GET['error'] . '</p>';
		}
		elseif (isset($_GET['ok'])) {
			echo '<p id="formok">' . $_GET['ok'] . '</p>';
		}
		else {

		}
	?>


	  <div id="avatar">
	  	<table>
	  		<tr>
				<td>
					<div id="avatar"><!-- foto -->
				<?php
					if (file_exists($cesta_ludia)) {
				?>
					<img src="<?php echo $cesta_ludia; ?>" style="">
				<?php
					}
					else {
						//neexistuje
						?>
						<img src="obrazky/avatar.jpeg" style="width: 150px; height: 150px;">
						<?php
					}
				?>
					</div><!-- foto -->
				</td>
				<td>
					<form id="imageform" method="post" enctype="multipart/form-data" action='admin/ludia/novyObrazokLudia.php'>

						<label for="upAva">Avatar upload:</label>
			 			<input type="file" name="obrazokUloz" id="obrazokUloz" />
			 			<p style="color: red; font-style: 10px;">Pokial nevyberiete obrázok tak zostane predošli.</br>Davajte POZOR!</p>
			 		</form>
			 		<div id='preview' style="float:right;">
					</div>
			 	</td>
			</tr>
	  	</table>
	  </div>
	<form action="admin/ludia/ludiaForm.php" method="post" enctype="multipart/form-data">
	  <div id="profiluprav" style="">
		<table>
			<tr>
				<td><label for="prihlasemail">E-mail: </label></td>
				<td><input type="text" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>"></td>
			</tr>
			<tr>
				<td><label for="prihlasmeno">Meno: </label></td>
				<td><input type="text" name="meno" id="lomeno" value="<?php  echo htmlspecialchars($meno); ?>"></td>
			</tr>
			<tr>
				<td><label for="prihlaswebsite">Website: </label></td>
				<td><input type="text" name="website" id="website" value="<?php echo htmlspecialchars($website); ?>"></td>
			</tr>
			<tr>
				<td><label for="prihlaspohlavie">Pohlavie: </label></td>

				<?php
					if ($pohlavie == '1') {
				?>
					<td><input type="radio" name="pohlavie" value="1" checked="checked"> Muž
      				<input type="radio" name="pohlavie" value="2" > Žena<br></td>
				<?php
					}
					else {
				?>
					<td><input type="radio" name="pohlavie" value="1" > Muž
      				<input type="radio" name="pohlavie" value="2" checked="checked"> Žena</td>
				<?php
					}
				?>

			</tr>
			<tr>
				<td><label for="prihlasmesto">Mesto: </label></td>
				<td><input type="text" name="mesto" id="mesto" maxlength="50" value="<?php echo htmlspecialchars($user_mesto); ?>"></td>
			</tr>
			<tr>
				<td><label for="prihlaspopis">Kratky popis: </label></td>
				<td><textarea name="popis" id="popis" maxlength="500" cols="50" rows="5"><?php echo htmlspecialchars($user_popis); ?></textarea></td>
			</tr>
			<tr>
				<td> </td>
				<td><input type="submit" name="udaje" id="register" value="Zmena údajov"></td>
			</tr>

			<tr>
				<td>  </td>
				<td>  </td>
			</tr>


				<!--<th><div id="zmena" style="color: #E5d5d5; font-size: 15px; ">Zmena hesla</div></th>-->


			<tr>
				<td><label for="prihlasmeno">Heslo: </label></td>
				<td><input type="password" name="pass" value="" id="heslostare"></td>
			</tr>
			<tr>
				<td><label fpr="prihlasmeno">Nove heslo: </label></td>
				<td><input type="password" name="pass1" id="heslonove1"></td>
			</tr>
			<tr>
				<td><label fpr="prihlasmeno">Opakuj nove heslo: </label></td>
				<td><input type="password" name="pass2" id="heslonove2"></td>
			</tr>
			<tr>
				<td>  </td>
				<td><input type="submit" name="koniec" id="register" value="Zmena hesla :)"></td>
			</tr>
		</table>
	  </div>
	</form>
</div>
<?php

require 'stranka/telo2.php';
require 'stranka/spod.php';

?>

