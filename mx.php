<?php
/*
	Template Name: mx
*/
?>

<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php wp_title('|', true, 'right'); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no">
		<link rel="publisher" href="https://plus.google.com/116164139062035143548/about"/>
        <link rel="alternate" href="http://www.touchbistro.com/" hreflang="en" />
		<?php wp_head(); ?>
        <link rel="stylesheet" type="text/css" href="https://cloud.typography.com/7622272/718784/css/fonts.css" />
		<script charset="ISO-8859-1" src="//fast.wistia.com/assets/external/popover-v1.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function () {
				// Google Analytics
	
					(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
						(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
						m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
											})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

					ga('create', 'UA-34185994-1', 'auto');
					ga('send', 'pageview');
					console.log('========>>>> Tracking this page <<<<========');
					//]]>
			});
		</script>
        <?php echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/assets/js/slick-1.5.9/slick/slick.css"/>
<script type="text/javascript" src="' . get_template_directory_uri() . '/assets/js/slick-1.5.9/slick/slick.min.js"></script>
        '; ?>
			<script>var ufh_top_offset = 0, ufh_bottom_offset = 0;</script>
</head>
<body <?php body_class(); ?>>
	<!--[if lt IE 8]>
	<div class="alert alert-warning">
	  <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
	</div>
	<![endif]-->

	<?php
	do_action('get_header');
	// Use Bootstrap's navbar if enabled in config.php 
	?>


	<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="#lead" class="brand">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/touchbistro-logo.png" width="186" height="42" alt="TouchBistro" />
      </a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
            <li>
            	<a href="#full-service">Servicio Completo</a>
            </li>
            <li>
            	<a href="#quick-service">Servicio Rápido</a>
            </li>
            <li>
            	<a href="#features">Características</a>
            </li>
            <li>
            	<a href="#pricing">Precios</a>
            </li>
            <li>
            	<a href="#customers">Clientes</a>
            </li>
            <li>
            	<a href="#contact">Contacto</a>
            </li>
        </ul>
    </div>
    <a class="lang-switch"  href="<?php echo home_url(); ?>/">English Website &gt;</a>
  </div>
</nav>



<?php $pageID = url_to_postid( $_SERVER["REQUEST_URI"] );
$getTrack = get_field('google_analitycs', $pageID);

	if(($getTrack) || ($pageID == 0)){
		$track = 'yes';
	}
	else{
		$track = 'no';
	}

?>
	<input id="googleTrack" type="hidden" name="googleTrack" analyticsTrack="<?php echo $track ?>">
	<div class="wrap <?php echo $stContainer ?>" role="document">
		<div class="content">
			<main id="<?php echo $mainID; ?>" class="main <?php echo $mainClass; ?>" role="main">
				<?php while (have_posts()) : the_post(); ?>

<section id="lead">
	<div class="container">
    	<h1 class="verydarkgrey"><?php the_field('title'); ?></h1>
        <a class="btn fs-btn" href="#full-service"><?php the_field('fs_btn'); ?></a>
        <a class="btn qs-btn" href="#quick-service"><?php the_field('qs_btn'); ?></a>
        <?php the_post_thumbnail(); ?>
        <div class="fs intro"><?php the_field('fs_intro_text'); ?></div>
        <div class="qs intro"><?php the_field('qs_intro_text'); ?></div>
	</div>
</section>
<section id="customers">
	<div class="container">
    	<h2><?php the_field('customers_title'); ?></h2>
    	<?php  if(have_rows('customers')) : ?>
        	<div class="customers row">
			<?php while (have_rows('customers')) : the_row(); ?>
			<div class="customer col-xs-6 col-md-3">
				<div class="logo">
					<?php $logo = get_sub_field('logo'); ?>
                    <img src="<?php echo $logo['url']; ?>" alt="<?php echo get_sub_field('name'); ?> Logo">
                </div>
                <h4><?php echo get_sub_field('name'); ?></h4>
                <div class="type"><?php echo get_sub_field('type'); ?></div>
            </div>
            <?php endwhile; ?>
            </div>
		<?php endif; ?>
	</div>
</section>
<section id="full-service">
	<div class="container">
    	<h2><?php the_field('fs_title'); ?></h2>
    	<div class="row">
        	<div class="col-md-7">
            	<?php  if( have_rows('fs_images') ) : ?>
                     <?php $item_no=0; ?>
                     <div class="fs-slider">
					<?php while ( have_rows('fs_images') ) : the_row();?>
                         <?php  if( get_sub_field('img') != '') : ?>
                         	<?php $item_no = $item_no + 1; ?>
                         	<?php $img = get_sub_field('img'); ?>
                               <div class="fs-slide<?php echo ' slide' . $item_no; ?>"><img alt="<?php echo 'slide ' . $item_no; ?>" src="<?php echo $img['url']; ?>"></div>
                         <?php  endif; ?>
					<?php  endwhile; ?>
                    </div>
				<?php  endif; ?>
        	</div>
        	<div class="col-md-5">
         		<h4><?php the_field('fs_subtitle'); ?></h4>
        		<div><?php the_field('fs_text'); ?></div>
        	</div>
        </div>
        <h3 class="turquoise"><?php the_field('fs_features_title'); ?></h3>
        <?php  if(have_rows('fs_features')) : ?>
        	<div class="key-features row">
			<?php while (have_rows('fs_features')) : the_row(); ?>
			<div class="key-feature">
                <h4><?php echo get_sub_field('name'); ?></h4>
                <div class="desc"><?php echo get_sub_field('description'); ?></div>
            </div>
            <?php endwhile; ?>
            </div>
		<?php endif; ?>
	</div>
</section>
<section id="quick-service">
	<div class="container">
    		<h2><?php the_field('qs_title'); ?></h2>
    		<div class="row">
        	<div class="col-md-7 col-md-push-5">
            	<?php  if( have_rows('qs_images') ) : ?>
                     <?php $item_no=0; ?>
                     <div class="qs-slider">
					<?php while ( have_rows('qs_images') ) : the_row();?>
                         <?php  if( get_sub_field('img') != '') : ?>
                         	<?php $item_no = $item_no + 1; ?>
                         	<?php $img = get_sub_field('img'); ?>
                               <div class="qs-slide<?php echo ' slide' . $item_no; ?>"><img alt="<?php echo 'slide ' . $item_no; ?>" src="<?php echo $img['url']; ?>"></div>
                         <?php  endif; ?>
					<?php  endwhile; ?>
                    </div>
				<?php  endif; ?>
        	</div>
        	<div class="col-md-5 col-md-pull-7">
        		<h4><?php the_field('qs_subtitle'); ?></h4>
        		<div><?php the_field('qs_text'); ?></div>
        	</div>
        </div>
        <h3 class="turquoise"><?php the_field('qs_features_title'); ?></h3>
        <?php  if(have_rows('qs_features')) : ?>
        	<div class="key-features row">
			<?php while (have_rows('qs_features')) : the_row(); ?>
			<div class="key-feature">
                <h4><?php echo get_sub_field('name'); ?></h4>
                <div class="desc"><?php echo get_sub_field('description'); ?></div>
            </div>
            <?php endwhile; ?>
            </div>
		<?php endif; ?>
        
	</div>
</section>
<section id="features">
	<div class="container">
    <h2><?php the_field('features_title'); ?></h2>
    <h4><?php the_field('features_subtitle'); ?></h4>
    <div class="features">
    <?php  if(have_rows('all_features')) : ?>
    	<?php $item_no=0; ?>
        <ul class="nav nav-tabs feature-groups" role="tablist">
		<?php while (have_rows('all_features')) : the_row(); ?>
        	<?php $item_no = $item_no + 1; ?>
            <li role="presentation"<?php if($item_no===1){echo ' class="active"';} ?>><a href="#<?php echo 'slide' . $item_no ?>" aria-controls="<?php echo 'slide' . $item_no ?>" role="tab" data-toggle="tab"><?php echo get_sub_field('feature_group'); ?></a></li>
        <?php endwhile; ?>
		</ul>
	<?php endif; ?>
    
    
    <?php  if(have_rows('all_features')) : ?>
    	<?php $item_no=0; ?>
        <div class="tab-content feature-lists">
		<?php while (have_rows('all_features')) : the_row(); ?>
        	<?php $item_no = $item_no + 1; ?>
			<div role="tabpanel" class="tab-pane<?php if($item_no===1){echo ' active';} ?>" id="<?php echo 'slide' . $item_no ?>">
			<?php if( have_rows('features') ): ?>
				<ul class="feature-list">
					<?php while( have_rows('features') ): the_row(); ?>
                    	<li><p><?php echo get_sub_field('feature'); ?></p></li>
					<?php endwhile; ?>
				</ul>
			<?php endif; ?>
            </div>
        <?php endwhile; ?>
		</div>
	<?php endif; ?>
    </div>
	</div>
</section>
<section id="pricing">
	<div class="container">
    	<h2><?php the_field('pricing_title'); ?></h2>
        <h4><?php the_field('pricing_subtitle'); ?></h4>
    <?php if( have_rows('pricing_pods') ) { ?>
		<div class="pricing-plans row">
		<?php while ( have_rows('pricing_pods') ) { the_row(); ?>
          <?php $title = get_sub_field('title'); ?>
		  <div class="pricing-pods <?php echo mb_strtolower($title); ?>-pod col-sm-6 col-md-3">
			<h3 class="pod-title"  style="color: <?php the_sub_field('pod_color'); ?>;">
				<?php the_sub_field('title'); ?>
			</h3>
			<div class="price">
				<div class="price-group">
					<span class="currency-symbol">&dollar;</span>
					<span class="price-value"><?php the_sub_field('price'); ?></span>
					<span class="currency">USD</span>
					<span class="schedule">/MO.</span>
				</div>
			</div>
			<div class="billing"><?php the_sub_field('billing'); ?></div>
			<div class="licence"><?php the_sub_field('licence'); ?></div>
			<?php $pod_image = get_sub_field('licence_image'); ?>
			<img src="<?php echo $pod_image['url']; ?>" alt="<?php echo $pod_image['alt']; ?>" class="pricing-ipads">
	
			<div class="pod-about">
    		<h6 class="content-heading">Recomendado para:</h6>
				<?php the_sub_field('description'); ?>
			</div>

			<div class="buttoncontainer">
				<a class="button" href="#contact" style="background-color: <?php the_sub_field('pod_color'); ?>;">Contactenos!</a>
			</div>
		  </div>
          
		<?php } ?>
        </div>
	<?php } ?>
	</div>
</section>
<section id="who-we-are">
	<div class="container">
    		<div class="row">
            <div class="col-md-5 col-md-push-7">
            	<h2><?php the_field('who_title'); ?></h2>
        		<h4><?php the_field('who_subtitle'); ?></h4>
        		<div class="text"><?php the_field('who_text'); ?></div>
        	</div>
        	<div class="col-md-7 col-md-pull-5">
                         <?php  if( get_field('who_img') != '') : ?>
                         	<?php $img = get_field('who_img'); ?>
                               <div class="image"><img alt="about us photo" src="<?php echo $img['url']; ?>"></div>
                         <?php  endif; ?>
        	</div>
        </div>
	</div>
</section>
<section id="why-love-tb">
	<div class="container">
    	<h2><?php the_field('love_tb_title'); ?></h2>
        <?php  if(have_rows('love_tb')) : ?>
        	<div class="key-features">
			<?php while (have_rows('love_tb')) : the_row(); ?>
			<div class="key-feature">
                <h4 class="turquoise"><?php echo get_sub_field('title'); ?></h4>
                <div class="desc"><?php echo get_sub_field('description'); ?></div>
            </div>
            <?php endwhile; ?>
            </div>
		<?php endif; ?>
	</div>
</section>
<section id="contact">
	<div class="container">
    	
    	<div class="row">
			<div class="contact-info col-md-6">
            	<h3>Representante en Mexico</h3>
                <p><a class="phone" href="tel:525568197071">+52 55 6819 7071</a></p>
                <div class="social-links">
						<div class="logo twitter"><a href="http://www.twitter.com/touchbistro/" target="_blank">t</a></div>
                        <div class="logo facebook"><a href="http://www.facebook.com/touchbistro/" target="_blank">f</a></div>
                        <div class="logo instagram"><a href="http://www.instagram.com/touch_bistro/" target="_blank">i</a></div>
                        <div class="logo googleplus"><a href="https://plus.google.com/115077828120648643548/" target="_blank">g</a></div>
                        <div class="logo youtube"><a href="http://www.youtube.com/user/touchbistro" target="_blank">yt</a></div>
				</div>
            </div>
            <div class="contact-form col-md-6">
            	<h2><?php the_field('contact_title'); ?></h2>
            	<?php echo do_shortcode('[contact-form-7 id="6923" title="Contact Form Spanish"]'); ?>
            </div>
        </div>
	</div>
</section>
<?php endwhile; ?>
			</main>
		</div>
	</div>

	<?php
		$args = array(
			'post_type' => 'modal',
			'posts_per_page' => -1
		);

		$my_query = null;
		$my_query = new WP_Query($args);
		if($my_query->have_posts()) {
			while ($my_query->have_posts()) : $my_query->the_post();
	?>
		<div id="modal-<?php echo get_the_ID(); ?>" class="modal fade in" aria-hidden="false">
		</div>
	<?php
			endwhile;
		}
	?>

	<div class="<?php echo $footerClass; ?>">
	<footer id="footer" role="contentinfo">
    	<div class="container">
        </div>
    </footer>
    </div>
<!--<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>-->
<script type="text/javascript">
jQuery('a.brand, .navbar-nav a, #lead .btn, .pricing-pods a.button').on('click', function(e){
    e.preventDefault();
    var speed = 400;
    var href =  jQuery(this).attr('href');
    var target = jQuery(href == '#' || href == "" ? 'html' : href);
    var position = target.offset().top;
    jQuery('body, html').animate({scrollTop:position}, speed, 'swing');
    return false;
});
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
jQuery(document).ready(function(){
  jQuery('.fs-slider, .qs-slider').slick({
  dots: true
  });
});
</script>
<div class="footer-extras">
<?php wp_footer(); ?>
</div>
</body>

</html>