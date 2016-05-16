	<?php
		/**
		 	Template Name: Kitchen Display System
		**/

		get_header(); 
	?>

	<section class="business-section-generic kitchen-facing-display-lead full-hero-section lead-section">
		<div class="container">
        	<h1 class="lead-title"><?php the_field('title'); ?></h1>
			<h3><?php the_field('subtitle'); ?></h3>
	        <p class="intro-text">
				<?php the_field('introduction'); ?>
 	        </p>
	    </div>
		
			<section class="business-section-generic kds">
		<div class="container">
			<div class="floating-left-image">
				<img src="<?php echo get_field('kds_overlay_image'); ?>" class="img-responsive">
			</div>
			<section class="benefits-section">		
				<div class="benefits">
					<?php  if( have_rows('text_pod') ) : ?>
					<?php while ( have_rows('text_pod') ) : the_row(); ?>
					<h3><?php the_sub_field('title'); ?></h3>
					<ul>
						<?php  if( have_rows('benefits') ) : ?>
						<?php while ( have_rows('benefits') ) : the_row(); ?>
						<li><?php the_sub_field('text'); ?></li>
						<?php endwhile; ?>
						<?php endif; ?>
					</ul>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</section>	
		</div>
	</section>
	</section>



    <section class="business-section-generic kitchen-facing-display kitchen-facing-display-key-features">
		<div class="container">
			<?php  if( have_rows('key_features_section') ) : ?>
			<?php while ( have_rows('key_features_section') ) : the_row(); ?>
			<div class="features">
				<h3><?php the_sub_field('title'); ?></h3>
				<ul>
					<?php  if( have_rows('features') ) : ?>
					<?php while ( have_rows('features') ) : the_row(); ?>
					<li><?php the_sub_field('text'); ?></li>
					<?php endwhile; ?>
					<?php endif; ?>
				</ul>
			</div>
			<?php $image = get_sub_field('image'); ?>
			<div class="lead-graphic">
				<img src="<?php echo $image['url'] ?>" alt="">
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</section>

	<?php  if( have_rows('text_section') ) : ?>
	<?php while ( have_rows('text_section') ) : the_row(); ?>
	 <section class="business-section-generic kitchen-facing-display kds-getting-started">
	    <div class="container">
			<h2><?php the_sub_field('title'); ?></h2>
			<p><?php the_sub_field('text_area'); ?></p>
			<?php
			$image = get_sub_field('link_image');
			$link_image_url = get_sub_field('link_image_url');
			$link_image_tag = TbHtmlHelper::makeLinkImageTag(
				$image['url'],
				$link_image_url,
				array('image' => array('class' => 'apple-logo'))
			);
			echo $link_image_tag;
			?>
		</div>
	</section>
	<?php endwhile; ?>
	<?php endif; ?>

<?php the_content(); ?>

<?php get_footer(); ?>