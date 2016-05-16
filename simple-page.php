<?php
  /**
    Template Name: Simple Page Layout
  **/

  get_header();
?>

<div class="topborder">

  <div class="container"><h2><?php echo the_title();?></h2>

  </div>
</div>

<div class="container">
<section class="business-section-generic">


<div class="simple-content">
<?php if (have_posts()) :
   while (have_posts()) :
      the_post();?>
    <div class="post">
                <?php the_content(); ?>
    </div>
<?php endwhile;
endif; ?>

</div>

<div class="container">

<?php

if( have_rows('rsl_boxes', $item->ID) ) :

  while ( have_rows('rsl_boxes', $item->ID) ) : the_row();
echo '  <div class="rsl-embed">	';

  echo   $custom = get_sub_field('rsl_box');
echo '</div>';
 endwhile;
 endif;

?>





</div>

<div class="button"><?php echo get_field('button_text'); ?></div>

</section>

</div>


<?php get_footer(); ?>
