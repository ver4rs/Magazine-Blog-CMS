<?php



$nacSprava = mysql_query('SELECT sprava_nadpis_1, sprava_nadpis_2 FROM sprava ');
if (mysql_num_rows($nacSprava) != '0') {
	$riad = mysql_fetch_array($nacSprava);

	$nadpis1 = $riad['sprava_nadpis_1'];
	$nadpis2 = $riad['sprava_nadpis_2'];
}
else {
	$nadpis1 = '';
	$nadpis2 = '';
}
mysql_free_result($nacSprava);

?>

	<div id="panelTitul">
		<h2><a href="/"><?php  echo htmlspecialchars($nadpis1); ?></a></h2>
		<a href="/"><img src="obrazky/apple-android.gif" style="width: 150px; height: 70px; " alt="Apple a android..." title="Apple a android..."></a>
			<div id="horeReklama" style="float: right; margin-top: -45px; ">
				<script type="text/javascript"><!--
					google_ad_client = "ca-pub-9567823677125251";
					/* magazin-titul-hore */
					google_ad_slot = "9552926371";
					google_ad_width = 468;
					google_ad_height = 60;
					//-->
				</script>
				<script type="text/javascript"
				src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
				</script>
			</div>
			<h4><?php echo htmlspecialchars($nadpis2); ?></h4>
		</div>

		<div id="navigacia">
			<?php  require 'navigacia.php';  ?>
			<div id="hladaj">
				<?php  require 'stranka/hladatH.php';  ?>
			</div>
		</div>

	</div>
<?php

//$asd = strrchr($_SERVER['PHP_SELF'], 'sprava');
//$asd = strstr($_SERVER['PHP_SELF'], 'sprava');
//echo $asd;

if ($_SERVER['PHP_SELF'] != '/spravaClanok.php' AND $_SERVER['PHP_SELF'] != '/spravaMenu.php' AND $_SERVER['PHP_SELF'] != '/spravaSystem.php' AND $_SERVER['PHP_SELF'] != '/spravaUzivatel.php' AND $_SERVER['PHP_SELF'] != '/upravit.php' AND $_SERVER['PHP_SELF'] != '/spravaStatistika.php' AND $_SERVER['PHP_SELF'] != '/clanok.php') {
	?>
	<div id="pohyb">
			<div id="slider">
				<?php
					if ($_SERVER['PHP_SELF'] != '/spravaClanok.php') {
						require 'slider/slider.php';
					}
					else {
						echo '<h2>. . .</h2>';
					}
				?>
			</div>

			<div id="bannerA">
				<div id="reklama">
					<script type="text/javascript">
						google_ad_client = "ca-pub-9567823677125251";
						/* magazin-pravo */
						google_ad_slot = "9692527178";
						google_ad_width = 336;
						google_ad_height = 280;
						//-->
					</script>
					<script type="text/javascript"
					src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
					</script>


					<!--  <a href="<?php //echo urlAdresa; ?>" TARGET="_blank"><img src="obrazky/pozadie3.png" alt="Vyber tvár" title="Vyber tvár"></a>  -->
				</div>
			</div>
	</div>


	<div id="koniecVrch">
		&nbsp
	</div>


	<?php
}
?>


