<?php

require 'db.php';

if ($_GET['menu'] == '') {
	header('Location: ../../prihlas.php');
	exit();
}


require 'stranka/hlava.php';
require 'stranka/vrch.php';
require 'stranka/telo1.php';



#MENU NAVIGACIA ZOBRAZI CLANKY PODLA VYBERU SEKCIE/KATEGORIE
require 'admin/clanok/clanokMenu.php';
echo menu(); // funkcia menu cele


require 'stranka/telo2.php';
# spod stranky
require 'stranka/spod.php';

?>
