<?php

#SEKCIE A KATEGORIE NOVA VYTVORENIE

if ($_SERVER['PHP_SELF'] == '/admin/spravaMenu/noveMenu.php') {
	header('Location: ../../prihlas.php');
	exit();
}

function noveMenu() {

if ($_GET['nova'] == 'sekcia') {
	# SEKCIA

	?>
	<div class="form">
		<h3 id="formtitul">Vytvorenie sekcie</h3>
		<?php
			if (isset($_GET['error'])) {
				echo '<p id="formerror">' . $_GET['error'] . '</p>';
			}
		?>
		<form action="admin/sekcia/menuForm.php" method="post">
			<table>
				<tr>
					<td>Názov sekcie: </td>
					<td><input type="text" name="sekcia_nazov" id="sekcia_nazov" maxlength="100" size="15" ></td>
				</tr>
				<tr>
					<td> </td>
					<td><input type="submit" name="odosliNovaSekcia" value="Naozaj vytvoriť"></td>
				</tr>
			</table>
		</form>
	</div>
	<?php
}
elseif ($_GET['nova'] == 'kategoria') {
 	# KATEGORIA

	/*     nacitanie vyberu sekcii        */
	$menuRodic =0;
	$nacitajSekciu = mysql_query('SELECT menu_id, menu_nazov
				FROM menu
				WHERE menu_rodic_id = "' . mysql_real_escape_string($menuRodic) . '"
				ORDER BY menu_id DESC');
	//***********************************************************

	?>
	<div class="form">
		<h3>Vytvorenie kategórie</h3>
		<?php
			if (isset($_GET['error'])) {
				echo '<p id="formerror">' . $_GET['error'] . '</p>';
			}
		?>
		<form action="admin/sekcia/menuForm.php" method="post">
			<table>
				<tr>
					<td>Názov kategórie: </td>
					<td><input type="text" name="kategoria_nazov" id="kategoria_nazov" maxlength="100" size="15"></td>
				</tr>
				<tr>
					<td>Vyber sekciu: </td>
					<td>
						<select name="sekcia" id="sekcia" multiple="multiple" size="5" rows="100" >
						<?php
							if (mysql_num_rows($nacitajSekciu) != '0') {
								while ($riadok = mysql_fetch_array($nacitajSekciu)) {

						?>
							<option value="<?php echo $riadok['menu_id']; ?>" ><?php echo $riadok['menu_nazov']; ?></option>
						<?php
								}
							}
							else {
						?>
							<option value="0" >Najprv vytvorte sekciu</option>
						<?php
							}

						?>
						</select>
						<?php
							mysql_free_result($nacitajSekciu);
						?>
					</td>
				</tr>
				<tr>
					<td> </td>
					<td><input type="submit" name="odosliNovaKategoria" value="Vytvoriť"></td>
				</tr>
			</table>
		</form>
	</div>
 	<?php
}
else {
	# NEVYBRAL MOZNOST, KLAME
	header('Location: spravaMenu.php');
	exit();
}



}


?>
