<?php
  /**

  **/

  get_header();
?>
<div class="page-template-support">

<div class="topborder">

	<div class="container"><h2>Support</h2>

  </div>
</div>


<div class="container">


<div class="container">


<div id="video-tpl">
    <a class="single-back" href="/videos"><span class="glyphicon glyphicon-arrow-left"></span>BACK TO VIDEOS</a>
    <h1><?php the_title(); ?></h1>
	<section class="video-player">
        <head>
        <?php echo tb_video_embed_code(get_field("video_hosting"), get_field("video_code")); ?>
        </head>
        <div class="video-content">
        <?php the_content(); ?>
        </div>
	</section>
</div>
</div>

</div>

</div>
<?php get_footer(); ?>
