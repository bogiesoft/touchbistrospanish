	<?php
		/**
		 	Template Name: Setup and Implemetation
		**/

		get_header();
	?>



	<?php

	$single_titles = [];
	$single_descriptions = [];

	if( have_rows('solo', 1210) ) :

	  while ( have_rows('solo', 1210) ) : the_row();

	  $number = get_sub_field('number');

		$title = get_sub_field('title');
		$description = get_sub_field('description');

		$single_titles[$number] = $title;
		$single_descriptions[$number] = $description;



	 endwhile;
	 endif;


	 $multi_titles = [];
	 $multi_descriptions = [];

	 if( have_rows('multi', 1210) ) :

	   while ( have_rows('multi', 1210) ) : the_row();

	   $number = get_sub_field('number');
	   $title = get_sub_field('title');
	   $description = get_sub_field('description');

	   $multi_titles[$number] = $title;
	   $multi_descriptions[$number] = $description;


 	 endwhile;
 	 endif;

	?>



	<section id="solo" class="business-section-generic setup-lead setup-sections lead-section">
		<div class="container">

			<div class="section-toggles">
				<ul>
					<li class="active"><a href="#solo"><span>	<?php echo get_field('solo_setup_title'); ?></span></a></li>
					<li><a href="#multi"><span>	<?php echo get_field('multi_setup_title'); ?></span></a></li>
				</ul>
			</div>

        	<h1 class="lead-title"><?php echo get_field('solo_setup_title'); ?></h1>

	        <div class="intro-text">
<?php echo get_field('solo_setup_introduction'); ?>
	        </div>

			<div class="setup-hover-section">

				<div class="popups hybrid-popup">
					<div class="popup-content">
						<h3><?php echo $single_titles['hybrid'];?></h3>
						<p>
						<?php echo $single_descriptions['hybrid'];?>
						</p>
						<div class="triangle"></div>
					</div>
				</div>

				<div class="popups one-popup">
					<div class="popup-content">
						<h3><?php echo $single_titles['one'];?></h3>
						<p>
							<?php echo $single_descriptions['one'];?>
						</p>
						<div class="triangle"></div>
					</div>
				</div>

				<div class="popups two-popup">
					<div class="popup-content">
						<h3><?php echo $single_titles['two'];?></h3>
						<p>
							<?php echo $single_descriptions['two'];?>
						</p>
						<div class="triangle"></div>
					</div>
				</div>

				<div class="popups three-popup">
					<div class="popup-content">
						<h3><?php echo $single_titles['three'];?></h3>
						<p>
							<?php echo $single_descriptions['three'];?>
						</p>
						<div class="triangle"></div>
					</div>
				</div>

				<div class="popups four-popup">
					<div class="popup-content">
						<h3><?php echo $single_titles['four'];?></h3>
						<p>
							<?php echo $single_descriptions['four'];?>
						</p>
						<div class="triangle"></div>
					</div>
				</div>

				<div class="popups five-popup">
					<div class="popup-content">
						<h3><?php echo $single_titles['five'];?></h3>
						<p>
							<?php echo $single_descriptions['five'];?>
						</p>
						<div class="triangle"></div>
					</div>
				</div>

				<ul class="toggle-menu toggles solo">
		        	<li class="hybrid"><?php echo $single_titles['hybrid'];?></li>
		        	<li class="one"><?php echo $single_titles['one'];?></li>
					<li class="two"><?php echo $single_titles['two'];?></li>
					<li class="three"><?php echo $single_titles['three'];?></li>
					<li class="four"><?php echo $single_titles['four'];?></li>
					<li class="five"><?php echo $single_titles['five'];?></li>
				</ul>

				<img src="<?php echo get_field('solo_image'); ?>" class="lead-graphic">

				<ul class="image-toggles toggles solo">
		        	<li class="hybrid hybrid-dark"><?php echo $single_titles['hybrid'];?></li>
		        	<li class="one"><?php echo $single_titles['one'];?></li>
					<li class="two"><?php echo $single_titles['two'];?></li>
					<li class="three"><?php echo $single_titles['three'];?></li>
					<li class="four"><?php echo $single_titles['four'];?></li>
					<li class="five"><?php echo $single_titles['five'];?> </li>
				</ul>

			</div>

	    </div>

	</section>

	<section id="multi" class="business-section-generic setup-multi setup-sections">
		<div class="container">

			<div class="section-toggles">
				<ul>
					<li><a href="#solo"><span><?php echo get_field('solo_setup_title'); ?></span></a></li>
					<li class="active"><a href="#multi"><span><?php echo get_field('multi_setup_title'); ?></span></a></li>
				</ul>
			</div>

        	<h1 class="lead-title"><?php echo get_field('multi_setup_title'); ?></h1>

	        <div class="intro-text">
						<?php echo get_field('multi_setup_introduction'); ?>

	        </div>

			<div class="setup-hover-section multi">


								<div class="popups hybrid-popup-m">
									<div class="popup-content">
										<h3><?php echo $multi_titles['hybrid'];?></h3>
										<p>
										<?php echo $multi_descriptions['hybrid'];?>
										</p>
										<div class="triangle"></div>
									</div>
								</div>

								<div class="popups one-popup-m">
									<div class="popup-content">
										<h3><?php echo $multi_titles['one'];?></h3>
										<p>
											<?php echo $multi_descriptions['one'];?>
										</p>
										<div class="triangle"></div>
									</div>
								</div>

								<div class="popups two-popup-m">
									<div class="popup-content">
										<h3><?php echo $multi_titles['two'];?></h3>
										<p>
											<?php echo $multi_descriptions['two'];?>
										</p>
										<div class="triangle"></div>
									</div>
								</div>

								<div class="popups three-popup-m">
									<div class="popup-content">
										<h3><?php echo $multi_titles['three'];?></h3>
										<p>
											<?php echo $multi_descriptions['three'];?>
										</p>
										<div class="triangle"></div>
									</div>
								</div>

								<div class="popups four-popup-m">
									<div class="popup-content">
										<h3><?php echo $multi_titles['four'];?></h3>
										<p>
											<?php echo $multi_descriptions['four'];?>
										</p>
										<div class="triangle"></div>
									</div>
								</div>

								<div class="popups five-popup-m">
									<div class="popup-content">
										<h3><?php echo $multi_titles['five'];?></h3>
										<p>
											<?php echo $multi_descriptions['five'];?>
										</p>
										<div class="triangle"></div>
									</div>
								</div>

								<div class="popups six-popup-m">
									<div class="popup-content">
										<h3><?php echo $multi_titles['six'];?></h3>
										<p>
											<?php echo $multi_descriptions['six'];?>
										</p>
										<div class="triangle"></div>
									</div>
								</div>
                                <div class="popups seven-popup-m">
									<div class="popup-content">
										<h3><?php echo $multi_titles['seven'];?></h3>
										<p>
											<?php echo $multi_descriptions['seven'];?>
										</p>
										<div class="triangle"></div>
									</div>
								</div>




				<ul class="toggle-menu toggles multi">
							<li class="hybrid"><?php echo $multi_titles['hybrid'];?></li>
							<li class="one"><?php echo $multi_titles['one'];?></li>
					<li class="two"><?php echo $multi_titles['two'];?></li>
					<li class="three"><?php echo $multi_titles['three'];?></li>
					<li class="four"><?php echo $multi_titles['four'];?></li>
					<li class="five"><?php echo $multi_titles['five'];?></li>
					<li class="six"><?php echo $multi_titles['six'];?></li>
                    <li class="seven"><?php echo $multi_titles['seven'];?></li>

				</ul>



				<img src="<?php echo get_field('multi_image'); ?>" class="lead-graphic">

				<ul class="image-toggles toggles multi">
				      <li class="hybrid"><?php echo $multi_titles['hybrid'];?></li>
				      <li class="one"><?php echo $multi_titles['one'];?></li>
				  <li class="two"><?php echo $multi_titles['two'];?></li>
				  <li class="three"><?php echo $multi_titles['three'];?></li>
				  <li class="four"><?php echo $multi_titles['four'];?></li>
				  <li class="five"><?php echo $multi_titles['five'];?> </li>
					<li class="six"><?php echo $multi_titles['six'];?></li>
                    <li class="seven"><?php echo $multi_titles['seven'];?></li>

				</ul>


			</div>

	    </div>

	</section>

	<script type="text/javascript">
		var popupNumber = '';


		jQuery( ".solo li" ).hover(
			function() {
				popupNumber = jQuery(this).attr('class').split(' ')[0];
				jQuery( ".solo li" ).removeClass('active');
				jQuery('.solo li.'+ popupNumber ).addClass('active');
				jQuery('.popups').css( "display", "none");
				jQuery('#solo .'+ popupNumber +'-popup' ).css( "display", "block");
			}, function() {
				jQuery('.solo li.'+ popupNumber ).removeClass('active');
				jQuery('#solo .'+ popupNumber +'-popup' ).css( "display", "none");
			}
		);
		
		jQuery('#solo .popups').hover(
			function() {
				popupNumber = jQuery(this).attr('class').split(' ')[1].slice(0,-6);;
				jQuery( ".solo li" ).removeClass('active');
				jQuery('.solo li.'+ popupNumber ).addClass('active');
				jQuery('.popups').css( "display", "none");
				jQuery('#solo .'+ popupNumber +'-popup' ).css( "display", "block");
			}, function() {
				jQuery('.solo li.'+ popupNumber ).removeClass('active');
				jQuery('#solo .'+ popupNumber +'-popup' ).css( "display", "none");
			}
		);

		/* multi */
		jQuery( ".multi li" ).hover(
			function() {
				jQuery( ".multi li" ).removeClass('active');
				jQuery('.multi li.'+ jQuery(this).attr('class').split(' ')[0] ).addClass('active');
				jQuery('.popups').css( "display", "none");
				jQuery('#multi .'+ jQuery(this).attr('class').split(' ')[0] +'-popup-m' ).css( "display", "block");
			}, function() {
				jQuery('.multi li.'+ jQuery(this).attr('class').split(' ')[0] ).removeClass('active');
				jQuery('#multi .'+ jQuery(this).attr('class').split(' ')[0] +'-popup-m' ).css( "display", "none");
			}
		);
		
		jQuery('#multi .popups').hover(
			function() {
				popupNumber = jQuery(this).attr('class').split(' ')[1].slice(0,-8);;
				jQuery( ".multi li" ).removeClass('active');
				jQuery('.multi li.'+ popupNumber ).addClass('active');
				jQuery('.popups').css( "display", "none");
				jQuery('#multi .'+ popupNumber +'-popup-m' ).css( "display", "block");
			}, function() {
				jQuery('.multi li.'+ popupNumber ).removeClass('active');
				jQuery('#multi .'+ popupNumber +'-popup-m' ).css( "display", "none");
			}
		);

	
	</script>

<?php the_content(); ?>

<?php get_footer(); ?>
