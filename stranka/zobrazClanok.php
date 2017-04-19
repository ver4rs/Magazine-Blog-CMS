<div id="zobrazClanok">

    <div class="clanokcely">

        <div class="clanokObrazok">

            <?php
                    if (file_exists($cesta)) {
                ?>
                        <img src="<?php echo urlAdresa . $cesta; ?>" alt="<?php echo htmlspecialchars($clanok_titul); ?>" style="width: 170px; height: 120px;"/>
                <?php
                    }
                    else {
                ?>
                        <img src="<?php echo urlAdresa; ?>obrazky/clanok.jpeg" alt="<?php echo htmlspecialchars($clanok_titul); ?>" style="width: 170px; height: 120px;"/>
                <?php
                    }
                ?>

        </div>

        <div class="clanokText">
                    <h2>
                        <?php echo htmlspecialchars($clanok_titul); ?>
                    </h2>
                    <p>
                        Zverejnil
                        <a href="profil.php?cislo=<?php echo htmlspecialchars($user_id . '&uzivatel=' . $meno_url); ?>"><?php echo htmlspecialchars($meno); ?></a>, dňa <?php echo $datum_den . ', ' . $datum_mesiac . ' ' . $datum_rok; ?>

                      <span>
                        V <a href="menu.php?menu=<?php echo htmlspecialchars($sekciaUrl); ?>"><?php echo htmlspecialchars($sekcia_nazov); ?></a> /
                        <a href="menu.php?menu=<?php echo htmlspecialchars($sekciaUrl) . '/' . htmlspecialchars($menu_url); ?>"><?php echo htmlspecialchars($menu_nazov); ?></a>
                        </span>
                        <!--  TEXT  -->

                    </p>

                    <div id="clanokvlastnost">
                        &nbsp;
                    </div>

        </div>


    </div>

        <div id="clanok_popis">
            <span id="span1">&nbsp;</span>
               <!-- <p><?php //echo htmlspecialchars($clanok_perex); ?></p>
            <span id="span2">&nbsp;</span> -->

        </div>

        <div id="clanok_text">
            <?php echo $clanok_text; ?>
        </div>








<?php
    if (!empty($_SESSION['user_id'])) { // je prihlaseny
?>
    <div id="napis_komentar">
    <h3>Napíš komentár</h3>
        <form action="admin/ludia/ludiaForm.php" method="post" onSubmit="return check();">

                <p>
                        <div id="komentAvatar">
                        <?php
                        $cestaKomObr = 'admin/obrazok/uzivatel/mini/' . $_SESSION['user_obrazok'] . '.jpg';

                        if (file_exists($cestaKomObr)) {
                        ?>
                            <img src="admin/obrazok/uzivatel/mini/<?php echo $_SESSION['user_obrazok']; ?>.jpg" alt="avatar" title="<?php echo $_SESSION['meno']; ?>">
                        <?php
                        }
                        else {
                        ?>
                            <img src="obrazky/avatar.jpeg" alt="avatar" style="" title="<?php echo $_SESSION['meno']; ?>">
                        <?php
                        }
                        ?>
                        </div>

                            <a href="#"><?php echo $_SESSION['meno']; ?></a> píše
                            <textarea name="komentar_text" onkeypress="return imposeMaxLength(event, this,200);"   maxlength="200" id="komentar_text"></textarea>

                </p>
                <p id="jedenCaptcha">
                    <label for="komentCaptcha">Opíš text z obrázka:</label>
                    <img src="admin/komponenty/captcha.php">
                    <input name="cislo" type="text" id="cislo" size="10" maxlength="5">
                </p>
                <p>

                    <input type="submit" name="odoslikomentar" value="Odoslať komentár">
                    <input type="hidden" name="komentar_meno" value="<?php echo $_SESSION['meno']; ?>">
                    <input type="hidden" name="komentar_website" value="<?php echo $_SESSION['website']; ?>">
                    <input type="hidden" name="komentar_email" value="<?php echo $_SESSION['email']; ?>">
                    <input type="hidden" name="clanok_id" value="<?php echo $clanok_id; ?>">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                    <input type="hidden" name="clanokUrl" value="<?php echo $clanok_url; ?>">
                </p>
        </form>
    </div>
<?php
    }
    else {
        if ($systemKomentar == '1') { // nieje prihlaseny
?>
<div id="napis_komentar">
    <h3>Napíš reakciu</h3>
    <?php
        if (isset($_GET['error'])) {
            echo '<p id="formerror">' . $_GET['error'] . '</p>';
        }
        else {
            echo '<p id="errorok">' . $_GET['ok'] . '</p>';
        }
        //require 'admin/komponenty/captcha.php';
    ?>
  <form name="form1" action="admin/ludia/ludiaForm.php" method="post" onSubmit="return check();">

        <label for="komentMeno">Meno: </label>
        <input type="text" name="komentar_meno" id="komentar_meno" onkeypress="return imposeMaxLength(event, this,50);" maxlength="50" >

        <label for="komentWebsite">Website: </label>
        <input type="text" name="komentar_website" id="komentar_website" onkeypress="return imposeMaxLength(event, this,70);" maxlength="70">

        <label for="komentEmail">E-mail: </label>
        <input type="text" name="komentar_email" id="validate" onkeypress="return imposeMaxLength(event, this,60);" maxlength="60"><span id="validEmail"></span>
        <p>
            <div id="komentAvatar">
                <img src="obrazky/avatar.jpeg" alt="avatar" title="avatar">
            </div>

            <label for="komentText">Text: </label>
            <textarea name="komentar_text" onkeypress="return imposeMaxLength(event, this,200);"   maxlength="200" id="komentar_text"></textarea>
        </p>
        <p id="jedenCaptcha">
            <label for="komentCaptcha">Opíš text z obrázka:</label>
            <img src="admin/komponenty/captcha.php">
            <input name="cislo" type="text" id="cislo" size="10" maxlength="5">
        </p>

        <input type="submit" name="odoslikomentar" value="Odoslať komentár">
        <input type="hidden" name="clanok_id" value="<?php echo $clanok_id; ?>">
        <input type="hidden" name="clanokUrl" value="<?php echo $clanok_url; ?>">
  </form>
</div>
<?php
        }
        else {
            # nieje prihlaseny, ale ani v DB nieje povolene
            ?>
            <h3>Nezaznamenali sme ťa</h3>
            <?php
        }
    }/*    koniec napis komentar    */


    if (mysql_num_rows($zobrazKomentar) != '0') {
?>
<div id="zobraz_komentar">
    <h3>Komentáre</h3>
<?php
        //require 'widget/f_cas/cas_a_datum.php';
        //$nacitaj_koment = htmlspecialchars($nacitaj['komentar_date']);

        while ($nacitaj = mysql_fetch_array($zobrazKomentar)) {

            $clanok_date = htmlspecialchars($nacitaj['komentar_date']);
            require 'admin/komponenty/datum_a_cas/datumCas.php';

            if ($nacitaj['user_id'] != '0') {
                # JE PRIHLASENY
                $nacitajKomentar = mysql_query('SELECT user_id, meno, meno_url, website, email, user_obrazok FROM user WHERE user_id ="' . mysql_real_escape_string($nacitaj['user_id']) . '" ');
                if (mysql_num_rows($nacitajKomentar) != '0') {
                    $komentarUzivatel = mysql_fetch_array($nacitajKomentar);
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
                            <a href="profil.php?cislo=<?php echo htmlspecialchars($komentarUzivatel['user_id']); ?>&uzivatel=<?php echo htmlspecialchars($komentarUzivatel['meno_url']); ?>"><?php echo htmlspecialchars($komentarUzivatel['meno']); ?></a> <span ><?php echo $datum_den . ', ' . $datum_mesiac . ' ' . $datum_rok . ' ' . $cas_hodina . ':' . $cas_minuta; ?></span>
                            <span><?php echo htmlspecialchars($komentarUzivatel['email']); ?></span><span><?php echo htmlspecialchars($komentarUzivatel['website']); ?></span>
                            <p><?php echo htmlspecialchars($nacitaj['komentar_text']); ?></p>
                        </div>
                    </div>
                    <?php
                }
                mysql_free_result($nacitajKomentar);
            }
            else {
                # NIEJE PRIHLASENY
                ?>
                    <div id="komentarVypis">
                        <div id="komentarAvatar">
                            <img src="obrazky/avatar.jpeg" alt="avatar" title="<?php echo htmlspecialchars($nacitaj['meno']); ?>"/>
                        </div>
                        <div id="komentarText">
                            <?php echo htmlspecialchars($nacitaj['meno']); ?> <span><?php echo $datum_den . ', ' . $datum_mesiac . ' ' . $datum_rok . ' ' . $cas_hodina . ':' . $cas_minuta; ?></span>
                            <span><?php echo htmlspecialchars($nacitaj['email']); ?></span><span ><?php echo htmlspecialchars($nacitaj['website']); ?></span>
                            <p><?php echo htmlspecialchars($nacitaj['komentar_text']); ?></p>
                        </div>
                    </div>
                <?php
            }


        }
?>
</div>
<?php

    }
mysql_free_result($zobrazKomentar);



?>
</div>
