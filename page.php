<?php
  /**
    Template Name: Default
  **/

  get_header();
?>

<div class="container">
<section class="business-section-generic lead-section">
  <h3><?php echo the_title();?></h3>

<div class="container">

<?php if (have_posts()) :
   while (have_posts()) :
      the_post();?>
    <div class="post">
                <?php the_content();?>
    </div>
<?php endwhile;
endif; ?>

</div>



</section>

</div>


<?php get_footer(); ?>
