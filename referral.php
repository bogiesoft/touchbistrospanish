	<?php
		/**
		 	Template Name: Referral
		**/

		get_header(); 
	?>

	<section class="business-section-generic referral-lead lead-section">
		<div class="container">
			<div class="inner">
	        	<h1 class="lead-title"><span><?php the_field('title_gold'); ?></span> <?php the_field('title_black'); ?></h1>
<!--		        <h3 class="subtitle">It could be worth <span class="strong">$400</span> to you!</h3>-->
				<h3 class="subtitle"><?php the_field('subtitle'); ?></h3>
		        <p class="intro-text">
					<?php the_field('introduction'); ?>
		        </p>

		      	<?php $image = get_field('image'); ?>
		        <img src="<?php echo get_template_directory_uri() . '/assets/images/referral-splitter.jpg' ?>">
				<?php if ($image['url']) : ?>
		        <img src="<?php echo $image['url'] ?>">
				<?php endif; ?>
		    	<h3><?php the_field('secondary_subtitle'); ?></h3>
	    	</div>
	   	</div>
	</section>

	<section class="business-section-generic referral-refer">
		<div class="container">
			<div class="column-one">
				<?php if( have_rows('how_it_works') ) : ?>
				<?php while ( have_rows('how_it_works') ) : the_row(); ?>
					<h3><?php the_sub_field('title'); ?></h3>

					<div class="step1">
						<h3><?php the_sub_field('step1_title'); ?></h3>
						<p>
							<?php the_sub_field('step1_description'); ?>
						</p>
					</div>

					<div class="step2">
						<h3><?php the_sub_field('step2_title'); ?></h3>
						<p>
							<?php the_sub_field('step2_description'); ?>
						</p>
					</div>
                    
                    <div class="step3">
						<h3><?php the_sub_field('step3_title'); ?></h3>
						<p>
							<?php the_sub_field('step3_description'); ?>
						</p>
					</div>
					<?php $image = get_sub_field('image'); ?>
					<?php if (!empty($image['url'])) : ?>
					<img src="<?php echo $image['url']; ?>">
					<?php endif; ?>
				<?php endwhile;?>
				<?php endif; ?>
			</div>
			<div class="column-two">
				<h3>Refer a friend today:</h3>
                <div class="mkto-container">
        			<iframe src="http://go.touchbistro.com/Referrals-form.html" style="max-width:100%;" name="myiFrame" scrolling="no" frameborder="0" marginheight="0px" marginwidth="0px"  height="520px" width="100%"></iframe>
        		</div>
			</div>
	   	</div>
	</section>
    <section class="business-section-generic referral-terms">
		<div class="container">
			<a href="http://newtouchbistro.wpengine.com/referral-terms-and-conditions/">Terms and Conditions</a>
	   	</div>
	</section>
    

<?php the_content(); ?>

<?php get_footer(); ?>