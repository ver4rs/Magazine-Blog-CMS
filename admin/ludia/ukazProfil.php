<?php

# BLBOST NIEJE DB TAKZE BUDE VZDY 0 nie a presmeruje, SAMOTNY SUBOR
/*
if (!isset($_SESSION['user_id'])) {
	header('Location: ../../prihlas.php');
	exit();
}
*/

function nacitajProfil() {

#UKAZANIE PROFILU PRIHLASENEHO UZIVATELA

//url adresa profil.php?cislo=ID&uzivatel=MENO
if (!isset($_GET['cislo']) or !is_numeric($_GET['cislo']) or $_GET['cislo' == '0']) {
	header('Location: ../../');
	exit();
}



//nacitanie z databazy
$ludia = mysql_query('SELECT email, user_id , meno, meno_url, level_id, website, pohlavie, user_mesto, user_popis, user_cas, user_obrazok
		FROM user
		WHERE user_id="' . mysql_real_escape_string($_GET['cislo']) . '" ');


if (mysql_num_rows($ludia) != '0') {

	$riadok = mysql_fetch_assoc($ludia);
	extract($riadok);

	$cesta_ludia = 'admin/obrazok/uzivatel/normal/' . htmlspecialchars($user_obrazok) . '.jpg';

	if ($pohlavie == '1') {
    	$pohlavie = 'Muž';
	}
	else {
   		$pohlavie = 'žena';
	}

	require 'stranka/profilH.php';

}
else {
	#NEEXISTUJE
	header('Location: /');
}
mysql_free_result($ludia);


}

?>
