<?php

include_once '../mod/stranka/hlava.php';


echo 'Ahoj ja som sekcire  r';

if (isset($_GET['sekcia'])) {
	echo '  ' . $_GET['sekcia'] . ' a ' . $_GET['kat'];
}



echo '<br>';
echo $_SERVER['PHP_SELF'];










require $urlStranka . 'stranka/spod.php';


?>
