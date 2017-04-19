<?php

function hladaj() {

$hladat1 = (isset($_GET['hladaj'])) ? $_GET['hladaj'] : '';
$hladat = mysql_real_escape_string($hladat1);


#POCET
$pocet = mysql_query('SELECT COUNT(clanok_id) AS pocet, clanok_id ,clanok_date, clanok_url, clanok_obrazok, clanok_titul, clanok_pocet, clanok_paci, clanok_nepaci, c.clanok_perex, m.menu_rodic_id, m.menu_nazov , c.uzivatel_id, u.user_id, u.meno, m.menu_url, meno_url
            FROM clanky c JOIN user u ON c.uzivatel_id = u.user_id
                        JOIN menu m ON c.menu_id = m.menu_id
            WHERE MATCH (clanok_titul, clanok_perex) AGAINST ("' . mysql_real_escape_string($hladat) . '" IN BOOLEAN MODE)
                    ORDER BY clanok_date DESC ');

if (mysql_num_rows($pocet) != '0') {
    $pocetUkaz = mysql_fetch_array($pocet);
    $pocetRiadkov = $pocetUkaz['pocet'];
}
else {
    $pocetRiadkov = 0;
}
mysql_free_result($pocet);
######################################################################################




#URL STRANA
require 'admin/komponenty/strankovanie/strankovanie1.php';
#####################################################################################



$clanok = mysql_query("SELECT clanok_id ,clanok_date, clanok_url, clanok_obrazok, clanok_titul, clanok_pocet, clanok_paci, clanok_nepaci, c.clanok_perex, m.menu_rodic_id, m.menu_nazov , c.uzivatel_id, u.user_id, u.meno, m.menu_url, meno_url
            FROM clanky c JOIN user u ON c.uzivatel_id = u.user_id
                        JOIN menu m ON c.menu_id = m.menu_id
            WHERE MATCH (clanok_titul, clanok_perex) AGAINST ('mysql_real_escape_string($hladat)' IN BOOLEAN MODE)
                    ORDER BY clanok_date DESC LIMIT $zaciatok, $limit ");



if (mysql_num_rows($clanok) != '0') {

	while ($riadok = mysql_fetch_assoc($clanok)) {
		extract($riadok);

        require 'celyClanok.php';

	}

}
else {
    # NENASIEL CLANOK
    ?>
    <div class="form">
    <?php
    echo '<h3>Hladaný výraz: ' . $hladat1 . '</h3>';
	echo '<h3 style="color: red; "><b>Pre tento výraz nebolo nič nájdené.</b></h3>';
    ?>
    </div>
    <?php
}
mysql_free_result($clanok);



$napisUrl = 'vyhladaj.php?hladaj=' . $hladat1 . '&';
#ZOBRAZENIE STRAN
require 'admin/komponenty/strankovanie/strankovanie2.php';
#####################################################################################

}

?>
