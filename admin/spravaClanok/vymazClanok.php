<?php

#SEKCIE A KATEGORIE VYMAZANIE


if ($_SERVER['PHP_SELF'] == '/admin/spravaClanok/vymazClanok.php') {
	header('Location: ../../prihlas.php');
	exit();
}

function vymazClanok() {

# A MOZE TO OVERENIE
if (is_numeric($_SESSION['level_id']) AND $_SESSION['level_id'] == 4) {


	$vymazUrl = $_GET['vymaz'];

	$menuUrl = mysql_query('SELECT clanok_id, clanok_url, clanok_titul
								FROM clanky
								WHERE clanok_url = "' . mysql_real_escape_string($vymazUrl) . '" ');

	if (mysql_num_rows($menuUrl) != '0') {
		#existuje takaurl
		$nacitajUrl = mysql_fetch_array($menuUrl);

		?>
		<div class="form">
			<h3 id="formtitul">Zmazať článok</h3>
	  		<form action="admin/spravaClanok/clanokForm.php" method="post">
				<table>
					<tr>
						<td>Naozaj chcete zmazať daný článok ?</td>
						<td><?php echo htmlspecialchars($nacitajUrl['clanok_titul']); ?></td>
					</tr>
					<tr>
						<td> </td>
						<td><input type="submit" name="odosliclanokvymaz" value="Zmazať článok" id="odosli"></td>
						<td><input type="hidden" name="clanok_url" value="<?php echo htmlspecialchars($nacitajUrl['clanok_url']); ?>" id="odosli"></td>

					</tr>
				</table>
	  		</form>
		</div>
		<?php

	}
	mysql_free_result($menuUrl);
}
else {
	header('Location: spravaClanok.php');
	exit();
}


}


?>
