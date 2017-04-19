<?php


require '../../db.php';


//session_start();


/*
if (isset($_SESSION['user_id'])) {
	//echo '<h1>Nepovoleny pristup</h1>';

	header("location: index.php");
	exit();
}
*/



	if ($_POST['odosli'] == 'Prihlásiť') {

		#PRIHLASENIE

		//filtrovanie hodnot
		$meno = (isset($_POST['logmeno'])) ? trim($_POST['logmeno']) : '';
		$heslo = (isset($_POST['logheslo'])) ? trim($_POST['logheslo']) : '';

		$typBlok = 0;
		$typAktiv = 2;
		$typNormal = 1;

		# CI MA BLOKOVANY UCET
		$ucet = mysql_query('SELECT email, user_typ, password
								FROM user
								WHERE email = "' . mysql_real_escape_string($meno) . '"
								ORDER BY email DESC ');
		if (mysql_num_rows($ucet) != '0') {
			# EXISTUJE UZIAVTEL
			$riadok = mysql_fetch_array($ucet);

			# TYP UCTU
			if ($typBlok == htmlspecialchars($riadok['user_typ'])) {
				# BLOKOVANY
				$error = 'Máte zablokovaný účet. Kontaktujte nás.';

				header('Location: ../../prihlas.php?error=' . urlencode($error));
				exit();

			}
			elseif ($typAktiv == htmlspecialchars($riadok['user_typ'])) {
				# AKTIVOVAT
				$error = 'Váš úcet ešte nieje aktivovaný. Aktivujte si ho, prosím!';

				header('Location: ../../prihlas.php?error=' . urlencode($error));
				exit();

			}
			elseif ($typNormal == htmlspecialchars($riadok['user_typ'])) {
				# NORMAL

				// heslo nemusim hashovat lebo pouzivam heslo z DB, takze je hashovane
				$heslo = md5($heslo);

				$ludia = mysql_query('SELECT u.meno, u.password, u.user_id, u.email, u.level_id, l.level_id, u.website, u.user_obrazok, u.user_typ
						FROM user u
							LEFT JOIN level l ON l.level_id = u.level_id
						WHERE email = "' . mysql_real_escape_string($meno) . '" AND
							password = "' . mysql_real_escape_string($heslo) . '" AND
							user_typ = "' . mysql_real_escape_string($typNormal) . '"
						ORDER BY u.user_id DESC ');

				if (mysql_num_rows($ludia) > 0) {
					$riadok = mysql_fetch_assoc($ludia);
					extract($riadok);

					$_SESSION['email'] = $email;
					$_SESSION['meno'] = $meno;
					$_SESSION['level_id'] = $level_id;
					$_SESSION['user_id'] = $user_id;
					$_SESSION['website'] = $website;
					$_SESSION['user_obrazok'] = $user_obrazok;
		/*
					$_SESSION['sprava_menu'] = $sprava_menu;
					$_SESSION['sprava_clanok'] = $sprava_clanok;
					$_SESSION['sprava_system'] = $sprava_system;
		*/


					header('Location: ../../'); //index.php
					exit();
				}
				else {
					//nenaslo ziadny riadok
					$_SESSION['email'] = '';

					$error = 'Bolo zadané zle uživateľské meno alebo heslo.';
						//$error .= '<p>Mozete si zalozit novy ucet tu.<a href="?ludia=regist">Zalozit novy ucet</a></p>';


					header('Location: ../../prihlas.php?error=' . urlencode($error));
					exit();
				}
				mysql_free_result($ludia);
				# prihlasime ho
			}
			else {
				# AK NAHODOU SA ZMENI NIECO ISTOTA
				$error = 'Momentálne ste neboli prihlásení, skúste to neskôr. Ďakujem  za pochoponie.';

				header('Location: ../../prihlas.php?error=' . urlencode($error));
				exit();

			}

		}
		else {
			# UZIVATEL SA NENASIEL
			$error = 'Momentálne takýto uživateľ neexistuje.';

			header('Location: ../../prihlas.php?error=' . urlencode($error));
			exit();

		}
		mysql_free_result($ucet);

	}
	elseif ($_POST['odosli'] == 'Registrovať') {

		#REGISTRACIA




		$email = (isset($_POST['logemail'])) ? trim($_POST['logemail']) : '';
		$heslo = (isset($_POST['logheslo1'])) ? trim($_POST['logheslo1']) : '';
		$heslo_znovu = (isset($_POST['logheslo2'])) ? trim($_POST['logheslo2']) : '';
		$website = (isset($_POST['logwebsite'])) ? trim($_POST['logwebsite']) : '';
		$meno = (isset($_POST['logmeno'])) ? trim($_POST['logmeno']) : '';
		$pohlavie = (isset($_POST['pohlavie'])) ? trim($_POST['pohlavie']) : '';


	  $prikaz = 'SELECT email, meno FROM user WHERE email="' . mysql_real_escape_string($email) .'" OR meno="' . mysql_real_escape_string($meno) . '" ';
	  $vysledok = mysql_query($prikaz);
	  if (!$vysledok) {
	      die("Server vypadol, skuste to neskor.");
	  }
	  $pocet_vysled = mysql_num_rows($vysledok);
	  mysql_free_result($vysledok);
	      if (!$email || !$meno || !$heslo || !$heslo_znovu)
	          {
	            //echo 'Nevyplnil si všechny potrebné údaje.<BR />';
	            $error = 'Nevyplnili ste si všetky potrebné údaje.';
	            header('Location: ../../register.php?error=' . $error);

	          }
	     elseif ($meno == '')
	          {
	             //echo 'Nezadali ste Vase meno !<BR />';
	            $error = 'Nezadali ste Vaše meno !';
	            header('Location: ../../register.php?error=' . $error);
	          }
	      elseif ($heslo_znovu !== $heslo)
	          {
	             //echo 'Heslo se nezhoduje s druhým zadaným.<BR />';
	             $error = 'Heslá sa nezhodujú.';
	             header('Location: ../../register.php?error=' . $error);
	          }
	      elseif ($pocet_vysled > 0)
	          {
	          //echo 'Zadané meno, alebo email už je registrovaný.<BR />';
	          $error = 'Zadané Meno alebo E-mail už existuje.';
	          header('Location: ../../register.php?error=' . $error);
	          }
	      else
	          {
	              $heslo1 = $heslo;
	              $heslo  = md5($heslo);
	              $level_id = '1';

	              //$pohlavie = $pohlavie ? '1' : '2';
	              /*if ($pohlavie == '1') {
	                $pohlavie = 'Muž';
	              }
	              else {
	                $pohlavie = 'Žena';
	              }
				  */

	              //meno url adresa
	              require '../../admin/komponenty/url.php';
	              $meno_url = seo_url($meno);

	              require '../../admin/komponenty/captchaId.php';

	              $cas = date("Y-m-d H:i:s");  //ulozenie
	              $cas1 = date("H:i:s");   // na aktivaciu potrebujem
	              $vybrateId = '';   // user obrazok
	              $typ = 2;  // aktivovat ucet treba

	               $nac = mysql_query('INSERT INTO user (user_id, email, password, meno, website, pohlavie, level_id, user_cas, meno_url, user_obrazok, user_typ)
	                  VALUES (NULL,
	                          "' . mysql_real_escape_string($email) . '",
	                          "' . mysql_real_escape_string($heslo) . '",
	                          "' . mysql_real_escape_string($meno) . '",
	                          "' . mysql_real_escape_string($website) . '",
	                          "' . mysql_real_escape_string($pohlavie) . '",
	                          "' . mysql_real_escape_string($level_id) . '",
	                          "' . mysql_real_escape_string($cas) . '",
	                          "' . mysql_real_escape_string($meno_url) . '",
	                          "' . mysql_real_escape_string($vybrateId) . '",
	                          "' . mysql_real_escape_string($typ) . '")');

	               $email_stav = 1; // 1-aktivovane, 2-zrudene, 0-neaktivovane
	               $email_poslat = 0;  // nastavene na 0

	               // po zaregistrovani sa prihlasi do odberu
	               $nac1 = mysql_query('INSERT INTO email (email_id, email_nazov, email_stav, email_poslat)
	                					VALUES (NULL,
	                							"' . mysql_real_escape_string($email) . '",
	                							"' . mysql_real_escape_string($email_stav) . '",
	                							"' . mysql_real_escape_string($email_poslat) . '")');

	               $posledneId = mysql_insert_id();

/*

	               	$nacPravo = mysql_query('INSERT INTO moznost (moznost_id, uzivatel_id, sprava_menu, sprava_clanok, sprava_system)
	               								VALUES (NULL,
	               										"' . mysql_real_escape_string($posledneId) . '",
	               										0,
	               										0,
	               										0)');
*/
		              if ($pohlavie == '1') {
		                $pohlavie = 'Muž';
		              }
		              else {
		                $pohlavie = 'Žena';
		              }

	                  $sprava = "Dobrý den,\n";
	                  $sprava .= "práve ste sa zaregistrovali na stránke ".$_SERVER['SERVER_NAME']."\n";
	                  $sprava .= "\n";
	                  $sprava .= "Zatiaľ ešte Váš účet nieje aktivovaný, aktivujete ho kliknutím na tento odkaz http://mobilai.cz/register.php?akcia=aktivacia&meno=" . urlencode(htmlspecialchars($meno_url)) . "&uzivatel=" . urlencode(htmlspecialchars($posledneId)) . "&heslo=" . urlencode(htmlspecialchars($heslo)) . "&cas=" . urlencode(htmlspecialchars($cas1)) . "&email=" . urlencode(htmlspecialchars($email)) . "\n";
	                  $sprava .= "Boli ste úspešne zaregistrovaný s týmito údajmi:\n";
	                  $sprava .= "Meno: " . $meno ."\n";
	                  $sprava .= "Heslo: " . $heslo1 ."\n";
	                  $sprava .= "Website: " . $website ."\n";
	                  $sprava .= "Pohlavie: " . $pohlavie ."\n";
	                  $sprava .= "Doporučujeme si zapamätať tieto údaje.\n";

	                  $hlavicka = "Content-Type: text/html; charset=UTF-8\n";
	                  mail($email, 'Registrácia', $sprava);

	                  if (!mail) echo "Email sa nepodarilo odoslať, skúste to neskôr";

	                  $ok = 'Boli ste úspešne zaregistrovaný na náš portál. Na Váš e-mail bola odoslaná správa s prihlasovacími údajmy na úschovu.';
	                  $ok .= 'Váš účet ešte nieje aktívny. AKtivujte si ho!';

	                 header('Location: ../../register.php?akcia=dokonc');
	                 exit();
	                 }



	}
	elseif (isset($_POST['udaje']) && $_POST['udaje'] == 'Zmena údajov') {
		 	//overime ci boli zapisane udaje
		 	//overime rovnost hesiel
		 	//filtrovanie

		$meno = (isset($_POST['meno'])) ? trim($_POST['meno']) : '';
		$email = (isset($_POST['email'])) ? trim($_POST['email']) : '';
		$website = (isset($_POST['website'])) ? trim($_POST['website']) : '';
		$pohlavie = (isset($_POST['pohlavie'])) ? trim($_POST['pohlavie']) : '';
		$mesto = (isset($_POST['mesto'])) ? trim($_POST['mesto']) : '';
		$popis = (isset($_POST['popis'])) ? trim($_POST['popis']) : '';


		 	if (!empty($meno) && !empty($email) && !empty($website)) {
		 		//ci uz neexistuje
		 		$meno = mysql_real_escape_string($meno);
		 		$email = mysql_real_escape_string($email);
		 		$mesto = mysql_real_escape_string($mesto);
		 		$popis = mysql_real_escape_string($popis);
		 		$website = mysql_real_escape_string($website);
		 		$pohlavie = mysql_real_escape_string($pohlavie);

		 		//meno zmena tak preto aj url adresa
		 		require '../komponenty/url.php';
		 		$meno_url = seo_url($meno);

		 		$prikaz = 'UPDATE user SET meno="' . $meno . '",
		 								   email="' . $email . '",
		 								   website="' . $website . '",
		 								   pohlavie="' . $pohlavie . '",
		 								   user_mesto ="' . $mesto . '",
		 								   user_popis ="' . $popis . '",
		 								   meno_url ="' . $meno_url . '"
		 						WHERE user_id=' . $_SESSION['user_id'];
		 		$prikaz1 = mysql_query($prikaz) or die(mysql_error());

		 		$ok = 'Udaje boli zmenene.';
		 		header('Location: ../../upravit.php?ok=' . $ok);
		 		exit();
		 	}
		 	else {
		 		$error = 'Nevyplnili ste vsetky polia.';
		 		header('Location: ../../upravit.php?error=' . $error);
		 		exit();
		 	}
		 	mysql_free_result($prikaz1);
	}
	elseif (isset($_POST['koniec']) && $_POST['koniec'] == 'Zmena hesla :)') {
			//filtrovanie
		$pass = (isset($_POST['pass'])) ? trim($_POST['pass']) : '';
		$pass1 = (isset($_POST['pass1'])) ? trim($_POST['pass1']) : '';
		$pass2 = (isset($_POST['pass2'])) ? trim($_POST['pass2']) : '';
		$heslo = ($pass1 === $pass2) ? $pass1 : '';

			$sql = 'SELECT password FROM user WHERE user_id=' . $_SESSION['user_id'];
			$sql1 = mysql_query($sql)or die(mysql_error());
			$riadok = mysql_fetch_array($sql1);
			//mysql_free_result($sql1);
			if (md5($pass) !== $riadok['password']) {
		 		$error = 'Zadali ste nespravne stare heslo.';
		 		header('Location: ../../upravit.php?error=' . $error);
			}
			else {
				if ($pass1 !== $pass2) {
		 		$error = 'Zadane hesla sa nezhoduju.';
		 		header('Location: ../../upravit.php?error=' . $error);
				}
				else {
					//ulozenie hesla
					$ul = 'UPDATE user SET password="' . mysql_real_escape_string(md5($pass1)) . '" WHERE user_id=' . $_SESSION['user_id'];
					$ul1 = mysql_query($ul)or die(mysql_error());

		 			$ok = 'Heslo bolo uspesne zmenene.';
		 			header('Location: ../../upravit.php?ok=' . $ok);
				}
			}
			mysql_free_result($sql);
	}
	/*
	elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['avatar'])) {

		$user_id = (isset($_POST['user_id'])) ? trim($_POST['user_id']) : '';

			if (!is_numeric($user_id)) {
				header('Location: ../../prihlas.php');
				exit();
			}
			else {

				$over_id = mysql_query('SELECT user_id, meno FROM user WHERE user_id="' . mysql_real_escape_string($user_id) . '" ');
				if (mysql_num_rows($over_id) != '0') {
					# ZAPISEME

					require '../komponenty/captchaId.php';
					$last_id = $vybrateId;
					require 'novyObrazokLudia.php';

					$ok = 'Avatar, bol úspešne zmenený.';
		 			$zmen = 'UPDATE user SET user_obrazok = "' . mysql_real_escape_string($vybrateId) . '" WHERE user_id = "' . mysql_real_escape_string($user_id) . '" ';
		 			$zmen1 = mysql_query($zmen)or die(mysql_error());
		 			header('Location: ../../upravit.php?ok=' . $ok);
		 			exit();
				}
				else {
					header('Location: ../../prihlas.php');
					exit();
				}

		 	}

	}
	*/
	elseif (isset($_POST['odoslikomentar']) && $_POST['odoslikomentar'] == 'Odoslať komentár') {

	/*
		$komentar_meno = (isset($_POST['komentar_meno'])) ? $_POST['komentar_meno'] : '';
		$komentar_website = (isset($_POST['komentar_website'])) ? $_POST['komentar_website'] : '';
		$komentar_email = (isset($_POST['komentar_email'])) ? $_POST['komentar_email'] : '';
		$user_id= (isset($_POST['user_id'])) ? $_POST['user_id'] : '';
	*/

		$komentar_meno = (isset($_SESSION['meno'])) ? $_SESSION['meno'] : '';
		$komentar_website = (isset($_SESSION['website'])) ? $_SESSION['website'] : '';
		$komentar_email = (isset($_SESSION['email'])) ? $_SESSION['email'] : '';
		$user_id= (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : '';

		$komentar_text = (isset($_POST['komentar_text'])) ? $_POST['komentar_text'] : '';
		$clanok_id = (isset($_POST['clanok_id'])) ? $_POST['clanok_id'] : '';
		$clanokUrlStara = (isset($_POST['clanokUrl'])) ? $_POST['clanokUrl'] : '';
		$cislo = (isset($_POST['cislo'])) ? $_POST['cislo'] : '';

		$saltCaptcha = '35e4w5g464w6g46we4gwer4g6e4g';
		$nahodneCisloHash = md5(hash("SHA512", $cislo)) . md5(md5(hash("SHA512", $saltCaptcha)));


		if ($_SESSION['nahoda'] == $nahodneCisloHash) {
			# captcha, kod je opisany spravne

			$clanok_url = mysql_query('SELECT clanok_id, clanok_url FROM clanky WHERE clanok_id="' . mysql_real_escape_string($clanok_id) . '"AND clanok_url="' . mysql_real_escape_string($clanokUrlStara) . '" ');

			if (mysql_num_rows($clanok_url) != '0') {
				$clanokUrl = mysql_fetch_array($clanok_url);
				$clanok_url = $clanokUrl['clanok_url'];


				if (empty($komentar_meno) or empty($komentar_email) or empty($komentar_text) or empty($clanok_id) or empty($clanokUrl)) {
					$error = 'Neboli zadané niektoré údaje.';

					header('Location: ../../clanok.php?clanok=' . urlencode($clanok_url) . '&error=' . urlencode($error) . '#napis_komentar');
					exit();

				}
				else {

					//user_id je prihlaseny
					if (isset($_SESSION['user_id'])) {
						$user_id = $_SESSION['user_id'];
					}
					else {
						$user_id = '0';
					}
					$zapis = 'INSERT INTO komentar (komentar_id, komentar_text, website, meno, email, clanok_id, user_id)
								VALUES (NULL,
										"' . mysql_real_escape_string($komentar_text) . '",
										"' . mysql_real_escape_string($komentar_website) . '",
										"' . mysql_real_escape_string($komentar_meno) . '",
										"' . mysql_real_escape_string($komentar_email) . '",
										"' . mysql_real_escape_string($clanok_id) . '",
										"' . mysql_real_escape_string($user_id) . '")';
					$zapis1 = mysql_query($zapis)or die(mysql_error());

					$clanok_url1 = $clanok_url;
					//mysql_free_result($clanok_url);
					header('Location: ../../clanok.php?clanok=' . urlencode($clanok_url) . '&ok=' . $ok . '#zobraz_komentar');
					exit();

				}

			}
			else {
				# KLAME
				$error = 'Neboli zadané niektoré údaje.';

				header('Location: ../../clanok.php?clanok=' . urlencode($clanokUrl) . '&error=' . urlencode($error) . '#napis_komentar');
				exit();
				//header('Location: ../../');
				//exit();
			}

		}
		else {
			# captca zle opisana
			$error = 'Zle opísaný kód.';
			header('Location: ../../clanok.php?clanok=' . urlencode($clanokUrlStara) . '&error=' . urlencode($error) . '#napis_komentar');
			exit();
			//echo $cislo . '   ' . $cislo1 . '   ' . $nahodneCisloHash;
		}

	}
	else {
		header('Location: ../../');
		exit();
	}



?>
