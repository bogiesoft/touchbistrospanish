	<?php
		/**
		 	Template Name: POS Solutions Bars and Clubs
		**/

		get_header();
	?>

	<?php get_template_part('pos-lead-section', 'part');?>

	<?php get_template_part('customer-profiles', 'part'); ?>

	<?php get_template_part('pos-section-3', 'part'); ?>

	<?php $section_10_data = TbDataHelper::getPOSSectionFlexibleData('section_10_contents');
					$hero = get_field("animated_box_background_image");
					$title= get_field('animated_box_title');
					 ?>


	<section class="business-section-generic pos-solutions pos-fast-bar-mode full-hero-section black-opacity" style="background-image:url('<?php echo $hero; ?>');"  id="<?php echo TbHelper::convertSubNaviMenuId($title); ?>">
		<div class="black-opacity-cover"></div>
		<div class="container">
			<div class="text-pod os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.5s">
				<h3 class="os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.5s"><?php the_field('animated_box_title'); ?></h3>
				<?php the_field('animated_box_text');
				$overlay_image = get_field("animated_box_ipad_image");
				//$hover = get_field("animated_box_ipad_hover_icon");
				//$animated = get_field("animated_box_animated_overlay");

				  ?>


			</div>
			<div class="overlay-image fade-ipad-in os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.5s"><img class="lead-overlay img-responsive" src="<?php echo $overlay_image; ?>"></div>

		</div>
	</section>

	<section class="business-section-generic pos-solutions pos-stacked-slides">
		<div class="container">
			<section class="pos-stacked-slide" id="<?php echo TbHelper::convertSubNaviMenuId($section_10_data['group5']['name']); ?>">
				<img src="<?php echo $section_10_data['group5']['image']['url']; ?>" class="pos-stacked-lead-graphic os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.5s">
				<div class="text-pod os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.1s">
					<h3 class="os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.5s"><?php echo $section_10_data['group5']['title']; ?></h3>

					<?php echo $section_10_data['group5']['introduction']; ?>

					<div class="profile-faces">
					<?php  if ( !empty($section_10_data['group5']['repeater_image']) ) :
						$delay = 0;?>
					<?php foreach ($section_10_data['group5']['repeater_image'] as $row) :
						$delay = $delay + 0.5;?>
						<img src="<?php echo $row['image']['url']; ?>" class="faces os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="<?php echo $delay;?>s">
					<?php endforeach; ?>
					<?php endif; ?>
					</div>
				</div>
			</section>

			<?php if (!empty($section_10_data['group3'])) : ?>

			<section class="pos-stacked-slide" id="<?php echo TbHelper::convertSubNaviMenuId($section_10_data['group3']['name']); ?>">
				<?php $group3 = $section_10_data['group3']; ?>
				<img src="<?php echo $group3['image']['url']; ?>" class="pos-stacked-lead-graphic os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.5s">
				<div class="text-pod os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.8s">
					<h3><?php echo $group3['title']; ?></h3>

					<?php echo $group3['introduction']; ?>

					<img src="<?php echo $group3['secondary_image']['url']; ?>" class="extra-image">
				</div>
			</section>
			<?php endif; ?>
			<?php if (!empty($section_10_data['group1'])) : ?>

			<?php $group1 = $section_10_data['group1']; ?>
			<section class="business-section-generic pos-solutions-brewery pos-solutions pos-stacked-slide" id="<?php echo TbHelper::convertSubNaviMenuId($group1['name']); ?>">

				
						<img src="<?php echo $group1['image']['url']; ?>" class="pos-stacked-lead-graphic os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.5s">
						<div class="text-pod os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.8s">
							<h3><?php echo $group1['title']; ?></h3>

							<?php echo $group1['introduction']; ?>

							<img src="<?php echo $group1['secondary_image']['url']; ?>" class="overlapping-image">
						</div>
					
			</section>
			<?php endif; ?>
			<?php $section_12_data = get_field('section_12_one_image_contents'); ?>
			<section class="pos-stacked-slide" id="<?php echo TbHelper::convertSubNaviMenuId($section_12_data[0]['name']); ?>">
				<div class="hover-container"><img src="<?php echo $section_12_data[0]['image']['url']; ?>" class="pos-stacked-lead-graphic os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.5s">


					<div class="hover-button bobble" ></div>
 							<div class="ease-animate"></div>


				</div>
				<div class="text-pod overlap-text os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.8s">
					<h3><?php echo $section_12_data[0]['title']; ?></h3>
					<?php echo $section_12_data[0]['introduction']; ?>
				</div>
			</section>
		</div>
	</section>

	<section class="business-section-generic pos-solutions pos-print-chits" id="<?php echo TbHelper::convertSubNaviMenuId($section_12_data[1]['name']); ?>">

			<div class="text-pod os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.5s">
				<h3 class="os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.5s"><?php echo $section_12_data[1]['title']; ?></h3>
				<?php echo $section_12_data[1]['introduction']; ?>
			</div>

			<img src="<?php echo  $section_12_data[1]['image']['url']; ?>" class="pos-print-chit-lead-graphic os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.7s">

	</section>

	<?php get_template_part( 'complete-control', 'part' ); ?>

	<?php get_template_part('pos-section-slide', 'part'); ?>

	<?php get_template_part( 'award-winning-pos', 'part' ); ?>

	<?php get_template_part( 'choose-step', 'part' ); ?>

<?php the_content(); ?>

<?php get_footer(); ?>
