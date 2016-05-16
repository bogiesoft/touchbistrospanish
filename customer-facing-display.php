	<?php
		/**
		 	Template Name: Customer Facing Display
		**/

		get_header();
	?>

	<section class="business-section-generic customer-facing-display-lead lead-section">
		<div class="container">
        	<h1 class="lead-title"><?php the_field('title'); ?></h1>
            <h3><?php the_field('subtitle'); ?></h3>
	        <p class="intro-text">
				<?php the_field('introduction'); ?>
	        </p>
	    </div>

	    <section class="business-section-generic floating-hero-text">
		    <div class="container">
				<div class="floating-left-image">
					<img src="<?php the_field('overlay_image'); ?>" class="img-responsive">
				</div>
				<div class="floating-left-image over-floating os-animation animate fadeIn" data-os-animation="fadeIn" data-os-animation-delay="0.6s">
					<img src="<?php the_field('overlay_image_animate_to'); ?>" class="img-responsive">
				</div>
				<div class="floating-hero-text-pod">
					<?php  if( have_rows('key_features_and_benefits') ) : ?>
					<?php while ( have_rows('key_features_and_benefits') ) : the_row(); ?>
					<h3><?php the_sub_field('title'); ?></h3>
						<?php  if( have_rows('text_pods') ) : ?>
						<?php while ( have_rows('text_pods') ) : the_row(); ?>
						<p>
							<span class="strong"><?php the_sub_field('title'); ?></span><br>
							<?php the_sub_field('text') ?>
						</p>
						<?php endwhile; ?>
						<?php endif; ?>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</section>
	</section>


	<?php  if( have_rows('text_section') ) : ?>
	<?php while ( have_rows('text_section') ) : the_row(); ?>
	<section class="business-section-generic customer-facing-display">
		<div class="container">
			<h2><?php the_sub_field('title'); ?></h2>
			<p><?php the_sub_field('text'); ?></p>
			<?php
			$image = get_sub_field('link_image');
			$link_image_url = get_sub_field('link_image_url');
			$link_image_tag = TbHtmlHelper::makeLinkImageTag(
				$image['url'],
				$link_image_url,
				array('image' => array('class' => 'apple-logo'))
			);
			?>
			<?php echo $link_image_tag; ?>
	</section>
	<?php endwhile; ?>
	<?php endif; ?>

<?php the_content(); ?>

<?php get_footer(); ?>
