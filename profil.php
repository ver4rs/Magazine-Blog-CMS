<?php


# PROFIL

require 'db.php'; //DB

/*
	NEPOTREBUJEM LEBO POUZIJEM URL
if (!isset($_SESSION['user_id'])) {
	header('Location: ../../prihlas.php');
	exit();
}
*/
if (!is_numeric($_GET['cislo'])) {
	# cislo nieje cislo 0-9
	# ZLE
	header('Location: /');
	exit();
}


# cislo  uzivatel
$cisloExistuje1 = mysql_query('SELECT user_id, meno_url FROM user WHERE user_id ="' . mysql_real_escape_string($_GET['cislo']) . '" ');
if (mysql_num_rows($cisloExistuje1) != '0') {
	# EXISTUJE ID CISLO
	$cisloExistuje = mysql_fetch_array($cisloExistuje1);

	if ($cisloExistuje['meno_url'] != $_GET['uzivatel']) {
		# DOBRE
		$uzivatelExistuje1 = mysql_query('SELECT meno_url, user_id FROM user WHERE user_id ="' . mysql_real_escape_string($_GET['cislo']) . '" ');
		if (mysql_num_rows($uzivatelExistuje1) != '0') {
			# URL NASLI SME DRUHE
			$uzivatelExistuje = mysql_fetch_array($uzivatelExistuje1);

			header('Location: profil.php?cislo=' . $_GET['cislo'] . '&uzivatel=' . $uzivatelExistuje['meno_url']);
			exit();
		}
		mysql_free_result($uzivatelExistuje1);
	}
}
else {
	# NEEXISTUJE Z URL NENASLO ZIADNE ID TAKZE
	header('Location: /');
	exit();
}
mysql_free_result($cisloExistuje1);
# KONIEC OVERENIE URL

require 'stranka/hlava.php';
require 'stranka/vrch.php';
require 'stranka/telo1.php';

require 'admin/ludia/ukazProfil.php'; // skript na nacitanie profilu, zobrazenie udajov k profilu
echo nacitajProfil();  // funkcia na hore pise

if (!isset($_GET['vyber']) or $_GET['vyber'] == '0'or $_GET['vyber'] > 1) {
	# CLANKY
	require 'admin/ludia/clanokProfil.php'; // skript je na zobrazenie clankov toho uzivatela
	echo uzivatelClanokZobraz(); // funkcia na zobrazenie clankov toho uzivatela
}
else {
	# KOMENTARE
	require 'admin/ludia/komentarProfil.php';  // skript je na zobrazenie komentarov toho uzivatela
	echo uzivatelKomentarZobraz(); // funkcia na zobrazenie komentarov toho uzivatela
}




require 'stranka/telo2.php';
require 'stranka/spod.php';


?>


