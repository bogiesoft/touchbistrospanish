<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head <?php do_action( 'add_head_attributes' ); ?>>
<?php /*if thank you pages*/
if( is_page( array( 6699, 1638, 6843, 6842, 6718 ) ) ) : ?>
<meta name="robots" content="noindex">
<?php endif; ?>
	<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/7622272/718784/css/fonts.css" />
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( ' | ', true, 'right' );?></title>
	<!--<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" /> -->
	<link rel="icon" href="http://www.touchbistro.com/wp-content/uploads/2014/05/Favicon.png" type="image/png"/>

	<?php wp_head(); ?>
    <?php if( !(is_page( 'home' ))) : ?>
<script type='text/javascript' src='<?php echo get_template_directory_uri() . "/assets/js/waypoints.min.js"; ?>'></script>
<?php endif; ?>
    
		<script charset="ISO-8859-1" src="//fast.wistia.com/assets/external/popover-v1.js" async></script>
        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-34185994-1', 'auto');
  ga('require', 'displayfeatures');
  ga('send', 'pageview');

</script>
        <script type="text/javascript">
	(function() {
  var didInit = false;
  function initMunchkin() {
    if(didInit === false) {
      didInit = true;
      Munchkin.init('609-GRA-876');
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
    <?php /*if generic thankyou page*/
if( is_page( 6843 ) ) : ?>
<script async src="https://i.simpli.fi/dpx.js?cid=45545&conversion=10&campaign_id=0&m=1&c=mediaedgetouchbistroconv&sifi_tuid=22767"></script>
<?php endif; ?>
    

	<!--[if IE]>
    	<link href="/stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <![endif]-->
</head>
<body <?php body_class(); ?> itemscope <?php if( is_page( 'contact-us' )) { ?>itemtype="https://schema.org/ContactPage"<?php } else if( is_page( 'about-us' )) { ?>itemtype="https://schema.org/AboutPage"<?php } else { ?>itemtype="http://schema.org/WebPage"<?php } ?>>
<!-- GOOGLE TAG MANAGER TRACKING CODE -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-WVHJ39"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WVHJ39');</script>
<!-- END GOOGLE TAG MANAGER -->
	<div class="all">
<?php if( !is_page_template( 'nav-less.php' ) ) : ?>
<div class="navigation">
	<div id="initial-navigation">
		<div class="container">
			<!-- WP generates this container -->
			<div class="menu-initial-menu-container">
				<ul class="menu" id="menu-initial-menu">
					<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-25" id="menu-item-25">
						<a href="http://restaurantsuccess.touchbistro.com/">Restaurant Success Library</a>
					</li>
					<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-26" id="menu-item-26">
						<a href="<?php echo esc_url( home_url( '/help/' ) ); ?>">English Support</a>
					</li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24" id="menu-item-26">
						<a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Contact Us</a>
					</li>
					<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-26" id="menu-item-26">
						<a href="https://cloud.touchbistro.com/" rel="nofollow">Sign In</a>
					</li>
				</ul>
			</div>
<?php do_action('wpml_add_language_selector'); ?>
			<div href="#" alt="Lang" class="lang">
				<img src="<?php echo get_template_directory_uri() . '/assets/images/earth-icon-arrow.png' ?>">
                <ul>
                	<li><a class="mx" href="/mx/">Español</a></li>
                </ul>
			</div>
		</div>
	</div>
<div class="main-navigation">
	<div class="container">
		<header id="header" role="banner">
			<a class="mobile-burger-nav" href="#">
				<img src="<?php echo get_template_directory_uri() . '/assets/images/burger-menu.jpg' ?>">
			</a>
			<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img src="<?php echo get_template_directory_uri() . '/assets/images/vector-smart-object.png' ?>" alt="TouchBistro Logo" height="42" width="186">
			</a>

			<!-- look in nav-backup.php for menu structure -->

			<nav id="menu" role="navigation" class="main-menu">
				<div class="menu-main-menu-container">
					<a class="mobile-menu-back-toggle" href="#">
						Back
					</a>
					<a class="mobile-menu-close-toggle" href="#"><span></span></a>
					<ul class="menu" id="menu-main-menu">
						<?php if (function_exists(get_tb_menu())) get_tb_menu(); ?>
					</ul>
				</div>
			</nav>
		</header>
	</div>
    </div>
</div>

	<div id="top"></div>
	<span id="top-link-block" class="top-link-block">
	    <a href="#top">
	        <i class="fa fa-chevron-up"></i>
	    </a>
	</span>
<?php endif; ?>