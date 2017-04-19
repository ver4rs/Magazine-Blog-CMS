<?php

# CLANOK PROFIL UKAZANIE VESTKZCH CLANKOV JEDNEHO UZIVATELA

function uzivatelKomentarZobraz() {

#PODVADZANIE
//url adresa profil.php?cislo=ID&uzivatel=MENO
if (!isset($_GET['cislo']) or !is_numeric($_GET['cislo']) or $_GET['cislo'] == '0' or !isset($_GET['uzivatel']) or $_GET['uzivatel'] == '0' ) {
	header('Location: ../../');
	exit();
}


# POCET VYSLEDKOV
$pocetKomentarovCislo = mysql_query('SELECT komentar_id, user_id FROM komentar WHERE user_id ="' . mysql_real_escape_string($_GET['cislo']) . '" ');

if (mysql_num_rows($pocetKomentarovCislo) != '0') {
	$pocetRiadkov = mysql_num_rows($pocetKomentarovCislo);
}
else {
	$pocetRiadkov = '0';
}
mysql_free_result($pocetKomentarovCislo);


#URL STRANA
require 'admin/komponenty/strankovanie/strankovanie1.php';
#####################################################################################


# PROFIL UZIVATEL TLACENIE KOMENTAROV
$komentar = mysql_query('SELECT k.komentar_id, k.user_id, k.clanok_id, k.komentar_date, k.komentar_text, k.meno, k.website, k.email, c.clanok_id, u.user_obrazok, u.meno_url, u.meno, u.email, u.email, u.website, c.clanok_url, c.clanok_titul
            FROM komentar k JOIN user u ON k.user_id = u.user_id
                        JOIN clanky c ON k.clanok_id = c.clanok_id
                WHERE k.user_id = "' . mysql_real_escape_string($_GET['cislo']) . '"
                    ORDER BY k.komentar_date DESC LIMIT ' . $zaciatok . ', ' . $limit . ' ');


if (mysql_num_rows($komentar) != '0') {
    while ($komentarUzivatel = mysql_fetch_array($komentar)) {

        $clanok_date = htmlspecialchars($komentarUzivatel['komentar_date']);
        require 'admin/komponenty/datum_a_cas/datumCas.php';

        $cestaKomObr = 'admin/obrazok/uzivatel/mini/' . $komentarUzivatel['user_obrazok'] . '.jpg';

        ?>
        <div id="komentarVypis">
                        <div id="komentarAvatar">
                        <?php
                        if (file_exists($cestaKomObr)) {
                        ?>
                            <img src="admin/obrazok/uzivatel/mini/<?php echo htmlspecialchars($komentarUzivatel['user_obrazok']); ?>.jpg" alt="avatar" title="<?php echo htmlspecialchars($komentarUzivatel['meno']); ?>"/>
                        <?php
                        }
                        else {
                        ?>
                            <img src="obrazky/avatar.jpeg" alt="<?php echo htmlspecialchars($komentarUzivatel['meno']); ?>" title="<?php echo htmlspecialchars($komentarUzivatel['meno']); ?>" style=""/>
                        <?php
                        }
                        ?>
                        </div>
                        <div id="komentarText">
                            K článku <a href="clanok.php?clanok=<?php echo htmlspecialchars($komentarUzivatel['clanok_url']); ?>"><?php echo htmlspecialchars($komentarUzivatel['clanok_titul']); ?></a> </br>od <a href="profil.php?cislo=<?php echo htmlspecialchars($komentarUzivatel['user_id']); ?>&uzivatel=<?php echo htmlspecialchars($komentarUzivatel['meno_url']); ?>"><?php echo htmlspecialchars($komentarUzivatel['meno']); ?></a> <span ><?php echo $datum_den . ', ' . $datum_mesiac . ' ' . $datum_rok . ' ' . $cas_hodina . ':' . $cas_minuta; ?></span>
                            <span><?php echo htmlspecialchars($komentarUzivatel['email']); ?></span><span><?php echo htmlspecialchars($komentarUzivatel['website']); ?></span>
                            <p><?php echo htmlspecialchars($komentarUzivatel['komentar_text']); ?></p>
                        </div>
                    </div>
        <?php

    }
}
else {
    # NENASLO NIC
    ?>
    <div class="form">
        <h3>Žiadny komentár som nenapisal.</h3>
    </div>
    <?php
}
mysql_free_result($komentar);
#####################################################################################


$napisUrl = '?cislo=' . $_GET['cislo'] . '&uzivatel=' . $_GET['uzivatel'] . '&';
#ZOBRAZENIE STRAN
require 'admin/komponenty/strankovanie/strankovanie2.php';
#####################################################################################



}




?>
