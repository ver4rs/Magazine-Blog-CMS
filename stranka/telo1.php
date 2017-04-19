<div id="telo">

		<div id="sLavo">
			<div id="lavoDoplnok">
				<?php
					if (isset($_SERVER['PHP_SELF'])) {
						if ($_SERVER['PHP_SELF'] == '/index.php') {
							# DOMOV
							?>
							<span><a href="/"><img src="obrazky/domov1.gif" style="width: 27px; height: 27px;" alt="domov" title="domov"><?php echo 'Najnovšie články'; ?></a></span>
							<?php
						}
						elseif ($_SERVER['PHP_SELF'] == '/menu.php') {

							if (strpos($_GET['menu'], '/') == FALSE) {
								# SEKCIA
								$tu = mysql_query('SELECT menu_id, menu_nazov, menu_url FROM menu WHERE menu_url ="' . mysql_real_escape_string($_GET['menu']) . '" ');
								if (mysql_num_rows($tu) != '0') {
									$tuToto = mysql_fetch_array($tu);
									?>
									<span><a href="/"><img src="obrazky/domov1.gif" style="width: 27px; height: 27px;" alt="domov" title="domov"></a> <img src="obrazky/sipkaVpravo.gif" alt="vpravo" title="vpravo"> <a href="menu.php?menu=<?php echo $_GET['menu']; ?>"><?php echo htmlspecialchars($tuToto['menu_nazov']); ?></a> </span>
									<?php
								}
								mysql_free_result($tu);
							}
							else {
								#KATEGORIA
								$totoKat = substr($_GET['menu'], strpos($_GET['menu'], '/')+1);
								$totoSek = substr($_GET['menu'], 0, -(strlen($_GET['menu']) - strpos($_GET['menu'], '/')));
								$tu = mysql_query('SELECT menu_id, menu_nazov, menu_url FROM menu WHERE menu_url ="' . mysql_real_escape_string($totoKat) . '" ');
								if (mysql_num_rows($tu) != '0') {
									#JE EXISTUJE
									$tuToto = mysql_fetch_array($tu);
									$tutu = mysql_query('SELECT menu_id, menu_nazov, menu_url FROM menu WHERE menu_url ="' . mysql_real_escape_string($totoSek) . '" ');
									if (mysql_num_rows($tutu) != '0') {
										$tutuToto = mysql_fetch_array($tutu);

										?>
										<span><a href="/"><img src="obrazky/domov1.gif" style="width: 27px; height: 27px;" alt="domov" title="domov"></a> <img src="obrazky/sipkaVpravo.gif" alt="vpravo" title="vpravo"> <a href="menu.php?menu=<?php echo $totoSek; ?>"><?php echo htmlspecialchars($tutuToto['menu_nazov']); ?></a> <img src="obrazky/sipkaVpravo.gif" alt="vpravo" title="vpravo"> <a href=""><?php echo htmlspecialchars($tuToto['menu_nazov']); ?></a></span>
										<?php
									}
									mysql_free_result($tutu);
								}
								mysql_free_result($tu);
							}
						}
						elseif ($_SERVER['PHP_SELF'] == '/vyhladaj.php') {
							# HLADAJ
							?>
							<span><a href="/"><img src="obrazky/domov1.gif" style="width: 27px; height: 27px;" alt="domov" title="domov"></a> <img src="obrazky/sipkaVpravo.gif" alt="vpravo" title="vpravo"> <a href="vyhladaj.php?hladaj=<?php echo $_GET['hladaj']; ?>">hľadám.. ' <?php echo htmlspecialchars($_GET['hladaj']); ?>'</a></span>
							<?php
						}
						elseif ($_SERVER['PHP_SELF'] == '/archiv.php') {
							# ARCHIV OBDOBIE ALEBO DATUM
							if ($_GET['archiv'] == 'obdobie') {
								# OBDOBIE
								?>
								<span><a href="/"><img src="obrazky/domov1.gif" style="width: 27px; height: 27px;" alt="domov" title="domov"></a> <img src="obrazky/sipkaVpravo.gif" alt="vpravo" title="vpravo"> <a href="archiv.php?archiv=<?php echo $_GET['archiv']; ?>"><?php echo htmlspecialchars($_GET['archiv']); ?></a></span>
								<?php
							}
							else {
								# DATUM
								?>
								<span><a href="/"><img src="obrazky/domov1.gif" style="width: 27px; height: 27px;" alt="domov" title="domov"></a> <img src="obrazky/sipkaVpravo.gif" alt="vpravo" title="vpravo"> <a href="archiv.php?archiv=<?php echo $_GET['archiv']; ?>"><?php echo htmlspecialchars($_GET['archiv']); ?></a></span>
								<?php
							}
						}
						elseif ($_SERVER['PHP_SELF'] == '/clanok.php') {
							# clanok ]
							$toto = mysql_query('SELECT clanok_id, clanok_titul, clanok_url FROM clanky WHERE clanok_url ="' . mysql_real_escape_string($_GET['clanok']) . '" ');
							if (mysql_num_rows($toto)) {
								# EXISTUJE
								$totoTu = mysql_fetch_array($toto);

								# DLZKA TITUL NAPISNANE MAX 2 RIADKY
      							$pocetSlov = 55;
    							if (strlen($totoTu['clanok_titul']) >= $pocetSlov) {
        							$teloSkratkaTitul = substr($totoTu['clanok_titul'], 0,-(strlen($totoTu['clanok_titul'])- $pocetSlov));
        							$teloSkratkaTitul .= '...';
    							}
    							else {
        							$teloSkratkaTitul = $totoTu['clanok_titul'];
    							}
								?>
								<span><a href="/"><img src="obrazky/domov1.gif" style="width: 27px; height: 27px;" alt="domov" title="domov"></a> <img src="obrazky/sipkaVpravo.gif" alt="vpravo" title="vpravo"> <a href="clanok.php?clanok=<?php echo htmlspecialchars($_GET['clanok']); ?>"><?php echo htmlspecialchars($teloSkratkaTitul); ?></a></span>
								<?php
							}
							else {
								$teloSkratkaTitul = 'smola';
							}
							mysql_free_result($toto);
						}
						elseif ($_SERVER['PHP_SELF'] == '/profil.php') {
							# profil
							$toto = mysql_query('SELECT user_id, meno, meno_url FROM user WHERE meno_url = "' . mysql_real_escape_string($_GET['uzivatel']) . '" AND user_id = "' . mysql_real_escape_string($_GET['cislo']) . '" ');
							if (mysql_num_rows($toto) != '0') {
								# EXISTUJE
								$totoTu = mysql_fetch_array($toto);
								?>
								<span><a href="/"><img src="obrazky/domov1.gif" style="width: 27px; height: 27px;" alt="domov" title="domov"></a> <img src="obrazky/sipkaVpravo.gif" alt="vpravo" title="vpravo"> <a href="profil.php?cislo=<?php echo htmlspecialchars($totoTu['user_id'] . '&uzivatel=' . $totoTu['meno_url']); ?>"><?php echo htmlspecialchars('Profil -> meno uživateľa -> ' . $totoTu['meno']); ?></a></span>
								<?php
							}
							else {
								?>
								<span><a href="/"><img src="obrazky/domov1.gif" style="width: 27px; height: 27px;" alt="domov" title="domov"></a> <img src="obrazky/sipkaVpravo.gif" alt="vpravo" title="vpravo"> <?php echo htmlspecialchars('Profil '); ?></span>
								<?php
							}
							mysql_free_result($toto);
						}
						elseif ($_SERVER['PHP_SELF'] == '/prihlas.php') {
							# PRIHLASENIE
							?>
							<span><a href="/"><img src="obrazky/domov1.gif" style="width: 27px; height: 27px;" alt="domov" title="domov"></a> <img src="obrazky/sipkaVpravo.gif" alt="vpravo" title="vpravo"> Prihlásenie</span>
							<?php
						}
						elseif ($_SERVER['php_SELF'] == '/register.php') {
							# REGISTRACIA
							?>
							<span><a href="/"><img src="obrazky/domov1.gif" style="width: 27px; height: 27px;" alt="domov" title="domov"></a> <img src="obrazky/sipkaVpravo.gif" alt="vpravo" title="vpravo"> Registrácia -> <?php echo htmlspecialchars($_GET['akcia']); ?></span>
							<?php
						}
						elseif ($_SERVER['php_SELF'] == '/pomoc.php') {
							# POMOC
							?>
							<span><a href="/"><img src="obrazky/domov1.gif" style="width: 27px; height: 27px;" alt="domov" title="domov"></a> <img src="obrazky/sipkaVpravo.gif" alt="vpravo" title="vpravo"> Registrácia -> <?php echo htmlspecialchars($_GET['pomoc']); ?></span>
							<?php
						}
						else {
							# NIC NEBUDE
							?>
							<span><a href="/"><img src="obrazky/domov1.gif" style="width: 27px; height: 27px;" alt="domov" title="domov"></a> <img src="obrazky/sipkaVpravo.gif" alt="vpravo" title="vpravo"> </span>
							<?php
						}
					}
					else {
						?>
						<span><a href="/"><img src="obrazky/domov1.gif" style="width: 27px; height: 27px;" alt="domov" title="domov"></a> <img src="obrazky/sipkaVpravo.gif" alt="vpravo" title="vpravo"> </span>
						<?php
					}


				?>
			</div>


