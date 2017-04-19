<?php



# STATISTIKA

# IP ADRESA
//$ipAdresa1 = $_SERVER['REMOTE_ADDR'];

# URL ADRESA
$host = $_SERVER['HTTP_HOST'];
$self = $_SERVER['PHP_SELF'];
$query = !empty($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : null;
$url = !empty($query) ? "http://$host$self?$query" : "http://$host$self";
//echo $url;

# PRIEHLADAC
//$prehliadac = '<script style="text/javascript"> document.write( navigator.appName ); </script>';

# JAZYK
//$jazyk = '<script style="text/javascript"> document.write( navigator.language ); </script>';

# PLATFORMA
//$platforma = '<script style="text/javascript"> document.write( navigator.platform ); </script>';


$statistikaUloz = mysql_query('INSERT INTO statistika (statistika_id, statistika_url, statistika_ip, statistika_prehliadac, statistika_jazyk, statistika_platforma)
                          VALUES (NULL,
                                  "' . mysql_real_escape_string($url) . '",
                                  "' . mysql_real_escape_string($_SERVER['REMOTE_ADDR']) . '",
                                  "' . mysql_real_escape_string($prehliadac) .'",
                                  "' . mysql_real_escape_string($jazyk) . '",
                                  "' . mysql_real_escape_string($operSystem) . '") ');



?>


