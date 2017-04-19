<?php

# UKAZANIE VSETKYCH CLANKOV,  UZIVATELOV KTORY NAPISALI CLANKY

# POCET VYSLEDKOV
if (is_numeric($_SESSION['level_id']) AND $_SESSION['level_id'] == 4) {

	$pocetUzivatelCislo1 = 'SELECT user_id, email, password, meno, meno_url, website, level_id, pohlavie, user_mesto, user_mesto, user_popis, user_obrazok, user_cas, user_typ
	            FROM user ORDER BY user_id DESC ';

	$pocetUzivatelCislo = mysql_query($pocetUzivatelCislo1)or die(mysql_error());

	if (mysql_num_rows($pocetUzivatelCislo) != '0') {
		$pocetRiadkov = mysql_num_rows($pocetUzivatelCislo);
	}
	else {
		$pocetRiadkov = '0';
	}
	mysql_free_result($pocetUzivatelCislo);


	#URL STRANA
	require 'admin/komponenty/strankovanie/strankovanie1.php';
	#####################################################################################

	$uzivatel1 = 'SELECT user_id, email, password, meno, meno_url, website, level_id, pohlavie, user_mesto, user_mesto, user_popis, user_obrazok, user_cas, user_typ
	            FROM user ';

	$uzivatel1 .= ' ORDER BY user_cas DESC LIMIT ' . $zaciatok . ', ' . $limit . ' ';
	$uzivatel = mysql_query($uzivatel1)or die(mysql_error());


	if (mysql_num_rows($uzivatel) != '0') {
		$poradie = $zaciatok;


	?>
	<div class="form">
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
					<td>Poradie:</td>
					<td>Avatar:</td>
					<td>Meno:</td>
					<td>email:</td>
					<td>dátum registrácie:</td>
					<td>Level:</td>
					<td>Typ:</td>
					<td>Možnosti:</td>

				</tr>
		<?php
			while ($riadok = mysql_fetch_assoc($uzivatel)) {
				extract($riadok);

				$poradie = $poradie+1;


				# TYP ZABLOKOVANY< NORMAL
				if ($user_typ == '1') {
					# NORMAL

				}
				elseif ($user_typ == '0') {
					# ZABLOKOVANY
				}
				else {
					# NIKDY NEVIES
				}

				# ZMENIME CAS
				$clanok_date = htmlspecialchars($user_cas);
				require 'admin/komponenty/datum_a_cas/datumCas.php';

		?>
		<tr>
			<td><?php echo $poradie; ?></td>
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
			<td><?php echo htmlspecialchars($meno); ?></td>
			<td><?php echo htmlspecialchars($email); ?></td>
			<td><?php echo $datum_den . ', ' . $datum_mesiac . ' ' . $datum_rok . ' ' . $cas_hodina . ':' . $cas_minuta; ?></td>

			<td><?php echo htmlspecialchars($level_id); ?></td>
			<td><?php echo htmlspecialchars($user_typ); ?></td>
			<td><a href="spravaUzivatel.php?zmen=<?php echo htmlspecialchars($meno_url); ?>"><img src="obrazky/upravit.png" title="upraviť" ALT="upraviť"></a></td>
		</tr>
		<?php
			}
		?>
		</table>
		</div>
		<?php
		$napisUrl = 'spravaUzivatel.php?';
		#URL STRANA
		require 'admin/komponenty/strankovanie/strankovanie2.php';
		#####################################################################################
		?>
	</div>
	<?php
	}
	else {
		?>
		<div class="form">
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
		<div id="conten">
		<p>Najprv si vytvorte ucet :::</p>
		</div>
		</div>
		<?php
	}

}
else {
	header('Location: /');
	exit();
}



?>
