	<?php
		/**
		 	Template Name: Resellers
		**/

		get_header(); 
	?>

<section class="business-section-generic resellers-lead lead-section">
	<div class="container">
    	<h1 class="lead-title"><?php the_field('title'); ?></h1>
		<p class="intro-text"><?php the_field('introduction')?></p>
	</div>
</section>

<section class="business-section-generic resellers-list">
	<div class="container">
		<?php  if( have_rows('reseller_row') ) : ?>
		<?php while ( have_rows('reseller_row') ) : the_row(); ?>
		<div class="reseller-row">
			<div class="graphic">
				<?php $graphic = get_sub_field('graphic'); ?>
				<?php if (!empty($graphic['url'])) : ?>
					<img src="<?php echo $graphic['url'] ?>">
				<?php endif; ?>
			</div>
			<div class="description">
				<h3><?php the_sub_field('title'); ?></h3>
				<p><?php the_sub_field('description'); ?></p>
				<?php $image = get_sub_field('image'); ?>
				<?php if (!empty($image['url'])) : ?>
				<img src="<?php echo $image['url']; ?>" class="illustration">
				<?php endif; ?>
			</div>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>

		<section class="reseller-pods">

			<?php  if( have_rows('reseller_pods') ) : ?>
			<?php $loop_num = 0; ?>
			<?php while ( have_rows('reseller_pods') ) : the_row(); ?>

				<?php echo (($loop_num % 2) == 0) ? '<div class="reseller-row">' : ''; ?>
				<?php $class = (($loop_num % 2) == 0) ? 'reseller-pod-first' : 'reseller-pod-second'; ?>
					<div class="reseller-pod <?php echo $class; ?>">
						<div class="graphic">
							<?php $graphic = get_sub_field('graphic'); ?>
							<img src="<?php echo $graphic['url']; ?>">
						</div>
						<div class="description">
							<h3><?php the_sub_field('title'); ?></h3>
							<p><?php the_sub_field('description'); ?></p>
						</div>
					</div>
				<?php echo (($loop_num % 2) == 0) ? '' : '</div>'; ?>
				<?php $loop_num++ ?>

			<?php endwhile; ?>
			<?php endif; ?>
		</section>
        
        <?php  if( have_rows('reseller_form') ) : ?>
		<?php while ( have_rows('reseller_form') ) : the_row(); ?>
		<div class="reseller-row reseller-form">
			<div class="graphic">
				<?php $graphic = get_sub_field('graphic'); ?>
				<?php if (!empty($graphic['url'])) : ?>
					<img src="<?php echo $graphic['url'] ?>">
				<?php endif; ?>
			</div>
			<div class="description ">
				<h3><?php the_sub_field('title'); ?></h3>
				<p><?php the_sub_field('description'); ?></p>
				<div class="mkto-container">
        			<iframe src="http://go.touchbistro.com/Website_Reseller-Application.html" style="max-width:100%;" name="myiFrame" scrolling="no" frameborder="0" marginheight="0px" marginwidth="0px"  height="675px" width="100%"></iframe>
        		</div>
			</div>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>

	</div>
</section>

<?php the_content(); ?>

<?php get_footer(); ?>