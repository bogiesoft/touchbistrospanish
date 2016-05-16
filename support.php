<?php
  /**
    Template Name: Support
  **/

  get_header();
?>


<div class="topborder lead-section">

  <div class="container"><h2><?php echo the_title();?></h2>

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

	 $taxonomy = 'st_article_category'; // this is the name of the taxonomy
	 $terms = get_terms( $taxonomy, 'orderby=count&hide_empty=1&parent=0' ); // for more details refer to codex please.
	 $ITEMS_PER_SECTION = 5;
	?>
  <main id="st-main-content" class="main st-main" role="main">
  	<a class="whatsnew" href="/whats-new/"><span class="underline">SEE WHAT'S NEW</span> - Don't miss out on our latest release notes</a>
	<div class="st-home">
	<!-- 	<h1>Support & Training</h1> -->

		<?php foreach ($terms as $term) : ?>
	        <div>
	            <a class="resource-btn" href="<?php echo get_term_link( $term, $taxonomy ); ?>">
	                <img src="<?php echo get_template_directory_uri();?>/assets/images/<?php echo $term->slug; ?>.png" />
	                <h3> <?php echo $term->name; ?></h3>
	            </a>
	            <ul>
	                <!-- Sub terms -->
	                <?php  $sub_terms = get_terms( $taxonomy, 'orderby=count&hide_empty=1&parent=' . $term->term_id  ); ?>
	                <?php $contTerms = 1 ?>
	                <?php foreach ($sub_terms as $sub_term) : ?>
	                    <?php if( $contTerms > $ITEMS_PER_SECTION ) break; ?>
	                    <li><a href="<?php echo get_term_link( $sub_term, $taxonomy ); ?>"><?php echo $sub_term->name; ?></a></li>
	                <?php $contTerms++; endforeach; ?>
	                <!-- End sub terms -->
	            </ul>
	            <?php if( $contTerms > $ITEMS_PER_SECTION ) : ?>
	                <a class="view-all resource-btn" href="<?php echo get_term_link( $term, $taxonomy ); ?>">View All Categories</a>
	            <?php endif; ?>
		    </div>
	    <?php endforeach; ?>

	<?php
	 $taxonomy = 'st_video_category'; // this is the name of the taxonomy
	 $terms = get_terms( $taxonomy, 'orderby=count&hide_empty=0&parent=0' ); // for more details refer to codex please.
	?>

	    <!-- st-main videos -->
	  <?php foreach ($terms as $term) : ?>
	      <div>
	        <a class="resource-btn" href="<?php echo get_term_link( $term, $taxonomy ); ?>">
	            <img src="<?php echo get_template_directory_uri();?>/assets/images/st-video.png" />
	            <h3> <?php echo $term->name; ?></h3>
	        </a>
	            <ul>
	            <?php  $sub_terms = get_terms( $taxonomy, 'orderby=count&hide_empty=1&parent=' . $term->term_id  ); ?>
	                <?php $contTerms = 1 ?>
	                <?php foreach ($sub_terms as $sub_term) : ?>
	                <?php if( $contTerms > $ITEMS_PER_SECTION ) break; ?>
	                    <li><a href="<?php echo get_term_link( $sub_term, $taxonomy ); ?>"><?php echo $sub_term->name; ?></a></li>
	                <?php $contTerms++; endforeach; ?>
	            </ul>
	            <?php if( $contTerms > $ITEMS_PER_SECTION ) : ?>
	                <a class="view-all resource-btn" href="<?php echo get_term_link( $term, $taxonomy ); ?>">View All Categories</a>
	            <?php endif; ?>
	      </div>
	  <?php endforeach; ?>


	</div>


</main>
</div>
</div>

<?php get_template_part('st-modal', 'part'); ?>
<?php get_footer(); ?>
