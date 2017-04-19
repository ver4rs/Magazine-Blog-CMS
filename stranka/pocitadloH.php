<?php

# moze byt aj inde sprava clanok, system, uzivatel, menu
//require 'admin/komponenty/pocitadlo/pocitadlo.php';



?>

<div class="pocitadlo">

    <div id="pocitadlo_nazov">

        <h3>Štatistika stránky</h3>

        <span id="pocitadlo_rozdel"><span id="pocitadlo_typ">Vaša IP adresa : </span><span id="pocitadlo_pocet"><?php echo $ipAdresa; ?></span></span>
        <span id="pocitadlo_rozdel"><span id="pocitadlo_typ">Návštevy : </span><span id="pocitadlo_pocet"><?php echo $pocet_navstevnikov_dokopy; ?></span></span>
        <span id="pocitadlo_rozdel"><span id="pocitadlo_typ">Zobrazenia : </span><span id="pocitadlo_pocet"><?php echo $pocet_navstev_dokopy; ?></span></span>

    </div>

    <div id="pocitadlo_nazov">

        <h3>Štatistika uživateľov</h3>

        <span id="pocitadlo_rozdel"><span id="pocitadlo_typ">Registrovaný: </span><span id="pocitadlo_pocet"><?php echo $pocet_register; ?></span></span>
        <span id="pocitadlo_rozdel"><span id="pocitadlo_typ">  - dnes: </span><span id="pocitadlo_pocet"><?php echo $uziv_dnes_pocet; ?></span></span>

        <span id="pocitadlo_rozdel">
          <span id="pocitadlo_typ">Online členovia: </span>
              <span id="pocitadlo_pocet"><?php echo $online_uzivatel; ?></span>
          <span id="pocitadloDel">
            <span id="pocitadlo_typ1">Hostia: </span>
                <span id="pocitadlo_pocet1"><?php echo $online_hosti; ?></span>
          </span>
        </span>

        <span id="pocitadlo_rozdel">
          <span id="pocitadlo_typ">Prehliadac: </span>
              <span id="pocitadlo_pocet"><script style="text/javascript"> document.write( navigator.appName ); </script></span>
          <span id="pocitadloDel">
            <span id="pocitadlo_typ1">OS: </span>
                <span id="pocitadlo_pocet1"><?php echo $operSystem; ?></span>
          </span>
        </span>

        <span id="pocitadlo_rozdel">
          <span id="pocitadlo_typ">Rozlisenie: </span>
              <span id="pocitadlo_pocet"><script style="text/javascript"> document.write(screen.width+' x '+screen.height); </script></span>
          <span id="pocitadloDel">
            <span id="pocitadlo_typ1">Krajina: </span>
                <span id="pocitadlo_pocet1"><script style="text/javascript"> document.write( navigator.language ); </script></span>
          </span>
        </span>


        <!-- <span id="pocitadlo_rozdel"><span id="pocitadlo_typ">Hostia: </span><span id="pocitadlo_pocet"><?php //echo $online_hosti; ?></span></span>  -->

    </div>

</div>

