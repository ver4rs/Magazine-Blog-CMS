<?php


header("Content-Type: text/xml; charset=UTF-8");

# DB
require 'db.php';

$rss_datum = gmdate('D, d M Y H:i:s').' GMT';

$title = "Magazín o mobilných systémoch, IT a nejaká umelá inteligencia a pre zábavu aj robotika.";

$url = "http://www.mobilai.cz/";

$description = "Magazín o mobilných systémoch, IT a nejaká umelá inteligencia a pre zábavu aj robotika.";

$lang = "sk";

$email = "ver4rs@gmail.com";

$logo = "http://www.mobilai.cz/obrazky/apple-android.gif";



echo '<?xml version="1.0" encoding="UTF-8" ?>';

echo '<rss version="2.0">';

echo '<channel>';

echo '<title>'.$title.'</title>';

echo '<link>'.$url.'</link>';

echo '<description>'.$description.'</description>';

echo '<language>'.$lang.'</language>';

echo '<pubDate>'.$rss_datum.'</pubDate>';

echo '<lastBuildDate>'.$rss_datum.'</lastBuildDate>';

echo '<webMaster>'.$email.'</webMaster>';

echo '<image>';

echo '<title>'.$title.'</title>';

echo '<url>'.$logo.'</url>';

echo '<link>'.$url.'</link>';

echo '</image>';



$clanok = mysql_query('SELECT clanok_id, clanok_titul, clanok_url, clanok_perex, clanok_date, clanok_obrazok FROM clanky ORDER BY clanok_date DESC LIMIT 10');


while($riadok = mysql_fetch_array($clanok)) {

	echo '<item>';

	echo '<title>'. htmlspecialchars($riadok['clanok_titul']) . '</title>';

	echo '<link>' . htmlspecialchars($url) . 'clanok.php?clanok=' . htmlspecialchars($riadok['clanok_url']) . '</link>';


	echo '<description><img src="' . htmlspecialchars($url) . 'admin/obrazok/clanok/mini/' . htmlspecialchars($riadok['clanok_obrazok']) . '.jpg" title="' . htmlspecialchars($riadok['clanok_titul']) . '" alt="' . htmlspecialchars($riadok['clanok_titul']) . '"/>' . htmlspecialchars($riadok['clanok_perex']) . '</description>';

	echo '<pubDate>'. htmlspecialchars($riadok["clanok_date"]) .'</pubDate>';

	echo '</item>';

}

echo '</channel>';

echo '</rss>';



mysql_close();




?>
