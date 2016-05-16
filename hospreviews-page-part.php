<?php
global $hosp_custom_posts;
?>
<?php foreach ($hosp_custom_posts as $review) : ?>

	<?php
// load all 'category' terms for the post
$terms = get_the_terms( $review->ID, 'review_category');


$cat = '';
// we will use the first term to load ACF data from
if( !empty($terms) ) {
	//
	// $term = array_pop($terms);
	//
	// // do something with $custom_field

	foreach ($terms as $termid){

	$cat = $cat.' '.$termid->slug;
	}
}

$position = get_field('position', $review->ID);
if (!$position){
	$position = 100;
}

?>




		<?php if (get_field('size', $review->ID)) :?>
			<?php $size = get_field('size', $review->ID);

					//$color = get_field('top_border_color', $review->ID);
			switch(get_field('review_site_used', $review->ID)) {
    			case 'Software Advice':
        			$color = 'EA9B04';
        			break;
    			case 'Capterra':
        			$color = '127cc0';
        			break;
				case 'Merchant Maverick':
        			$color = '001358';
        			break;
				case 'Mobilized':
        			$color = '2659ae';
        			break;
				case 'Business New Daily':
        			$color = '0fa6cc';
        			break;
				case 'POS Systems Review':
        			$color = '2caf4b';
        			break;
				case 'POS Options':
        			$color = 'de5519';
        			break;
    			default:
        			$color = '000000';
			}

						if ($size == 'full'){

							?>
							<div class="grid-item grid-item--width-2 large-pod hospitalitycontainer <?php echo $cat; ?>" data-order="<?php echo $position;?>">

						<?php }else if ($size == 'half') {?>
							<div class="grid-item half-pod hospitalitycontainer <?php echo $cat; ?>" data-order="<?php echo $position;?>">

							<?php
						}?>

		<?php endif; ?>


								<div class="header" style="background-color: #<?php echo $color; ?>">
                                <?php $image = get_field('publication_logo', $review->ID);?>
								<?php if (!empty($image['url'])) { ?>
										<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" >
								<?php } else { ?>
                                		<?php echo get_the_title($review->ID); ?>
                                <?php } ?>
                                </div>
								 <div class="triangle" style="border-top: 40px solid #<?php echo $color; ?>"></div>


				<div class="inner hospitality">




										<?php if (get_field('quote', $review->ID)) : ?>
                                        	<div class="quote">
												<?php the_field('quote', $review->ID); ?>
                                            </div>
										<?php endif; ?>


		</div>
				<div class="read-full-cta">
					<?php if (get_field('article_link', $review->ID)) : ?>
							<a href="<?php the_field('article_link', $review->ID); ?>" target="_blank">Read full Review on <?php echo get_the_title($review->ID); ?></a>
					<?php endif; ?>



	


				</div>
			</div>

<?php endforeach; ?>
