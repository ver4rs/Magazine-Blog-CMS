<?php


# VYPOCITANIE STRANY

if (isset($_GET['strana']) or !empty($_GET['strana'])) {
    $strana = $_GET['strana'];
}
else {
    $strana = 1;
}

if (!is_numeric($strana)) {
	$strana = 1;
}


$limitZisti = mysql_query('SELECT sprava_id, sprava_strankovanie FROM sprava ORDER BY sprava_id DESC');
if (mysql_num_rows($limitZisti) != '0') {
	$limitRiadok = mysql_fetch_array($limitZisti);
	$limit = $limitRiadok['sprava_strankovanie'];
}
else {
	$limit = 5;
}
mysql_free_result($limitZisti);



#STRANY VYPOCITANIE
$pocetStran = ceil($pocetRiadkov / $limit);
if ($pocetStran < $strana) {
	$strana = 1;
}
$zaciatok = ($strana * $limit) - $limit;



?>
