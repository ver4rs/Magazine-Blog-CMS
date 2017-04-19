<?php

# CLANOK PROFIL UKAZANIE VESTKZCH CLANKOV JEDNEHO UZIVATELA


function uzivatelClanokZobraz() {

#PODVADZANIE

//url adresa profil.php?cislo=ID&uzivatel=MENO
if (!isset($_GET['cislo']) or !is_numeric($_GET['cislo']) or $_GET['cislo'] == '0' or !isset($_GET['uzivatel']) or $_GET['uzivatel'] == '0' ) {
	header('Location: ../../');
	exit();
}


# POCET VYSLEDKOV
$pocetClankovCislo = mysql_query('SELECT clanok_id, uzivatel_id FROM clanky WHERE uzivatel_id ="' . mysql_real_escape_string($_GET['cislo']) . '" ');

if (mysql_num_rows($pocetClankovCislo) != '0') {
	$pocetRiadkov = mysql_num_rows($pocetClankovCislo);
}
else {
	$pocetRiadkov = '0';
}
mysql_free_result($pocetClankovCislo);


#URL STRANA
require 'admin/komponenty/strankovanie/strankovanie1.php';
#####################################################################################


# PROFIL UZIVATEL TLACENIE CLANOKV
$clanok = mysql_query('SELECT clanok_id ,clanok_date, clanok_url, clanok_obrazok, clanok_titul, clanok_pocet, clanok_paci, clanok_nepaci, c.clanok_perex, m.menu_rodic_id, m.menu_nazov , c.uzivatel_id, u.user_id, u.meno, m.menu_url, meno_url
            FROM clanky c JOIN user u ON c.uzivatel_id = u.user_id
                        JOIN menu m ON c.menu_id = m.menu_id
                WHERE uzivatel_id = "' . mysql_real_escape_string($_GET['cislo']) . '"
                    ORDER BY clanok_date DESC LIMIT ' . $zaciatok . ', ' . $limit . ' ');




if (mysql_num_rows($clanok) != '0') {
    while ($riadok = mysql_fetch_assoc($clanok)) {
        extract($riadok);

        require 'celyClanok.php';

    }
}
else {
    # NENASLO NIC
    ?>
    <div class="form">
        <h3>Žiadny článok som ešte nenapisal.</h3>
    </div>
    <?php
}
mysql_free_result($clanok);
#####################################################################################


$napisUrl = '?cislo=' . $_GET['cislo'] . '&uzivatel=' . $_GET['uzivatel'] . '&';
#ZOBRAZENIE STRAN
require 'admin/komponenty/strankovanie/strankovanie2.php';
#####################################################################################



}




?>
