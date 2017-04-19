<?php

# NAJ KOMENTOVANEJSIE


//najmensie id clanku v komentaroch
$najKoment = mysql_query('SELECT k.clanok_id, c.clanok_url, count(komentar_id) pocet, clanok_titul, c.clanok_id, c.clanok_date, c.clanok_obrazok
      FROM komentar k
        JOIN clanky c ON k.clanok_id = c.clanok_id
      group by k.clanok_id
      order by pocet DESC LIMIT 10');

if (mysql_num_rows($najKoment) != '10') {
    $topKoment = mysql_num_rows($najKoment);
}
else {
    $topKoment =10;
}



?>
<div id="najKoment">
    <h3>Najdiskutovanejšie<span> / TOP <?php echo $topKoment; ?></span></h3>
<?php

if (mysql_num_rows($najKoment) != '0') {

  while ($riadok_koment = mysql_fetch_array($najKoment)) {

      $clanok_date = htmlspecialchars($riadok_koment['clanok_date']);
      require 'admin/komponenty/datum_a_cas/datumCas.php';

      $najKomentCesta = 'admin/obrazok/clanok/mini/' . htmlspecialchars($riadok_koment['clanok_obrazok']) . '.jpg';

      # DLZKA TITUL NAPISNANE MAX 2 RIADKY
      $pocetSlov = 61;
      if (strlen($riadok_koment['clanok_titul']) > $pocetSlov) {
        $clanok_titul_skrat = substr($riadok_koment['clanok_titul'], 0,-(strlen($riadok_koment['clanok_titul'])- $pocetSlov));
        $clanok_titul_skrat .= '...';
      }
      else {
        $clanok_titul_skrat = $riadok_koment['clanok_titul'];
      }


?>
    <div class="najClanok">
        <div class="najObrazok">
        <?php
            if (file_exists($najKomentCesta)) {
            //zobrazenie
        ?>
            <a href="clanok.php?clanok=<?php echo htmlspecialchars($riadok_koment['clanok_url']); ?>"><img src="<?php echo $najKomentCesta; ?>" alt="<?php echo htmlspecialchars($riadok_koment['clanok_titul']); ?>" title="<?php echo htmlspecialchars($riadok_koment['clanok_titul']); ?>" style="width: 60px; height: 50px;"/></a>
        <?php
            }
            else {
            //echo 'neexistuje';
        ?>
            <a href="clanok.php?clanok=<?php echo htmlspecialchars($riadok_koment['clanok_url']); ?>"><img src="obrazky/clanok.jpeg" alt="<?php echo htmlspecialchars($riadok_koment['clanok_titul']); ?>" title="<?php echo htmlspecialchars($riadok_koment['clanok_titul']); ?>" style="width: 60px; height: 50px;"/></a>
        <?php
            }
        ?>
    </div>
    <div class="najText">
      <p class="najNazov"><a href="clanok.php?clanok=<?php echo htmlspecialchars($riadok_koment['clanok_url']); ?>"><?php echo htmlspecialchars($clanok_titul_skrat); ?></a></p>
      <span class="najDatum"><?php echo $datum_den . '. ' . $datum_mesiac . ' ' . $datum_rok; ?></span>
    </div>
  </div>
<?php


  }

}
?>
</div>
<?php

mysql_free_result($najKoment);





?>
