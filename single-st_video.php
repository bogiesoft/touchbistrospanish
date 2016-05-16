<?php
  /**

  **/

  get_header();
?>
<div class="page-template-support">

<div class="topborder lead-section">

  <div class="container"><h2>Support &amp; Training</h2>

  </div>
</div>

<div class="row st-searchbar" role="search">
	<div class="container">
		<form id="formSearch">
			<div id="st-content-input-search" class="input-group">
				<div id="st-search">
					<img id="loading-img" src="<?php echo get_template_directory_uri() ?>/assets/images/loading.gif" style="display:none"/>
					<input id="st-input-search" type="text" class="form-control" placeholder="Enter Search Term..." autocomplete="off">
					<ul class="results">
					</ul>
				</div>
				<span class="input-group-btn">
					<input id="st-search-button" class="btn btn-primary white-button search-button" type="submit" value="Search"/>
				</span>
			</div><!-- /input-group -->
		</form>
    </div>
</div>

<div class="container support-main">
<?php get_template_part('st-side', 'part'); ?>
<div class="search-main">





<?php
 global $wp_query;
 $wp_query->the_post();
?>

<?php BreadCrumbs('single', get_the_ID(), 'st_video_category') ?>

<div id="video-tpl">
    <div id="st-video-content">
        <h1><?php the_title(); ?></h1>
    	<section class="video-player">
            <head>
            <?php echo st_video_embed_code(get_field("video_hosting"), get_field("video_code")); ?>
            </head>
            <div class="video-content">
            <?php the_content(); ?>
            </div>
    	</section>
    </div>
</div>

</div>
</div>
</div>
<?php get_template_part('st-modal', 'part'); ?>
<?php get_footer(); ?>
