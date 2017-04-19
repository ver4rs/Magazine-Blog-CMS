<?php

require 'db.php';

# pre online
$odhlas = 'DELETE FROM online WHERE user_id ="' . $_SESSION['user_id'] . '" AND online_vyber=1';
$odhlas1 = mysql_query($odhlas)or die(mysql_error());

session_start();

session_unset();
session_destroy();


		$_SESSION['user_id'] = '';
		$_SESSION['level_id'] = '';
		$_SESSION['meno'] = '';
		$_SESSION['email'] = '';
		$_SESSION['website'] = '';
		$_SESSION['user_obrazok'] = '';
/*
		$_SESSION['sprava_menu'] = '';
		$_SESSION['sprava_clanok'] = '';
		$_SESSION['sprava_system'] = '';
*/

		header('Location: /');
		exit();

?>

