<?php


# HLADAJ

require 'db.php';
require 'stranka/hlava.php';
require 'stranka/vrch.php';
require 'stranka/telo1.php';

require 'admin/clanok/ukazArchiv.php';  // skipt na archiiv
echo ukazArchiv(); //vytlaci archiv funkciu


require 'stranka/telo2.php';
require 'stranka/spod.php';


?>

