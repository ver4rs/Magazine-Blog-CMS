<?php



/*
if (!isset($_SESSION['user_id'])) {
	//nie je prihlaseny
	echo 'Neautorizovany pristup';
	exit();
}
*/
/*
$datab = 'includes/db/db.inc.php';
require $datab;
$datab = '';
*/


if (isset($_SESSION['user_id'])) {
?>
<a href="odhlas.php">odhlásiť</a>
<?php

	echo 'Ahoj ' .  $_SESSION['meno'] . ' ';

	# ZISTENIE ID CISLA A MENA POMOCOU SESSION
?>
<a href="profil.php?cislo=<?php echo $_SESSION['user_id']; ?>&<?php echo $_SESSION['meno']; ?>">profil</a>
<a href="spravaClanok.php">správa článkov</a>

<?php

	if ($_SESSION['level_id'] > 1) {
		//echo '<a href="?article=article">Sprava clankov</a>';

	}

	if ($_SESSION['level_id'] < 3) {


	}
	if ($_SESSION['level_id'] > 2) {

	}
	if ($_SESSION['level_id'] > 3) {
?>

<a href="spravaMenu.php">správa menu</a>
<a href="spravaUzivatel.php">správa uživateľ</a>
<a href="spravaSystem.php">správa systému</a>
<a href="spravaStatistika.php">štatistika</a>
<?php

	}

}
else {
	?>

	<a href="register.php">Registrácia</a>
	<a href="prihlas.php">Prihlásiť</a>


	<?php
}


?>
