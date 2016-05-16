	<?php
		/**
		 	Template Name: Integration Tech Partners
		**/

		get_header(); 
	?>
	<section class="business-section-generic integration-tech-lead lead-section">
		<div class="container">
			<h1 class="lead-title"><?php the_field('title'); ?></h1>
			<p class="intro-text"><?php the_field('introduction'); ?></p>
		</div>
	</section>
<section class="all-partners">
<div class="container">
	
   <?php $partner_categories =  array();?>
   <?php if( have_rows('partner_section') ) : ?>
   		<?php while ( have_rows('partner_section') ) : the_row(); ?>
			<?php $partner_categories[] = get_sub_field('title');?>
		<?php endwhile; reset_rows();?>
	<?php endif; ?>
    
    <div class="left-col">
			<ul class="nav nav-item-group">
				<?php
	$i=0;
	foreach ($partner_categories as $partner_category) :
	$i = $i + 1;
	?>
					
								<?php 
	$item_name = TbHelper::convertSubNaviMenuId($partner_category);
	?>
									<li class="nav-item<?php if ($i == 1){ echo ' active'; } ?>">
										<a href="#<?php echo $item_name; ?>" class="nav-link<?php echo ' ' . $item_name; ?>">
											<?php  echo $partner_category; ?>
										</a>
									</li>
				<?php  endforeach; ?>
			</ul>
		</div>
<div class="right-col">
	<?php if( have_rows('partner_section') ) : ?>
	<?php while ( have_rows('partner_section') ) : the_row(); ?>
	<section class="partners" id="<?php echo TbHelper::convertSubNaviMenuId(get_sub_field('title')); ?>">
			<h3><?php the_sub_field('title'); ?><?php  if( get_sub_field('title') == 'Investors' ) : ?> <span>We are venture backed.</span><?php endif; ?></h3>
            <?php  if( get_sub_field('title') == 'Investors' ) : ?>
            <p>Listed in alphabetical order.</p>
            <?php endif; ?>
			<?php  if( have_rows('partners') ) : ?>
			<?php while ( have_rows('partners') ) : the_row(); ?>
			<?php $partner = get_sub_field('partner'); ?>
			<div class="partner-pod">

				<div>
					<?php $image = get_field('image', $partner->ID); ?>
					<?php if (!empty($image['url'])) : ?>
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
					<?php endif; ?>
				</div>
				<img src="<?php echo get_template_directory_uri() . '/assets/images/integration-tech-splitter.jpg' ?>" class="splitter">

				<h6><?php echo $partner->post_title; ?></h6>
				<p><?php the_field('description', $partner->ID); ?></p>

				<?php if (get_field('url', $partner->ID)) : ?>
                <?php $url = get_field('url', $partner->ID);
$url = preg_replace('#^https?://#', '', $url); ?>
				<span class="url"><a href="<?php the_field('url', $partner->ID); ?>" target="blank"><?php echo $url; ?></a></span>
				<?php endif; ?>

				<?php if (get_field('phone', $partner->ID)) : ?>
                <span class="phone"><?php $plainphone = str_replace(array('.', ',', '-', ' ', '(', ')'), '' , get_field('phone', $partner->ID)); ?><a href="tel:<?php echo $plainphone; ?>"><?php the_field('phone', $partner->ID); ?></a></span>
				<?php endif; ?>

				<?php if (get_field('email', $partner->ID)) : ?>
				<span class="email"><a href="mailto:<?php the_field('email', $partner->ID); ?>"><?php the_field('email', $partner->ID); ?></a></span>
				<?php endif; ?>

			</div>
			<?php endwhile; ?>
			<?php endif; ?>
	</section>
    
	<?php endwhile; ?>
	<?php endif; ?>
    </div>
    </div>
    </section>
	<?php get_footer(); ?>
    <script>
	

	jQuery('.left-col').affix({
	   	offset: {
			top: jQuery('.left-col').parent().offset().top,
			bottom: jQuery('#footer').outerHeight() + 58
	    }
	});
	
	jQuery('body').scrollspy({target: ".left-col" });
	



	jQuery(function(){
		jQuery('.nav-item-group li a').on('click', function(){
			var speed = 400;
			var href =  jQuery(this).attr('href');
			var target = jQuery(href == '#' || href == "" ? 'html' : href);
			var position = target.offset().top;
			jQuery('body, html').animate({scrollTop:position}, speed, 'swing');

			return false;
		});
	});

	
</script>

