<?php
	$hero = get_field('image_hero');
	$hero_banner = get_field('hero_banner');
?>

<img src="<?php echo $hero ?>" alt="Hero image" class="hero">
<div class="hero-content">
	<h1 class="hero-title"><?php echo $hero_banner ?></h1>
	<div class="hero-pods">
		<?php if(get_field('left_banner')) : ?>
			<h3 class="hero-subtitle">
				<?php echo get_field('left_banner'); ?>
			</h3>
		<?php endif; ?>

		<?php get_template_part( 'pods', 'part' ); ?>

		<?php if(get_field('right_banner')) : ?>
			<h3 class="hero-subtitle">
				<?php echo get_field('right_banner'); ?>
			</h3>
		<?php endif; ?>
	</div>
</div>