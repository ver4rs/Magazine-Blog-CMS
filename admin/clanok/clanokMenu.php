<?php


# PODLA SEKCIE A KATEGORIE

function menu() {

//echo $_GET['menu']
$sekciaa = $_GET['menu'];  //cela url navigacie
/*
$sekciaa = stripslashes($sekciaa);
$sekciaa = mysql_real_escape_string($sekciaa);
$sekciaa1 = strpos($sekciaa, ' ');
if ($sekciaa1 > '0') {
	$sekciaa = substr($sekciaa, 0, -(strlen($sekciaa - $sekciaa1)+1));
	$sekciaa2 = strpos($sekciaa, ' ');
	if ($sekciaa2 > '0') {
		$sekciaa = substr($sekciaa, 0, -(strlen($sekciaa - $sekciaa1)+1));
			echo $sekciaa1;
	echo $sekciaa;
	}

}
*/
$skratka = strpos($sekciaa, '/');

if ($skratka > '0') {
	//    html/pokracovanie-v-html
	$skratka = $skratka+1;
	$kategoria = substr($sekciaa, $skratka);
	$sekcia = substr($sekciaa, 0, -(strlen($sekciaa)-$skratka));
}

if ($_GET['menu'] == '') {
	header('Location: ../../prihlas.php');
	exit();
}

if (strpos($sekciaa, '/') == FALSE) {

		//zistime id sekcii
	$zistiId = mysql_query('SELECT menu_id, menu_url
								FROM menu
								WHERE menu_url ="' . mysql_real_escape_string($sekciaa) . '" ');
	if (mysql_num_rows($zistiId) != '0') {
		$idRozbal = mysql_fetch_array($zistiId);
		$idSekcia = $idRozbal['menu_id'];
		$sekciaN = $idRozbal['menu_url'];



		#POCET CLANKOV
		$pocet = mysql_query('SELECT COUNT(clanok_id) AS pocet, clanok_id ,clanok_date, clanok_url, clanok_obrazok clanok_titul, clanok_pocet, clanok_paci, clanok_nepaci, c.clanok_perex, m.menu_rodic_id, m.menu_nazov , c.uzivatel_id, u.user_id, u.meno, m.menu_url, meno_url
	            FROM clanky c JOIN user u ON c.uzivatel_id = u.user_id
	                        JOIN menu m ON c.menu_id = m.menu_id
	            WHERE m.menu_rodic_id ="' . mysql_real_escape_string($idSekcia) . '"
	            ORDER BY clanok_date DESC ');
		$pocetUkaz = mysql_fetch_array($pocet);
		$pocetRiadkov = $pocetUkaz['pocet'];
		mysql_free_result($pocet);
		#####################################################################################


		#URL STRANA
		require 'admin/komponenty/strankovanie/strankovanie1.php';
		#####################################################################################

		#TLACENIE CLANKOV
		$clanok = mysql_query('SELECT clanok_id ,clanok_date, clanok_url, clanok_obrazok, clanok_titul, clanok_pocet, clanok_paci, clanok_nepaci, c.clanok_perex, m.menu_rodic_id, m.menu_nazov , c.uzivatel_id, u.user_id, u.meno, m.menu_url, meno_url
	            FROM clanky c JOIN user u ON c.uzivatel_id = u.user_id
	                        JOIN menu m ON c.menu_id = m.menu_id
	            WHERE m.menu_rodic_id =' . mysql_real_escape_string($idSekcia) . '
	            ORDER BY clanok_date DESC LIMIT ' . mysql_real_escape_string($zaciatok) . ', ' . mysql_real_escape_string($limit) . ' ');

		$napisUrl = 'menu.php?menu=' . $sekciaa . '&';



		if (mysql_num_rows($clanok) != '0') {
		    while ($riadok = mysql_fetch_assoc($clanok)) {
		        extract($riadok);

		        require 'celyClanok.php';

		    }

		}
		else {
			# NENASIEL CLANOK
			echo 'Ziaden clanok nebol najdeny.';
		}
		mysql_free_result($clanok);


		#URL STRANA
		require 'admin/komponenty/strankovanie/strankovanie2.php';
		#####################################################################################
	}
	else {
			# NENASIEL CLANOK
			echo 'Ziaden clanok nebol najdeny.';
	}
	mysql_free_result($zistiId);

}
elseif (strpos($sekciaa, '/') == TRUE) {

	$zistiId = mysql_query('SELECT menu_id, menu_url
								FROM menu
								WHERE menu_url ="' . mysql_real_escape_string($kategoria) . '" ');

	if (mysql_num_rows($zistiId) != '0') {
		$idRozbal = mysql_fetch_array($zistiId);
		$idKategoria = $idRozbal['menu_id'];
		//$sekciaN = $pocetRozbal['menu_url'];
		$kategoriaN = $pocetRozbal['menu_url'];


		#POCET CLANKOV
		$pocet = mysql_query('SELECT COUNT(clanok_id) AS pocet, clanok_id ,clanok_date, clanok_url, clanok_obrazok, clanok_titul, clanok_pocet, clanok_paci, clanok_nepaci, c.clanok_perex, m.menu_rodic_id, m.menu_nazov , c.uzivatel_id, u.user_id, u.meno, m.menu_url, meno_url
	            FROM clanky c JOIN user u ON c.uzivatel_id = u.user_id
	                        JOIN menu m ON c.menu_id = m.menu_id
	            WHERE m.menu_id ="' . mysql_real_escape_string($idKategoria) . '"
	            ORDER BY clanok_date DESC ');
		$pocetUkaz = mysql_fetch_array($pocet);
		$pocetRiadkov = $pocetUkaz['pocet'];
		mysql_free_result($pocet);
		#####################################################################################


		#URL STRANA
		require 'admin/komponenty/strankovanie/strankovanie1.php';
		#####################################################################################

		#TLACENIE CLANKOV
		$clanok = mysql_query('SELECT clanok_id ,clanok_date, clanok_url, clanok_obrazok, clanok_titul, clanok_pocet, clanok_paci, clanok_nepaci, c.clanok_perex, m.menu_rodic_id, m.menu_nazov , c.uzivatel_id, u.user_id, u.meno, m.menu_url, meno_url
	            FROM clanky c JOIN user u ON c.uzivatel_id = u.user_id
	                        JOIN menu m ON c.menu_id = m.menu_id
	            WHERE m.menu_id =' . mysql_real_escape_string($idKategoria) . '
	            ORDER BY clanok_date DESC LIMIT ' . $zaciatok . ', ' . $limit . ' ');

		$napisUrl = 'menu.php?menu=' . htmlspecialchars($sekcia) . htmlspecialchars($kategoria) . '&';




		if (mysql_num_rows($clanok) != '0') {
		    while ($riadok = mysql_fetch_assoc($clanok)) {
		        extract($riadok);

		        require 'celyClanok.php';

		    }

		}
		else {
			# NENASIEL CLANOK
			echo 'Ziaden clanok nebol najdeny.';
		}
		mysql_free_result($clanok);



		#URL STRANA
		require 'admin/komponenty/strankovanie/strankovanie2.php';
		#####################################################################################

	}
	else {
		# NENASIEL CLANOK
		echo 'Ziaden clanok nebol najdeny.';
	}
	mysql_free_result($zistiId);

}
else {
	header('Location: ../../prihlas.php');
	exit();
}




}








?>
