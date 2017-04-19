<?php

/*
header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
header("Cache-Control: post-check=0, pre-check=0",false);
session_cache_limiter("must-revalidate");

session_start();
*/
require 'skratka.php';
include 'admin/system/titul.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml" xml:lang="sk" lang="sk">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#
                  website: http://ogp.me/ns/website#">

	<title><?php echo $hlavaTitul; ?></title>

	<!-- META -->
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="robots" content="index, follow" />
	<meta name="description" content="<?php echo $hlavaPopis; ?>" />
	<meta name="keywords" content="<?php echo $hlavaPopis; ?>" />
	<meta name="author" content="ver4rs" />
	<meta name="copyright" content="Copyright 2012" />
	<link rel="alternate" type="application/rss+xml" title="RSS - mobilai" href="http://www.mobilai.cz/rss.php" target="t_blank"/>


	<!-- FAVICON -->
	<link rel="shortcut icon" href="obrazky/favicon.ico">
	<link rel="icon" type="image/gif" href="<?php echo $hlavaObrazok; ?>">
	<!-- KONIEC FAVICON -->

	<meta content="<?php echo $hlavaObrazok; ?>" property="og:image" />


	<!-- FEED -->




	<!-- UPLOAD IMAGE JE VO FORMULARY  -->




 <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-37674283-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>	<!-- SLIDER -->
	<link rel="stylesheet" href="slider/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="slider/style.css" type="text/css" media="screen" />
	<script src="slider/jquery.min.js" type="text/javascript"></script>
	<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>  -->
	<script src="slider/cufon-yui.js" type="text/javascript"></script>
	<script src="slider/Museo_Slab.font.js" type="text/javascript"></script>
	<script src="slider/jquery.nivo.slider.pack.js" type="text/javascript"></script>


	<!-- CSS -->
	<link rel="stylesheet" href="template/styl.css" type="text/css" media="screen"/>
	<link rel="stylesheet" href="template/menu1.css" type="text/css" media="screen"/>
	<link rel="stylesheet" href="template/profil.css" type="text/css" media="screen"/>
	<!-- koniec CSS -->





	<!--  slider  -->
	<script type="text/javascript" >
		$(window).load(function() {

			setTimeout(function(){
				$('#slider4').nivoSlider({
					effect:'random',
					animSpeed:500,
					pauseTime:2000,
					startSlide:0,
					directionNav:true,
					controlNav:true,
					keyboardNav:true,
					pauseOnHover:false
				});
			}, 3000);
		});
	</script>
	<!--  koniec slider  -->



	<!--  tabulka na menu  -->
	<script type="text/javascript">
	 $(function() {
			/* For zebra striping */
	        $("table tr:nth-child(odd)").addClass("odd-row");
			/* For cell text alignment */
			$("table td:first-child, table th:first-child").addClass("first");
			/* For removing the last border */
			$("table td:last-child, table th:last-child").addClass("last");
	});
	</script>
	<!--  koniec tabulka na menu -->




	<!--  jquery tabulka sortable -->
    <script type="text/javascript">
    $(function() {
        var tabs = $( "#tabs" ).tabs();
        tabs.find( ".ui-tabs-nav" ).sortable({
            axis: "x",
            stop: function() {
                tabs.tabs( "refresh" );
            }
        });
    });
    </script>
	<!--  koniec jquery tabulka sortable -->


	<!--  jquery tabulka sortable -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" type="text/css" media="screen" />
    <!-- <script src="http://code.jquery.com/jquery-1.8.2.js"></script> -->
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js" type="text/javascript"></script>
	<!--  koniec jquery tabulka sortable -->




	<!--   jquery max pocet pismen  -->
	<script type="text/javascript">
		function imposeMaxLength(Event, Object, MaxLen)
		{
		    return (Object.value.length <= MaxLen)||(Event.keyCode == 8 ||Event.keyCode==46||(Event.keyCode>=35&&Event.keyCode<=40))
		}
	</script>
	<!--   koniec jquery max pocet pismen  -->

	<!--   email validator  -->
	<script type="text/javascript">
		function isValidEmailAddress(emailAddress) {
		var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
		return pattern.test(emailAddress);
		}


		$(document).ready(function() {

			$("#validate").keyup(function(){
			var email = $("#validate").val();

				if(email != 0) {
					if(isValidEmailAddress(email)) {
						$("#validEmail").css({ "background-image": "url('obrazky/validYes.png')" });
					}
					else {
						$("#validEmail").css({ "background-image": "url('obrazky/validNo.png')" });
					}
				}
				else {
					$("#validEmail").css({ "background-image": "none" });
				}
			});
		});
	</script>
	<!--   koniec email validator  -->

	<!--   koniec pre potvrdenie captcha ak je prazdne  -->
	<script type="text/javascript">

		function check() {

			if(document.form1.cislo.value==0) {
				alert("Text z obrázka nebol vypísaný");
				document.form1.cislo.focus();
				return false;
			}
		}
	</script>
	<!--   koniec pre potvrdenie captcha ak je prazdne  -->

<script type="text/javascript">
/*
$(document).ready(function () {
    var interval = 2000;   //number of mili seconds between each call
    var refresh = function() {
        $.ajax({
            url: "",
            cache: false,
            success: function(html) {
                $('#takToJeNaMneAleNajdiToTyKur').html(html);
                setTimeout(function() {
                    refresh();
                }, interval);
            }
        });
    };
    refresh();
});
*/
</script>

<script type="text/javascript">
/*
$(function() {
  $('#sLavo').delegate('.strankovanie a', 'click', function() {
      var path = $(this).attr('href');

      $('#sLavo').load(path + ' .clanok, .strankovanie, #ReklamaMedziClanok ');


      return false;
  });
});
*/
</script>

</head>
<body>
<?php
require 'admin/komponenty/pocitadlo/infoHost.php'; // zistenie informacii o uzivatelovi
# STATISTIKA
require 'admin/komponenty/pocitadlo/statistika.php'; // ulozenie informacii o uzivatelovi
# POCITADLO
require 'admin/komponenty/pocitadlo/pocitadlo.php'; // online, pocet dokopy vsetko

?>
<div class="velke">



<div id="vrch">

	<div id="hpanel">

			<?php  require 'admin/ludia/main.php'; ?>

	</div>




