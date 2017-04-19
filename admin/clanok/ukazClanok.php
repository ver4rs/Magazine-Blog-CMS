<?php

# ZOBRAZENIE CLANKU JEDNEHO


function zobrazClanok() {



$clanokUrl = $_GET['clanok'];


# VYHLADANIE JEDNEHO CLANKU PODLA URL
$clanok = mysql_query('SELECT clanok_id ,clanok_date, clanok_text,clanok_url, clanok_obrazok, clanok_titul, clanok_pocet, clanok_paci, clanok_nepaci, c.clanok_perex, m.menu_rodic_id, m.menu_nazov , c.uzivatel_id, u.user_id, u.meno, u.meno_url, m.menu_url, meno_url
            FROM clanky c JOIN user u ON c.uzivatel_id = u.user_id
                        JOIN menu m ON c.menu_id = m.menu_id
                    WHERE clanok_url ="' . mysql_real_escape_string($clanokUrl) . '"
                    ORDER BY clanok_date DESC LIMIT 1');

if (mysql_num_rows($clanok) == FALSE) {
	# NENASIEL SA CLANOK
	?>
	<div class="form">
		<h3>Takýto článok sa nenašiel.</h3>
	</div>
	<?php
}
else {
	$riadok = mysql_fetch_assoc($clanok);
	extract($riadok);

	/*           pocet prezreti pripocitanie            */
	//$clanok_pocet = $clanok_pocet +1;
	$pocetPrezreti = mysql_query('UPDATE clanky SET clanok_pocet = clanok_pocet+1 WHERE clanok_id = "' . htmlspecialchars($clanok_id) . '"');
	//$pocet_p = 'INSERT INTO clanky(clanok_pocet) VALUES ("' . mysql_real_escape_string($clanok_pocet) . '")';
	//mysql_free_result($pocet_p1);
	/*       koniec pocet prezreti pripocitanie        */



	# ZISTENIE SEKCIE
	$zistiSekciuId = mysql_query('SELECT menu_id, menu_nazov, menu_url, menu_rodic_id
								FROM menu
									WHERE menu_nazov ="' . mysql_real_escape_string($menu_nazov) . '" ');
	if (mysql_num_rows($zistiSekciuId) != '0') {
		$zistenaSekciaId = mysql_fetch_array($zistiSekciuId);

		$zistiSekciu = mysql_query('SELECT menu_id, menu_nazov, menu_url
									FROM menu
										WHERE menu_id ="' . mysql_real_escape_string($zistenaSekciaId['menu_rodic_id']) . '" ');
		if (mysql_num_rows($zistiSekciu) != '0') {
			$sekcia = mysql_fetch_array($zistiSekciu);
			$sekcia_nazov = $sekcia['menu_nazov'];
			$sekciaUrl = $sekcia['menu_url'];
		}


	}
	mysql_free_result($zistiSekciuId);
	mysql_free_result($zistiSekciu);

	//**********************************************************************
	//nacitanie komentarov zobrazenie komentarov
	$zobrazKomentar = mysql_query('SELECT komentar_date, komentar_text, komentar_id, clanok_id, website, email, meno, user_id
				FROM komentar
				WHERE clanok_id ="' . htmlspecialchars($clanok_id) . '"
				ORDER BY komentar_date DESC');
	//***************************************************************

	require 'admin/komponenty/datum_a_cas/datumCas.php';

	$cesta = 'admin/obrazok/clanok/normal/' . $clanok_obrazok . '.jpg';


	/*          system komentare                  */
	$system1 = mysql_query('SELECT sprava_id, sprava_komentar FROM sprava ORDER BY sprava_id DESC');
	$system = mysql_fetch_array($system1);
	$systemKomentar = $system['sprava_komentar'];
	mysql_free_result($system1);
	/*        koniec system komentare                    */


	/*     pocet komentarov                  */
	$pocetKomentar = mysql_query('SELECT komentar_id, clanok_id FROM komentar WHERE clanok_id = "' . htmlspecialchars($clanok_id) . '"');
	$pocet_komentarov = mysql_num_rows($pocetKomentar);
	mysql_free_result($pocetKomentar);
	/*      koniec pocet komentarov           */

	require 'stranka/zobrazClanok.php';

}
mysql_free_result($clanok);



}




?>
