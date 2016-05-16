	<?php
		/**
		 	Template Name: POS Solutions Restaurant
		**/
		global $section_no;

		add_action('wp_head', array('TbHtmlHelper', 'loadSlickSlider'));
		get_header();

	?>
	<?php get_template_part('pos-lead-section', 'part');?>

	<?php get_template_part('customer-profiles', 'part'); ?>

	<?php get_template_part('pos-section-3', 'part'); ?>

	<section class="business-section-generic pos-solutions pos-tableside-ordering full-hero-section black-opacity"  id="<?php echo TbHelper::convertSubNaviMenuId(get_field('section_4_name')); ?>">
		<?php
		$section_no = 4;
		//get_template_part('pos-section-sub-navigation', 'part');
		?>
		<div class="container">
			<h3><?php the_field('section_4_title'); ?></h3>
			<?php  if( have_rows('section_4_text_pod') ) : ?>
			<?php while ( have_rows('section_4_text_pod') ) : the_row(); ?>
				<div class="right-text-pod">
					<h5><?php the_sub_field('title'); ?></h5>
					<p><?php the_sub_field('text'); ?></p>
				</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</section>

	<?php get_template_part('pos-section-5', 'part'); ?>

	<section class="business-section-generic pos-solutions pos-solid-with-slides full-hero-section" id="<?php echo TbHelper::convertSubNaviMenuId(get_field('section_6_name')); ?>">
		<section class="business-section-generic">
			<section class="section-slider">
				<div class="container pos-restaurant-slide-area">
					<h3><?php the_field('section_6_title'); ?></h3>
					<div class="intro-text"><?php the_field('section_6_introduction'); ?></div>
					<section class="slider">
						<?php $section_6_text_pods = get_field('section_6_text_pods'); ?>

						<img src="<?php echo get_template_directory_uri() . '/assets/images/slide-nav-left.png' ?>" class="slide-nav-left">

						<div class="slide">
							<div class="pos-slick-slider">
							<?php foreach ($section_6_text_pods as $key => $row) : ?>
								<?php if (!empty($row['image']['url'])) : ?>
								<div><img src="<?php echo $row['image']['url']; ?>" alt="<?php echo $key; ?>"></div>
								<?php endif; ?>
							<?php endforeach; ?>
							</div>
						</div>

						<img src="<?php echo get_template_directory_uri() . '/assets/images/slide-nav-right.png' ?>" class="slide-nav-right">

						<div class="slide-left-captions">
							
							<?php if (!empty($section_6_text_pods[0])) : ?>
								<div class="top-caption active-caption slide-caption" id="slide-caption-0" data-num="0">
									<h6><?php echo $section_6_text_pods[0]['title']; ?></h6>
									<p><?php echo $section_6_text_pods[0]['text']; ?></p>
								</div>
							<?php endif; ?>
							<?php if (!empty($section_6_text_pods[1])) : ?>
								<div class="bottom-caption slide-caption" id="slide-caption-1" data-num="1">
									<h6><?php echo $section_6_text_pods[1]['title']; ?></h6>
									<p><?php echo $section_6_text_pods[1]['text']; ?></p>
								</div>
							<?php endif; ?>
						</div>
                        
                        <div class="slide-right-captions">
							<?php if (!empty($section_6_text_pods[2])) : ?>
								<div class="top-caption slide-caption" id="slide-caption-2" data-num="2">
									<h6><?php echo $section_6_text_pods[2]['title']; ?></h6>
									<p><?php echo $section_6_text_pods[2]['text']; ?></p>
								</div>
							<?php endif; ?>
							<?php if (!empty($section_6_text_pods[3])) : ?>
								<div class="bottom-caption slide-caption" id="slide-caption-3" data-num="3">
									<h6><?php echo $section_6_text_pods[3]['title']; ?></h6>
									<p><?php echo $section_6_text_pods[3]['text']; ?></p>
								</div>
							<?php endif; ?>
						</div>
					</section>
				</div>
			</section>
		</section>

	</section>

	<?php get_template_part( 'complete-control', 'part' ); ?>

	<?php get_template_part('pos-section-slide', 'part'); ?>


	<?php get_template_part( 'award-winning-pos', 'part' ); ?>

	<?php get_template_part( 'choose-step', 'part' ); ?>

<?php the_content(); ?>
<script>
	jQuery(function(){
		jQuery('.pos-slick-slider').slick({
			variableWidth: true,
			arrows: false
		});
		jQuery('.slide-nav-left').on('click', function(){
			console.log(':)');
			jQuery('.pos-slick-slider').slick('slickPrev');
		});
		jQuery('.slide-nav-right').on('click', function(){
			console.log(':))');
			jQuery('.pos-slick-slider').slick('slickNext');
		});
		jQuery('.pos-slick-slider').on('afterChange', function(event, slick, currentSlide, nextSlide) {
			console.log('currentSlide: ' + currentSlide);
			jQuery('.slide-caption').removeClass('active-caption');
			jQuery('#slide-caption-' + currentSlide).addClass('active-caption');
		});

		jQuery('.slide-caption').on('click', function(){
			var goto = jQuery(this).attr('data-num');
			jQuery('.pos-slick-slider').slick('slickGoTo',goto);
		});

			jQuery('.slide-caption')
  .mouseenter(function() {
		var goto = jQuery(this).attr('data-num');
		jQuery('.pos-slick-slider').slick('slickGoTo',goto);
  })
  .mouseleave(function() {
   //
  });



	});
</script>
<?php get_footer(); ?>
