<?php

#SEKCIE A KATEGORIE VYMAZANIE

if ($_SERVER['PHP_SELF'] == '/admin/spravaMenu/vymazMenu.php') {
	header('Location: ../../prihlas.php');
	exit();
}

function vymazMenu() {

$vymazUrl = $_GET['vymaz'];

$menuUrl = mysql_query('SELECT menu_id, menu_nazov, menu_url, menu_rodic_id
							FROM menu
							WHERE menu_url = "' . mysql_real_escape_string($vymazUrl) . '" ');

if (mysql_num_rows($menuUrl) != '0') {
	#existuje takaurl
	$nacitajUrl = mysql_fetch_array($menuUrl);

	# ZISTIME SEKCIA  KATEGORIA
	if ($nacitajUrl['menu_rodic_id'] == '0') {
		# SEKCIA

		# POCET KATEGORII V SEKCII na VYMAZANIE
		$pocetSekcia = mysql_query('SELECT menu_id, menu_nazov, menu_rodic_id, menu_url
										FROM menu
										WHERE menu_rodic_id ="' . mysql_real_escape_string($nacitajUrl['menu_id']) . '"
										ORDER BY menu_id DESC ');
		$pocetKategoria = mysql_num_rows($pocetSekcia);
		$pocetKategoriaVypis = '';
		$pocetClanokVypis = '';
		if ($pocetKategoria != '0') {
			$pocetClankov = 0;
			while ($riadok = mysql_fetch_array($pocetSekcia)) {

				#POCET VSETKYCH CLANKOV
				$pocetClanok = mysql_query('SELECT clanok_id, clanok_titul, clanok_url, c.menu_id, m.menu_id
											FROM clanky c JOIN menu m ON c.menu_id = m.menu_id
												WHERE c.menu_id = "' . mysql_real_escape_string($riadok['menu_id']) . '" ');
				$pocetClankov = $pocetClankov + mysql_num_rows($pocetClanok);
				$pocetKategoriaVypis .= $riadok['menu_nazov'] . '(' . mysql_num_rows($pocetClanok) . '), ';
				if ($pocetClankov != '0') {
					while ($riadok1 = mysql_fetch_array($pocetClanok)) {
						$pocetClanokVypis .= $riadok1['clanok_titul'] . ', ';
					}
				}
				else {
					$pocetClankov = 0;
				}
				mysql_free_result($pocetClanok);
			}
		}
		mysql_free_result($pocetSekcia);

		# $pocetKategoria   pocet kategorii v danej sekcii
		# $pocetKategoriaVypis   vypisanie danych kategorii a v () je pocet clankov do riadka
		# $pocetClankov  pocet vsetkych clankov
		# $pocetClanokVypis  vypisanie vsetkych clankov zo vsetkych kategorii do riadka

		?>
		<div class="form">
			<h3 id="formtitul">Zmazanie sekcie</h3>

  			<form action="admin/sekcia/menuForm.php" method="post">
				<table>
					<tr>
						<td>Naozaj chcete zmazať danú sekciu ?</td>
						<td><?php echo htmlspecialchars($nacitajUrl['menu_nazov']); ?></td>
					</tr>
					<tr>
						<td>V danej sekcií sa nachádzajú </td>
						<td><?php echo htmlspecialchars($pocetKategoria); ?> kategórií/e</td>
					</tr>
					<tr>
						<td><?php echo htmlspecialchars($pocetKategoriaVypis); ?></td>
					</tr>
					<tr>
						<td>Taktiež sa nachádzajú </td>
						<td><?php echo htmlspecialchars($pocetClankov); ?> článok/ky</td>
					</tr>
					<tr>
						<td><?php echo htmlspecialchars($pocetClanokVypis); ?></td>
					</tr>
					<tr>
						<td> </td>
						<td><input type="submit" name="zmazatsekcia" value="zmazať" id="odosli"></td>
							<input type="hidden" name="sekciaNazov" value="<?php echo htmlspecialchars($nacitajUrl['menu_nazov']); ?>">

					</tr>
				</table>
  			</form>
		</div>
		<?php
	}
	else {
		# KATEGORIA

		# POCET CLANKOV V DANEJ KATEGORII
		$pocetClanok = mysql_query('SELECT clanok_id, c.menu_id, m.menu_id, clanok_titul
										FROM clanky c JOIN menu m ON c.menu_id = m.menu_id
							WHERE c.menu_id ="' . mysql_real_escape_string($nacitajUrl['menu_id']) . '"
										ORDER BY clanok_id DESC ');
		if (mysql_num_rows($pocetClanok) != '0') {
			$pocetClankov = mysql_num_rows($pocetClanok);
			$pocetClanokVypis = '';
			while ($riadok = mysql_fetch_array($pocetClanok)) {
				$pocetClanokVypis .= $riadok['clanok_titul'] . ', ';
			}
		}
		else {
			$pocetClankov = '0';
		}
		mysql_free_result($pocetClanok);

		?>
		<div class="form">
			<h3 id="formtitul">Zmazanie kategórie</h3>

  			<form action="admin/sekcia/menuForm.php" method="post">
				<table>
					<tr>
						<td>Naozaj chcete zmazať danú kategóriu ?</td>
						<td><?php echo htmlspecialchars($nacitajUrl['menu_nazov']); ?></td>
					</tr>
					<tr>
						<td>V danej kategórií sa nachádza </td>
						<td><?php echo htmlspecialchars($pocetClankov); ?> článok/ky</td>
					</tr>
					<tr>
						<td><?php echo htmlspecialchars($pocetClanokVypis); ?></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="zmazatkategoria" value="zmazať" id="zmazat"></td>
							<input type="hidden" name="kategoriaNazov" value="<?php echo htmlspecialchars($nacitajUrl['menu_nazov']); ?>">

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
