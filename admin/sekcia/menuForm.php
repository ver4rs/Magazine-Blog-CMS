<?php

#SEKCIE A KATEGORIE FORMY
require '../../db.php';

session_start();


if (isset($_POST['odosli']) && $_POST['odosli'] == 'Zmeniť názov') {

	$sekcia_nazov = (isset($_POST['sekcia_nazov'])) ? $_POST['sekcia_nazov'] : '0';
	$sekcia_id = (isset($_POST['sekcia_id'])) ? $_POST['sekcia_id'] : '';
	$sekcia_na = (isset($_POST['sekciaUrl'])) ? $_POST['sekciaUrl'] : '';



	require '../komponenty/url.php';
	$sekcia_url = seo_url($sekcia_nazov);

	if (empty($sekcia_nazov)) {
		$error = 'Nebol zadaný názov.';
		header('Location: ../../spravaMenu.php?uprav=' . $sekcia_na . '&error=' . $error);
		exit();
	}
	else {

		$nac = 'UPDATE menu SET
						menu_nazov = "' . mysql_real_escape_string($sekcia_nazov) . '",
						menu_url = "' . mysql_real_escape_string($sekcia_url) . '"
					WHERE menu_id ="' . mysql_real_escape_string($sekcia_id) . '" ';
		$nac1 = mysql_query($nac)or die(mysql_error());

  		$ok = 'Názov bol zmenený.';
		header('Location: ../../spravaMenu.php?uprav=' . $sekcia_url . '&ok=' . $ok);
		exit();
	}

}
elseif (isset($_POST['odoslkat']) && $_POST['odoslkat'] == 'Zmeniť názov') {
		//ziskane hodnoty
		$kategoria_nazov = (isset($_POST['kategoria_nazov'])) ? $_POST['kategoria_nazov'] : '0';
		$sekcia_id = (isset($_POST['sekcia'])) ? $_POST['sekcia'] : '';
		//umela stara url nazov
		$kategoriaUrlstara = (isset($_POST['kategoriaUrlstara'])) ? $_POST['kategoriaUrlstara'] : '';
		//umela stare aj nove id kategorie vzdy take iste
		$kategoriaMenuId = (isset($_POST['kategoriaMenuId'])) ? $_POST['kategoriaMenuId'] : '';

		require '../komponenty/url.php';
		$kategoria_url = seo_url($kategoria_nazov);
		//echo $kategoria_nazov . '<br>' . $sekcia_id . '<br>' . $kategory_id . '<br>' . $kategoria_url;

		if (empty($kategoria_nazov) or empty($sekcia_id)) {
			$error = 'Nebol zadaný názov.';
			header('Location: ../../spravaMenu.php?uprav=' . $kategoriaUrlstara . '&error=' . $error);
			exit();

		}
		else {


			$nac = 'UPDATE menu SET
							menu_nazov = "' . mysql_real_escape_string($kategoria_nazov) . '",
							menu_url = "' . mysql_real_escape_string($kategoria_url) . '",
							menu_rodic_id = "' . mysql_real_escape_string($sekcia_id) . '"
						WHERE menu_id ="' . mysql_real_escape_string($kategoriaMenuId) . '"';
			$nac1 = mysql_query($nac)or die(mysql_error());


	  		$ok = 'Názov bol zmenený.';

			header('Location: ../../spravaMenu.php?uprav=' . $kategoria_url . '&ok=' . $ok);
			exit();


		}



}
elseif (isset($_POST['odosliNovaSekcia']) && $_POST['odosliNovaSekcia'] == 'Naozaj vytvoriť') {

	$sekcia_nazov = (isset($_POST['sekcia_nazov'])) ? $_POST['sekcia_nazov'] : '0';

	if (empty($sekcia_nazov)) {

		$error = 'Nebol zadaný názov.';
		header('Location: ../../spravaMenu.php?nova=sekcia&error=' . $error);
		exit();
	}
	else {

		require '../komponenty/url.php';
		$sekcia_url = seo_url($sekcia_nazov);

		$prikaz = 'INSERT INTO menu(menu_id, menu_nazov, menu_url, menu_rodic_id)
								VALUES (NULL,
										"' . mysql_real_escape_string($sekcia_nazov) . '",
										"' . mysql_real_escape_string($sekcia_url) . '",
										0)';
		$prikaz1 = mysql_query($prikaz)or die(mysql_error());

	  	$ok = 'Sekcia bola vytvorená.';

		header('Location: ../../spravaMenu.php?ok=' . $ok);
		exit();
	}


}
elseif (isset($_POST['odosliNovaKategoria']) && $_POST['odosliNovaKategoria'] == 'Vytvoriť') {

		$kategoria_nazov = (isset($_POST['kategoria_nazov'])) ? $_POST['kategoria_nazov'] : '0';
		$sekcia_id = (isset($_POST['sekcia'])) ? $_POST['sekcia'] : '0';

		if (empty($kategoria_nazov) or empty($sekcia_id)) {
			$error = 'Neboli zadané všetky údaje.';
			header('Location: ../../spravaMenu.php?nova=kategoria&error=' . $error);
			exit();
		}
		else {

			require '../komponenty/url.php';
			$kategoria_url = seo_url($kategoria_nazov);

			$zapis = 'INSERT INTO menu (menu_id, menu_nazov, menu_url, menu_rodic_id)
						VALUES (NULL,
								"' . mysql_real_escape_string($kategoria_nazov) . '",
								"' . mysql_real_escape_string($kategoria_url) . '",
								"' . mysql_real_escape_string($sekcia_id) . '")';
			$zapis1 = mysql_query($zapis)or die(mysql_error());

	  		$ok = 'Kategória bola vytvorena.';

			header('Location: ../../spravaMenu.php?ok=' . $ok);
			exit();
		}

}
elseif (isset($_POST['zmazatkategoria']) && $_POST['zmazatkategoria'] == 'zmazať') {

	$kategoriaNazov = (isset($_POST['kategoriaNazov'])) ? $_POST['kategoriaNazov'] : '0';

	$nac = 'DELETE FROM menu WHERE menu_url="' . $kategoriaNazov .'"';
	$nac1 = mysql_query($nac)or die(mysql_error());

  	$ok = 'Kategória bola zmazaná.';

	header('Location: ../../spravaMenu.php?ok=' . $ok);
	exit();

}
elseif (isset($_POST['zmazatsekcia']) && $_POST['zmazatsekcia'] == 'zmazať') {

	$sekciaNazov = (isset($_POST['sekciaNazov'])) ? $_POST['sekciaNazov'] : '0';

/*
	$nacitaj = 'SELECT menu_id, menu_nazov
					FROM menu
						LEFT JOIN kategoria k ON s.sekcia_id = k.sekcia_id';
	$nacitaj1 = mysql_query($nacitaj)or die(mysql_error());

	if (mysql_num_rows($nacitaj1) != '0') {
		$riadok = mysql_fetch_array($nacitaj1);
		$vymaz = 'DELETE FROM kategoria WHERE sekcia_id="' . $sekciaNazov . '"';
		$nac1 = mysql_query($vymaz)or die(mysql_error());
	}
	mysql_free_result($nacitaj1);
*/
	$nac = 'DELETE FROM menu WHERE menu_nazov="' . mysql_real_escape_string($sekciaNazov) .'"';
	$nac1 = mysql_query($nac)or die(mysql_error());

  	$ok = 'Sekcia bola zmazaná.';

	header('Location: ../../spravaMenu.php?ok=' . $ok);
	exit();

}
else {
	header('Location: ../../spravaMenu.php');
	exit();
}





?>
