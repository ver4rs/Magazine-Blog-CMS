<?php

#NACITANIE SEKCIE A KATEGORIE

if ($_SERVER['PHP_SELF'] == '/admin/spravaMenu/ukazMenu.php') {
	header('Location: ../../prihlas.php');
	exit();
}

function nacitanieZmenMenu() {

$upravUrl = $_GET['uprav']; //menu_url

$menuUrl = mysql_query('SELECT menu_id, menu_rodic_id, menu_nazov, menu_url
							FROM menu
							WHERE menu_url ="' . mysql_real_escape_string($upravUrl) . '"');

if (mysql_num_rows($menuUrl) != '0') {
	#existuje

	//zistime kategoria alebo sekcia
	$menuVyber = mysql_fetch_array($menuUrl);
	if ($menuVyber['menu_rodic_id'] == '0') {
		# SEKCIA
		$sekciaNazov = $menuVyber['menu_nazov'];
		$sekciaUrl = $menuVyber['menu_url'];
		$sekciaId = $menuVyber['menu_id'];
		?>
		<div class="form">
			<h3 id="formtitul">Zmena názvu sekcie</h3>
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
		  	<form action="admin/sekcia/menuForm.php" method="post">
				<table>
					<tr>
						<td>Názov sekcie:</td>
						<td><input type="text" name="sekcia_nazov" id="sekcia_nazov" maxlength="100" value="<?php echo $sekciaNazov; ?>"></td>
					</tr>
					<tr>
						<td> </td>
						<td><input type="submit" name="odosli" value="Zmeniť názov" id="odosli"></td>
						<input type="hidden" name="sekcia_id" value="<?php echo $sekciaId; ?>">
						<input type="hidden" name="sekciaUrl" value="<?php echo $sekciaUrl; ?>">
					</tr>
				</table>
		  	</form>
		</div>
	<?php
	}
	else {
		# KATEGORIA   2
		//zistit sekciu tej kategorie $menuVyber['menu_rodic_id']

		$sekcia0 =0;

			?>
			<div class="form">
				<h3 id="formtitul">Zmena názvu sekcie</h3>
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
			  <form action="admin/sekcia/menuForm.php" method="post">
				<table>
					<tr>
						<td>Nazov kategorie:</td>
						<td><input type="text" name="kategoria_nazov" id="kategoria_nazov" maxlength="100" value="<?php echo $menuVyber['menu_nazov']; ?>"></td>
					</tr>
					<tr>
						<td>Vyber sekciu: </td>
						<td>
							<select name="sekcia" id="sekcia" multiple="multiple" size="5" rows="100" >
							<?php
							$nacitajSekcia = mysql_query('SELECT menu_id, menu_nazov
										FROM menu
										WHERE menu_rodic_id ="' . mysql_real_escape_string($sekcia0) . '"
									ORDER BY menu_id DESC');

							while ($riad = mysql_fetch_array($nacitajSekcia)) {

								if ($riad['menu_id'] == $menuVyber['menu_rodic_id']) {
							?>
								<option style=""  value="<?php echo $riad['menu_id']; ?>" selected="selected"><?php echo $riad['menu_nazov']; ?></option>
							<?php
								}
								else {
							?>
								<option style=""  value="<?php echo $riad['menu_id']; ?>" ><?php echo $riad['menu_nazov']; ?></option>
							<?php
								}
							}
							?>
							</select>
							<?php mysql_free_result($nacitajSekcia); ?>
						</td>
					</tr>
					<tr>
						<td> </td>
						<td><input type="submit" name="odoslkat" value="Zmeniť názov" id="odosli"></td>
						<input type="hidden" name="kategoriaMenuId" value="<?php echo $menuVyber['menu_id']; ?>">
						<input type="hidden" name="kategoriaUrlstara" value="<?php echo $menuVyber['menu_url']; ?>">
					</tr>
				</table>
			  </form>
			</div>
			<?php


	}
}
mysql_free_result($menuUrl);



}




?>
