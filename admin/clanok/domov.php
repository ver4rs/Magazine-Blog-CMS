<?php

# DOMOV HOME uvod zobrazenie clankov



function domov() {

#POCET CLANKOV
$pocet = mysql_query("SELECT COUNT(clanok_id) AS pocet, clanok_id ,clanok_date, clanok_url, clanok_titul, clanok_pocet, clanok_paci, clanok_nepaci, c.clanok_perex, m.menu_rodic_id, m.menu_nazov , c.uzivatel_id, u.user_id, u.meno, m.menu_url, meno_url
            FROM clanky c JOIN user u ON c.uzivatel_id = u.user_id
                        JOIN menu m ON c.menu_id = m.menu_id
                    ORDER BY clanok_date DESC");
$pocetUkaz = mysql_fetch_array($pocet);
$pocetRiadkov = $pocetUkaz['pocet'];
mysql_free_result($pocet);
#####################################################################################


#URL STRANA
require 'admin/komponenty/strankovanie/strankovanie1.php';
#####################################################################################



# HOME zobrazenie uvodu, hlavnej stranky TLACENIE CLANOKV
$clanok = mysql_query('SELECT clanok_id ,clanok_date, clanok_url, clanok_obrazok, clanok_titul, clanok_pocet, clanok_paci, clanok_nepaci, c.clanok_perex, m.menu_rodic_id, m.menu_nazov , c.uzivatel_id, u.user_id, u.meno, m.menu_url, meno_url
            FROM clanky c JOIN user u ON c.uzivatel_id = u.user_id
                        JOIN menu m ON c.menu_id = m.menu_id
                    ORDER BY clanok_date DESC LIMIT ' . $zaciatok . ', ' . $limit . ' ');




if (mysql_num_rows($clanok) != '0') {
    while ($riadok = mysql_fetch_assoc($clanok)) {
        extract($riadok);

        require 'celyClanok.php';

    }
}
else {
    # NENASLO NIC
    echo 'Žiaden článok nebol nájdený.';
}
mysql_free_result($clanok);
#####################################################################################


$napisUrl = '?';
#ZOBRAZENIE STRAN
require 'admin/komponenty/strankovanie/strankovanie2.php';
#####################################################################################

}


?>
