<div class="clanok">
                <h3>
                    <a href="clanok.php?clanok=<?php echo htmlspecialchars($clanok_url); ?>" title="<?php echo htmlspecialchars($clanok_titul); ?>"><?php echo htmlspecialchars($clanok_titul); ?></a>
                </h3>
    <div class="clanokObrazok">
                <a class="clanokObrazokA" href="clanok.php?clanok=<?php echo htmlspecialchars($clanok_url); ?>" title="<?php echo htmlspecialchars($clanok_titul); ?>">
                <?php
                    if (file_exists($cesta)) {
                ?>
                        <img src="<?php echo urlAdresa . $cesta; ?>" alt="<?php echo htmlspecialchars($clanok_titul); ?>" style="width: 170px; height: 120px;"/>
                <?php
                    }
                    else {
                ?>
                        <img src="obrazky/clanok.jpeg" alt="<?php echo htmlspecialchars($clanok_titul); ?>" style="width: 170px; height: 120px;"/>
                <?php
                    }
                ?>

                </a>
    </div>

    <div class="clanokText">

        <p id="PerexPopisClanok">
            <?php
                echo htmlspecialchars($clanok_perex);
            ?>
        </p>
        <span id="vlastnost">

        </span>
    </div>

    <p id="textPopis">
                    Zverejnil
                    <a href="profil.php?cislo=<?php echo htmlspecialchars($user_id . '&uzivatel=' . $meno_url); ?>"><?php echo htmlspecialchars($meno); ?></a>  &nbsp; <?php echo $datum_den . '. ' . $datum_mesiac . ' ' . $datum_rok; ?>
                  <span>
                    &nbsp; <a href="menu.php?menu=<?php echo htmlspecialchars($sekciaUrl); ?>"><?php echo htmlspecialchars($sekcia_nazov); ?></a> /
                    <a href="menu.php?menu=<?php echo htmlspecialchars($sekciaUrl) . '/' . htmlspecialchars($menu_url); ?>"><?php echo htmlspecialchars($menu_nazov); ?></a>
                    &nbsp; <img src="obrazky/prezretie.gif" alt="Počet prezretí" title="Tento článok videlo <?php echo htmlspecialchars($clanok_pocet); ?> ľudí"> <?php echo htmlspecialchars($clanok_pocet); ?>
                    &nbsp; <img src="obrazky/komentar.gif" alt="Počet komentárov" title="Tento článok komentovalo <?php echo htmlspecialchars($pocet_komentarov); ?> ľudí"> <?php echo htmlspecialchars($pocet_komentarov); ?>
                    </span>
                    <!--  TEXT  -->
                    <?php
                        if (is_numeric($_SESSION['level_id']) AND $_SESSION['level_id'] == 4) {
                    ?>
                        <a href="spravaClanok.php?uprav=<?php echo htmlspecialchars($clanok_url); ?>"><img src="obrazky/upravit.gif" title="upraviť" ALT="upraviť"/></a>
                    <?php
                        }
                    ?>
                </p>

</div>
