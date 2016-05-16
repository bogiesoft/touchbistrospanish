	<?php
		/**
		 	Template Name: Hardware Requirements
		**/
		get_header();
	?>
	<section class="business-section-generic hardware-requirements-lead lead-section">
		<div class="container">
			<h1 class="lead-title"><?php the_field('title'); ?></h1>
			<p class="intro-text">
				<?php the_field('introduction'); ?>
			</p>
			<?php $image = get_field('image'); ?>
			<img src="<?php echo $image['url']; ?>" alt="Section Image" class="img-responsive hardware-lead-image">
		</div>
	</section>

	<section class="business-section-generic">
		<section id="hardware-table">
			<div class="container">
				<div class="table header">
					<div class="row">
						<div class="image-cells">Image</div>
						<div class="text-cells">Description</div>
						<div class="text-cells">Reccomendations/Model No.</div>
					</div>
				</div>
				<?php  if(have_rows('categories')) : ?>
				<?php while (have_rows('categories')) : the_row(); ?>
				<div class="table">
					<div class="row">
						<div class="cell">
							<div class="category"><?php the_sub_field('category_name'); ?></div>
						</div>
					</div>
				</div>
				<div class="table">
					<?php  if(have_rows('hardware')) : ?>
					<?php while (have_rows('hardware')) : the_row(); ?>
					<div class="row">
						<?php $image = get_sub_field('image'); ?>
						<?php if (!empty($image['url'])) : ?>
						<div class="image-cells">
							<img src="<?php echo $image['url']; ?>" alt="iPad Hardware Requirements">
						</div>
						<?php endif; ?>
						<div class="text-cells">
							<?php  if(have_rows('description')) : ?>
							<?php while (have_rows('description')) : the_row(); ?>
							<h6 class="content-heading"><?php the_sub_field('title'); ?></h6>
							<ul>
								<?php  if(have_rows('bullet_points')) : ?>
								<?php while (have_rows('bullet_points')) : the_row(); ?>
								<li><?php the_sub_field('text'); ?></li>
								<?php endwhile; ?>
								<?php endif; ?>
							</ul>
							<?php endwhile; ?>
							<?php endif; ?>
						</div>
						<div class="text-cells">
							<?php  if(have_rows('recommendations')) : ?>
							<?php while (have_rows('recommendations')) : the_row(); ?>
							<ul>
								<?php  if(have_rows('bullet_points')) : ?>
								<?php while (have_rows('bullet_points')) : the_row(); ?>
								<li><?php the_sub_field('text'); ?></li>
								<?php endwhile; ?>
								<?php endif; ?>
							</ul>
							<p><?php the_sub_field('model_no'); ?></p>
							<?php endwhile; ?>
							<?php endif; ?>
						</div>
					</div>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div> <!-- container -->
		</section>
	</section>


<?php the_content(); ?>

<?php get_footer(); ?>
