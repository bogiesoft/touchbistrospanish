<?php
$section_class = TbHtmlHelper::getPosSectionClass('section_3', 'section');
$text_pod = TbHtmlHelper::getPosSectionClass('section_3', 'text_pod');
$black_opacity = TbHtmlHelper::getPosSectionClass('section_3', 'black_opacity');
$chain_image = TbHtmlHelper::getPosSectionClass('section_3', 'chain_image');
$template_file_name = TbHelper::getTemplateFileName();
$hero = get_field("section_3_background_image");

global $section_no;
$section_no = 3;
?>
<?php if ($template_file_name === 'pos-solutions-restaurant' || $template_file_name === 'pos-brewery') : ?>

<section id="bubble-background">
	<section class="business-section-generic pos-solutions sticky-section-sub-navigation <?php echo $section_class; ?>" id="<?php echo TbHelper::convertSubNaviMenuId(get_field('section_3_name')); ?>" style="background-image:url('<?php echo $hero; ?>');">
		
        <div class="container">
			<h2 class="title-above-nav"><?php the_field('section_3_title'); ?></h2>
		</div>
		<?php get_template_part('pos-section-sub-navigation', 'part'); ?>
		
		<div class="container">
			<?php  if( have_rows('section_3_text_pod') ) : ?>
			<?php while ( have_rows('section_3_text_pod') ) : the_row(); ?>
				<div class="<?php echo $text_pod; ?>">
					<h3><?php the_sub_field('title'); ?></h3>
					<?php the_sub_field('text'); ?>
				</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</section>
</section>

<?php else : ?>

<section class="business-section-generic pos-solutions sticky-section-sub-navigation <?php echo $section_class; ?><?php if ($black_opacity) : ?> black-opacity<?php endif; ?>" id="<?php echo TbHelper::convertSubNaviMenuId(get_field('section_3_name')); ?>" style="background-image:url('<?php echo $hero; ?>');">

	<?php if ($black_opacity) : ?>
		<div class="<?php echo $black_opacity; ?>"></div>
	<?php endif; ?>
    
        <?php if (get_field('section_3_title')) : ?>
        <div class="container">
			<h2 class="<?php if ($template_file_name === 'pos-solutions-quick-service') {echo 'title-below-nav';} else {echo 'title-above-nav';}?> staggered-animation" data-os-animation="fadeInRight" data-os-animation-delay=".5s"><?php the_field('section_3_title'); ?></h2>
		</div>
		<?php endif; ?>
	<?php get_template_part('pos-section-sub-navigation', 'part'); ?>
	<div class="container staggered-animation-container">
		
		<?php if ($chain_image) : ?>
			<img src="<?php echo get_template_directory_uri() . '/assets/images/pos-chains-fade-cafe.jpg' ?>" class="left-inline-image staggered-animation" data-os-animation="fadeInRight" data-os-animation-delay="1.1s">
		<?php endif; ?>
		<?php  if( have_rows('section_3_text_pod') ) : ?>
		<?php while ( have_rows('section_3_text_pod') ) : the_row(); ?>
		<div class="<?php echo $text_pod; ?> staggered-animation" data-os-animation="fadeInRight" data-os-animation-delay=".5s">
			<?php $image = get_sub_field('image'); ?>
			<?php if (!empty($image['url'])) : ?>
			<img src="<?php echo $image['url']; ?>">
			<?php endif; ?>
			<h3 class="staggered-animation" data-os-animation="fadeInRight" data-os-animation-delay=".5s"><?php the_sub_field('title'); ?></h3>
			<div class="staggered-animation" data-os-animation="fadeInRight" data-os-animation-delay=".5s"><?php the_sub_field('text'); ?></div>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
	</div>
</section>

<?php endif; ?>
