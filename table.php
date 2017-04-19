<?php

require("PHPMailer-master/class.phpmailer.php"); // voláme súbor

$mail = new PHPMailer(); //instancia PHPMaileru

$mail->From = "ver4rs@gmail.com"; //moja adresa
$mail->FromName = "Malak Laknfhh"; //moje meno

$mail->AddAddress("martin5611@azet.sk"); //Vas mail komu

$mail->WordWrap = 50;                                 // po 50 znaku slova rozdel slovo
$mail->IsHTML(true);
//$mail->Charset = "utf-8";

$mail->Subject = "Breza je strom zeleny!";
$mail->Body    = "Hlavný dôvod prečo priaznivci Apple výrobkou vyhľadavajú smartfóny je výborná možnosť prezerať knihy v iBook aplikácii. Vcelom systéme nájdete najme slovenské a české knihy. Potom stači prevracať";
//$mail->AltBody = "Používate chabého klienta, takže nevyhrávate ani len link na poriadneho!";

if(!$mail->Send())
{
   echo "Správa nebola zaslaná. <p>";
   echo "Nastala chyba: " . $mail->ErrorInfo;
   exit;
}

echo "Správa úspešne zaslaná";


/*
$komu_email = 'ver4rs@gmail.com';  //komu
	$od_koho_email = 'martin5611@azet.sk';  //od koho


	$hlavicka_email = array();
	$hlavicka_email[] = 'MIME-Version: 1.0';
	$hlavicka_email[] = 'Content-type: text/html; charset="window-1250"';
	$hlavicka_email[] = 'Content-Transfer-Encoding: 7bit';
	$hlavicka_email[] = 'From: ' . $od_koho_email;

	$text_email = '<html><h2>Kukol stranku mobilai sponzor exohosting</h2> </br><p>Kukol stranku mobilai sponzor exo wehostinga je to a teraz ci odpovie !!!</p></html>';

	$predmet_email = 'Kukol stranku Mobilai sponzor exo';



	$odosli_email = mail($komu_email, $predmet_email, $text_email, join("\r\n", $hlavicka_email));
/*
	if ($odosli_email) {
		echo 'Email bol odoslany ';
	}
	*/
/*
	header('Location: /');
	exit();
*/
?>

