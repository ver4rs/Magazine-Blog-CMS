<?php


$komu_email = 'ver4rs@gmail.com';  //komu
	$od_koho_email = 'martin5611@azet.sk';  //od koho


	$hlavicka_email = array();
	$hlavicka_email[] = 'MIME-Version: 1.0';
	$hlavicka_email[] = 'Content-type: text/html; charset="window-1250"';
	$hlavicka_email[] = 'Content-Transfer-Encoding: 7bit';
	$hlavicka_email[] = 'From: ' . $od_koho_email;

	$text_email = '<html><h2>Kukol stranku mobilai sponzor websupport </h2> </br><p>Kukol stranku mobilai sponzor websupport a je to a teraz ci odpovie !!!</p></html>';

	$predmet_email = 'Kukol stranku mobilai sponzor websupport';



	$odosli_email = mail($komu_email, $predmet_email, $text_email, join("\r\n", $hlavicka_email));
/*
	if ($odosli_email) {
		echo 'Email bol odoslany ';
	}
	*/

	header('Location: /');
	exit();
/*
$conn = ftp_connect("http://webftp2.endora.cz") or die("Could not connect");
ftp_login($conn,"ver4rs","jebnutyclovek");
if (ftp_login($conn,"ver4rs","jebnutyclovek") == true) {
	echo 'prihlaseny';
}
else {
	echo 'smola';
}
*/
?>

