
		</div>
		<div id="sPravo">

			<div class="zdielanie">
				<h3>Zdieľaj cez</h3>
				<?php
				# URL ADRESA
				$host = $_SERVER['HTTP_HOST'];
				$self = $_SERVER['PHP_SELF'];
				$query = !empty($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : null;
				$url = !empty($query) ? "http://$host$self?$query" : "http://$host$self";
				?>
				<a href="https://facebook.com/sharer.php?u=<?php echo urlencode($url); ?>" target="t_blank"><img src="obrazky/fbz.gif" alt="Zdieľaj cez Facebook" title="Zdieľaj cez Facebook"></a>
				<a href="https://twitter.com/intent/tweet?url=<?php echo urlencode($url); ?>&via=<?php echo urlencode($hlavaTitul); ?>" target="t_blank"><img src="obrazky/twz.gif" alt="Zdieľaj cez Twitter" title="Zdieľaj cez Twitter"></a>
				<a href="https://plus.google.com/share?url=<?php echo urlencode($url); ?>&t=<?php echo urlencode($hlavaTitul); ?>" target="t_blank"><img src="obrazky/goz.gif" alt="Zdieľaj cez Google+" title="Zdieľaj cez Google+"></a>
				<a href="http://www.linkedin.com/shareArticle?url=<?php echo urlencode($url); ?>" target="t_blank"><img src="obrazky/liz.gif" alt="Zdieľaj cez Linkedin" title="Zdieľaj cez Linkedin"></a>
				<a href="<?php echo htmlspecialchars(urlAdresa . '/rss.php'); ?>" target="t_blank"><img src="obrazky/rsz.gif" alt="Odoberaj cez RSS" title="Odoberaj cez RSS"></a>

			</div>

			<div id="fbLikeBoxPravo">
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
			</div>

			<div id="podpora">
				<div id="podporText">
					<h3>Podporte ma,</h3>
					<span>všetko niečo stojí. Každý trochu. Možno práve Vy zaručíte chod tohto portálu. Ďakujem.</span>
				</div>
				<div id="podporForm">
					<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
						<input type="hidden" name="cmd" value="_s-xclick">
						<input type="hidden" name="hosted_button_id" value="VABDVNHU878YS">
						<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
						<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
					</form>
				</div>

			</div>

			<div id="najPrezretPravo">
				<?php  require 'admin/komponenty/naj/najPrezret.php';  ?>
			</div>

			<div id="fbLikeBoxPravo">
				<a href="http://vybertvar.6f.sk" target="t_blank"><img src="<?php echo htmlspecialchars(urlAdresa); ?>/obrazky/pozadie3.png" alt="Vyberte tú najkrajšiu tvár" title="Vyberte tú najkrajšiu tvár"></a>
			</div>

			<div id="najKomentPravo">
				<?php  require 'admin/komponenty/naj/najKoment.php';  ?>
			</div>



			<div id="fbLikeBoxPravo">
				<!-- FB like box -->
				<div id="fb-root"></div>
				<script type="text/javascript">
					(function(d, s, id) {
					  	var js, fjs = d.getElementsByTagName(s)[0];
					  	if (d.getElementById(id)) return;
					  	js = d.createElement(s); js.id = id;
					  	js.src = "//connect.facebook.net/sk_SK/all.js#xfbml=1";
					  	fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));
				</script>
				<!-- koniec FB like box -->
				<div class="fb-like-box" data-href="https://www.facebook.com/pages/Apple-android/171394896253471" data-width="333" data-height="300" data-show-faces="true" data-stream="false" data-header="false"></div>
			</div>

			<div id="fbLikeBoxPravo">
				<!--   ETARGET   -->
				<script type="text/javascript" async="true" charset="utf-8" src="http://sk.search.etargetnet.com/generic/advert.php?g=ref:40459,area:300x300,tabl:4,divid:,design_name:blue,border_color:ffffff,border_style:none,background_opacity:70,background_color:ffffff,title_color:0066d5,text_color:000000,url_color:0066d5,h_title_color:0066d5,h_text_color:000000,h_url_color:0066d5,freespace:0,logo_type:1,logo:1,title_underline:0,url_underline:0,h_title_underline:1,h_url_underline:1,nourl:,fsi:11,font:verdana" ></script>
			</div>


			<div id="archivPravo">
				<?php   require 'admin/clanok/zobrazArchiv.php'; //skript na archiv
						echo zobrazArchiv(); // funkcia na zobrazenie archivu
				?>
			</div>

			<div id="pocitadlo">
				<?php require 'stranka/pocitadloH.php'; ?>
			</div>

		</div>

</div>





