<?php

//$hlavaStranka = htmlspecialchars(ucfirst(substr($_SERVER['SERVER_NAME'], 4)));

# $hlavaStranka  nazov meno domeny stranka Mobilai.cz
# $hlavaTitul  nazov titul stranky, title
# $hlavaPopis  popis stranky, description
# $hlavaObrazok  obrazok stranky, favicon

$obrazokCesta = 'obrazky/logo2.jpg';

if (strlen($_SERVER['SERVER_NAME']) > 10 ) {
	# MOZE BYT je tam www.   -4znaky
	$hlavaStranka = htmlspecialchars(ucfirst(substr($_SERVER['SERVER_NAME'], 4)));
}
else {
	# bez www.
	$hlavaStranka = htmlspecialchars(ucfirst($_SERVER['SERVER_NAME']));
}
//echo $hlavaStranka;

if (isset($_SERVER['PHP_SELF'])) {


	if ($_SERVER['PHP_SELF'] == '/index.php') {
		# DOMOV
		# ZADAM HO NACITAM
		$ziskajTitul = mysql_query('SELECT sprava_titul, sprava_popis FROM sprava ');
		if (mysql_num_rows($ziskajTitul) != '0') {
			# JE NAPISANE
			$ziskajTitulTlac = mysql_fetch_array($ziskajTitul);
			$hlavaTitul = htmlspecialchars($ziskajTitulTlac['sprava_titul'])  . ' l ' . $hlavaStranka;
			$hlavaPopis = htmlspecialchars($ziskajTitulTlac['sprava_popis'])  . ' l ' . $hlavaStranka;
			$hlavaObrazok = htmlspecialchars(urlAdresa . $obrazokCesta);
		}
		else {
			$hlavaTitul = $_SERVER['SERVER_NAME']  . ' l ' . $hlavaStranka;
			$hlavaPopis = $_SERVER['SERVER_NAME']  . ' l ' . $hlavaStranka;
			$hlavaObrazok = htmlspecialchars(urlAdresa . $obrazokCesta);
		}
		mysql_free_result($ziskajTitul);
	}
	elseif ($_SERVER['PHP_SELF'] == '/menu.php') {

		if (strpos($_GET['menu'], '/') == FALSE) {
			# SEKCIA
			$tu = mysql_query('SELECT menu_id, menu_nazov, menu_url FROM menu WHERE menu_url ="' . mysql_real_escape_string($_GET['menu']) . '" ');
			if (mysql_num_rows($tu) != '0') {
				$tuToto = mysql_fetch_array($tu);
				$hlavaTitul = htmlspecialchars($tuToto['menu_nazov'])  . ' l ' . $hlavaStranka;
				$hlavaPopis = htmlspecialchars($tuToto['menu_nazov'])  . ' l ' . $hlavaStranka;
				$hlavaObrazok = htmlspecialchars(urlAdresa . $obrazokCesta);
			}
			else {
				$hlavaTitul = $_SERVER['SERVER_NAME']  . ' l ' . $hlavaStranka;
				$hlavaPopis = $_SERVER['SERVER_NAME']  . ' l ' . $hlavaStranka;
				$hlavaObrazok = htmlspecialchars(urlAdresa . $obrazokCesta);
			}
			mysql_free_result($tu);
		}
		else {
			#KATEGORIA
			$totoKat = substr($_GET['menu'], strpos($_GET['menu'], '/')+1);
			$totoSek = substr($_GET['menu'], 0, -(strlen($_GET['menu']) - strpos($_GET['menu'], '/')));

			$tu = mysql_query('SELECT menu_id, menu_nazov, menu_url FROM menu WHERE menu_url ="' . mysql_real_escape_string($totoKat) . '" ');

			if (mysql_num_rows($tu) != '0') {
				#JE EXISTUJE
				$tuToto = mysql_fetch_array($tu);
				$tutu = mysql_query('SELECT menu_id, menu_nazov, menu_url FROM menu WHERE menu_url ="' . mysql_real_escape_string($totoSek) . '" ');

				if (mysql_num_rows($tutu) != '0') {
					$tutuToto = mysql_fetch_array($tutu);
					$hlavaTitul = htmlspecialchars($tutuToto['menu_nazov']) . ' - ' . htmlspecialchars($tuToto['menu_nazov'])  . ' l ' . $hlavaStranka;
					$hlavaPopis = htmlspecialchars($tutuToto['menu_nazov']) . ' - ' . htmlspecialchars($tuToto['menu_nazov'])  . ' l ' . $hlavaStranka;
					$hlavaObrazok = htmlspecialchars(urlAdresa . $obrazokCesta);
				}
				else {
					$hlavaTitul = $_SERVER['SERVER_NAME']  . ' l ' . $hlavaStranka;
					$hlavaPopis = $_SERVER['SERVER_NAME']  . ' l ' . $hlavaStranka;
					$hlavaObrazok = htmlspecialchars(urlAdresa . $obrazokCesta);
				}
				mysql_free_result($tutu);
			}
			mysql_free_result($tu);
		}
	}
	elseif ($_SERVER['PHP_SELF'] == '/vyhladaj.php') {
	# HLADAJ
		$hlavaTitul = 'Hľadám ' . htmlspecialchars($_GET['hladaj']) . ' l ' . $hlavaStranka;
		$hlavaPopis = 'Hľadám ' . htmlspecialchars($_GET['hladaj']) . ' l ' . $hlavaStranka;
		$hlavaObrazok = htmlspecialchars(urlAdresa . $obrazokCesta);
	}
	elseif ($_SERVER['PHP_SELF'] == '/archiv.php') {
		# ARCHIV OBDOBIE ALEBO DATUM
		if ($_GET['archiv'] == 'obdobie') {
			# OBDOBIE
			$hlavaTitul = 'archív ' . htmlspecialchars($_GET['archiv'])  . ' l ' . $hlavaStranka;
			$hlavaPopis = 'archív ' . htmlspecialchars($_GET['archiv'])  . ' l ' . $hlavaStranka;
			$hlavaObrazok = htmlspecialchars(urlAdresa . $obrazokCesta);
		}
		else {
			# DATUM
			$hlavaTitul = 'archív ' . htmlspecialchars($_GET['archiv'])  . ' l ' . $hlavaStranka;
			$hlavaPopis = 'archív ' . htmlspecialchars($_GET['archiv'])  . ' l ' . $hlavaStranka;
			$hlavaObrazok = htmlspecialchars(urlAdresa . $obrazokCesta);
		}
	}
	elseif ($_SERVER['PHP_SELF'] == '/clanok.php') {
	# CLANOK
		$toto = mysql_query('SELECT clanok_url, clanok_titul, clanok_id, clanok_perex, clanok_obrazok FROM clanky WHERE clanok_url="' . mysql_real_escape_string($_GET['clanok']) . '" ');
		if (mysql_num_rows($toto) != '0') {
			# EXISTUJE
			$totoTu = mysql_fetch_array($toto);
			$hlavaTitul = htmlspecialchars($totoTu['clanok_titul']) . ' l ' . $hlavaStranka;
			$hlavaPopis = htmlspecialchars($totoTu['clanok_perex']) . ' l ' . $hlavaStranka;
			$hlavaObrazok = htmlspecialchars(urlAdresa . 'admin/obrazok/clanok/mini/' . $totoTu['clanok_obrazok'] . '.jpg');
		}
		else {
			# NENASIEL SA
			$hlavaTitul = $hlavaStranka;
			$hlavaPopis = $hlavaStranka;
			$hlavaObrazok = htmlspecialchars(urlAdresa . $obrazokCesta);
		}
		mysql_free_result($toto);
	}
	elseif ($_SERVER['PHP_SELF' == '/profil.php']) {
	# PROFIL
		$toto = mysql_query('SELECT user_id, meno, meno_url, user_obrazok FROM user WHERE meno_url = "' . mysql_real_escape_string($_GET['uzivatel']) . '" AND user_id = "' . mysql_real_escape_string($_GET['cislo']) . '" ');
		if (mysql_num_rows($toto) != '0') {
			# EXISTUJE
			$totoTu = mysql_fetch_array($toto);
			$hlavaTitul = htmlspecialchars('Meno uživateľa ' . $totoTu['meno'] . ' l ' . $hlavaStranka);
			$hlavaPopis = htmlspecialchars('Meno uživateľa ' . $totoTu['meno'] . ' l ' . $hlavaStranka);
			$hlavaObrazok = htmlspecialchars(urlAdresa . 'admin/uzivatel/normal/' . $totoTu['user_obrazok'] . '.jpg');
		}
		else {
			$hlavaTitul = $hlavaStranka;
			$hlavaPopis = $hlavaStranka;
			$hlavaObrazok = htmlspecialchars(urlAdresa . $obrazokCesta);
		}
		mysql_free_result($toto);
	}
	else {
		# NIC NEBUDE
		$hlavaTitul = 'Rozhranie' . ' l ' . $hlavaStranka;
		$hlavaPopis = 'Rozhranie' . ' l ' . $hlavaStranka;
		$hlavaObrazok = htmlspecialchars(urlAdresa . $obrazokCesta);
	}
}
else {
	$hlavaTitul = $hlavaStranka;
	$hlavaPopis = $hlavaStranka;
	$hlavaObrazok = htmlspecialchars(urlAdresa . $obrazokCesta);
}


?>
