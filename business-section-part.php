<?php
	// check if the flexible content field has rows of data
	if( have_rows('business_section') ):
	     // loop through the rows of data
	    while ( have_rows('business_section') ) : the_row();

	        if( get_row_layout() == 'single_column' ): ?>

	        	<div class="container">
	        		<h2 class="business-section-title"><?php echo the_sub_field('title'); ?></h2>
	        		<?php echo the_sub_field('subtitle'); ?>
	        		<img src="<?php the_sub_field('single_image'); ?>" alt="Business image">
	        	</div>

	        <?php endif;

	    endwhile;
	endif;
?>