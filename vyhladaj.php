<?php


# HLADAJ

require 'db.php';
require 'stranka/hlava.php';
require 'stranka/vrch.php';
require 'stranka/telo1.php';

require 'admin/clanok/hladaj.php';  //skipt na vyhladavanie
echo hladaj(); // funkcia vytlaci


require 'stranka/telo2.php';
require 'stranka/spod.php';


?>

