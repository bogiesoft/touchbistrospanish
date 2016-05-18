	<?php
		/**
		 	Template Name: Home Page
		**/

		get_header();
	?>
<?php
$ismobile = check_user_agent('mobile');
?>
	<div class="business-section-generic home-hero-lead lead-section" <?php  if(!($ismobile)) : ?>data-vide-bg="<?php echo get_template_directory_uri() . '/assets/videos/video' ?>" data-vide-options="loop: false, muted: false, position: 0% 0%"<?php endif; ?>>
		<div class="container">

			<section class="home-hero-pods fade-in one">
				<h1 class="lead-title fade-in two"><?php the_field('hero_banner'); ?></h1>
				<img src="<?php echo get_template_directory_uri() . '/assets/images/hero-title-line.jpg' ?>" class="splitter">


				<div class="home-primary-pod fade-in three">

					<?php if( have_rows('fullservice_pod') ): ?>
						<?php while( have_rows('fullservice_pod') ): the_row(); ?>
							<h4> <?php the_sub_field('title'); ?> </h4>
		
							<p> <span><?php the_sub_field('sub_title')?></span><br><?php the_sub_field('about') ?></p>
							

							<a href="<?php echo esc_url( home_url( '/pos-solutions/restaurant-pos/' ) ); ?>" class="pod-button pod-button-left"><?php the_sub_field('button')?></a>
						<?php	endwhile;	 endif; ?>

			
					
					<img src="<?php echo get_template_directory_uri() . '/assets/images/hand.png' ?>" class="single-image hand-image">
				</div>

				<div class="home-secondary-pod fade-in three">

					<?php if( have_rows('quickservice_pod') ): ?>
						<?php while( have_rows('quickservice_pod') ): the_row(); ?>
							<h4> <?php the_sub_field('title'); ?> </h4>
		
							<p> <span><?php the_sub_field('sub_title')?> </span><br><?php the_sub_field('about') ?></p>
							<a href="<?php echo esc_url( home_url( '/pos-solutions/quick-service-pos/' ) ); ?>" class="pod-button pod-button-right"><?php the_sub_field('button') ?></a>
						<?php	endwhile;	 endif; ?>
					
					<img src="<?php echo get_template_directory_uri() . '/assets/images/ipad_pro.png' ?>" class="single-image ipad-image">
				</div>

				<h3 class="full-service-hover"><?php the_field('left_banner'); ?></h3>

				<h3 class="quick-service-hover"><?php the_field('right_banner'); ?></h3>




			</section>
			<a href="#">
				<img src="<?php echo get_template_directory_uri() . '/assets/images/down-arrow-heros.png' ?>" class="hvr-hang down-arrow">
			</a>
		</div>
	</div>

	<section class="home-slides-section" data-nav-mousewheel="true">

		<div class="business-section-generic home-slides home-slide-one full-hero-section" id="slide-1">

			<div class="home-slide">
				<div class="container">

				<img src="<?php echo get_template_directory_uri() . '/assets/images/home-slide-1.jpg' ?>">


				</div>

			</div>
													<!--
																Test -->
																<div id="textarea">
																	<div id="textblock">
																		<div id="textblockscrollable">
																			<div id="scrollablecontainer">
																				 <i id="overlayicons"><i id="iconcontainer" class="iconcontainerthree"></i></i>

																				
																				 <h2><?php the_field('parallax_title') ?></h2>
 																				<section class="home-slide-text">
 																					<div class="text-pod">

 																						<?php if( have_rows('slides') ): ?>
																					<?php while( have_rows('slides') ): the_row(); ?>
																						<h3> <?php the_sub_field('title'); ?> </h3>
																	
																						<p> <?php the_sub_field('description') ?></p>
																						
																					<?php	break; endwhile;	 endif; ?>

 																					</div>
 																				</section>

																			</div>
																		</div>
																	</div>
																</div>
													<!--
																				test -->
		</div>

		<div class="business-section-generic home-slides home-slide-two full-hero-section" id="slide-2">

			<div class="home-slide">
				<div class="container">

					<img src="<?php echo get_template_directory_uri() . '/assets/images/home-slide-2.jpg' ?>">

				</div>


							</div>


							<!--
										Test -->
										<div id="textarea">
											<div id="textblock">
												<div id="textblockscrollable">
													<div id="scrollablecontainer">
														 <i id="overlayicons"><i id="iconcontainer" class="iconcontainerone"></i></i>
																				<section class="home-slide-text">
																					<div class="text-pod">
																						<?php if( have_rows('slides') ): ?>
																					<?php while( have_rows('slides') ): the_row(); ?>
																						<h3> <?php the_sub_field('title'); ?> </h3>
																	
																						<p> <?php the_sub_field('description') ?></p>
																						
																					<?php	break; endwhile;	 endif; ?>
																					</div>
																				</section>


													</div>
												</div>
											</div>
										</div>
							<!--
														test -->


		</div>

		<div class="business-section-generic home-slides home-slide-three full-hero-section" id="slide-3">

			<div class="home-slide">
				<div class="container">

					<img src="<?php echo get_template_directory_uri() . '/assets/images/home-slide-3.jpg' ?>">

				</div>
			</div>
										<!--
													Test -->
													<div id="textarea">
														<div id="textblock">
															<div id="textblockscrollable">
																<div id="scrollablecontainer">
																	 <i id="overlayicons"><i id="iconcontainer" class="iconcontainertwo"></i></i>
																 	<section class="home-slide-text">
																 		<div class="text-pod">
																 			<?php if( have_rows('slides') ): ?>
																					<?php while( have_rows('slides') ): the_row(); ?>
																						<h3> <?php the_sub_field('title'); ?> </h3>
																	
																						<p> <?php the_sub_field('description') ?></p>
																						
																					<?php	break; endwhile;	 endif; ?>
																 		</div>
																 	</section>

																</div>
															</div>
														</div>
													</div>
										<!--
																	test -->


		</div>

	</section>


	<section id="restaurantslove">
		<div class="res-title">
			<?php the_field('quote_title'); ?>
		</div>

		<div class="heart"><i class="fa fa-heart-o fa-3"></i>
		</div>

		<div class="res-quote">
			<?php if( have_rows('quotes') ): ?>
				<?php while( have_rows('quotes') ): the_row(); ?>
					<?php the_sub_field('quote'); ?>
																					
			<?php endwhile;	 endif; ?>
		</div>

		<div class="res-owner">
			<?php if( have_rows('quotes') ): ?>
				<?php while( have_rows('quotes') ): the_row(); ?>
					<?php the_sub_field('author'); ?>
																					
			<?php	endwhile;	 endif; ?>
		</div>


	</section>

	<section id="videos" class="business-section-generic">
		<div class="container">
			<a href="//fast.wistia.net/embed/iframe/a2a8t5jrv0?autoPlay=false&amp;popover=true" class="minivid1 boxes wistia-popover[height=568,playerColor=b69859,width=960]">
			<div class="video-pods vpodone" data-vide-bg="<?php echo get_template_directory_uri() . '/assets/minivideos/brick/video' ?>" data-vide-options="autoplay:true,loop: true, muted: false, position: 0% 0%">
				<div class="video-pod-content">
					<!-- <img src="<?php echo get_template_directory_uri() . '/assets/images/brickyard-still.jpg' ?>"> -->
					
						
				
                        <?php if( have_rows('video') ): ?>
                        	<p class="shown">
							<?php while( have_rows('video') ): the_row(); ?>
								
								<span class="video-pod-category"><?php the_sub_field('category', false, false); ?></span>
								<span class="video-pod-company"><?php the_sub_field('company', false, false); ?></span>
								
								<span class="vid-pod-quote"><?php the_sub_field('quote', false, false); ?></span>
								<span class="name"><?php the_sub_field('owner', false, false); ?></span>
																								
							<?php break; endwhile;?> 
							</p>
						<?php endif; ?>
					
				
				
				</div>
			</div>
			</a>
			<a href="//fast.wistia.net/embed/iframe/xhf31apfe1?autoPlay=false&amp;popover=true" class="minivid2 boxes wistia-popover[height=568,playerColor=b69859,width=960]">
			<div class="video-pods vpodtwo" data-vide-bg="<?php echo get_template_directory_uri() . '/assets/minivideos/crosstown/video' ?>" data-vide-options="autoplay:true,loop: true, muted: false, position: 0% 0%">
				<div class="video-pod-content">
					<!-- <img src="<?php echo get_template_directory_uri() . '/assets/images/crosstown-still.jpg' ?>"> -->
					<?php if( have_rows('video') ): ?>
                        	<p class="shown">
							<?php while( have_rows('video') ): the_row(); ?>
								
								<span class="video-pod-category"><?php the_sub_field('category', false, false); ?></span>
								<span class="video-pod-company"><?php the_sub_field('company', false, false); ?></span>
								
								<span class="vid-pod-quote"><?php the_sub_field('quote', false, false); ?></span>
								<span class="name"><?php the_sub_field('owner', false, false); ?></span>
																								
							<?php break; endwhile;?> 
							</p>
						<?php endif; ?>
				</div>
			</div>
		  </a>
		  <a href="//fast.wistia.net/embed/iframe/7dtlhvebgd?autoPlay=false&amp;popover=true" class="minivid3 boxes wistia-popover[height=568,playerColor=b69859,width=960]">
			<div class="video-pods vpodthree" data-vide-bg="<?php echo get_template_directory_uri() . '/assets/minivideos/steam/video' ?>" data-vide-options="autoplay:true,loop: true, muted: false, position: 0% 0%">
				<div class="video-pod-content">
					<!-- <img src="<?php echo get_template_directory_uri() . '/assets/images/steamwhistle-still.jpg' ?>"> -->
					<?php if( have_rows('video') ): ?>
                        	<p class="shown">
							<?php while( have_rows('video') ): the_row(); ?>
								
								<span class="video-pod-category"><?php the_sub_field('category', false, false); ?></span>
								<span class="video-pod-company"><?php the_sub_field('company', false, false); ?></span>
								
								<span class="vid-pod-quote"><?php the_sub_field('quote', false, false); ?></span>
								<span class="name"><?php the_sub_field('owner', false, false); ?></span>
																								
							<?php break; endwhile;?> 
							</p>
						<?php endif; ?>
				</div>
			</div>
		  </a>

			<a href="<?php echo esc_url( home_url( '/customers/' ) ); ?>"><?php the_field('extra_video')?></a>
		</div>
	</section>

	<section class="business-section-generic home-we-love-customers">
		<div class="container">
			<h2><?php the_field('people_title')?></h2>
			<p><?php the_field('people_copy')?></p>
			<img src="<?php echo get_template_directory_uri() . '/assets/images/Customer_Success_image.jpg' ?>" class="hidedesktop">
			<img src="<?php echo get_template_directory_uri() . '/assets/images/success_team_desktop.jpg' ?>" class="hidemobile">

		</div>
	</section>
    <?php
$awards_section = get_field('awards_section');
?>
	<section class="business-section-generic">
	<div class="container">
		<section id="awards" class="awards-four-aside">

			<h2><?php echo $awards_section[0]['title']; ?></h2>

			<?php $awards = $awards_section[0]['awards']; ?>
			<?php //$x = 0.3; 
			foreach ($awards as $row) :
				//$x = $x + 0.3; ?>
				<?php $image = get_field('image', $row['award']); ?>
				<!--<div class="award-pods os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="<?php //echo $x;?>s">-->
                <div class="award-pods">
					<div class="award-image">
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
					</div>
					<p><?php echo $row['award']->post_title; ?></p>
				</div>
			<?php endforeach; ?>

		</section>
	</div>
	</section>
	<section class="business-section-generic home-restaurant-success">
		<div class="container">
		<h2><?php the_field('uberflip_title')?></h2>
			<p><?php the_field('uberflip_copy')?></p>



<?php if(get_field('uberflip_1')!='' && get_field('uberflip_2')!='' && get_field('uberflip_3')!='' && get_field('uberflip_4')!=''): ?>
<div class="uberflips">
<?php 
echo get_field('uberflip_1');
echo get_field('uberflip_2');
echo get_field('uberflip_3');
echo get_field('uberflip_4');
?>
</div>
<?php else: ?>
<!-- Uberflip Embedded Hub Widget -->
<div id="UfEmbeddedHub1456439187353"></div>
<script>window._ufHubConfig = window._ufHubConfig || [];window._ufHubConfig.push({'containers':{'app':'#UfEmbeddedHub1456439187353'},'collection':'203679','openLink':function(url){window.open(url);},'lazyloader':{'itemDisplayLimit':20,'maxTilesPerRow':4,'maxItemsTotal':4},'tileSize':'small','enablePageTracking':true,'baseUrl':'http://restaurantsuccess.touchbistro.com/','filesUrl':'http://uberflip.cdntwrk.com/','generatedAtUTC':'2016-02-25 22:25:00'});</script>
<script>(function(d,t,u){function load(){var s=d.createElement(t);s.src=u;d.body.appendChild(s);}if(window.addEventListener){window.addEventListener('load',load,false);}else if(window.attachEvent){window.attachEvent('onload',load);}else{window.onload=load;}}(document,'script','http://restaurantsuccess.touchbistro.com/hubsFront/embed_collection'));</script>
<!-- /End Uberflip Embedded Hub Widget -->
<?php endif; ?>



		</div>
	</section>

	<section id="calltoaction">
<?php the_field('rsl_link_copy'); ?>  <a href="http://restaurantsuccess.touchbistro.com/" class="button"><?php the_field('rsl_link_btn')?></a></section>


<?php get_footer(); ?>
