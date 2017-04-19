<div class="strankovanie">
<?php

#ZOBRAZENIE STRAN DOLE



for ($i=1; $i <= $pocetStran ; $i++) {
    if ($strana != $i) {
        //neaktualna strana
        ?>
        <a href="<?php echo $urlStranka . $napisUrl; ?>strana=<?php echo $i; ?>"><div id="strankovanieCislo"><?php echo $i; ?></div></a>
        <?php
    }
    else {
        //aktualna strana
        ?>
        <div id="strankovanieCislo"><font color="#666666" style=" font-weight:bold; "><?php echo $i; ?></font></div>
        <?php
    }
}



?>
</div>
