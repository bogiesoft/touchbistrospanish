	<?php
		/**
		 	Template Name: POS Solutions Chains
		**/

		get_header();
	?>

	<?php get_template_part('pos-lead-section', 'part');?>

	<?php get_template_part( 'customer-profiles', 'part' ); ?>

	<?php //get_template_part('pos-section-3', 'part'); ?>


	<?php $section_10_data = TbDataHelper::getPOSSectionFlexibleData('section_10_contents'); ?>

	<?php if (!empty($section_10_data['group6'])) : ?>

					<?php $group4 = $section_10_data['group6']; ?>
					<section class="business-section-generic pos-solutions sticky-section-sub-navigation pos-stacked-slides <?php echo $section_class; ?><?php if ($black_opacity) : ?> black-opacity<?php endif; ?>" id="<?php echo TbHelper::convertSubNaviMenuId($section_10_data['group6']['name']); ?>" style="background-image:url('<?php echo $hero; ?>');">

						<?php if ($black_opacity) : ?>
							<div class="<?php echo $black_opacity; ?>"></div>
						<?php endif; ?>
						<?php get_template_part('pos-section-sub-navigation', 'part'); ?>

		<div class="container">


			<h2 class="title-above-nav"><?php echo $group4['title']; ?></h2>


			<section class="pos-stacked-slide" >
				<img src="<?php echo $group4['image']['url']; ?>" class="pos-stacked-lead-graphic">
				<div class="text-pod">
					<img src="<?php echo $group4['secondary_image']['url']; ?>" class="circle-image">
					<h3><?php echo $group4['sub_title']; ?></h3>
					<?php echo $group4['introduction']; ?>
				</div>
			</section>

		</div>
	</section>

			<?php endif; ?>







	<?php $section_14_data = TbDataHelper::getPOSSectionFlexibleData('section_14_contents'); ?>

	<section class="business-section-generic pos-solutions pos-chains-strip-background-lead" id="<?php echo TbHelper::convertSubNaviMenuId($section_14_data['group1']['name']); ?>">
		<section class="strip-background">

				<div class="centre-text-pod os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.3s">
					<h3><?php echo $section_14_data['group1']['title']; ?></h3>
					<p class="intro-text">
						<?php echo $section_14_data['group1']['introduction']; ?>
					</p>
				</div>
				<section class="main-pods os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.4s">
					<div class="left-pod os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.4s">
						<img src="<?php echo $section_14_data['group1']['image']['url']; ?>">
						<h5><?php echo $section_14_data['group1']['image_title']; ?></h5>
						<?php echo $section_14_data['group1']['image_description']; ?>
					</div>

					<div class="centre-pod os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.4s">
						<h5 class="and">And</h5>
						<h5 class="or">Or</h5>
					</div>

					<div class="right-pod os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.8s">
						<img src="<?php echo $section_14_data['group1']['secondary_image']['url'] ?>">
						<h5><?php echo $section_14_data['group1']['secondary_image_title']; ?></h5>
						<?php echo $section_14_data['group1']['secondary_image_description']; ?>
					</div>
				</section>

		</section>
	</section>

	<section class="business-section-generic pos-solutions pos-chains-strip-background-secondary" id="<?php echo TbHelper::convertSubNaviMenuId($section_14_data['group2']['name']); ?>">
		<div class="strip-background">
			<section class="main-pods">
				<div class="container">
					<div class="left-pod os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.3s">
						<img src="<?php echo $section_14_data['group2']['image']['url']; ?>">
					</div>
					<div class="right-pod os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.5s">
						<div class="left-aligned-pod">
							<h3><?php echo $section_14_data['group2']['title']; ?></h3>
							<?php echo $section_14_data['group2']['introduction']; ?>
						</div>
						<div class="centred-pod os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.4s">
							<img src="<?php echo $section_14_data['group2']['secondary_image']['url']; ?>">
							<?php echo $section_14_data['group2']['description']; ?>
						</div>
					</div>
				</div>
			</section>
		</div>
	</section>

	<section class="business-section-generic pos-solutions pos-chains-text-image-pods" id="<?php echo TbHelper::convertSubNaviMenuId($section_14_data['group3']['name']); ?>">
		<div class="container">
			<h3><?php echo $section_14_data['group3']['title']; ?></h3>
			<section class="aligned-pods">
				<div class="left-pod os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.3s">
					<img src="<?php echo $section_14_data['group3']['image']['url']; ?>">
					<?php echo $section_14_data['group3']['description']; ?>
				</div>
				<div class="right-pod os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.5s">
					<img src="<?php echo $section_14_data['group3']['secondary_image']['url']; ?>">
					<?php echo $section_14_data['group3']['secondary_description']; ?>
				</div>
			</section>
			<section class="full-image-pod os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.3s">
				<h3 class="os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.4s"><?php echo $section_14_data['group4']['title']; ?></h3>
				<?php echo $section_14_data['group4']['introduction']; ?>
				<img src="<?php echo $section_14_data['group4']['image']['url']; ?>" class="os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.5s">
			</section>
		</div>
	</section>

	<?php get_template_part( 'complete-control', 'part' ); ?>

	<?php get_template_part('pos-section-slide', 'part'); ?>


	<?php get_template_part( 'award-winning-pos', 'part' ); ?>

	<?php get_template_part( 'choose-step', 'part' ); ?>

	<?php the_content(); ?>

	<?php get_footer(); ?>
