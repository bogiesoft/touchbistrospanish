<?php
	/*if (is_page(Frontpage)){
		$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
		if($lang=='es'){
			header('location: ' . home_url() .'/' . $lang . '/');
		}
	}*/
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php wp_title('|', true, 'right'); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no">
		<link rel="alternate" href="http://www.touchbistro.com/mx/" hreflang="es" />
		<link rel="publisher" href="https://plus.google.com/116164139062035143548/about"/>
		<?php wp_head(); ?>
        <link rel="stylesheet" type="text/css" href="https://cloud.typography.com/7622272/718784/css/fonts.css" />
		<script charset="ISO-8859-1" src="//fast.wistia.com/assets/external/popover-v1.js"></script>

		<script src="http://touchbistro.com/jquery.cookie.js"></script>
        <script type="text/javascript">
	(function() {
		var didInit = false;
		function initMunchkin() {
			if(didInit === false) {
				didInit = true;
				Munchkin.init('299-BYM-827');
			}
		}
		var s = document.createElement('script');
		s.type = 'text/javascript';
		s.async = true;
		s.src = '//munchkin.marketo.net/munchkin.js';
		s.onreadystatechange = function() {
			if (this.readyState == 'complete' || this.readyState == 'loaded') {
				initMunchkin();
			}
		};
		s.onload = initMunchkin;
		document.getElementsByTagName('head')[0].appendChild(s);
		})();
	</script>
        



<?php
	if ((is_page( 1715 ) || is_page( 3277 ))){
		?>
			<!--thank you page ONLY. START SCRIPT-->
<!--Smart Display -->
<script async src="https://i.simpli.fi/dpx.js?cid=45545&conversion=10&campaign_id=0&m=1&c=mediaedgetouchbistroconv&sifi_tuid=22767"></script>

<script type="text/javascript">
     var capterra_vkey = 'df62f54273c7a8843c906ceda94495ac',
     capterra_vid = '2099666',
     capterra_prefix = (('https:' == document.location.protocol) ? 'https://ct.capterra.com' : 'http://ct.capterra.com');

     (function() {
     var ct = document.createElement('script'); ct.type = 'text/javascript'; ct.async = true;
     ct.src = capterra_prefix + '/capterra_tracker.js?vid=' + capterra_vid + '&vkey=' + capterra_vkey;
     var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ct, s);
     })();
     </script>

<!-- Bing conversion tracking code -->
<script>(function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[],f=function(){var o={ti:"4047059"};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)})(window,document,"script","//bat.bing.com/bat.js","uetq");</script><noscript><img src="//bat.bing.com/action/0?ti=4047059&Ver=2" height="0" width="0" style="display:none; visibility: hidden;" /></noscript>

<!-- END OF SCRIPT FOR THE THANK YOUU PAGE ONLY -->
<?php
		}
		?>




		<?php

		if (!(is_page( 1715 ) || is_page( 3277 ))){

		?>
			<!--not the thank you page-->

<!-- Smart Display Remarketing code -->
<script async src="https://i.simpli.fi/dpx.js?cid=45545&action=100&segment=mediaedgetouchbistrosite&m=1&sifi_tuid=22767"></script>

<script>(function() {
var _fbq = window._fbq || (window._fbq = []);
if (!_fbq.loaded) {
var fbds = document.createElement('script');
fbds.async = true;
fbds.src = '//connect.facebook.net/en_US/fbds.js';
var s = document.getElementsByTagName('script')[0];
s.parentNode.insertBefore(fbds, s);
_fbq.loaded = true;
}
_fbq.push(['addPixelId', '1568655450074615']);
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', 'PixelInitialized', {}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=1568655450074615&amp;ev=PixelInitialized" /></noscript>
		<?php
		}

		?>


	<script>
				if ($.cookie('touchbistro_referrer') == null ) {$.cookie('touchbistro_referrer', document.referrer);
				}


				setTimeout( function(){


					var $source = $("[name='searchRefferer']");

					if ( $source.length){

					    $("[name='searchRefferer']").val($.cookie('touchbistro_referrer'));

					}
				  }
				 , 1500 );

				setTimeout( function(){

						$( ".mktoFormRow > input[type='hidden']" ).parent().css('display','none');


				  }
				 , 2000 );

				setTimeout( function(){

						$( ".mktoFormRow > input[type='hidden']" ).parent().css('display','none');


				  }
				 , 3000 );



				setTimeout( function(){

						$( ".mktoFormRow > input[type='hidden']" ).parent().css('display','none');


				  }
				 , 4000 );


			});
		</script>



			<script>var ufh_top_offset = 0, ufh_bottom_offset = 0;</script>


		<?php

		if (is_page( 5329 )){

		?>

	<style>
		@media all and (min-width: 1400px) {

		.container {
			width:90% !important;
		}
		}
	</style>

	<?php  } ?>



<!--[if IE 9 ]>    <style type="text/css">


    @media (min-width:1300px) {
    .emvready {
    background-image: url(../img/emv2.png);
    height:74px;
    width: 220px;float: left;margin-left: 143px;float: left;position: relative;margin-top: 18px;
}
}


    @media (max-width:1299px) {
    .emvreadybottom {
    background-image: url(../img/emv.png);
    height: 105px;
    width: 320px;
    float: none;
    position: relative;
    left: 0;
    right: 0;
    margin: auto;
    text-align: center;
    margin-top: 54px;
}
}


@media (max-width:769px) {
    .emvreadybottom {
    height: 105px;
    width: 320px;
    background-size:100%;
    margin-bottom: 54px;
}
}



    @media (max-width:1400px) {
.st-header .emvready {
    margin-left: 54px;
}

}

    @media (max-width:1436px) {
.restaurant-success-library .emvready {
    margin-left: 119px;
}
}


</style>
<![endif]-->

	</head>