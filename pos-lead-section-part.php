<?php
$section_class = TbHtmlHelper::getPosSectionClass('lead_section', 'section');
$video_class = TbHtmlHelper::getPosSectionClass('lead_section', 'video');
$hero = get_field("background_image");
$overlay_image = get_field("overlay_image");
$show_video = get_field("show_lead_video");

$show_video = get_field("show_lead_video");

$mp4 = get_field("lead_section_video_mp4");
$ogv = get_field("lead_section_video_ogv");
$webm = get_field("lead_section_video_webm");
$modal = get_field("play_upon_button_click");
$postertype = explode('.',$hero);
$postertype = $postertype[1];
$right_button = get_field("right_button");
$add_fold = get_field("add_fold");
$arrow_bottom = '';

if ($add_fold){
	$add_fold = 'add-fold';
	$arrow_bottom = 'down-arrow-fold';
}

?>
<?php if ($show_video){
	?>


	<section class="<?php echo $add_fold; ?> business-section-generic pos-solutions lead-section full-hero-section <?php echo $section_class; ?> black-opacity" data-vide-bg="mp4:  <?php echo $mp4; ?>, webm:  <?php echo $webm; ?>, ogv:  <?php echo $ogv; ?>, poster: <?php echo $hero; ?>"
		data-vide-options="posterType: <?php echo $postertype; ?>, loop: false, muted: false, position: 0% 0%">




		<?php
	} else {
		?>

		<section class="<?php //echo $add_fold; ?> business-section-generic pos-solutions lead-section full-hero-section <?php echo $section_class; ?> black-opacity" style="background-image:url('<?php echo $hero; ?>');">

			<?php
		}?>


		<div class="black-opacity-cover"></div>

		<div class="container">
			<h1 class="lead-title fade-in two"><?php the_field('lead_section_title'); ?></h1>
			<h3 class="secondary-title fade-in two"><?php the_field('lead_section_subtitle'); ?></h3>
			<div>
				




					<?php if ($modal && !($right_button)){
						?>
						<?php if ($overlay_image){

							?>
							<div class="overlay-image "><div class="video-play-overlay"> <h3><?php the_field('lead_section_video_title'); ?></h3></div><img class="lead-overlay img-responsive os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.5s" src="<?php echo $overlay_image; ?>"></div>

							<?php } else {

								?>
								<div class="video-play-overlay"> <h3><?php the_field('lead_section_video_title'); ?></h3>

									<?php
								} ?>

								<div >
									<?php } else if ($modal && $right_button){
										?>

										<?php if ($overlay_image){

											?>
                                            <div class="overlay-image "><a href="//fast.wistia.net/embed/iframe/<?php the_field('wistia_code'); ?>?autoPlay=false&amp;popover=true" class="video-play-overlay video-play-overlay-side wistia-popover[height=568,playerColor=b69859,width=960]"> <h3><?php the_field('lead_section_video_title'); ?></h3></a><img class="lead-overlay img-responsive os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.5s" src="<?php echo $overlay_image; ?>"></div>

											<?php } else {

												?>
												<div class="video-play-overlay video-play-overlay-side"> <h3><?php the_field('lead_section_video_title'); ?></h3>

													<?php
												} ?>



												<?php
											}else {
												?>
												<?php if ($overlay_image){

													?>
													<div class="overlay-image"><img class="lead-overlay img-responsive os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.5s" src="<?php echo $overlay_image; ?>"></div>
													<?php } ?>

													<?php
												} ?>

												<a href="#">
													<img src="<?php echo get_template_directory_uri() . '/assets/images/down-arrow-heros.png' ?>" class="hvr-hang down-arrow <?php echo $arrow_bottom; ?>">
												</a>

											

										</section>
