<?php


$db = mysql_connect('localhost', 'name', 'password')or die(mysql_error());
mysql_select_db('databaseName', $db)or die(mysql_error());


session_start();



?>
