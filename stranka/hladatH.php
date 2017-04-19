<div id="hladat">
    <form action="vyhladaj.php" method="get">
    	<input type="text" id="hladajText" name="hladaj" onkeypress="return imposeMaxLength(event, this, 47);" maxlength="47"
<?php
	if (isset($_GET['hladaj'])) {
?>
			value="<?php  echo htmlspecialchars($_GET['hladaj']); ?>"
<?php   }    ?>    />

        <input type="submit" value="Hľadaj" id="hladajButton"/>
    </form>
</div>
