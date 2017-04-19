<div class="profil">
	<h3 id="profiltitul">Profil</h3>
	<div id="profilzac"><!-- jednoducho -->
		<div id="avatar"><!-- foto -->
			<?php
				if (file_exists($cesta_ludia)) {
			?>
				<img src="<?php echo $cesta_ludia; ?>" style="">
			<?php
				}
				else {
					//neexistuje
					?>
					<img src="obrazky/avatar.jpeg" style="width: 150px; height: 150px;">
					<?php
				}
			?>
		</div><!-- foto -->
		<div id="profilkratky"><!-- meno email, hodnost a ine veci pocet komentarov... -->

			<p>
				<label for="profilmeno" id="profilmeno">Meno: </label>
				<span id="profildata"><?php echo htmlspecialchars($meno); ?></span>
			</p>
			<p>
				<label for="profilmeno" id="profilmeno">E-mail: </label>
				<span id="profildata"><?php echo htmlspecialchars($email); ?></span>
			</p>
			<p>
				<label for="profilmeno" id="profilmeno">Website: </label>
				<span id="profildata"><?php echo htmlspecialchars($website); ?></span>
			</p>
			<p>
				<label for="profilpohlavie" id="profilpohlavie">Pohlavie: </label>
				<span id="profildata"><?php echo $pohlavie; ?></span>
			</p>
			<p>
				<label for="profilmesto" id="profilmesto">Mesto: </label>
				<span id="profildata"><?php echo htmlspecialchars($user_mesto); ?></span>
			</p>
			<p>
				<label for="profilpopis" id="profilpopis">Krátky popis: </label>
				<span id="profildata"><?php echo htmlspecialchars($user_popis); ?></span>
			</p>
		</div><!--  koniec meno email, hodnost a ine veci pocet komentarov... -->
	</div><!-- koniec jednoducho -->
	<div>
		<!-- pokracovanie -->
	</div>

	<?php
		if (isset($_SESSION['user_id']) AND $_SESSION['user_id'] != '0' AND $_GET['cislo'] == $_SESSION['user_id']) {
	?>
		<div>
			<a href="upravit.php">Upraviť profil</a>
		</div>
	<?php
		}
	?>


</div>

<div id="profilDalej">

<ul>
	<li><a href="profil.php?cislo=<?php echo $_GET['cislo']; ?>&uzivatel=<?php echo $_GET['uzivatel']; ?>&vyber=0">články</a></li>
	<li><a href="profil.php?cislo=<?php echo $_GET['cislo']; ?>&uzivatel=<?php echo $_GET['uzivatel']; ?>&vyber=1">komentáre</a></li>
</ul>

</div>

