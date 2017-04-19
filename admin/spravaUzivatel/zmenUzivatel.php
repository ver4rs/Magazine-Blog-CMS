<?php

# UKAZANIE VSETKYCH CLANKOV,  UZIVATELOV KTORY NAPISALI CLANKY

# POCET VYSLEDKOV
if (is_numeric($_SESSION['level_id']) AND $_SESSION['level_id'] == 4) {



	$uzivatel = mysql_query('SELECT user_id, email, password, meno, meno_url, website, level_id, pohlavie, user_mesto, user_mesto, user_popis, user_obrazok, user_cas, user_typ
	            FROM user WHERE meno_url = "' . mysql_real_escape_string($_GET['zmen']) . '" ORDER BY user_cas DESC ');

	if (mysql_num_rows($uzivatel) != '0') {
		$riadok = mysql_fetch_assoc($uzivatel);
		extract($riadok);
		?>
	<form action="admin/spravaUzivatel/uzivatelForm.php" method="post">
		<div class="form">
			<h3>Zmena práv uživateľa</h3>
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
			<div id="tabulka">
				<table>

					<tr>
						<td>Avatar:</td>
						<td><a href="profil.php?cislo=<?php echo htmlspecialchars($user_id); ?>&uzivatel=<?php echo htmlspecialchars($meno_url); ?>">
							<?php

								$cesta_ludia = 'admin/obrazok/uzivatel/mini/' . htmlspecialchars($user_obrazok) . '.jpg';
								if (file_exists($cesta_ludia)) {
							?>
									<img src="<?php echo urlAdresa . $cesta_ludia; ?>" alt="<?php echo htmlspecialchars($meno); ?>" title="<?php echo htmlspecialchars($meno); ?>" style="width: 60px; height: 70px;">
							<?php
								}
								else {
									//neexistuje
								?>
									<img src="obrazky/avatar.jpeg" alt="<?php echo htmlspecialchars($meno); ?>" title="<?php echo htmlspecialchars($meno); ?>" style="width: 60px; height: 70px;">
								<?php
								}
							?>
							</a>
						</td>
					</tr>
					<tr>
						<td><label for="Zadajemail">Email:</label></td>
						<td><input type="text" name="meno" value="<?php echo htmlspecialchars($email); ?>" id="" maxlength="90" disabled="disabled"></td>

					</tr>
					<tr>
						<td><label for="Zadajmeno">Meno: </label></td>
						<td><input type="text" name="meno" value="<?php echo htmlspecialchars($meno); ?>" id="" maxlength="50" disabled="disabled"></td>
					</tr>
					<tr>
						<td><label for="Zadajlevel">Level:</label></td>
						<td>
							<?php
								for ($i=1; $i <= 4; $i++) {
									if ($i == htmlspecialchars($level_id)) {
										?>
										<input type="radio" name="level" checked="checked" value="<?php echo $i; ?>"><?php echo $i; ?>
										<?php
									}
									else {
										?>
										<input type="radio" name="level" value="<?php echo $i; ?>"><?php echo $i; ?>
										<?php
									}
								}
							?>
						</td>
					</tr>
					<tr>
						<td><label for="ZadajTyp">Účet funguje:</label></td>
						<td>
							<?php
								for ($i=0; $i <= 1; $i++) {

									if ($i == '0') {
										# BLOKOVANY
										$userTypNazov = 'zablokovaný';
									}
									elseif ($i == '1') {
										# NORMAL
										$userTypNazov = 'normálny';
									}
									else {
										# LEN TAK
										$userTypNazov = 'neviem';
									}

									if ($i == $user_typ) {
										?>
										<input type="radio" name="typ" checked="checked" value="<?php echo $i; ?>"><?php echo $userTypNazov; ?>
										<?php
									}
									else {
										?>
										<input type="radio" name="typ" value="<?php echo $i; ?>"><?php echo $userTypNazov; ?>
										<?php
									}
								}
							?>
						</td>
					</tr>
					<tr>
						<td> </td>
						<td>
							<input type="submit" name="odosli" value="Uložiť informácie" id="odosli">
							<input type="hidden" name="meno_url" value="<?php echo htmlspecialchars($meno_url); ?>" id="odosli">
						</td>
					</tr>


	<?php
	}
	else {
		?>
		<div class="form">
			<h2><span style="color:red;">Skúšate ma?   Čo tým dokážete.</span>   Nič.</h2>
		</div>
		<?php
		//header('Location: /');   //chyba
		//exit();
	}
	mysql_free_result($uzivatel);
	?>
				</table>
			</div>

		</div>
	</form>
	<?php

}
else {
	header('Location: /');
	exit();
}



?>
