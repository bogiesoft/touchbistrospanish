	<?php
		/**
		 	Template Name: Contact Us
		**/

		get_header(); 
	?>

<div class="container inline-container lead-section">
	<h1>Contact Us</h1>
    <aside class="contact-us">
    	<?php  if(have_rows('contact_info')) : ?>
        		<div class="contacts" itemscope itemtype="http://schema.org/ContactPoint">
				<?php while (have_rows('contact_info')) : the_row(); ?>
                	<div class="contact-info">
                    	<h4 itemprop="contactType"><?php the_sub_field('department'); ?></h4>
                        <address><p class="email"><a href="mailto:<?php the_sub_field('email'); ?>" itemprop="email"><?php the_sub_field('email'); ?></a></p></address>
                        <?php $plainphone = str_replace(array('.', ',', '-', ' ', '(', ')'), '' , get_sub_field('phone')); ?>
                        <p class="phone"><a href="tel:<?php echo $plainphone; ?><?php if (get_sub_field('extention')) {echo ',' . get_sub_field('extention');} ?>" itemprop="telephone"><?php the_sub_field('phone'); ?><?php if (get_sub_field('extention')) {echo ' ext: ' . get_sub_field('extention');} ?></a></p>  
                    </div>
                <?php endwhile; ?>
                </div>
		<?php endif; ?>
        <?php  if(have_rows('offices')) : ?>
        		<div class="offices">
				<?php while (have_rows('offices')) : the_row(); ?>
                	<div class="office">
                    	<?php $image = get_sub_field('image'); ?>
						<?php if (!empty($image['url'])) : ?>
							<img class="office-image" src="<?php echo $image['url']; ?>" alt="<?php the_sub_field('office_name'); ?>">
						<?php endif; ?>
                		<h4 class="title"><?php the_sub_field('office_name'); ?></h4>
                    	<div class="address"><?php the_sub_field('address'); ?></div>
                    	<p class="phone">Local: <?php $plainphone = str_replace(array('.', ',', '-', ' ', '(', ')'), '' , get_sub_field('phone')); ?><a href="tel:<?php echo $plainphone; ?>"><?php the_sub_field('phone'); ?></a></p>
                    </div>
                <?php endwhile; ?>
                </div>
		<?php endif; ?>
	</aside>
	<section class="business-section-generic contact-us-lead">
    	<?php  if (get_field('mkto_title')) : ?>
        		<h4 class="form-title"><?php the_field('mkto_title'); ?></h4>
        <?php  endif; ?>
        <div class="mkto-container">
        	<iframe src="http://go.touchbistro.com/contact-us-host.html" style="max-width:100%;" name="myiFrame" scrolling="no" frameborder="0" marginheight="0px" marginwidth="0px"  height="675px" width="100%"></iframe>
        </div>

	</section>

	
</div>

<?php the_content(); ?>

<?php get_footer(); ?>