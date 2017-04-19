<?php


function ukazArchiv() {

if (isset($_GET['archiv']) AND $_GET['archiv'] != 'obdobie') {
	# ?archiv=12/12  rok a mesiac




	$cas = $_GET['archiv'];


	if (strpos($cas, '/') == '0') {
		$rok = substr($cas, 0, -(strlen($cas) - strpos($cas, '/')));
	}
	else {
		$rok = substr($cas, 0, -(strlen($cas) - strpos($cas, '/')));
		$mesiac = substr($cas, strpos($cas, '/')+1);
	}




#POCET CLANKOV
$pocet = mysql_query('SELECT COUNT(clanok_id) AS pocet, clanok_id ,clanok_date, clanok_url, clanok_obrazok, clanok_titul, clanok_pocet, clanok_paci, clanok_nepaci, c.clanok_perex, m.menu_rodic_id, m.menu_nazov , c.uzivatel_id, u.user_id, u.meno, m.menu_url, meno_url
            FROM clanky c JOIN user u ON c.uzivatel_id = u.user_id
                        JOIN menu m ON c.menu_id = m.menu_id
                WHERE EXTRACT(YEAR FROM clanok_date)= "' . mysql_real_escape_string($rok) . '" AND EXTRACT(MONTH FROM clanok_date)="' . mysql_real_escape_string($mesiac) . '"
                    ORDER BY clanok_date DESC');
$pocetUkaz = mysql_fetch_array($pocet);
$pocetRiadkov = $pocetUkaz['pocet'];
mysql_free_result($pocet);
#####################################################################################


#URL STRANA
require 'admin/komponenty/strankovanie/strankovanie1.php';
#####################################################################################



# HOME zobrazenie uvodu, hlavnej stranky TLACENIE CLANOKV
$clanok = mysql_query('SELECT clanok_id ,clanok_date, clanok_url, clanok_obrazok, clanok_titul, clanok_pocet, clanok_paci, clanok_nepaci, c.clanok_perex, m.menu_rodic_id, m.menu_nazov , c.uzivatel_id, u.user_id, u.meno, m.menu_url, meno_url
            FROM clanky c JOIN user u ON c.uzivatel_id = u.user_id
                        JOIN menu m ON c.menu_id = m.menu_id
                WHERE EXTRACT(YEAR FROM clanok_date)= "' . mysql_real_escape_string($rok) . '" AND EXTRACT(MONTH FROM clanok_date)="' . mysql_real_escape_string($mesiac) . '"
                    ORDER BY clanok_date DESC LIMIT ' . $zaciatok . ', ' . $limit . ' ');


	if (mysql_num_rows($clanok) != 0) {

		while ($riadok = mysql_fetch_assoc($clanok)) {
			extract($riadok);
	/*
			$datum_rok = date('Y', strtotime($clanok_date));
			$datum_mesiac = date('m', strtotime($clanok_date));

			if ($datum_rok == $rok && $datum_mesiac == $mesiac) {
	*/
			require 'celyClanok.php';
	/*
			}
	*/

		}

	}
	else {
		#ZIADEN CLANOK
		?>
		<div class="form">
			<h3>Žiadny článok nebol nájdený.</h3>
		</div>
		<?php
		echo 'Nenasiel sa ziaden clanok';
	}
	mysql_free_result($clanok);

	$napisUrl = 'archiv.php?archiv=' . $cas . '&';
	#ZOBRAZENIE STRAN
	require 'admin/komponenty/strankovanie/strankovanie2.php';
	#####################################################################################


}
else {
	# OBDOBIE ZOBRAZY
	require_once 'admin/clanok/zobrazArchiv.php';
}

}

?>
