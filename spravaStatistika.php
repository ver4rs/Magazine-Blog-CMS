<?php

require 'db.php';

if (!isset($_SESSION['user_id'])) {
	header('Location: ../../prihlas.php');
	exit();
}




if (is_numeric($_SESSION['level_id']) AND $_SESSION['level_id'] == 4) {

	require 'stranka/hlava.php';
	require 'stranka/vrch.php';
	//require 'stranka/telo1.php';
	require 'stranka/telo.php';


	require 'admin/spravaStatistika/zobrazStatistika.php';

/*
	#VYBER MOZNOSTI
	if (isset($_GET['uprav'])) {
		#NACITANIE
		require 'admin/spravaClanok/zmenClanok.php';
	}
	elseif (isset($_GET['vymaz'])) {
		# VYMAZ CLANOK
		require 'admin/spravaClanok/vymazClanok.php';
	}
	elseif (isset($_GET['zmen'])) {
		# vytvorenie novej sekcie
		require 'admin/spravaUzivatel/zmenUzivatel.php';
	}
	else {
		#ZOBRAZENIE UZIVATELOV
		require 'admin/spravaUzivatel/ukazUzivatel.php';
	}
*/


	//require 'stranka/telo2.php';
	# spod stranky
	require 'stranka/spod.php';

}
else {
	header('Location: /prihlas.php');
	exit();
}


?>
