<?php
require 'admin/komponenty/slider/sliderObrazok.php';
?>

<div id="wrapper">
<div id="content">

		<div id="slider4" class="nivoSlider">

			<?php
			if (mysql_num_rows($sliderHore) != '0') {

    			while ($zobrazSlider1 = mysql_fetch_array($sliderHore)) {

    ?>

		<a href="clanok.php?clanok=<?php echo htmlspecialchars($zobrazSlider1['clanok_url']); ?>">
			<img src="admin/obrazok/clanok/normal/<?php echo htmlspecialchars($zobrazSlider1['clanok_obrazok']); ?>.jpg" alt="" title="<?php echo htmlspecialchars($zobrazSlider1['clanok_titul']); ?>"/>
		</a>

    <?php

   }



}
mysql_free_result($sliderHore);

    	?>


		</div>

	</div>

</div>

