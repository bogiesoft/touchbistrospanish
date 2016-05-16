	<section class="business-section-generic os-animation customer-pods-row" data-os-animation="fadeInLeft" data-os-animation-delay="0.3s">
	<section id="customer-profiles">
		<div class="container">
			<?php  $delay = 0.1; $zindex = 99; if( have_rows('company_pods') ) : ?>
			<?php while ( have_rows('company_pods') ) : the_row(); ?>
			<?php $company = get_sub_field('company');
			 			$delay = $delay + 0.1; $zindex = $zindex - 1;//var_dump($company); exit;?>
			<div class="profile-pods os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="<?php echo $delay;?>s" style="z-index:<?php echo $zindex;?>;">
				<div class="customer-logo">
					<?php $logo = get_field('logo', $company->ID); ?>
					<img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
				</div>
				<h6><span><?php echo $company->post_title; ?></span></h6>
				<img src="<?php echo get_template_directory_uri() . '/assets/images/customer-pods-border.jpg' ?>" alt="">
				<p class="category"><?php the_field('type', $company->ID); ?></p>
				<div class="pod-media">
					<?php if (get_field('video', $company->ID)) : ?>
							<a href="//fast.wistia.net/embed/iframe/<?php the_field('video', $company->ID); ?>?autoPlay=false&amp;popover=true" class="boxes wistia-popover[height=568,playerColor=b69859,width=960]">

							<img src="<?php echo get_template_directory_uri() . '/assets/images/small-play-button-customers.png' ?>" alt="">
						</a>
					<?php endif; ?>

					<?php $pdf = get_field('pdf', $company->ID); ?>
					<?php if (!empty($pdf) && !empty($pdf['url'])) : ?>
						<a href="<?php echo $pdf['url']; ?>" target="_blank" download="<?php echo $pdf['filename']; ?>">
							<img src="<?php echo get_template_directory_uri() . '/assets/images/small-pd-icon-customers.png' ?>" alt="">
						</a>
					<?php endif; ?>

					<?php if (get_field('quote', $company->ID)) : ?>
						<div class="quote-container"><a href="#" class="quote-popup-link">

							<img src="<?php echo get_template_directory_uri() . '/assets/images/customer-quote-symbol.jpg' ?>" alt="">
                        </a>
                        <?php // quote pop up box ?>
	
				<div class="popup-quote popup-cus" style="display:none;">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/team-leader-popup-cross.png' ?>" alt="" class="cross">
					<div class="popup-content">

							<?php the_field('quote', $company->ID); ?>

							<div class="rest-title"><?php echo get_the_title($company->ID);?></div>

					</div>
				</div>
                        </div>
					<?php endif; ?>

					<?php if (get_field('review', $company->ID)) : ?>
						<div class="review-container"><a href="#" class="popup-review-link"><img src="<?php echo get_template_directory_uri() . '/assets/images/small-star-icon.png' ?>" alt=""></a>
                        	<div class="popup-review popup-cus" style="display:none;">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/team-leader-popup-cross.png' ?>" alt="" class="cross">
					<div class="popup-content">
						<?php
						$x = get_field('review_rating', $company->ID);
						if ($x != 'n/a'){
						 ?>
							<?php $rating = get_field('review_rating', $company->ID); ?>

						<?php

						$i = 0;

				$half = fmod($rating, 1);

						while ($i < $rating){
							$i = $i + 1;
							?>

							<i class="fa fa-star"></i>
							<?php
						}
						if ($half != 0){
							?>
					<i class="fa fa-star-half"></i>
							<?php
						}?>

						<?php } ?>
						<h6><?php the_field('review_title', $company->ID); ?></h6>

							<?php the_field('review', $company->ID);
							if (get_field('review_link', $company->ID)){
								?>
								<a href="<?php the_field('review_link', $company->ID); ?>" target="_blank">Read Full Review</a>

								<?php
							} ?>

					</div>
				</div>
				
                        
                        </div>
					<?php endif; ?>
				</div>

				
				
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</section>
</section>
<script>
$j = jQuery;
$j(function(){
	$j('.quote-popup-link').on('click', function(e){
		e.preventDefault();
		$j('.popup-cus').hide();

		$j(this).closest('.profile-pods').find('.popup-quote').fadeIn();
	});
	$j('.popup-review-link').on('click', function(e){
		e.preventDefault();
		$j('.popup-cus').hide();
		$j(this).closest('.profile-pods').find('.popup-review').fadeIn();
	});
	$j('.popup-quote .cross').on('click', function(){
		$j(this).closest('.popup-quote').fadeOut();
	});
	$j('.popup-review .cross').on('click', function(){
		$j(this).closest('.popup-review').fadeOut();
	});
});
</script>
