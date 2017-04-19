<?php

# WEB
//require 'db.php';
$db = mysql_connect('localhost', 'ver4rs', 'jebnutyclovek')or die(mysql_error());
mysql_select_db('elektrobattery', $db)or die(mysql_error());

# ULOZENE EMAILY
/*
$db1 = mysql_connect('localhost', 'ver4rs', 'jebnutyclovek')or die(mysql_error());
mysql_select_db('veremail', $db1)or die(mysql_error());
*/

$nula = 0;

$clanokOdkaz = 0;
$clanokNovy = 0;
$clanokNovyPocet = 2;  //  V DB BUDE NAVYBER

$text_email = ' ';


$email = mysql_query('SELECT clanok_id, clanok_date, clanok_titul, clanok_url, clanok_perex, clanok_obrazok, clanok_poslany
	FROM clanky WHERE clanok_poslany ="' . mysql_real_escape_string($nula) . '" ORDER BY clanok_date ASC LIMIT 0,10 ');


$db1 = mysql_connect('localhost', 'ver4rs', 'jebnutyclovek')or die(mysql_error());
mysql_select_db('veremail', $db1)or die(mysql_error());

if (mysql_num_rows($email) != '0') {
	# POSLEME KAYDEMU


			# TLAC EMAILY

			$text_email .= '<html style="background: #EFEFEF; width: 100%;">
				<title>InfoNews World</title>
				<a href="http://mobilai.cz" style="text-decoration: none;"><h3 style="text-align: center; color: #454545; font-family: sans-serif">InfoNews World - Aktuality z našej planéty</h3></a>
				<center><img src="http://mobilai.cz/obrazky/logo2.jpg"></center>';


			while ($riadok_email = mysql_fetch_array($email)) {
				# TLACENIE DO POLA
				$clanokNovy +=1;
				if ($clanokNovy == '1') {
					$clanok_id = $riadok_email['clanok_id'];
				}

				if ($clanokNovy <= $clanokNovyPocet) {
					# POCET CLANOK S OBRAZOM

					$text_email .= '<div style="display: block; max-width: 500px; font-family: sans-serif;height: 150px;">
					<h4><a href="http://mobilai.cz/clanok.php?clanok='. urlencode($riadok_email['clanok_url']) . '" style="text-decoration: none; color: red; font-size: 20px;">' . htmlspecialchars($riadok_email['clanok_titul']) .' </a></h4>
					<span style="float:left; width: 200px;">

					<a href="http://mobilai.cz/clanok.php?clanok=' . urlencode($riadok_email['clanok_url']) . '"><img src="http://mobilai.cz/admin/obrazok/clanok/mini/' . urlencode($riadok_email['clanok_obrazok'])  . '.jpg" title="" alt="" style=""></a>
					</span>
					<span style="float:right; max-width: 300px;">'. htmlspecialchars($riadok_email['clanok_perex']) . '</span>
					</div>';

				}
				else {
					# OSTATNE CLANKY ODKAZY
					if ($clanokNovy == ($clanokNovyPocet+1)) {
						# NAPISEME NEJAKZY TEXT ODDELENIE CLANKOV

						$text_email .= '<h3 style="color: #252525; font-family: sans-serif;">Ďalšie zaujímavé odkazy</h3>';

					}

					$text_email .= '<h4 style="font-family: sans-serif"><a href="http://mobilai.cz/clanok.php?clanok=' . urlencode($riadok_email['clanok_url']) . '" style="text-decoration: none; ">' . htmlspecialchars($riadok_email['clanok_titul']) . '</a></h4>';

				}

				# POSIELANIE EMAILU


			}

			$text_email .= '<p>Potrebujete pomoc, neviete si s niečim radi napíšte mi. Máte nápad s vylepšením. Môžete mi napísať na email <a href="mailto:ver4rs@gmail.com">ver4rs@gmail.com</a>. </br>Tento email bol zaslaný automaticky.Na tento email neodpovedajte!</p>
			</html>';

			# MAIL

			# NACITANIE EMAILOV
			$nac_email = mysql_query('SELECT email_id, email_meno FROM email ORDER BY rand(email_id) LIMIT 0,90');
			if (mysql_num_rows($nac_email) != '0') {
				# SU EMAILY
				while ($riadok_posli = mysql_fetch_array($nac_email)) {

					$komu_email = $riadok_posli['email_meno']; //'martin5611@azet.sk';  //komu $riadok_posli['email_meno'];
					$od_koho_email = 'ver4rs@gmail.com';  //od koho


					$hlavicka_email = array();
					$hlavicka_email[] = 'MIME-Version: 1.0';
					$hlavicka_email[] = 'Content-type: text/html; charset="UTF-8"';
					$hlavicka_email[] = 'Content-Transfer-Encoding: 7bit';
					//$hlavicka_email[] = 'From: ' . $od_koho_email; odosle kazdemu zakaznik@srv6.endora.cz


					$predmet_email = 'Magazín o mobilných systémoch, IT a nejakou umelou inteligenciou a pre zábavu aj robotika';



					$odosli_email = mail($komu_email, $predmet_email, $text_email, join("\r\n", $hlavicka_email));

					if ($odosli_email) {
						echo 'Email bol odoslany.komu ' . $komu_email;
						$A +=1;
						$zmen = mysql_query('UPDATE clanky SET clanok_poslany =1 WHERE clanok_id ="' . mysql_real_escape_string($clanok_id) . ' " ');
					}



				}
			}
			else {
				# NIEJE ZIADNY EMAIL

			}



}
else {
	# UZ NIEJE ZIADNY EMAIL
	# NAPIS
	echo 'Je nula';
}
mysql_query($email);

mysql_close($db);
mysql_close($db1);

echo $text_email;
/*
$komu_email = 'vojtek.klaudia@gmail.com';  //komu
	$od_koho_email = 'vojtek.klaudia@gmail.com';  //od koho


	$hlavicka_email = array();
	$hlavicka_email[] = 'MIME-Version: 1.0';
	$hlavicka_email[] = 'Content-type: text/html; charset="window-1250"';
	$hlavicka_email[] = 'Content-Transfer-Encoding: 7bit';
	$hlavicka_email[] = 'From: ' . $od_koho_email;

	$text_email = '<html><h2>Dobrý den Kristián,</h2> </br><p>Nezabudnite sa naučiť na pondelok tému. Skúšam !!!</p></html>';

	$predmet_email = 'Dobrý den ....';



	$odosli_email = mail($komu_email, $predmet_email, $text_email, join("\r\n", $hlavicka_email));

	if ($odosli_email) {
		echo 'Email bol odoslany.komu ' . $komu_email;
	}
*/


?>

