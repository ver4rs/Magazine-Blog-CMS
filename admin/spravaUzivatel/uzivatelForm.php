<?php

# CLANOK FORMY
require '../../db.php';

//session_start();


if (isset($_POST['odmenclanok']) && $_POST['odmenclanok'] == 'Uloeny' && $_SERVER["REQUEST_METHOD"] == "POST") {

	# len tak 
}

elseif (isset($_POST['odosli']) && $_POST['odosli'] == 'Uložiť informácie') {


	$level_id = (isset($_POST['level'])) ? $_POST['level'] : '';
	$typ = (isset($_POST['typ'])) ? $_POST['typ'] : '';
	$meno_url = (isset($_POST['meno_url'])) ? $_POST['meno_url'] : '';

	if (empty($level_id) or $typ > 1 or empty($meno_url)) {
		$error = 'Nevyplnili ste všetky polia.';

		header('Location: ../../spravaUzivatel.php?zmen=' . $meno_url . '&error=' . $error);
		exit();
	}
	else {

		# Ci NEBOL ZMENENA URL MENU A CI EXISTUJE
		$menoExistuje = mysql_query('SELECT meno_url, user_id FROM user
										WHERE meno_url = "' . mysql_real_escape_string($meno_url) . '" ');

		if (mysql_num_rows($menoExistuje) != '0') {
			# EXISTUJE
			$riadok = mysql_fetch_array($menoExistuje);

			# ULOZIME
			$uloz = mysql_query('UPDATE user SET
									level_id = "' . mysql_real_escape_string($level_id) . '",
									user_typ = "' . mysql_real_escape_string($typ) . '"
								 WHERE user_id = "' . mysql_real_escape_string($riadok['user_id']) . '" ');

			$ok = 'Informácie o uživateľovi boli zmenené.';
			header('Location: ../../spravaUzivatel.php?zmen=' . $meno_url . '&ok=' . $ok);
			exit();

		}
		else {
			# NEEXISTUJE, ZMENIL URL MENO
			header('Location: ../../spravaUzivatel.php');
			exit();

		}
		mysql_free_result($menoExistuje);

	}


}
elseif (isset($_POST['odosclanvymaz']) && $_POST['odosclanvymaz'] == 'Zmadnok') {


}
else {
	header('Location: ../../spravaUzivatel.php');
	exit();
}





?>
