<?php


$cesta = 'admin/obrazok/clanok/mini/' . htmlspecialchars($clanok_obrazok) . '.jpg';

# POCET KOMENTAROV
/*     pocet komentarov                  */
$pocetKomentar = mysql_query('SELECT komentar_id, clanok_id FROM komentar WHERE clanok_id = "' . mysql_real_escape_string($clanok_id) . '"');

$pocet_komentarov = mysql_num_rows($pocetKomentar);
mysql_free_result($pocetKomentar);
/*      koniec pocet komentarov           */



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
####################################################################################



require 'admin/komponenty/datum_a_cas/datumCas.php';



require 'stranka/clanok.php';


// $limit pocet kolko clankov zobrazime
// na polovicu dame
$pocet_clankov_kolko_preslo = $pocet_clankov_kolko_preslo + 1;
$polovica_reklam = ceil($limit / 2);
if ($polovica_reklam == $pocet_clankov_kolko_preslo) {
	# zobrazi reklama
	?>
	<div id="ReklamaMedziClanok">
	<script type="text/javascript"><!--
		google_ad_client = "ca-pub-9567823677125251";
		/* magazin-hore */
		google_ad_slot = "5262327570";
		google_ad_width = 300;
		google_ad_height = 250;
		//-->
	</script>
	<script type="text/javascript"
	src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
	</script>
	</div>
	<?php
}
?>
