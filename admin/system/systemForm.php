<?php

# CLANOK FORMY
require '../../db.php';

//session_start();


if (isset($_POST['submit']) AND $_POST['submit'] == 'Uložit nastavenia') {


	$sprava_nadpis1 = (isset($_POST['sprava_nadpis1'])) ? $_POST['sprava_nadpis1'] : '';
	$sprava_nadpis2 = (isset($_POST['sprava_nadpis2'])) ? $_POST['sprava_nadpis2'] : '';
	$sprava_titul = (isset($_POST['sprava_titul'])) ? $_POST['sprava_titul'] : '';
	$sprava_popis = (isset($_POST['sprava_popis'])) ? $_POST['sprava_popis'] : '';
	$sprava_komentar = (isset($_POST['sprava_komentar'])) ? $_POST['sprava_komentar'] : '';
	$sprava_strankovanie = (isset($_POST['sprava_strankovanie'])) ? $_POST['sprava_strankovanie'] : '';
	$sprava_slider = (isset($_POST['sprava_slider'])) ? $_POST['sprava_slider'] : '';

	$taKed = 0;

	if ($sprava_komentar == 'on') {
		$sprava_komentar = '1';
	}
	else {
		$sprava_komentar = '0';
	}

	if (!is_numeric($sprava_strankovanie) or empty($sprava_strankovanie) or !is_numeric($sprava_slider) or empty($sprava_slider)) {
		# NIEJE
		$error = 'Musí byť číselná hodnota.';
		$taKed =1;
		header('Location: ../../spravaSystem.php?error=' . urlencode($error));
		exit();
	}

	if (empty($sprava_popis) or empty($sprava_titul) or empty($sprava_nadpis1) or empty($sprava_nadpis2)) {
		# NIEJE NIC NAPISANE
		$error = 'Niektoré polia niesú vyplnené.';
		$taKed = 1;
		header('Location: ../../spravaSystem.php?error=' . urlencode($error));
		exit();
	}

	if ($taKed == '0') {


		$zapis = mysql_query('UPDATE sprava SET sprava_titul ="' . mysql_real_escape_string($sprava_titul) . '",
											sprava_komentar ="' . mysql_real_escape_string($sprava_komentar) . '",
											sprava_strankovanie ="' . mysql_real_escape_string($sprava_strankovanie) . '",
											sprava_slider ="' . mysql_real_escape_string($sprava_slider) . '",
											sprava_popis ="' . mysql_real_escape_string($sprava_popis) . '",
											sprava_nadpis_1 ="' . mysql_real_escape_string($sprava_nadpis1) . '",
											sprava_nadpis_2 ="' . mysql_real_escape_string($sprava_nadpis2) . '" ');
		$ok = 'Údaje boli zmenené.';
		header('Location: ../../spravaSystem.php?ok=' . $ok);
		exit();

	}
	else {
		# PRE ISTOTU
		$error = 'Niečo nebolo vyplnené.';
		header('Location: ../../spravaSystem.php?error=' . urlencode($error));
		exit();
	}


}
elseif (isset($_POST['odnok']) && $_POST['odoanok'] == 'Uložánok' && $_SERVER["REQUEST_METHOD"] == "POST") {


}
else {
	header('Location: ../../spravaSystem.php');
	exit();
}





?>
