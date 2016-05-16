	<?php
		/**
		 	Template Name: POS Solutions Brewery
		**/

		get_header();
	?>

	<?php get_template_part('pos-lead-section', 'part');?>

	<?php get_template_part('customer-profiles', 'part'); ?>

	<?php get_template_part('pos-section-3', 'part'); ?>

	<?php $section_10_data = TbDataHelper::getPOSSectionFlexibleData('section_10_contents'); ?>
	<?php if (!empty($section_10_data['group1'])) : ?>

	<?php $group1 = $section_10_data['group1']; ?>
	<section class="business-section-generic pos-solutions-brewery pos-solutions pos-stacked-slides" id="<?php echo TbHelper::convertSubNaviMenuId($group1['name']); ?>">
		<div class="container">
			<section class="pos-stacked-slide">
				<img src="<?php echo $group1['image']['url']; ?>" class="pos-stacked-lead-graphic">
				<div class="text-pod">
					<h3><?php echo $group1['title']; ?></h3>

					<?php echo $group1['introduction']; ?>

					<img src="<?php echo $group1['secondary_image']['url']; ?>" class="overlapping-image">
				</div>
			</section>
		</div>
	</section>
	<?php endif; ?>

<?php		$title = get_field('animated_box_title');
		$hero = get_field('animated_box_background_image'); ?>
		<section class="business-section-generic pos-solutions-brewery pos-solutions pos-stacked-slides pos-account-management" style="background-image:url('<?php echo $hero; ?>');"  id="<?php echo TbHelper::convertSubNaviMenuId($title); ?>">
			<div class="black-opacity-cover"></div>
			<div class="container">
				<div class="text-pod os-animation  left-pod" data-os-animation="fadeInLeft" data-os-animation-delay="0.5s">
					<h3 class="os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.5s"><?php the_field('animated_box_title'); ?></h3>
					<?php the_field('animated_box_text');
					$overlay_image = get_field("animated_box_ipad_image");


					  ?>


				</div>
				<div class="overlay-image fade-ipad-in os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.5s"><img class="lead-overlay img-responsive" src="<?php echo $overlay_image; ?>"><div class="hover-button bobble" style="background-image:url('<?php echo $hover; ?>');"></div><div class="animate-ipad" style="background-image:url('<?php echo $animated; ?>');"></div></div>

			</div>
		</section>

	<section class="business-section-generic pos-solutions pos-stacked-slides">
		<div class="container">
			<?php if (!empty($section_10_data['group3'])) : ?>
			<?php $group3 = $section_10_data['group3']; ?>
			<section class="pos-stacked-slide" id="<?php echo TbHelper::convertSubNaviMenuId($group3['name']); ?>">
				<img src="<?php echo $group3['image']['url']; ?>" class="pos-stacked-lead-graphic">
				<div class="text-pod">
					<h3><?php echo $section_10_data['group3']['title']; ?></h3>
					<?php echo $section_10_data['group3']['introduction']; ?>
					<img src="<?php echo $group3['secondary_image']['url']; ?>" class="extra-image">
				</div>
			</section>
			<?php endif; ?>
			<?php if (!empty($section_10_data['group4'])) : ?>
			<?php $group4 = $section_10_data['group4']; ?>
			<section class="pos-stacked-slide" id="<?php echo TbHelper::convertSubNaviMenuId($group4['name']); ?>">
				<img src="<?php echo $group4['image']['url']; ?>" class="pos-stacked-lead-graphic">
				<div class="text-pod">
					<img src="<?php echo $group4['secondary_image']['url']; ?>" class="circle-image">
					<h3><?php echo $group4['title']; ?></h3>
					<?php echo $group4['introduction']; ?>
				</div>
			</section>
			<?php endif; ?>
		</div>
	</section>

	<?php get_template_part( 'complete-control', 'part' ); ?>

	<?php get_template_part('pos-section-slide', 'part'); ?>

	<?php get_template_part( 'award-winning-pos', 'part' ); ?>

	<?php get_template_part( 'choose-step', 'part' ); ?>

<?php the_content(); ?>

<?php get_footer(); ?>
