<?php
/*
*********************
*********************************** upload image
***********************************
*********************
*/

require '../../db.php';
require'../komponenty/captchaId.php';

$last_id = $vybrateId;


error_reporting(0);

$change="";
$abc="";

define('UPLOAD_DIR_MINI', '../obrazok/uzivatel/mini/'); //horny panel mini
define('UPLOAD_DIR_NORMAL', '../obrazok/uzivatel/normal/'); // na komentare stredny
define('UPLOAD_DIR_ORIGINAL', '../obrazok/uzivatel/original/'); // original
//velkost
 define ("MAX_SIZE","800");
 //funkcia na premenu nazvu name obrazku
 function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }

 $errors=0;




  $image = $_FILES["obrazokUloz"]["name"];
  $uploadedfile = $_FILES['obrazokUloz']['tmp_name'];


  if ($image)
  {


    $filename = stripslashes($_FILES['obrazokUloz']['name']);

      $extension = getExtension($filename);
    $extension = strtolower($extension);


 if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
    {

      $change='<div class="msgdiv">Obrazok ma zly format.</div> ';
      $errors=1;
    }
    else
    {

 $size=filesize($_FILES['obrazokUloz']['tmp_name']);


if ($size > MAX_SIZE*1024)
{
  $change='<div class="msgdiv">Maximalna velkost je ' . MAX_SIZE . '</div>';
  $errors=1;
}


if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['obrazokUloz']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);

}
else if($extension=="png")
{
$uploadedfile = $_FILES['obrazokUloz']['tmp_name'];
$src = imagecreatefrompng($uploadedfile);

}
else
{
$src = imagecreatefromgif($uploadedfile);
}

//$src = imagecreatefromjpg, gif, png, jpeg($uploadedfile); ----- original suboru

//echo $scr;

list($width,$height)=getimagesize($uploadedfile);

//$filenam = UPLOAD_DIR_ORIGINAL . $_FILES['obrazokUloz']['name'];  //original
//$filenam = UPLOAD_DIR_ORIGINAL . $user_id . '.' . $extension;  //original
$filenam = UPLOAD_DIR_ORIGINAL . $last_id . '.jpg';  //original



imagejpeg($src,$filenam,90);

$normal = UPLOAD_DIR_NORMAL . $last_id . '.jpg';  //mensi
$mini = UPLOAD_DIR_MINI . $last_id . '.jpg';   //mini
//--------------------------------------------------------------------------------------
//------------------------ nove ------------------
include 'resize-class.php';

// *** 1) Initialise / load image
  $resizeObj = new resize($filenam);

  // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
  $resizeObj -> resizeImage(150, 150, 'crop');

  // *** 3) Save image
  $resizeObj -> saveImage($normal , 95);

//===-=-=-=-=-=

  $resize = new resize($filenam);
  // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
  $resize -> resizeImage(60, 70, 'crop');

  // *** 3) Save image
  $resize -> saveImage($mini , 90);
//----------------------------------------------------------------------------------

imagedestroy($src);  //original
imagedestroy($normal);
imagedestroy($mini);
imagedestroy($filenam);

/*
# NEPOTREBUJEM ROVNO ULOZIM

# ZAPIS TXT
$ces = $_SESSION['user_id'] . '.TXT';
// otevře soubor data2.txt pro zápis
$fp = fopen($ces, "w");
// povedlo se soubor otevřít?
if ($fp)
{
  // uloží obsah proměnné $data do souboru data2.txt
  FWrite($fp, $last_id);
  // zavře soubor data2.txt
  FClose($fp);
}
*/

$zmenaObrazokId = mysql_query('UPDATE user SET user_obrazok = "' . mysql_real_escape_string($last_id) . '" WHERE user_id = "' . mysql_real_escape_string($_SESSION['user_id']) . '" ');

?>

<img src="admin/obrazok/uzivatel/normal/<?php echo $last_id; ?>.jpg" alt="<?php //echo $last_id; ?>" title="<?php //echo $last_id; ?>">

<?php


}}


?>
