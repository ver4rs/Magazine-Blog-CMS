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



	#VYBER MOZNOSTI
	if (isset($_GET['uprav'])) {
		#NACITANIE
		require 'admin/sekcia/ukazMenu.php';
		echo nacitanieZmenMenu();
	}
	elseif (isset($_GET['vymaz'])) {
		# VYMAZANIE
		require 'admin/sekcia/vymazMenu.php';
		echo vymazMenu();
	}
	elseif (isset($_GET['nova'])) {
		# vytvorenie novej sekcie
		require 'admin/sekcia/noveMenu.php';
		echo noveMenu();
	}
	else {
		#ZOBRAZENIE SEKCIE A KATEGORIE
		require 'admin/sekcia/ukazSekcia.php';
		echo zobrazMenuVsetko();
	}


	//require 'stranka/telo2.php';
	# spod stranky
	require 'stranka/spod.php';

}
else {
	header('Location: ../');
	exit();
}



?>

