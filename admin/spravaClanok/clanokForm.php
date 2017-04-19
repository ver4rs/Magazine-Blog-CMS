<?php

# CLANOK FORMY
require '../../db.php';

//session_start();


if (isset($_POST['odoslizmenclanok']) && $_POST['odoslizmenclanok'] == 'Uložiť zmeny' && $_SERVER["REQUEST_METHOD"] == "POST") {


	$clanok_titul = (isset($_POST['clanok_titul'])) ? $_POST['clanok_titul'] : '';
	$clanok_perex = (isset($_POST['clanok_perex'])) ? $_POST['clanok_perex'] : '';
	$clanok_text = (isset($_POST['content'])) ? stripslashes(trim($_POST['content'])) : '';

	$kategory_id = (isset($_POST['sekcia'])) ? $_POST['sekcia'] : '';

	$datumvybraty = (isset($_POST['datumvybraty'])) ? $_POST['datumvybraty'] : '';
	$uzivatel_id = (isset($_POST['uzivatel'])) ? $_POST['uzivatel'] : ''; //vybraty vo forme

	# STARE HODNOTY
	$clanok_datum = (isset($_POST['clanok_datum'])) ? $_POST['clanok_datum'] : '';
	$clanok_id = (isset($_POST['clanok_id'])) ? $_POST['clanok_id'] : '';
	$clanok_obrazok = (isset($_POST['clanok_obrazok'])) ? $_POST['clanok_obrazok'] : '';
	$clanok_url = (isset($_POST['clanok_url'])) ? $_POST['clanok_url'] : '';
	$user_idStary = (isset($_POST['user_idStary'])) ? $_POST['user_idStary'] : ''; //vybraty vo forme ale stary

		  	# ADMIN PRACA    UZIVATEL, DATUM
	  	if (is_numeric($_SESSION['level_id']) AND $_SESSION['level_id'] == 4) {
	  		$user_idStary = $uzivatel_id;
		}
		if (is_numeric($_SESSION['level_id']) AND $_SESSION['level_id'] > 2) {
			$clanok_datum = $datumvybraty;
		}

		# ID UZIVATELA A ULOZENE SESSION RELACIA
		/*
		if ($user_idStary != $_SESSION['user_id'] AND $_SESSION['user_id'] != '0') {
			$user_idStary = $_SESSION['user_id'];
		}
		else {
			$user_idStary = $_SESSION['user_id'];
		}
		*/

	if (empty($clanok_titul) or empty($clanok_perex) or empty($clanok_text) or empty($kategory_id) or empty($user_idStary) or empty($clanok_datum)) {
		$error = 'Nevyplnili ste všetky polia: ';
		if (empty($clanok_titul)) {
			$error .= ' Nadpis článku';
		}
		if (empty($clanok_perex)) {
			$error .= ' Popis článku';
		}
		if (empty($clanok_text)) {
			$error .= ' Text článku';
		}
		if (empty($kategory_id)) {
			$error .= ' Výber kategórie';
		}

		header('Location: ../../spravaClanok.php?uprav=' . $clanok_url . '&error=' . $error);
		exit();

	}
	else {

	  	require '../komponenty/url.php';
  		$clanok_titul_url = seo_url($clanok_titul);

	  	# BOL ZMENENY OBRAZOK
	  	/*
	  	if ($_FILES["file"]["name"] != FALSE) {
	  		require '../komponenty/captchaId.php';
	  		$last_id = $vybrateId;
			require 'novyObrazok.php';
			$clanok_obrazok = $vybrateId;
		}
		*/


		$ces = $_SESSION['user_id'] . '.TXT';
		if (file_exists($ces)) {
			$fh = fopen($ces, 'r');

			$data = File($ces);
			for($i = 0; $i < Count ($data); $i++) {
  				//echo $data[$i];
  				$last_id = $data[$i];
  			}
  			$clanok_obrazok = $last_id;
  		}
		unlink($ces);


	  	$prikaz = 'UPDATE clanky SET
	  				 		clanok_obrazok = "' . mysql_real_escape_string($clanok_obrazok) . '",
	  						clanok_titul = "' . mysql_real_escape_string($clanok_titul) . '",
	  						clanok_perex = "' . mysql_real_escape_string($clanok_perex) . '",
	  						clanok_text = "' . mysql_real_escape_string(stripslashes($clanok_text)) . '",
	  						menu_id = "' . mysql_real_escape_string($kategory_id) . '",
	  						clanok_date = "' . mysql_real_escape_string($clanok_datum) . '",
	  						uzivatel_id = "' . mysql_real_escape_string($user_idStary) . '",
	  						clanok_url = "' . mysql_real_escape_string($clanok_titul_url) . '"
	  				WHERE clanok_id="' . $clanok_id . '"';
	  	$prikaz1 = mysql_query($prikaz)or die(mysql_error());

/*
	if ($_FILES["file"]["name"] != '') {
		if(!$errors) {
	 		//$change=' <div class="msgdiv">Obrazok je ulozeny.</div>';
	 	}

	}
*/
	//************************************************************************************

	$ok = 'Článok bol zmenený.';


	header('Location: ../../spravaClanok.php?ok=' . $ok);
	exit();

	}

}
elseif (isset($_POST['odoslinovyclanok']) && $_POST['odoslinovyclanok'] == 'Uložiť článok' && $_SERVER["REQUEST_METHOD"] == "POST") {


	$damumvybraty = (isset($_POST['damumvybraty'])) ? $_POST['damumvybraty'] : '';

	$clanok_titul = (isset($_POST['clanok_titul'])) ? $_POST['clanok_titul'] : '';
	$clanok_perex = (isset($_POST['clanok_perex'])) ? $_POST['clanok_perex'] : '';
	$clanok_text = (isset($_POST['content'])) ? stripslashes(trim($_POST['content'])) : '';

	$kategory_id = (isset($_POST['sekcia'])) ? $_POST['sekcia'] : '';
	$uzivatel_id = (isset($_POST['uzivatel_id'])) ? $_POST['uzivatel_id'] : '';






	if (empty($clanok_titul) or empty($clanok_perex) or empty($clanok_text) or empty($kategory_id) or empty($uzivatel_id)) {
		$error = 'Nevyplnili ste všetky polia: ';
		if (empty($clanok_titul)) {
			$error = ' Nadpis článku ';
		}
		if (empty($clanok_perex)) {
			$error = ' Popis článku ';
		}
		if (empty($clanok_text)) {
			$error = ' Text článku ';
		}
		if (empty($kategory_id)) {
			$error = ' Výber kategórie ';
		}
		if (empty($uzivatel_id)) {
			$error = ' Nemaš meno ';
		}

		header('Location: ../../spravaClanok.php?nova=clanok&error=' . $error);
		exit();
	}
	else {

		# URL ADRESU CLANKU VYTORIME
	  	require '../komponenty/url.php';
	  	$clanok_titul_url = seo_url($clanok_titul);

	  	# MAME AJAX UPLOAD OBRAZOK

	  	# ID OBRAZKA VYTVORIME
	  	//require '../komponenty/captchaId.php';
	  	//$last_id = $vybrateId;

		$ces = $_SESSION['user_id'] . '.TXT';
		if (file_exists($ces)) {
			$fh = fopen($ces, 'r');

			$data = File($ces);
			for($i = 0; $i < Count ($data); $i++) {
  				//echo $data[$i];
  				$last_id = $data[$i];
  			}
  		}
		unlink($ces);

		# ID UZIVATELA A ULOZENE SESSION RELACIA
		if ($uzivatel_id != $_SESSION['user_id'] AND $_SESSION['user_id'] != '0') {
			$uzivatel_id = $_SESSION['user_id'];
		}
		else {
			$uzivatel_id = $_SESSION['user_id'];
		}

	  	# DATUM PODLA
	  	if (is_numeric($_SESSION['level_id']) AND $_SESSION['level_id'] > 2 AND isset($damumvybraty)) {
			$damumvybraty = $damumvybraty;
		}
		else {
			$damumvybraty = date('Y-n-j G:i:s');
		}

	  	$prikaz = 'INSERT INTO clanky(clanok_id, clanok_titul, clanok_perex, clanok_text, menu_id, clanok_date, uzivatel_id, clanok_url, clanok_obrazok)
	  				VALUES (NULL,
	  						"' . mysql_real_escape_string($clanok_titul) . '",
	  						"' . mysql_real_escape_string($clanok_perex) . '",
	  						"' . mysql_real_escape_string(stripslashes($clanok_text)) . '",
	  						"' . mysql_real_escape_string($kategory_id) . '",
	  						"' . mysql_real_escape_string($damumvybraty) . '",
	  						"' . mysql_real_escape_string($uzivatel_id) . '",
	  						"' . mysql_real_escape_string($clanok_titul_url) . '",
	  						"' . mysql_real_escape_string($last_id) . '")';
	  	$prikaz1 = mysql_query($prikaz)or die(mysql_error());

	  	//require 'novyObrazok.php';     /*      upload OBRAZOK         */

		//if(!$errors) {
	 		//$change=' <div class="msgdiv">Obrazok je ulozeny.</div>';
		//}

		$ok = 'Článok bol napísaný.';
		header('Location: ../../spravaClanok.php?ok=' . $ok);
		exit();

	}


}
elseif (isset($_POST['odosliclanokvymaz']) && $_POST['odosliclanokvymaz'] == 'Zmazať článok') {

	$clanok_url = (isset($_POST['clanok_url'])) ? $_POST['clanok_url'] : '';


	$uloz = 'SELECT clanok_id FROM clanky WHERE clanok_url="' . $clanok_url . '" ';
	$uloz1 = mysql_query($uloz)or die(mysql_error());

	$riadok = mysql_fetch_array($uloz1);
	$clanok_id = $riadok['clanok_id'];

	$nac = 'DELETE FROM clanky WHERE clanok_url="' . mysql_real_escape_string($clanok_url) .'" ';
	$nac1 = mysql_query($nac)or die(mysql_error());

	$kom = 'DELETE FROM komentar WHERE clanok_id="' . mysql_real_escape_string($clanok_id) . '" ';
	$kom1 = mysql_query($kom)or die(mysql_error());
	mysql_free_result($uloz1);

  	$ok = 'Clánok bol zmazaný';

	header('Location: ../../spravaClanok.php?ok=' . $ok);
	exit();

}
else {
	header('Location: ../../spravaClanok.php');
	exit();
}





?>
