<?php
global $section_no;
$section_class = TbHtmlHelper::getPosSectionClass('section_7', 'section');
$section_7_id = TbHelper::convertSubNaviMenuId(get_field('section_7_name'));
?>
<section class="business-section-generic pos-solutions pos-slide-hover corner-background <?php echo $section_class; ?>"  id="<?php echo $section_7_id ?>">
	<?php
	$section_no = 7;
	//get_template_part('pos-section-sub-navigation', 'part');
	?>
	<div class="container">
		<h3 class="os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.5s"><?php the_field('section_7_title'); ?></h3>
		<p class="intro-text os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.7s"><?php the_field('section_7_introduction'); ?></p>
		<section class="section-sub-hover-navigation os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.7s">
			<ul>
				<?php $section_7_slides = get_field('section_7_slides'); ?>
				<?php foreach ($section_7_slides as $key => $slide) : ?>
					<?php $class_active = ($key == 0) ? 'active' : ''; ?>
					<li><a href="#<?php echo TbHelper::convertSubNaviMenuId($slide['link_title']); ?>" class="<?php echo $class_active; ?>"><?php echo $slide['link_title']; ?></a></li>
				<?php endforeach; ?>
			</ul>
			<?php foreach ($section_7_slides as $key => $slide) : ?>
				<?php $style_none = ($key == 0) ? '' : 'display: none;'; ?>
				<div style="<?php echo $style_none; ?>" id="<?php echo TbHelper::convertSubNaviMenuId($slide['link_title']); ?>" class="slide-area os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.1s">
					<?php if (!empty($slide['image']['url'])) : ?>
						<img src="<?php echo $slide['image']['url']; ?>" class="lead-sub-hover-graphic">
					<?php endif; ?>
					<div class="right-text-pod os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.7s">
						<?php $text_pod = $slide['text_pod']; ?>
						<h6><?php echo $text_pod[0]['title']; ?></h6>
						<p>
							<?php echo $text_pod[0]['text']; ?>
						</p>
					</div>
				</div>
			<?php endforeach; ?>
		</section>
	</div>
</section>
<script>
jQuery(function(){
	<?php $default_id = (!empty($section_7_slides[3]['link_title'])) ? '#' . TbHelper::convertSubNaviMenuId($section_7_slides[3]['link_title']) : '';?>
	changeSlideAreaByMouseoverEvent('<?php echo $section_7_id?>', '<?php echo $default_id ?>');
});
function changeSlideAreaByMouseoverEvent(section_id, default_id)
{
	var previous_id = default_id;
	jQuery('#' + section_id + ' .section-sub-hover-navigation ul li a').on('click', function(e){
		e.preventDefault();
		var href = jQuery(this).attr('href');
		//if (previous_id == href) {
		//	return false;
		//}
		jQuery('#' + section_id + ' .section-sub-hover-navigation .slide-area').hide();
		jQuery('#' + section_id + ' .section-sub-hover-navigation a').removeClass('active');
		jQuery('#' + section_id + ' ' + href).fadeIn(1000);
		jQuery(this).addClass('active');

		var x = jQuery(this).attr('attr-back');

		if (x){
					jQuery(this).parent().parent().parent().parent().parent().css('background-image','url('+x+')');
		}




		previous_id = href;
	});
}
</script>
