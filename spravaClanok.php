<?php

require 'db.php';

if (!isset($_SESSION['user_id'])) {
	header('Location: ../../prihlas.php');
	exit();
}

require 'stranka/hlava.php';
require 'stranka/vrch.php';
require 'stranka/telo.php';
//require 'stranka/telo1.php';





#VYBER MOZNOSTI
if (isset($_GET['uprav'])) {
	#NACITANIE
	require 'admin/spravaClanok/zmenClanok.php';
	echo zmenClanok();
}
elseif (isset($_GET['vymaz'])) {
	# VYMAZ CLANOK
	require 'admin/spravaClanok/vymazClanok.php';
	echo vymazClanok();
}
elseif (isset($_GET['nova'])) {
	# vytvorenie novej sekcie
	require 'admin/spravaClanok/novyClanok.php';
	echo novyClanok();
}
else {
	#ZOBRAZENIE SEKCIE A KATEGORIE
	require 'admin/spravaClanok/ukazClanok.php';
	echo zobrazClankyVsetky();
}




//require 'stranka/telo2.php';
# spod stranky
require 'stranka/spod.php';
?>
