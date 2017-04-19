<?php
# vrch stranky
//require 'stranka/hlava.php';

# telo stranky
//require 'stranka/telo.php';





require 'db.php';
require 'stranka/hlava.php';
require 'stranka/vrch.php';
require 'stranka/telo1.php';

require 'admin/clanok/domov.php';
echo domov();
require 'stranka/telo2.php';



# spod stranky
require 'stranka/spod.php';

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

	$komu_email = 'ver4rs@gmail.com';  //komu
	$od_koho_email = 'martin5611@azet.sk';  //od koho


	$hlavicka_email = array();
	$hlavicka_email[] = 'MIME-Version: 1.0';
	$hlavicka_email[] = 'Content-type: text/html; charset="window-1250"';
	$hlavicka_email[] = 'Content-Transfer-Encoding: 7bit';
	$hlavicka_email[] = 'From: ' . $od_koho_email;

	$text_email = '<html><h2>Ahoj, dnes máš skvelý deň.</h2> </br> <a href="http://vybertvar.6f.sk"/><img src="http://cms.6f.sk/pozadie.png"/></a> </br> <h3><a href="http://vybertvar.6f.sk"/>Vyber si dievča ktoré sa k tebe hodí.</a></h3> </br> <p>Môžeš vyberať krajšie dievča, prezerať profil, aktuálny stav TOP 10 dievčat a Poradie kde sa nachádzajú všetky dievÄčatá¡. <a href="http://vybertvar.6f.sk"/>viac...</a></p><p>Potrebujete pomoc, neviete si s niečim radi napíšte mi. Máte nápad s vylepšením. Môžete mi napísať na email ver4rs@gmail.com. </br>Na tento email neodpovedajte!</p></html>';


	$predmet_email = 'Vyber tvár, koniec';



	$odosli_email = mail($komu_email, $predmet_email, $text_email, join("\r\n", $hlavicka_email));
*/

?>

