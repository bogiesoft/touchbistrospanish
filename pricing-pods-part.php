<?php $title = get_sub_field('title'); ?>
<div class="pricing-pods <?php echo mb_strtolower($title); ?>-pod">
	<div class="pod-title"  style="color: <?php the_sub_field('pod_color'); ?>;">
		<?php the_sub_field('title'); ?>
	</div>
	<div class="price">
		<div class="price-group">
			<span class="currency-symbol">&dollar;</span>
			<span class="price-value"><?php the_sub_field('price'); ?></span>
			<span class="currency">USD</span>
			<span class="schedule">/MO.</span>
		</div>
	</div>
	<div class="billing"><?php the_sub_field('billing'); ?></div>
	<div class="licence"><?php the_sub_field('licence'); ?></div>
	<?php $pod_image = get_sub_field('licence_image'); ?>
	<img src="<?php echo $pod_image['url']; ?>" alt="<?php echo $pod_image['alt']; ?>" class="pricing-ipads">
	
	<div class="pod-about">
    	<h6 class="content-heading">Recommended for:</h6>
		<?php the_sub_field('description'); ?>
	</div>

	<div class="buttoncontainer">
	<a class="button" href="<?php echo esc_url( home_url() ); ?>/request-a-quote/" style="background-color: <?php the_sub_field('pod_color'); ?>;">
		Get a quote
	</a>
	</div>
</div>
