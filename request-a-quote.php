	<?php
		/**
		 	Template Name: request a quote
		**/

		get_header(); 
	?>

<div class="container inline-container lead-section">
	<h1>Request a free quote</h1>
    <aside class="getaquote">
    	<?php  if(have_rows('steps')) : ?>
        		<div class="steps">
                <?php $i = 1; ?>
				<?php while (have_rows('steps')) : the_row(); ?>
                	<div class="step<?php echo '-' . $i; ?>">
                    	<h4>Step <?php echo $i; ?>:</h4>
                        <div class="step-text">
							<?php the_sub_field('text'); ?>
						</div> 
                    </div>
                    <?php $i++; ?>
                <?php endwhile; ?>
                </div>
		<?php endif; ?>
	</aside>
	<section class="business-section-generic getaquote-lead">
    	<?php  if (get_field('mkto_title')) : ?>
        		<h4 class="form-title"><?php the_field('mkto_title'); ?></h4>
        <?php  endif; ?>
        <div class="mkto-container">
        	<iframe src="http://go.touchbistro.com/Website_Get-a-quote-host-pg.html" style="max-width:100%;" name="myiFrame" scrolling="no" frameborder="0" marginheight="0px" marginwidth="0px"  height="570px" width="100%"></iframe>
        </div>

	</section>

	
</div>
<?php if( have_rows('customer_quote') ) : ?>
<section class="business-section-generic">
	<div class="container">
    	<?php while ( have_rows('customer_quote') ) : the_row(); ?>
    	<div class="quote">
        	<div class="face">
            	<?php $image = get_sub_field('face'); ?>
				<?php if (!empty($image['url'])) : ?>
					<img src="<?php echo $image['url']; ?>">
				<?php endif; ?>
            </div>
            <div class="quote-text">
				<?php the_sub_field('quote'); ?>
			</div>
        </div>
        <?php endwhile;?>
    </div>
</section>
<?php endif; ?>
<?php
$awards_section = get_field('awards_section');
?>
	<section class="business-section-generic">
	<div class="container">
		<section id="awards" class="awards-four-aside">

			<h2><?php echo $awards_section[0]['title']; ?></h2>

			<?php $awards = $awards_section[0]['awards']; ?>
			<?php 
			foreach ($awards as $row) :
				?>
				<?php $image = get_field('image', $row['award']); ?>
                <div class="award-pods">
					<div class="award-image">
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
					</div>
					<p><?php echo $row['award']->post_title; ?></p>
				</div>
			<?php endforeach; ?>

		</section>
	</div>
	</section>
<?php the_content(); ?>
<?php get_footer(); ?>