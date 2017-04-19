<?php

# NAJ PREZRETIE



$najPrezret = mysql_query('SELECT clanok_id, clanok_url, clanok_pocet, clanok_titul, clanok_date, clanok_obrazok FROM clanky ORDER BY clanok_pocet DESC LIMIT 10');

if (mysql_num_rows($najPrezret) != '10') {
    $topPrezret = mysql_num_rows($najPrezret);
}
else {
    $topPrezret =10;
}

?>
<div id="najPrezret">
  <h3>Najzaujímavejšie<span> / TOP <?php echo $topPrezret; ?></span></h3>
<?php

if (mysql_num_rows($najPrezret) != '0') {

  while ($riadok_pocet = mysql_fetch_array($najPrezret)) {

      $clanok_date = htmlspecialchars($riadok_pocet['clanok_date']);
      require 'admin/komponenty/datum_a_cas/datumCas.php';

      $topPrezretCesta = 'admin/obrazok/clanok/mini/' . htmlspecialchars($riadok_pocet['clanok_obrazok']) . '.jpg';

      //$dlzka = strlen($riadok_pocet['clanok_titul']);
      # DLZKA TITUL NAPISNANE MAX 2 RIADKY
      $pocetSlov = 61;
      if (strlen($riadok_pocet['clanok_titul']) > $pocetSlov) {
        $clanok_titul_skrat = substr($riadok_pocet['clanok_titul'], 0,-(strlen($riadok_pocet['clanok_titul'])- $pocetSlov));
        $clanok_titul_skrat .= '...';
      }
      else {
        $clanok_titul_skrat = $riadok_pocet['clanok_titul'];
      }



?>
<div class="najClanok">
  <div class="najObrazok">
  <?php
    if (file_exists($topPrezretCesta)) {
      //zobrazenie
      //echo 'ano existuje';
  ?>
    <a href="clanok.php?clanok=<?php echo htmlspecialchars($riadok_pocet['clanok_url']); ?>"><img src="<?php echo $topPrezretCesta; ?>" alt="<?php echo htmlspecialchars($riadok_pocet['clanok_titul']); ?>" title="<?php echo htmlspecialchars($riadok_pocet['clanok_titul']); ?>" style="width: 60px; height: 50px;"/></a>
  <?php
    }
    else {
      //echo 'neexistuje';
      ?>
      <a href="clanok.php?clanok=<?php echo htmlspecialchars($riadok_pocet['clanok_url']); ?>"><img src="obrazky/clanok.jpeg" alt="<?php echo htmlspecialchars($riadok_pocet['clanok_titul']); ?>" title="<?php echo htmlspecialchars($riadok_pocet['clanok_titul']); ?>" style="width: 60px; height: 50px;"/></a>
      <?php
    }
  ?>
  </div>
  <div class="najText">
    <p class="najNazov"><a href="clanok.php?clanok=<?php echo htmlspecialchars($riadok_pocet['clanok_url']); ?>"><?php echo htmlspecialchars($clanok_titul_skrat); ?></a></p>
    <span class="najDatum"><?php echo $datum_den . '. ' . $datum_mesiac . ' ' . $datum_rok; ?></span>
  </div>
</div>
<?php

  }

}
?>
</div>
<?php

mysql_free_result($najPrezret);



?>
