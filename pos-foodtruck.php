	<?php
		/**
		 	Template Name: POS Solutions Food Truck
		**/
		get_header();
	?>

	<?php get_template_part('pos-lead-section', 'part');?>

	<?php get_template_part( 'customer-profiles', 'part' ); ?>

	<?php get_template_part('pos-section-3', 'part'); ?>

	<?php $section_13_data = TbDataHelper::getPOSSectionFlexibleData('section_13_contents');
	$hero = $section_13_data['group4']['background_image'];

 ?>

	<section class="business-section-generic pos-foodtruck-learn-it pos-solutions full-hero-section" style="background-image:url('<?php echo $hero; ?>');" id="<?php echo TbHelper::convertSubNaviMenuId($section_13_data['group4']['name']); ?>">
		<div class="container">
	        <div class="text-pod">
	        	<img src="<?php echo $section_13_data['group4']['title_image']['url']; ?>">
	        	<h3><?php echo $section_13_data['group4']['title']; ?></h3>
				<p><?php echo $section_13_data['group4']['introduction']; ?></p>
	        </div>

					<div class="overlay-image lead-overlay-abs lead-overlay-one"><img class=" img-responsive os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.3s" src="<?php echo $section_13_data['group4']['overlay_image_one']; ?>"></div>

										<div class="overlay-image lead-overlay-three lead-overlay-abs"><img class=" img-responsive os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.7s" src="<?php echo $section_13_data['group4']['overlay_image_three']; ?>"></div>

					<div class="overlay-image lead-overlay-two "><img class="lead-overlay img-responsive os-animation" data-os-animation="fadeInRight" data-os-animation-delay="0.5s" src="<?php echo $section_13_data['group4']['overlay_image_two']; ?>"></div>

	   </div>
	</section>


<?php 	$hero = $section_13_data['group5']['background_image'];
?>
	<section class="business-section-generic pos-flexible pos-solutions full-hero-section" style="background-image:url('<?php echo $hero; ?>');" id="<?php echo TbHelper::convertSubNaviMenuId($section_13_data['group5']['name']); ?>">
		<div class="container">
					<div class="text-pod">
						<img src="<?php echo $section_13_data['group5']['title_image']['url']; ?>">
						<h3><?php echo $section_13_data['group5']['title']; ?></h3>
				<p>	<?php echo $section_13_data['group5']['introduction']; ?></p>
					</div>

										<div class="pay-type">
												<img class="img-responsive" src='<?php echo $section_13_data["group5"]["overlay_image_one"]; ?>'>
											<div class="pay-subtitle"><?php echo $section_13_data["group5"]["overlay_image_one_subtitle"]; ?>
											</div>

										</div>
										<div class="pay-type">
												<img class="img-responsive" src='<?php echo $section_13_data["group5"]["overlay_image_two"]; ?>'>
												<div class="pay-subtitle"><?php echo $section_13_data["group5"]["overlay_image_two_subtitle"]; ?>
											</div>

										</div>
										<div class="pay-type">
												<img class="img-responsive" src='<?php echo $section_13_data["group5"]["overlay_image_three"]; ?>'>
												<div class="pay-subtitle"><?php echo $section_13_data["group5"]["overlay_image_three_subtitle"]; ?>
											</div>

										</div>

		 </div>
	</section>

	<section class="business-section-generic pos-foodtruck-stacked-slides pos-stacked-slides pos-solutions" id="<?php echo TbHelper::convertSubNaviMenuId($section_13_data['group3']['name']); ?>">
		<div class="container">
			<section class="pos-stacked-slide">
				<div class="centre-text-pod">
					<img src="<?php echo $section_13_data['group3']['title_image']['url']; ?>">
					<h3><?php echo $section_13_data['group3']['title']; ?></h3>
					<p>
						<?php echo $section_13_data['group3']['introduction']; ?>
					</p>
				</div>
				<img src="<?php echo $section_13_data['group3']['image']['url'];  ?>" class="lead-graphic">
			</section>

		</div>
	</section>


	<?php get_template_part( 'complete-control', 'part' ); ?>

	<?php get_template_part('pos-section-slide', 'part'); ?>


	<?php get_template_part( 'award-winning-pos', 'part' ); ?>

	<?php get_template_part( 'choose-step', 'part' ); ?>

<?php the_content(); ?>

<?php get_footer(); ?>
