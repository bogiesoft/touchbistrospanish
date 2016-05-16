<?php if( have_rows('product_pods') ): ?>
	<?php $count = 0; ?>
	<?php while( have_rows('product_pods') ): the_row(); 
		$title = get_sub_field('title');
		$about = get_sub_field('about');
		$podimage = get_sub_field('podimage'); ?>
		<div class="pods <?php if ($count == 0) { echo 'primary-pod'; } else { echo 'secondary-pod'; } ?>">
			<div class="pod-description">
				<span class="pod-title"><?php echo $title ?></span>
				<span class="pod-subtitle">Restaurant</span>
				<span class="pod-usage">Ideal for</span>
				<span class="pod-about"><?php echo $about; ?></span>
			</div>
			<a href="#" class="pod-button">Learn more</a>
			<img src="<?php echo $podimage ?>" alt="Pod image" class="single-image">
		</div>
		<?php $count++ ?>
	<?php endwhile; ?>
<?php endif; ?>