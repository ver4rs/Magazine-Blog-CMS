<?php

/*

nacitanie archivu, textu

*/

function zobrazArchiv() {


$clanok = mysql_query('SELECT clanok_id ,clanok_date, clanok_url, clanok_obrazok, clanok_titul, clanok_pocet, clanok_paci, clanok_nepaci, c.clanok_perex, m.menu_rodic_id, m.menu_nazov , c.uzivatel_id, u.user_id, u.meno, m.menu_url, meno_url
            FROM clanky c JOIN user u ON c.uzivatel_id = u.user_id
                        JOIN menu m ON c.menu_id = m.menu_id
    ORDER BY clanok_date DESC');


$pole = array();
$pole_rok = array();

if (mysql_num_rows($clanok) != '0') {

	while($riadok = mysql_fetch_assoc($clanok)) {
		extract($riadok);

	    $rok = date('Y', strtotime($riadok['clanok_date']));
	    $mesiac = date('m', strtotime($riadok['clanok_date']));

	    $pole[$rok][$mesiac][] = $riadok;
	    $pole_rok[$rok][] = $riadok;
	}
}
mysql_free_result($clanok);

//pocet riadkov

//echo print_r($pole);
$celkovo = '0';
?>
<div class="form">
<div id="archivMesiac">
<h3><a href="archiv.php?archiv=obdobie">Archív</a></h3><br>
<?php
	foreach($pole as $rok_z => $mesiac_z) {

    	//echo $rok_z. "<br>";

    	foreach($mesiac_z as $datum_mesiac => $pocet) {

    		$datum_mesiac_cislo = $datum_mesiac;
        	$pocet_clankov_mesiac = count($pocet);

        	$aj_cislo = array("01","02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
			$sk_nazov = array("január", "ferbuár", "marec", "apríl", "máj", "jún", "júl", "august", "september", "október", "november", "december");

			$datum_mesiac = str_replace($aj_cislo, $sk_nazov, $datum_mesiac);

            $celkovo = $celkovo +1;
            if ($celkovo != '11') {
            	echo '<span><a href="archiv.php?archiv=' . $rok_z . '/' . $datum_mesiac_cislo . '">' . $datum_mesiac . ' ' . $rok_z . '</a> (' . $pocet_clankov_mesiac . ')</span>';

            }

    	}

	}



?>
</div>
</div>
<?php

}

?>
