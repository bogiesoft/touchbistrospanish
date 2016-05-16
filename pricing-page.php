	<?php
		/**
		 	Template Name: Pricing Page
		**/

		get_header();
	?>

	<section class="business-section-generic pricing-section-lead lead-section">
	<div class="container">
		<h1 class="lead-title"><?php the_field('page_title'); ?></h1>
		<h3 class="lead-title newline"><?php the_field('tagline'); ?></h3>

		<p class="intro-text">
			<?php the_field('page_introduction'); ?>
		</p>

		<section id="pricing-section">
			<!-- WILL NEED ACF REPEATER -->
			<?php
			if( have_rows('pricing_pods') ) {
				while ( have_rows('pricing_pods') ) {
					the_row();
					get_template_part( 'pricing-pods', 'part' );
				}
			}
			?>
			<div class="hardware-notice">
				<?php the_field('hardware_notice'); ?>
                <?php  if (get_field('hardware_link')) : ?>
                	<a href="<?php echo esc_url( home_url( '/hardware-requirements/' ) ); ?>"><?php the_field('hardware_link'); ?></a>
                <?php  endif; ?>

			</div>
		</section>

		<section id="pricing-includes">
			<h5><?php the_field('plans_pod_title'); ?></h5>
			<div class="table">
			<!-- will need ACF repeater -->
			<?php  if( have_rows('plan_pods') ) : ?>
				<?php $loop_count = 0; ?>
				<?php while ( have_rows('plan_pods') ) : the_row(); ?>
					<?php echo (($loop_count % 2) == 0) ? '<div class="row">' : '';  ?>
						<div class="cell">
							<h6 class="content-heading"><?php the_sub_field('title'); ?></h6>
							<?php the_sub_field('description'); ?>
						</div>
					<?php echo (($loop_count % 2) == 1) ? '</div>' : '';  ?>
				<?php $loop_count++; ?>
				<?php endwhile;?>
			<?php endif; ?>
			</div>
			<h5 class="call-us-heading"><?php the_field('call_to_action'); ?></h5>
		</section>
	</div>
</section>

<?php the_content(); ?>

<?php get_footer(); ?>
