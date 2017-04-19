<?php


# SKRATKA

$urlAdresaNapis1 = 'http://mobilai.besom.sk/';
$urlAdresaPriecinok = ''; //musi koncit lomkov / ak nikaky priecinok nieje,  priklad priklad.sk/skuska/index.php tu je priecinok a takto bez priecinka priklad.sk/index.php
$urlAdresa = $urlAdresaNapis1 . $urlAdresaPriecinok;

# URL ADRESA
define(urlAdresa, $urlAdresa);

# UMIESTRNENIE PRIECINOK
//define(urlPriecinok, '');

# TABULKA PREFIX
define(tabulkaNazov, '');

function nacitaj($url) {
	if (file_exists($url)) {
		require $url;
	}
	else {
		die('POZOR');
		exit();
	}
}



?>

