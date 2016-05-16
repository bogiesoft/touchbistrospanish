<?php if( have_rows('video') ): ?>
	<?php $count = 0; ?>
	<?php while( have_rows('video') ): the_row(); 
		$category = get_sub_field('category');
		$company = get_sub_field('company');
		$podimage = get_sub_field('image'); ?>
		<div class="video-pods <?php echo 'video-pod-'.$count ?>">
			<img src="<?php echo $podimage ?>" alt="Pod image">
			<div class="pod-description">
				<span class="pod-category"><?php echo $category; ?></span>
				<span class="pod-about"><?php echo $company; ?></span>
			</div>
		</div>
		<?php $count++ ?>
	<?php endwhile; ?>
<?php endif; ?>

	