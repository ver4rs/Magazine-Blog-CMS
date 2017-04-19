<?php

if (!isset($_SESSION['user_id'])) {
	header('Location: ../../prihlas.php');
	exit();
}

if ($_SERVER['PHP_SELF'] == '/admin/spravaMenu/ukazSekcia.php') {
	header('Location: ../../prihlas.php');
	exit();
}


#ZOBRAZENIE SEKCIE A KATEGORIE

function zobrazMenuVsetko() {

#SEKCIA
$rodic_id = 0;
$poradie = 0;
$menu = mysql_query('SELECT menu_id, menu_rodic_id, menu_nazov, menu_nazov, menu_url
						FROM menu
						WHERE menu_rodic_id ="' . mysql_real_escape_string($rodic_id) . '"
						ORDER BY menu_id DESC');
?>
<div id="zobrazTab">
	<h3>Správa menu</h3>
	<div id="tabs">
	<ul>
        <li><a href="#tabs-1">Sekcia</a></li>
        <li><a href="#tabs-2">Kategória</a></li>
    </ul>

	<div id="tabs-1">
	<div id="content1">
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
		<a href="spravaMenu.php?nova=sekcia">Pridať sekciu <img src="obrazky/pridat.jpeg" alt="Pridat novú sekciu"></a>
<?php
if (mysql_num_rows($menu) != '0') {
	?>
		<table cellspacing="0">
		   	<tr><th>Poradie</th><th>Sekcia</th><th></th></tr>
	<?php
	while ($riadok = mysql_fetch_assoc($menu)) {

		extract($riadok);
		$poradie = $poradie +1;
		?>

		    <tr>
		    	<td><?php echo htmlspecialchars($poradie); ?></td>
		    	<td><?php echo htmlspecialchars($menu_nazov); ?></td>
		    	<td><a href="spravaMenu.php?uprav=<?php echo htmlspecialchars($menu_url); ?>"><img src="obrazky/upravit.png" title="upraviť" ALT="upraviť"></a> &nbsp  <a href="spravaMenu.php?vymaz=<?php echo htmlspecialchars($menu_url); ?>"><img src="obrazky/vymazat.png" title="vymazať" alt="vymazať"></a></td>
		    </tr>


		<?php

	}
	?>
		</table>

	</div>
	</div>
	<?php
}
mysql_free_result($menu);




#****************************************************************************************************



#KATEGORIA
$rodic_id = 0;
$poradie = 0;
$menu = mysql_query('SELECT menu_id, menu_rodic_id, menu_nazov, menu_nazov, menu_url
						FROM menu
						WHERE menu_rodic_id ="' . mysql_real_escape_string($rodic_id) . '"
						ORDER BY menu_id ASC');

if (mysql_num_rows($menu) != '0') {
	?>
	<div id="tabs-2">
	<div id="content">
		<a href="spravaMenu.php?nova=kategoria">Pridať kategóriu <img src="obrazky/pridat.jpeg" alt="Pridat novú kategóriu"></a>
		<table cellspacing="0">
		   	<tr><th>Poradie</th><th>Sekcia</th><th>Kategória</th><th></th></tr>
	<?php
	while ($riadok = mysql_fetch_assoc($menu)) {

		extract($riadok);

		$menuS = mysql_query('SELECT menu_id, menu_rodic_id, menu_nazov, menu_url
								FROM menu
								WHERE menu_rodic_id ="' . mysql_real_escape_string($menu_id) . '"
								ORDER BY menu_id ASC');
		if (mysql_num_rows($menuS) != '0') {
			while ($pisKat = mysql_fetch_array($menuS)) {
				$poradie = $poradie +1;
				?>
				<tr>
					<td><?php echo htmlspecialchars($poradie); ?></td>
					<td><?php echo htmlspecialchars($menu_nazov); ?></td>
					<td><?php echo htmlspecialchars($pisKat['menu_nazov']); ?></td>
					<td><a href="spravaMenu.php?uprav=<?php echo htmlspecialchars($pisKat['menu_url']); ?>"><img src="obrazky/upravit.png" title="upraviť" alt="upraviť"></a> &nbsp  <a href="spravaMenu.php?vymaz=<?php echo htmlspecialchars($pisKat['menu_url']); ?>"><img src="obrazky/vymazat.png" title="vymazať" alt="vymazať"></a></td>
				</tr>
				<?php
			}
		}
		else {
			$poradie = $poradie +1;
			?>
			<tr><td><?php echo $poradie; ?></td><td><?php echo $menu_nazov; ?></td><td><?php echo '---'; ?></td></tr>
			<?php
		}
		mysql_free_result($menuS);

	}
	?>
		</table>

	</div>
	</div>
	<?php
}
mysql_free_result($menu);


?>
</div>

</div>
<?php

}

?>
