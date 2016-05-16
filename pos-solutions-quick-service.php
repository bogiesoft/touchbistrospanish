	<?php
		/**
		 	Template Name: POS Solutions Quick Service
		**/

		add_action('wp_head', array('TbHtmlHelper', 'loadSlickSlider'));
		get_header();

	?>

	

	<?php get_template_part('pos-lead-section', 'part');?>

	<?php get_template_part('customer-profiles', 'part'); ?>

	<?php get_template_part('pos-section-3', 'part' ); ?>


	<section class="business-section-generic pos-solutions pos-smart-solid-section-colour" id="<?php echo TbHelper::convertSubNaviMenuId(get_field('section_9_name')); ?>">
		<div class="container smart-features-container">
			<h3><?php the_field('section_9_title'); ?></h3>
			<section class="supplementary-text-pods">
				<?php $slide_images = array(); ?>
				<?php  if( have_rows('section_9_text_pods') ) : ?>
				<?php while ( have_rows('section_9_text_pods') ) : the_row(); ?>
				<div class="supplementary-pods">
					<div class="text-pod-image">
						<?php $image = get_sub_field('image'); ?>
						<img src="<?php echo $image['url']; ?>">
					</div>
					<h6><?php the_sub_field('title'); ?></h6>
					<p>
						<?php the_sub_field('text'); ?>
					</p>
				</div>
				<?php $slide_images[] = get_sub_field('slide_image'); ?>
				<?php endwhile; ?>
				<?php endif; ?>
			</section>

			<section class="slider" style="background-image: url('<?php echo get_template_directory_uri() . '/assets/images/ipad-ls-background.png' ?>');">
				<img src="<?php echo get_template_directory_uri() . '/assets/images/slide-nav-left.png' ?>" class="slide-nav-left">
				<div class="slider-landscape">
					<!--				<img src="--><?php //echo get_template_directory_uri() . '/assets/images/slide-nav-left.png' ?><!--" class="slide-nav-left">-->
					<?php foreach ($slide_images as $key => $slide_image) : ?>
						<?php $style_none = ($key == 0) ? '' : 'display: none'; ?>
						<?php if (!empty($slide_image['url'])) : ?>
						<div><img src="<?php echo $slide_image['url']; ?>" class="slide" style="<?php //echo $style_none; ?>"></div>
						<?php endif; ?>
					<?php endforeach; ?>
					<!--				<img src="--><?php //echo get_template_directory_uri() . '/assets/images/slide-nav-right.png' ?><!--" class="slide-nav-right">-->
				</div>
				<img src="<?php echo get_template_directory_uri() . '/assets/images/slide-nav-right.png' ?>" class="slide-nav-right">
			</section>
<!--			<img src="--><?php //echo get_template_directory_uri() . '/assets/images/ipad-ls-background.png' ?><!--">-->
		</div>
	</section>

	<?php get_template_part('pos-section-5', 'part'); ?>

	<?php get_template_part( 'complete-control', 'part' ); ?>

	<?php get_template_part('pos-section-slide', 'part'); ?>

	<?php get_template_part( 'award-winning-pos', 'part' ); ?>

	<?php get_template_part( 'choose-step', 'part' ); ?>

<?php the_content(); ?>
<script>
jQuery(function(){
	jQuery('.slider-landscape').slick({
//		prevArrow: '<img src="<?php //echo get_template_directory_uri() . '/assets/images/slide-nav-left.png' ?>//" class="slide-nav-left">',
//		nextArrow: '<img src="<?php //echo get_template_directory_uri() . '/assets/images/slide-nav-right.png' ?>//" class="slide-nav-left">',
//		centerMode: true,
		variableWidth: true,
		arrows: false
//		respondTo: 'slider'
	});
	jQuery('.slide-nav-left').on('click', function(){
		jQuery('.slider-landscape').slick('slickNext');
	});
	jQuery('.slide-nav-right').on('click', function(){
		jQuery('.slider-landscape').slick('slickPrev');
	});

});
</script>
<?php get_footer(); ?>
