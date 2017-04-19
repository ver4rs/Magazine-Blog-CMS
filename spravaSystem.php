<?php

require 'db.php';

if (!isset($_SESSION['user_id'])) {
	header('Location: ../../prihlas.php');
	exit();
}




if (is_numeric($_SESSION['level_id']) AND $_SESSION['level_id'] == 4) {

	require 'stranka/hlava.php';
	require 'stranka/vrch.php';
	//require 'stranka/telo1.php';
	require 'stranka/telo.php';


	//nacitanie, zobrazenie textu
	$zobraz1 = mysql_query('SELECT sprava_komentar, sprava_titul, sprava_popis, sprava_strankovanie, sprava_slider, sprava_nadpis_1, sprava_nadpis_2 FROM sprava');
	if (mysql_num_rows($zobraz1) != '0') {

		$zobraz = mysql_fetch_array($zobraz1);
		mysql_free_result($zobraz1);
		?>
		<div class="form">
			<h3>Správa systému</h3>
			<?php
				if (isset($_GET['error'])) {
					echo '<p id="formerror">' . $_GET['error'] . '</p>';
				}
				elseif (isset($_GET['ok'])) {
					echo '<p id="errorok">' . $_GET['ok'] . '</p>';
				}
				else {

				}
			?>
			<form action="admin/system/systemForm.php" method="post">
				<table>
					<tr>
						<td><label for="spravanadpis1">Titul stránky: </label></td>
						<td><input type="text" name="sprava_nadpis1" id="inputZvec" style="width: 500px;" value="<?php echo htmlspecialchars($zobraz['sprava_nadpis_1']); ?>"  maxlength="80"></td>
					</tr>
					<tr>
						<td><label for="spravanadpis2">Popis stránky: </label></td>
						<td><input type="text" name="sprava_nadpis2" id="inputZvec" style="width: 500px;" value="<?php echo htmlspecialchars($zobraz['sprava_nadpis_2']); ?>"  maxlength="200"></td>
					</tr>
					<tr>
						<td><label for="spravatitul">Titul: (Môže byť aj titul stránky.) </label></td>
						<td><input type="text" name="sprava_titul" id="inputZvec" style="width: 500px;" value="<?php echo htmlspecialchars($zobraz['sprava_titul']); ?>"  maxlength="100"></td>
					</tr>
					<tr>
						<td><label for="spravapopis">Description: (Môže byť aj popis stránky.) </label></td>
						<td><input type="text" name="sprava_popis" id="inputZvec" style="width: 500px;" value="<?php echo htmlspecialchars($zobraz['sprava_popis']); ?>"  maxlength="255"></td>
					</tr>
					<tr>
						<td><label for="spravakomentar">Odoslanie komentárov neprihlasených: </label></td>
						<td><input type="checkbox" name="sprava_komentar"
							<?php
								if (htmlspecialchars($zobraz['sprava_komentar']) == TRUE) {
									echo ' checked="checked"';
								}
							?>
								></td>
					</tr>
					<tr>
						<td><label for="spravastrankovanie">Počet zobrazených článkov na stranu: </label></td>
						<td><input type="text" name="sprava_strankovanie" style="width: 30px;" value="<?php echo htmlspecialchars($zobraz['sprava_strankovanie']); ?>"  maxlength="2"></td>
					</tr>
					<tr>
						<td><label for="spravaslider">Počet článkou v slidery: (1-9)</label></td>
						<td><input type="text" name="sprava_slider" style="width: 30px;" value="<?php echo htmlspecialchars($zobraz['sprava_slider']); ?>"  maxlength="1"></td>
					</tr>

					<tr>
						<td> </td>
						<td><input type="submit" name="submit" value="Uložit nastavenia"></td>
					</tr>
				</table>
			</form>

		</div>
		<?php
		//require 'stranka/telo2.php';
		# spod stranky
	}
	else {
		?>
		<div class="form">
			<h3>Správa systému</h3>
			<p>Momentálne nemáte prístup k týmto údajom.</p>
		</div>
		<?php
	}
	mysql_free_result($zobraz1);

	require 'stranka/spod.php';


}
else {
	header('Location: ../');
	exit();
}



?>
