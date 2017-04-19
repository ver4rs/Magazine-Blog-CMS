

<div id="spodok">

	<div class="spod">

			<div id="StlpecVyssie">
				<a href="http://vybertvar.6f.sk" target="t_blank"><img src="<?php echo htmlspecialchars(urlAdresa); ?>/obrazky/pozadie3.png" alt="Vyberte tú najkrajšiu tvár" title="Vyberte tú najkrajšiu tvár"></a>
			</div>

			<div id="StlpecVyssie">
				<a href="http://vybertvar.6f.sk" target="t_blank"><img src="<?php echo htmlspecialchars(urlAdresa); ?>/obrazky/pozadie3.png" alt="Vyberte tú najkrajšiu tvár" title="Vyberte tú najkrajšiu tvár"></a>
			</div>

	</div>

	<div class="koniec">

		<div id="koniecVrch">

			<div class="stlpecDole">
				<strong>POUŽÍVATEĽSKÝ PANEL</strong>
				<ul>
					<li><a href="<?php echo htmlspecialchars(urlAdresa . 'prihlas.php'); ?>">Prihlásiť</a></li>
					<li><a href="<?php echo htmlspecialchars(urlAdresa . 'register.php'); ?>">Registrácia</a></li>
				</ul>

				<strong>ĎAlŠIE PROJEKTY</strong>
				<ul>
					<li><a href="<?php echo htmlspecialchars(urlAdresa); ?>" title="Magazín o mobilných systémoch, IT a nejakou umelou inteligenciou a pre zábavu aj robotika">mobilai</a><span id="strankaPis2">toto</span></li>
					<li><a href="http://nextphotos.eu" title="Creative presentation of photos from around the world for you">Nextphotos</a><span id="strankaPis3">NEW</span></li>
					<li><a href="http://vybertvar.6f.sk" title="Vyber tú najkrajšiu tvár">Vyber tú najkrajšiu tvár</a></li>
					<li><a href="http://vitazfarmy.6f.sk">Víťaz farmy 3</a><span id="strankaPis1">staré</span></li>
				</ul>

			</div>

			<div class="stlpecDole">
				<strong>KATEGÓRIE</strong>
				<?php
				# SKUSKA
				$doleSekcia = mysql_query('SELECT menu_id, menu_rodic_id, menu_nazov, menu_url FROM menu WHERE menu_rodic_id = 0 ORDER BY menu_nazov ASC LIMIT 0, 2');
				if (mysql_num_rows($doleSekcia) != '0') {
					while ($riadok = mysql_fetch_array($doleSekcia)) {

						?>
						<ul>
							<li><a href="<?php echo htmlspecialchars(urlAdresa . 'menu.php?menu=' . $riadok['menu_url']); ?>" style="font-weight: bold; margin-bottom: 4px;"><?php echo htmlspecialchars($riadok['menu_nazov']); ?></a></li>
						<?php

						$doleKategoria = mysql_query('SELECT menu_id, menu_rodic_id, menu_nazov, menu_url FROM menu WHERE menu_rodic_id = "' . mysql_real_escape_string($riadok['menu_id']) . '" ORDER BY menu_nazov ASC');
						if (mysql_num_rows($doleKategoria) != '0') {
							?>
							<ul>
							<?php
							while ($riadok1 = mysql_fetch_array($doleKategoria)) {

								?>
								<li><a href="<?php echo htmlspecialchars(urlAdresa . 'menu.php?menu=' . $riadok['menu_url'] . '/' . $riadok1['menu_url']); ?>" style="margin-left: 20px; margin-bottom: 3px; color: #171515;"><?php echo htmlspecialchars($riadok1['menu_nazov']); ?></a></li>
								<?php
							}
							?>
							</ul>
							<?php
						}
						mysql_free_result($doleKategoria);
					}
					?>
					</ul>
					<?php
				}
				mysql_free_result($doleSekcia);
				?>
			</div>

			<div class="stlpecDole">
				<strong>KATEGÓRIE</strong>
				<?php
				# SKUSKA
				$doleSekcia = mysql_query('SELECT menu_id, menu_rodic_id, menu_nazov, menu_url FROM menu WHERE menu_rodic_id = 0 ORDER BY menu_nazov ASC LIMIT 2, 5');
				if (mysql_num_rows($doleSekcia) != '0') {
					while ($riadok = mysql_fetch_array($doleSekcia)) {

						?>
						<ul>
							<li><a href="<?php echo htmlspecialchars(urlAdresa . 'menu.php?menu=' . $riadok['menu_url']); ?>" style="font-weight: bold; margin-bottom: 4px;"><?php echo htmlspecialchars($riadok['menu_nazov']); ?></a></li>
						<?php

						$doleKategoria = mysql_query('SELECT menu_id, menu_rodic_id, menu_nazov, menu_url FROM menu WHERE menu_rodic_id = "' . mysql_real_escape_string($riadok['menu_id']) . '" ORDER BY menu_nazov ASC');
						if (mysql_num_rows($doleKategoria) != '0') {
							?>
							<ul>
							<?php
							while ($riadok1 = mysql_fetch_array($doleKategoria)) {

								?>
								<li><a href="<?php echo htmlspecialchars(urlAdresa . 'menu.php?menu=' . $riadok['menu_url'] . '/' . $riadok1['menu_url']); ?>" style="margin-left: 20px; margin-bottom: 3px; color: #171515;"><?php echo htmlspecialchars($riadok1['menu_nazov']); ?></a></li>
								<?php
							}
							?>
							</ul>
							<?php
						}
						mysql_free_result($doleKategoria);
					}
					?>
					</ul>
					<?php
				}
				mysql_free_result($doleSekcia);
				?>
			</div>
			<div class="stlpecDole">
				
				<strong>PODPORTE MA !</strong>
				<div id="spodPodpora">
					<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
						<input type="hidden" name="cmd" value="_s-xclick">
						<input type="hidden" name="hosted_button_id" value="VABDVNHU878YS">
						<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
						<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
					</form>
				</div>

				<strong>HĽADÁME REDAKTOROV</strong>
				<p id="redaktorText">viac tu <a href="<?php echo htmlspecialchars(urlAdresa . 'pomoc.php?pomoc=hladame-redaktorov'); ?>">hľadáme redaktorov</a></p>


			</div>

		</div>

	
<div id="koniecSpod">
			<span>Copyright © 2012 Mobilai.cz l Kontakt: <a href="mailto:ver4rs@gmail.com">ver4rs@gmail.com</a> l Design <a href="mailto:ver4rs@gmail.com">ver4rs</a> l Developer <a href="mailto:ver4rs@gmail.com">ver4rs</a> l Powered by Custom CMS here <a href="http://mobilai.cz/">Mobilai.cz</a> l <a href="<?php echo htmlspecialchars(urlAdresa . 'pomoc.php?pomoc=podmienky'); ?>">Podmienky používania</a> l <a href="<?php echo htmlspecialchars(urlAdresa . 'pomoc.php?pomoc=hladame-redaktorov'); ?>">hľadáme redaktorov</a> <a href="<?php echo htmlspecialchars(urlAdresa . 'pomoc.php?pomoc=hladame-redaktorov'); ?>"></a></span>
		</div>

	</div>

</div>



</div><!-- KONIEC VELKE -->





	</body>
</html>
