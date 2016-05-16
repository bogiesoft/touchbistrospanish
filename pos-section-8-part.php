<?php
$section_class = TbHtmlHelper::getPosSectionClass('section_8', 'section');
$section_8_id = TbHelper::convertSubNaviMenuId(get_field('section_8_name'));
?>
<section class="business-section-generic pos-solutions sticky-section-sub-navigation <?php echo $section_class; ?>"  id="<?php echo $section_8_id; ?>">
	<?php
//	$section_no = 8;
//	get_template_part('pos-section-sub-navigation', 'part');
	?>
		<div class="container">
			<h3>
				<?php the_field('section_8_title'); ?>
			</h3>

			<?php if (get_field('section_8_introduction')) : ?>
			<p class="intro-text">
				<?php the_field('section_8_introduction'); ?>
			</p>
			<?php endif; ?>

			<section class="section-sub-hover-navigation">
				<?php $section_8_slides = get_field('section_8_slides'); ?>
				<ul>
					<?php foreach ($section_8_slides as $key => $slide) : ?>
						<?php $class_active = ($key == 3) ? 'active' : ''; ?>
						<li><a href="#<?php echo TbHelper::convertSubNaviMenuId($slide['link_title']); ?>" class="<?php echo $class_active; ?>"><?php echo $slide['link_title']; ?></a></li>
					<?php endforeach; ?>
				</ul>
				<?php foreach ($section_8_slides as $key => $slide) : ?>
					<!--					<img src="--><?php //echo get_template_directory_uri() . '/assets/images/anytime-anywhere-lead-graphic.jpg' ?><!--" class="lead-sub-hover-graphic">-->
					<?php $style_none = ($key == 3) ? '' : 'display: none;'; ?>
					<div style="<?php echo $style_none; ?>" id="<?php echo TbHelper::convertSubNaviMenuId($slide['link_title']); ?>" class="slide-area">
						<?php if (!empty($slide['image']['url'])) : ?>
							<img src="<?php echo $slide['image']['url']; ?>" class="lead-sub-hover-graphic">
						<?php endif; ?>
						<div class="right-text-pod">
							<h6><?php echo $slide['text_pod'][0]['title']; ?></h6>
							<?php echo $slide['text_pod'][0]['text']; ?>
						</div>
						<?php if (!empty($slide['secondary_image']['url'])) : ?>
							<img src="<?php echo $slide['secondary_image']['url']; ?>" class="secondary-sub-hover-graphic">
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</section>
		</div>

</section>
<script>
	<?php $default_id = (!empty($section_8_slides[3]['link_title'])) ? '#' . TbHelper::convertSubNaviMenuId($section_8_slides[3]['link_title']) : '';?>
	changeSlideAreaByMouseoverEvent('<?php echo $section_8_id?>', '<?php echo $default_id; ?>');
</script>
