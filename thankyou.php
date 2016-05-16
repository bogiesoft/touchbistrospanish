<?php
  /**
    Template Name: Thank you
  **/

  get_header();
?>

<div class="topborder"></div>
<section class="business-section-generic">
	<div class="container">
  		<h2><?php echo the_title();?></h2>
		<div class="container thankyou-content">
		<?php echo apply_filters('the_content', $post->post_content); ?>
		</div>
	</div>
</section>
<section class="business-section-generic home-restaurant-success">
		<div class="container">
<!-- Uberflip Embedded Hub Widget -->
<div id="UfEmbeddedHub1456439187353"></div>
<script>window._ufHubConfig = window._ufHubConfig || [];window._ufHubConfig.push({'containers':{'app':'#UfEmbeddedHub1456439187353'},'collection':'203679','openLink':function(url){window.open(url);},'lazyloader':{'itemDisplayLimit':20,'maxTilesPerRow':4,'maxItemsTotal':4},'tileSize':'small','enablePageTracking':true,'baseUrl':'http://restaurantsuccess.touchbistro.com/','filesUrl':'http://uberflip.cdntwrk.com/','generatedAtUTC':'2016-02-25 22:25:00'});</script>
<script>(function(d,t,u){function load(){var s=d.createElement(t);s.src=u;d.body.appendChild(s);}if(window.addEventListener){window.addEventListener('load',load,false);}else if(window.attachEvent){window.attachEvent('onload',load);}else{window.onload=load;}}(document,'script','http://restaurantsuccess.touchbistro.com/hubsFront/embed_collection'));</script>
<!-- /End Uberflip Embedded Hub Widget -->
		</div>
</section>
<section id="calltoaction">Discover how to take your restaurant to the next level.  <a href="http://restaurantsuccess.touchbistro.com/" class="button">Check out the Restaurant Success Library</a></section>
<?php get_footer(); ?>
