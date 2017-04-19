<?php

$cas_sekunda = '';
$cas_minuta = '';
$cas_hodina = '';

$datum_den = '';
$datum_mesiac = '';
$datum_rok = '';

/*
$dlzka = strlen($clanok_date);
$odel = strpos($clanok_date, ' ');
$cas = substr($clanok_date, $odel+1);
//datum
$datum = substr($clanok_date, 0, $odel);
//odstranime medzery
$cas = trim($cas);
$datum = trim($datum);
*/

//cas
//$cas_sekunda = substr($cas, strrpos($cas, ':')+1); // sekunda
//$cas_minuta = substr($cas, strpos($cas, ':')+1, -(strlen($cas) - strrpos($cas, ':')));  //minuta
//$cas_hodina = substr($cas, 0, -(strlen($cas) - strpos($cas, ':')));  //hoina
$cas_sekunda = date('s', strtotime($clanok_date));
$cas_minuta = date('i', strtotime($clanok_date));
$cas_hodina = date('H', strtotime($clanok_date));


//datum
//$datum_den = substr($datum, strrpos($datum, '-')+1); //den
//$datum_mesiac = substr($datum, strpos($datum, '-')+1, -(strlen($datum) - strrpos($datum, '-')));  //mesiac
//$datum_rok = substr($datum, 0, -(strlen($datum) - strpos($datum, '-')));  //rok
$datum_rok = date('Y', strtotime($clanok_date));
$datum_mesiac = date('m', strtotime($clanok_date));
$datum_den = date('d', strtotime($clanok_date));

//datum den
if (substr($datum_den, 0, - 1) == '0') {
    $datum_den = substr($datum_den, 1);
}

$aj_cislo = array("01","02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
$sk_nazov = array("Január", "Ferbuár", "Marec", "Apríl", "Máj", "Jún", "Júl", "August", "September", "Október", "November", "December");

$datum_mesiac = str_replace($aj_cislo, $sk_nazov, $datum_mesiac);


?>
