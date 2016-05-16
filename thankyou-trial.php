	<?php
		/**
		 	Template Name: Trial Thank You Page
		**/

		get_header(); 
	?>

	<section class="business-section-generic thankyou-lead lead-section">
		<div class="container">
			<div class="inner">
	        	<h1 class="lead-title"><?php the_field('title'); ?></h1>
<!--		        <h3 class="subtitle">It could be worth <span class="strong">$400</span> to you!</h3>-->
				<h3 class="subtitle"><?php the_field('subtitle'); ?></h3>
		        
	    	</div>
	   	</div>
	</section>

	<section class="business-section-generic thankyou-steps">
		<div class="container">
			<div class="steps">
				<?php if( have_rows('steps') ) : ?>
                <?php $i = 1; ?>
				<?php while ( have_rows('steps') ) : the_row(); ?>
					<div class="step<?php echo '-' . $i; ?>">
                    	<div class="step-img">
                        	<?php $image = get_sub_field('img'); ?>
							<?php if (!empty($image['url'])) : ?>
							<img src="<?php echo $image['url']; ?>">
							<?php endif; ?>
                        </div>
                        <div class="step-num">
                        	<div><?php echo $i; ?></div>
                        </div>
						<div class="step-text">
							<?php the_sub_field('text'); ?>
						</div>
					</div>
                    <?php $i++; ?>
				<?php endwhile;?>
				<?php endif; ?>
			</div>
            <div class="bottom-text">
					<?php the_field('bottomtext'); ?>
		    </div>
	   	</div>
	</section>

<?php the_content(); ?>

<?php get_footer(); ?>