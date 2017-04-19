<?php

/*
$saltCaptcha = '35e4w5g464w6g46we4gwer4g6e4g';

$nahodneCisloHash = md5(hash("SHA512", '5fc22')) . md5(md5(hash("SHA512", $saltCaptcha)));

echo $nahodneCisloHash;

# AKTIVACIA UCTU PO REGISTRACII

# NA OVERENIE POTREBUJEM meno_url, user_id, heslo, cas(date("H:i:s")), email

/*
$heslo = 'totoeg6rhjrehjoo';
$salt = '1853a81047771a603e71384dc6drjrjtrsj22591335884de1bf59d1d047e2771c26c2ef644f9a3a2b1a588305a48';
$kod = hash("SHA512", $heslo, $salt);
echo $kod;
*/

/*
# DB
require 'db.php';

# meno_url
$meno_url = $_GET['meno_url'];

# user_id
$user_id = $_GET['user_id'];

# heslo
$heslo = $_GET['heslo'];

# cas date H:i:s
$cas = $_GET['cas'];
$hodina = substr($cas, 0, -(strlen($cas) - strpos($cas, ':')));
$minuta = substr($cas, strpos($cas, ':')+1, -(strlen($cas) - strrpos($cas, ':')));

# email
$email = $_GET['email'];

# NACITAME
$nac = mysql_query('SELECT user_id, meno_url, password, user_cas, user_typ, email, user_typ
					FROM user
					WHERE user_id = "' . mysql_real_escape_string($user_id) . '" AND
						meno_url = "' . mysql_real_escape_string($meno_url) . '" AND
						password = "' . mysql_real_escape_string($heslo) . '" AND
						email = "' . mysql_real_escape_string($email) . '" AND
						EXTRACT(HOUR FROM user_cas)= "' . mysql_real_escape_string($hodina) . '" AND
						EXTRACT(MINUTE FROM user_cas)= "' . mysql_real_escape_string($minuta) . '"
					ORDER BY user_id DESC ');

if (mysql_num_rows($nac) != '0') {
	# EXISTUJE

}
else {
	# NEEXISTUJE

}
*/


?>
