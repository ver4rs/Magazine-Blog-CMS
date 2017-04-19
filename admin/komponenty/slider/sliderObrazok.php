<?php


# NACITANIE Z DB
$pocetSliderZisti = mysql_query('SELECT sprava_id, sprava_slider FROM sprava ORDER BY sprava_id DESC');
if (mysql_num_rows($pocetSliderZisti) != '0') {
	# JE TAM UDAJ
	$sliderPocetCislo = mysql_fetch_array($pocetSliderZisti);
	$sliderPocet = $sliderPocetCislo['sprava_slider'];

	if ($sliderPocet == '0') {
		# NAJDE VYSLEDOK ALE BUDE 0
		$sliderPocet = 4;
	}

}
else {
	$sliderPocet = 4;
}
mysql_free_result($pocetSliderZisti);

# SLIDER
$sliderHore = mysql_query('SELECT clanok_date, clanok_url, clanok_obrazok, clanok_titul
            FROM clanky
            ORDER BY clanok_date DESC LIMIT 0, ' . $sliderPocet . ' ');



//$pocetSlider = mysql_num_rows($sliderHore);











?>
