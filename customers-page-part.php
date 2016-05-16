<?php
global $custom_posts;
?>
<?php foreach ($custom_posts as $customer) : ?>
	<?php
// load all 'category' terms for the post
$terms = get_the_terms( $customer->ID, 'customer_category');


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
$order = get_field('position', $customer->ID);
if (!$order){
	$order = 100;
}
?>
<div class="customer-pods<?php echo $cat; ?>" data-order="<?php echo $order;?>">
	<?php $image = get_field('image', $customer->ID);?>
	<?php if (!empty($image['url'])) : ?>
		<div class="image-box"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="pod-image"></div>
	<?php else : ?>
		<img src="<?php echo get_template_directory_uri() . '/assets/images/no_image_customer.jpg' ?>" alt="no_image" class="pod-image">
	<?php endif; ?>
	<div class="pod-about">
		<span class="pod-media">
			<?php if (get_field('pdf', $customer->ID)) :?>
				<?php $pdf = get_field('pdf', $customer->ID);?>
				<a href="<?php echo $pdf['url']; ?>" target="_blank" download="<?php echo $pdf['filename']; ?>">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/customer-pod-pdf.jpg' ?>" alt="">
				</a>
			<?php endif; ?>
			<?php if (get_field('video', $customer->ID)) : ?>
				<a href="//fast.wistia.net/embed/iframe/<?php the_field('video', $customer->ID); ?>?autoPlay=false&amp;popover=true" class="wistia-popover[height=568,playerColor=b69859,width=960]">

<img src="<?php echo get_template_directory_uri() . '/assets/images/customer-pod-vid-play.jpg' ?>" alt=""></a>
			<?php endif; ?>
		</span>
		<?php if (get_field('category', $customer->ID)) : ?>
			<span class="pod-category"><?php the_field('category', $customer->ID); ?></span>
		<?php endif; ?>
		<h6><?php echo $customer->post_title; ?></h6>
        <?php if ($customer->post_content != '') : ?>
        		<div class="pod-quote"><?php echo apply_filters('the_content', $customer->post_content); ?></div>
        <?php endif; ?>
	</div>
</div>
<?php endforeach; ?>
