<?php

#UPRAV PROFIL

if (!isset($_SESSION['user_id'])) {
	header('Location: ../../prihlas.php');
	exit();
}



#ZOBRAZENIE
//zobrazenie
$ludia = mysql_query('SELECT  user_id, email, password, meno, website, pohlavie, user_mesto, user_popis, user_obrazok FROM user WHERE user_id="' . mysql_real_escape_string($_SESSION['user_id']) . '"');
if (mysql_num_rows($ludia) != '0') {
	$riadok = mysql_fetch_array($ludia);
	extract($riadok);
}

mysql_free_result($ludia);

$cesta_ludia = 'admin/obrazok/uzivatel/normal/' . $user_obrazok . '.jpg';


?>
