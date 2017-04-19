<?php

#ID OBRAZKA
$vyber = 'qwertyuioplkjhgfdsazxcvbnmQWERTGYUIOPLKJHFDSAZXCVBNM1230456789';
$vybrateId = '';
for ($i=1; $i <=6 ; $i++) {
    $vybrateId .= substr($vyber, mt_rand(0, strlen($vyber) -1), 1);
}

//echo $vybrateId;

$clanokId = mysql_query('SELECT clanok_id, clanok_obrazok
                          FROM clanky
                          WHERE clanok_obrazok ="' . mysql_real_escape_string($vybrateId) . '"');
if (mysql_num_rows($clanokId) != '0') {
    # UZ EXISTUJE
    #ID OBRAZKA
    $vyber = 'qwertyuioplkjhgfdsazxcvbnmQWERTGYUIOPLKJHFDSAZXCVBNM1230456789';
    $vybrateId = '';
    for ($i=1; $i <=6 ; $i++) {
        $vybrateId .= substr($vyber, mt_rand(0, strlen($vyber) -1), 1);
    }
    $clanokId1 = mysql_query('SELECT clanok_id, clanok_obrazok
                          FROM clanky
                          WHERE clanok_obrazok ="' . mysql_real_escape_string($vybrateId) . '"');
    if (mysql_num_rows($clanokId1) != '0') {
        # EXISTUJE
        #ID OBRAZKA
      $vyber = 'qwertyuioplkjhgfdsazxcvbnmQWERTGYUIOPLKJHFDSAZXCVBNM1230456789';
      $vybrateId = '';
      for ($i=1; $i <=6 ; $i++) {
          $vybrateId .= substr($vyber, mt_rand(0, strlen($vyber) -1), 1);
      }
      $clanokId2 = mysql_query('SELECT clanok_id, clanok_obrazok
                            FROM clanky
                            WHERE clanok_obrazok ="' . mysql_real_escape_string($vybrateId) . '"');
      if (mysql_num_rows($clanokId3) != '0') {
            #ID OBRAZKA
      $vyber = 'qwertyuioplkjhgfdsazxcvbnmQWERTGYUIOPLKJHFDSAZXCVBNM1230456789';
      $vybrateId = '';
      for ($i=1; $i <=6 ; $i++) {
          $vybrateId .= substr($vyber, mt_rand(0, strlen($vyber) -1), 1);
      }
      }

    }


}


?>
