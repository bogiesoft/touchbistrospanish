<?php
global $custom_posts;
?>
<?php foreach ($custom_posts as $review) : ?>

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
			$color = '000000';
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
			}
			
			//$color = get_field('top_border_color', $review->ID);

				if ($size == 'full'){

					?>
					<div class="grid-item grid-item--width-2 large-pod <?php echo $cat; ?>" data-order="<?php echo $position;?>" style="border-top: 5px solid #<?php echo $color; ?>">

				<?php }else if ($size == 'half') {?>
					<div class="grid-item half-pod <?php echo $cat; ?>" data-order="<?php echo $position;?>" style="border-top: 5px solid #<?php echo $color; ?>">

					<?php
				}?>

<?php endif; ?>

		<div class="inner" itemscope itemtype="http://schema.org/Review">
        		
                <span itemprop="itemReviewed" itemscope itemtype="http://schema.org/Restaurant">
    <meta itemprop="name" content="TouchBistro">
  </span>

				<?php $image = get_field('logo', $review->ID);?>
				<?php if (!empty($image['url'])) : ?>
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="lead-image img-responsive">
				<?php else : ?>
					<img src="<?php echo get_template_directory_uri() . '/assets/images/no_image_review.jpg' ?>" alt="no_image" class="lead-image">
				<?php endif; ?>


				<?php if (get_field('rating', $review->ID)) : ?>
					<?php $rating = get_field('rating', $review->ID); ?>
				<?php endif; ?>
				<?php

				$i = 0.5;

$half = fmod($rating, 1);

				while ($i < $rating){
					$i = $i + 1;
					?>

					<i class="fa fa-star"></i>
					<?php
				}
				if ($half != 0){
					?>
			<i class="fa fa-star-half-o"></i>
					<?php
				}?>
                <?php 
				$empty = 5 - $rating;
				$i = 0.5;

$half = fmod($rating, 1);

				while ($i < $empty){
					$i = $i + 1;
					?>

					<i class="fa fa-star-o"></i>
					<?php
				}
				?>



<p class="rating-category">
				<?php if (get_field('rating_description', $review->ID)) : ?>
					<span itemprop="name"><?php the_field('rating_description', $review->ID); ?></span>
                    <span itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">: <span itemprop="ratingValue"><?php if (get_field('rating', $review->ID)) : ?>
					<?php echo floatval(get_field('rating', $review->ID)); ?>
				<?php endif; ?></span> Stars</span>
				<?php endif; ?>
</p>

								<?php if (get_field('quote', $review->ID)) : ?>

									<div class="quote">
									<span itemprop="reviewBody"><?php the_field('quote', $review->ID); ?></span>
								</div>

								<?php endif; ?>

	<p class="quote-source">
  

										<?php if (get_field('customer_name', $review->ID)) : ?>


											<span itemprop="author" itemscope itemtype="http://schema.org/FoodEstablishment">
    <span itemprop="name"><?php the_field('customer_name', $review->ID); ?></span>

										<?php endif; ?>
 |
								 <?php if (get_field('venue_name', $review->ID)) : ?>


									 <span itemprop="employee" itemscope
            itemtype="http://schema.org/Person"><span itemprop="name"><?php the_field('venue_name', $review->ID); ?></span></span>

								 <?php endif; ?>
	</span></p>
</div>
		<div class="read-full-cta" itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
			<?php if (get_field('article_link', $review->ID)) : ?>
					<a href="<?php the_field('article_link', $review->ID); ?>" target="_blank">Read full Review on <span itemprop="name"><?php echo get_field('review_site_used', $review->ID); ?></span></a>
			<?php endif; ?>


		</div>
	</div>
<?php endforeach; ?>
