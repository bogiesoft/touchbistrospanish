<?php
  /**
    Template Name: whats new Layout
  **/

  get_header();
?>

<div class="topborder">

  <div class="container"><h1><?php echo the_title();?></h1>

  </div>
</div>
<section class="business-section-generic">
<div class="container">



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



</div>
</section>

<?php get_footer(); ?>
