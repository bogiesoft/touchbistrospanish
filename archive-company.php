	<?php
		get_header();
	?>

		<section class="business-section-generic company-section company-section-lead lead-section">
			<div class="container">
			<?php if( have_rows('lead_section') ) : ?>
				<?php while ( have_rows('lead_section') ) : the_row(); ?>
				<h1 class="lead-title"><?php the_sub_field('title'); ?></h1>
                <h4><?php the_sub_field('subtitle'); ?></h4>
				<p class="intro-text">
					<?php the_sub_field('introduction'); ?>
				</p>

			</div>
			<div class="company-dropped-hero"><img src="<?php the_sub_field('hero_image'); ?>" class="img-responsive"></div>
		</section>
	<?php endwhile; ?>
<?php endif; ?>

		<section class="business-section-generic company-section">
			<?php if( have_rows('second_section') ) : ?>
				<?php while ( have_rows('second_section') ) : the_row(); ?>
					<h2><?php the_sub_field('title')?></h2>

				<section id="text-pods">
					<div class="container">
					<?php if( have_rows('text_pods') ) : ?>
						<?php while ( have_rows('text_pods') ) : the_row(); ?>
						<div class="company-pods">
							<h3 class="pod-title"><?php the_sub_field('title'); ?></h3>
							<p>
								<?php the_sub_field('description'); ?>
							</p>
						</div>
						<?php endwhile; ?>
					<?php endif; ?>
					</div>
				</section>
				<?php endwhile; ?>
			<?php endif; ?>
		</section>

		<section class="business-section-generic company-section">
			<div class="container">
				<section id="team-pods">
				<?php if( have_rows('third_section') ) : ?>
					<?php while ( have_rows('third_section') ) : the_row(); ?>
					<h2><?php the_sub_field('title'); ?></h2>
					<p class="intro-text">
						<?php the_sub_field('introduction'); ?>
					</p>

					<!-- Will need ACF Repeater -->
					<?php if( have_rows('staff_pods') ) : ?>
						<?php while ( have_rows('staff_pods') ) : the_row(); ?>
						<?php $stuff_image = get_sub_field('photo');?>
						<div class="team-pods">
							<img src="<?php echo $stuff_image['url']; ?>" alt="<?php echo $stuff_image['alt']; ?>" class="profile-pic">
							<h3 class="pod-title"><?php the_sub_field('name'); ?></h3>
							<p><?php the_sub_field('position'); ?></p>
							<div class="social-icons">
                            	<?php if (get_sub_field('twitter_link')) : ?>
									<a class="twitter-icon" href="<?php echo get_sub_field('twitter_link') ?>" target="_blank"></a>
								<?php endif; ?>
								<?php if(get_sub_field('linkedin_link')) : ?>
									<a class="linkedin-icon" href="<?php echo get_sub_field('linkedin_link') ?>" target="_blank"></a>
								<?php endif; ?>
                                	<a class="info-icon" href="#"></a>
                            </div>
                            <div class="profile-bio-popup">
                            <div class="popup-content">
<!--								<img src="--><?php //echo get_template_directory_uri() . '/assets/images/bhavin-leader-team-popup.png' ?><!--" alt="" class="mini-profile">-->
								<img src="<?php echo $stuff_image['url']; ?>" alt="<?php echo $stuff_image['alt']; ?>" class="mini-profile">
								<img src="<?php echo get_template_directory_uri() . '/assets/images/team-leader-popup-cross.png' ?>" alt="x" class="cross">
								<div class="headings">
									<div class="the-headings">
										<h5><?php the_sub_field('name'); ?></h5>
										<?php the_sub_field('position'); ?>
									</div>
								</div>
								<p>
									<?php the_sub_field('biography'); ?>
								</p>
                                <div class="social-icons">
                            		<?php if (get_sub_field('twitter_link')) : ?>
										<a class="twitter-icon" href="<?php echo get_sub_field('twitter_link') ?>" target="_blank"></a>
									<?php endif; ?>
									<?php if(get_sub_field('linkedin_link')) : ?>
										<a class="linkedin-icon" href="<?php echo get_sub_field('linkedin_link') ?>" target="_blank"></a>
									<?php endif; ?>
                                		<div class="info-icon" href="#"></div>
                            	</div>
							</div>
                            </div>
						</div>
						<?php endwhile;?>
						<?php endif;?>
					<?php endwhile;?>
					<?php endif;?>
				</section>
			</div>
		</section>




<?php
$awards_section = get_field('awards_section');
?>
	<section class="business-section-generic">
	<div class="container">
		<section id="awards" class="awards-four-aside">

			<h2><?php echo $awards_section[0]['title']; ?></h2>
            <?php if ($awards_section[0]['introduction']) : ?>
            	<div class="intro-text"><?php echo $awards_section[0]['introduction']; ?></div>
            <?php endif;?>

			<?php $awards = $awards_section[0]['awards']; ?>
			<?php $x = 0; foreach ($awards as $row) :
				$x = $x + 0.3; ?>
				<?php $image = get_field('image', $row['award']); ?>
				<div class="award-pods os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="<?php echo $x;?>s">
					<div class="award-image">
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
					</div>
					<p><?php echo $row['award']->post_title; ?></p>
				</div>
			<?php endforeach; ?>
            <?php  if (get_field('reviews_blurb')) : ?>
        		<div class="reviews-blurb"><?php the_field('reviews_blurb'); ?></div>
        	<?php  endif; ?>
		</section>
	</div>
	</section>


<?php the_content(); ?>

<?php get_footer(); ?>
<script>
	jQuery('a.info-icon').on('click', function(e){
		e.preventDefault();
		jQuery('.profile-bio-popup').fadeOut(300);
		jQuery(this).closest('.team-pods').children('.profile-bio-popup').fadeIn(300);
	});
	jQuery('.cross').on('click', function(e){
		e.preventDefault();
		jQuery('.profile-bio-popup').fadeOut(300);
	});
</script>
