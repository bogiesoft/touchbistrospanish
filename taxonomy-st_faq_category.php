
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

$section = get_queried_object();

$query = get_faq_query($section->term_id, 0);



?>

<div id="resource-tpl" class="content-container row">

	<?php get_template_part('partials/st-faq-hero'); ?>
	<h1><?php echo $section->name; ?></h1>
	<div class="resource-content col-md-9">
        <div class="row">
        <div class="col-xs-12">
            <a class="single-back" href="/resources"><span class="glyphicon glyphicon-arrow-left"></span>BACK TO RESOURCES</a>
        </div>


        <div class="col-xs-12 col-md-6">
            <section class="resource-toc">
                <header>
                    <h4>Contents</h4>
                    <a class="collapse-toggle" data-toggle="collapse" data-parent=".resource-toc" href="#toc-collapse">Show/Hide</a>
                </header>
                <div id="toc-collapse" class="collapse in">
                    <ul>
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <li><a href="#resource-<?php the_ID(); ?>" class="toc"><?php the_title(); ?></a></li>
                    <?php endwhile; ?>
                    </ul>
                </div>
            </section>
        </div>
       </div>

		<div class="resource-full-list">

			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<section id="resource-<?php the_ID(); ?>">
					<h1><?php echo the_title(); ?></h1>
					<?php if (has_excerpt()){ the_excerpt(); } ?>
					<a href="<?php the_permalink() ?>" class="read-more resource-btn">Read more</a>
				</section>
			<?php endwhile; ?>


		</div>
	</div>

	<?php get_template_part('partials/st-faq-side'); ?>


</div>
</div>

</div>

</div>
<?php get_template_part('st-modal', 'part'); ?>
<?php get_footer(); ?>
