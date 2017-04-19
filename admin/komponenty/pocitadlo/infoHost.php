<?php


$ua = $_SERVER["HTTP_USER_AGENT"];

/* ==== Detect the OS ==== */

// ---- Mobile ----

// Android
$android = strpos($ua, 'Android') ? true : false;

// BlackBerry
$blackberry = strpos($ua, 'BlackBerry') ? true : false;

// iPhone
$iphone = strpos($ua, 'iPhone') ? true : false;

// Palm
$palm = strpos($ua, 'Palm') ? true : false;

// ---- Desktop ----

// Linux
$linux = strpos($ua, 'Linux') ? true : false;

// Macintosh
$mac = strpos($ua, 'Macintosh') ? true : false;

// Windows
$win = strpos($ua, 'Windows') ? true : false;

/* ============================ */


 /* ==== Detect the UA ==== */

// Chrome
$chrome = strpos($ua, 'Chrome') ? true : false; // Google Chrome

// Firefox
$firefox = strpos($ua, 'Firefox') ? true : false; // All Firefox
$firefox_2 = strpos($ua, 'Firefox/2.0') ? true : false; // Firefox 2
$firefox_3 = strpos($ua, 'Firefox/3.0') ? true : false; // Firefox 3
$firefox_3_6 = strpos($ua, 'Firefox/3.6') ? true : false; // Firefox 3.6

// Internet Exlporer
$msie = strpos($ua, 'MSIE') ? true : false; // All Internet Explorer
$msie_7 = strpos($ua, 'MSIE 7.0') ? true : false; // Internet Explorer 7
$msie_8 = strpos($ua, 'MSIE 8.0') ? true : false; // Internet Explorer 8

// Opera
$opera = preg_match("/\bOpera\b/i", $ua); // All Opera


// Safari
$safari = strpos($ua, 'Safari') ? true : false; // All Safari
$safari_2 = strpos($ua, 'Safari/419') ? true : false; // Safari 2
$safari_3 = strpos($ua, 'Safari/525') ? true : false; // Safari 3
$safari_3_1 = strpos($ua, 'Safari/528') ? true : false; // Safari 3.1
$safari_4 = strpos($ua, 'Safari/531') ? true : false; // Safari 4

/* ============================ */






//Tests for browsers and operating systems



 if ($ua) {

 // ---- Test if using a Handheld Device ----
   if ($android) { // Android
    $operSystem = 'Android';
   }
   elseif ($blackbery) { // Blackbery
    $operSystem = 'Blackberry';
   }
   elseif ($iphone) { // iPhone
    $operSystem = 'iPhone';
   }
   elseif ($palm) { // Palm
    $operSystem = 'Palm';
   }

  elseif ($linux) { // Linux Desktop
    $operSystem = 'Linux';
  }
  elseif ($win) {
    $operSystem = 'Windows';
  }
  else {
    $operSystem = 'Neviem';
  }



 // ---- Test if Firefox ----
 if ($firefox) {
    $prehliadac = 'Firefox';
/*
   // Test Versions
   if ($firefox_2) { // Firefox 2
   echo 'Version 2';
   }
   elseif ($firefox_3) { // Firefox 3
   echo 'Version 3';
   }
   elseif ($firefox_3_6) { // Firefox 3.6
   echo 'Version 3.6';
   }
   else { // A version not listed
   echo 'What Version do you use?';
   }
*/
 }

 // ---- Test if Safari or Chrome ----
 elseif ( ($safari || $chrome) && !$iphone) {
   //echo '(Safari or Chrome?)';

   if ($safari && !$chrome) { // Test if Safari and not Chrome
     $prehliadac = 'Safari';

     // Test if Safari Mac or Safari Windows
     /*if ($mac && $safari) { // Safari Mac
     echo 'You are using Safari on a Mac
    ';
     }
     if ($win && $safari) { // Safari Windows
     echo 'You are using Safari on Windows
    ';
     }

     // Test Versions
     if ($safari_2) { // Safari 2
     echo 'Version 2
    ';
     }
     elseif ($safari_3) { // Safari 3
     echo 'Version 3
    ';
     }
     elseif ($safari_4) { // Safari 4
     echo 'Version 4
    ';
     }
     else {
     echo 'What version are you using?';
     }
*/
   }

   elseif ($chrome) { // Test if Chrome
   $prehliadac = 'Chrome';
   }

 }

 // ---- Test if iPhone with Safari 3.1 ----
 elseif ($iphone && $safari_3_1) {
    $prehliadac = 'Safari';
 }

 // ---- Test if Internet Explorer ----
 elseif ($msie) {
  $prehliadac = 'Internet Explorer';

   // Test Versions
   /*if ($msie_7) { // Internet Explorer 7
   echo 'Version 7';
   }
   elseif ($msie_8) { // Internet Explorer 8
   echo 'Version 8';
   }
   else {
   echo 'What Version do you use?';
   }
*/
 }

 // ---- Test if Opera ----
 elseif ($opera) {
 $prehliadac = 'Opera';
 }

 // ---- If none of the above ----
 else {
 $prehliadac = 'Neviem';
 }

 }



 ?>
<script language='JavaScript'>
 <!--

 //document.write(screen.width+' x '+screen.height);

 //-->

 </script>
 <?php
// Detect language from user agent browser



$jazyk = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
/*
$aaa = array(
'af', // afrikaans.
'ar', // arabic.
'bg', // bulgarian.
'ca', // catalan.
'cs', // czech.
'da', // danish.
'de', // german.
'el', // greek.
'en', // english.
'es', // spanish.
'et', // estonian.
'fi', // finnish.
'fr', // french.
'gl', // galician.
'he', // hebrew.
'hi', // hindi.
'hr', // croatian.
'hu', // hungarian.
'id', // indonesian.
'it', // italian.
'ja', // japanese.
'ko', // korean.
'ka', // georgian.
'lt', // lithuanian.
'lv', // latvian.
'ms', // malay.
'nl', // dutch.
'no', // norwegian.
'pl', // polish.
'pt', // portuguese.
'ro', // romanian.
'ru', // russian.
'sk', // slovak.
'sl', // slovenian.
'sq', // albanian.
'sr', // serbian.
'sv', // swedish.
'th', // thai.
'tr', // turkish.
'uk', // ukrainian.
'zh' // chinese.
);
*/

?>
