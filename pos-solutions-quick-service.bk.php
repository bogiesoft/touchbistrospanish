	<?php
		/**
		 	Template Name: POS Solutions Quick Service
		**/

		get_header();

	?>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/js/slick-1.5.9/slick/slick.css"/>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/slick-1.5.9/slick/slick.min.js"></script>

	<style type="text/css">
/*		.slider {*/
/*			background-image: url('*/<?php //echo get_template_directory_uri() . '/assets/images/ipad-ls-background.png' ?>/*');*/
/*			background-repeat: no-repeat;*/
/*			background-position: center 100px;*/
/*		}*/
/*		.slick-list {*/
/*			width: 100%;*/
/*			max-width: 676px;*/
/*			margin: 98px auto 0px auto;*/
/*			border-radius: 5px;*/
/*			max-height: 507px;*/
/*			height: 100%;*/
/*		}*/
/*		.pos-smart-solid-section-colour {*/
/*			height: 1127px;*/
/*		}*/
/*		.slider .slider-landscape .slide {*/
/*			top: 0px;*/
/*		}*/
/*		.slider .slide {*/
/*			top: 0px;*/
/*			margin: 0px;*/
/*		}*/
	</style>

	<?php get_template_part('pos-lead-section', 'part');?>

	<?php get_template_part('customer-profiles', 'part'); ?>

	<?php get_template_part('pos-section-3', 'part' ); ?>


	<section class="business-section-generic pos-smart-solid-section-colour" id="<?php echo TbHelper::convertSubNaviMenuId(get_field('section_9_name')); ?>">
		<div class="container">
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
					<h6 class="active"><?php the_sub_field('title'); ?></h6>
					<p>
						<?php the_sub_field('text'); ?>
					</p>
				</div>
				<?php $slide_images[] = get_sub_field('slide_image'); ?>
				<?php endwhile; ?>
				<?php endif; ?>
			</section>

			<section class="slider">
				<div class="slider-landscape">
									<img src="<?php echo get_template_directory_uri() . '/assets/images/slide-nav-left.png' ?>" class="slide-nav-left">
					<?php foreach ($slide_images as $key => $slide_image) : ?>
						<?php $style_none = ($key == 0) ? '' : 'display: none'; ?>
						<?php if (!empty($slide_image['url'])) : ?>
						<img src="<?php echo $slide_image['url']; ?>" class="slide" style="<?php echo $style_none; ?>">
						<?php endif; ?>
					<?php endforeach; ?>
									<img src="<?php echo get_template_directory_uri() . '/assets/images/slide-nav-right.png' ?>" class="slide-nav-right">
				</div>
			</section>
<!--			<img src="--><?php //echo get_template_directory_uri() . '/assets/images/ipad-ls-background.png' ?><!--">-->
		</div>
	</section>

	<?php get_template_part('pos-section-5', 'part'); ?>

	<?php get_template_part( 'complete-control', 'part' ); ?>

	<?php get_template_part('pos-section-8', 'part'); ?>

	<?php get_template_part( 'award-winning-pos', 'part' ); ?>

	<?php get_template_part( 'choose-step', 'part' ); ?>

<?php the_content(); ?>
<script>
//jQuery(function(){
//	jQuery('.slider-landscape').slick({
//		prevArrow: '<img src="<?php //echo get_template_directory_uri() . '/assets/images/slide-nav-left.png' ?>//" class="slide-nav-left">',
//		nextArrow: '<img src="<?php //echo get_template_directory_uri() . '/assets/images/slide-nav-right.png' ?>//" class="slide-nav-left">',
//		variableWidth: true,
//	});
//});
</script>
<?php get_footer(); ?>