<?php
  /**
    Template Name: nav-less
  **/

  get_header();
?>

<div class="topborder"></div>
<section class="business-section-generic">
	<div class="container">
  		<h2><?php echo the_title();?></h2>
		<div class="thankyou-content">
		<?php echo apply_filters('the_content', $post->post_content); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
