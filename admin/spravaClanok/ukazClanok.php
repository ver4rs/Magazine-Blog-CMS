<?php

# UKAZANIE VSETKYCH CLANKOV,  UZIVATELOV KTORY NAPISALI CLANKY

if ($_SERVER['PHP_SELF'] == '/admin/spravaClanok/ukazClanok.php') {
	header('Location: ../../prihlas.php');
	exit();
}

function zobrazClankyVsetky() {

# POCET VYSLEDKOV

$pocetClankovCislo1 = 'SELECT clanok_id, clanok_date, clanok_url, clanok_obrazok, clanok_titul, clanok_pocet, clanok_paci, clanok_nepaci, c.clanok_perex, m.menu_rodic_id, m.menu_nazov , c.uzivatel_id, u.user_id, u.meno, m.menu_url, meno_url
            FROM clanky c JOIN user u ON c.uzivatel_id = u.user_id
                        JOIN menu m ON c.menu_id = m.menu_id ';

if (is_numeric($_SESSION['level_id']) AND $_SESSION['level_id'] < 3) {
	$pocetClankovCislo1 .= ' WHERE uzivatel_id = "' . mysql_real_escape_string($_SESSION['user_id']) . '" ';
}
$pocetClankovCislo1 .= '  ORDER BY clanok_id DESC';
$pocetClankovCislo = mysql_query($pocetClankovCislo1)or die(mysql_error());

if (mysql_num_rows($pocetClankovCislo) != '0') {
	$pocetRiadkov = mysql_num_rows($pocetClankovCislo);
}
else {
	$pocetRiadkov = '0';
}
mysql_free_result($pocetClankovCislo);


#URL STRANA
require 'admin/komponenty/strankovanie/strankovanie1.php';
#####################################################################################

$clanok1 = 'SELECT clanok_id ,clanok_date, clanok_url, clanok_obrazok, clanok_titul, clanok_pocet, clanok_paci, clanok_nepaci, c.clanok_perex, m.menu_rodic_id, m.menu_nazov , c.uzivatel_id, u.user_id, u.meno, m.menu_url, meno_url
            FROM clanky c JOIN user u ON c.uzivatel_id = u.user_id
                        JOIN menu m ON c.menu_id = m.menu_id ';
if (is_numeric($_SESSION['level_id']) AND $_SESSION['level_id'] < 3) {
	$clanok1 .= ' WHERE uzivatel_id = "' . mysql_real_escape_string($_SESSION['user_id']) . '" ';
}
$clanok1 .= ' ORDER BY clanok_date DESC LIMIT ' . $zaciatok . ', ' . $limit . ' ';
$clanok = mysql_query($clanok1)or die(mysql_error());


if (mysql_num_rows($clanok) != '0') {
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
	<div id="conten">
	<a href="spravaClanok.php?nova=clanok">Napísať  článok<img src="obrazky/pridat.gif" alt="Pridat nový článok"></a>
	</div>
	<div id="tabulka">
		<table>
			<tr>
				<td>Poradie:</td>
				<td>Nadpis článku:</td>
				<td>Dátum pridania:</td>
				<td>Kto pridal:</td>
				<td>Menu:</td>
				<td>Možnosti:</td>

			</tr>
	<?php
		while ($riadok = mysql_fetch_assoc($clanok)) {
			extract($riadok);

			$poradie = $poradie+1;

			# ZMENIME CAS
			$clanok_date = htmlspecialchars($clanok_date);
			require 'admin/komponenty/datum_a_cas/datumCas.php';

			# ZISTENIE SEKCIE K CLANKU
			$zistiSekcia = mysql_query('SELECT menu_id, menu_nazov, menu_url, menu_rodic_id
											FROM menu
											WHERE menu_id ="' . mysql_real_escape_string($menu_rodic_id) . '" ');
			if (mysql_num_rows($zistiSekcia) != '0') {
				$nazovSekcia = mysql_fetch_array($zistiSekcia);

			}
			mysql_free_result($zistiSekcia);
	?>
	<tr>
		<td><?php echo$poradie; ?></td>
		<td><a href="clanok.php?clanok=<?php echo htmlspecialchars($clanok_url); ?>"><?php echo htmlspecialchars($clanok_titul); ?></a></td>
		<td><?php echo $datum_den . ', ' . $datum_mesiac . ' ' . $datum_rok . ' ' . $cas_hodina . ':' . $cas_minuta; ?></td>
		<td><?php echo htmlspecialchars($meno); ?></td>
		<td><?php echo htmlspecialchars($nazovSekcia['menu_nazov'] . ' / ' . $menu_nazov); ?></td>
		<td><a href="spravaClanok.php?uprav=<?php echo htmlspecialchars($clanok_url); ?>"><img src="obrazky/upravit.png" title="upraviť" ALT="upraviť"></a>
		<?php
			if (is_numeric($_SESSION['level_id']) AND $_SESSION['level_id'] == 4) {
				?>
				&nbsp  <a href="spravaClanok.php?vymaz=<?php echo htmlspecialchars($clanok_url); ?>"><img src="obrazky/vymazat.png" title="vymazať" alt="vymazať"></a>
				<?php
			}
		?>
		</td>
	</tr>
	<?php
		}
	?>
	</table>
	</div>
	<?php
	$napisUrl = 'spravaClanok.php?';
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
	<a href="spravaClanok.php?nova=clanok">Napísať  článok<img src="obrazky/pridat.jpeg" alt="Pridat nový článok"></a>
	</div>
	</div>
	<?php
}


}


?>
