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

  <main id="st-main-content" class="main st-main" role="main">


<?php
/*
	Template Name: st-faq
*/
?>
<ol class="st-nav breadcrumb">
  <li><a href="/help">Support & Training </a></li>
  <li class="active">Frequently Asked Questions</li>
</ol>

<?php
/*
	Template Name: st-main
*/

 $taxonomy = 'st_faq_category'; // this is the name of the taxonomy
 $terms = get_terms( $taxonomy, 'orderby=count&hide_empty=1' ); // for more details refer to codex please.
 $ITEMS_PER_SECTION = 5;
 $active = "active";
?>

<div class="st-faq">
	<h1>Frequently Asked Questions</h1>
    <div class="tabbable">
        <ul class="nav nav-tabs">
	        <?php foreach ($terms as $term) : ?>
	            <li class="<?php echo $active ?>"><a href="#term-<?php echo $term->term_id; ?>" data-toggle="tab" title="<?php echo $term->name; ?>"><?php echo $term->name; ?></a><span></span></li>
	        <?php $active="";
	            	      endforeach;
	            	?>
	    </ul>
        <div class="tab-content" id="accordion">

            <?php $active="active"; foreach ($terms as $term) : ?>
            <div class="tab-pane <?php echo  $active?>" id="term-<?php echo $term->term_id; ?>">
	                <?php $query = get_faq_query($term->term_id, $ITEMS_PER_SECTION); ?>
	            <ul>
	            	<?php while ( $query->have_posts() ) : $query->the_post(); ?>
	            	<li>
	            		<h3><a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#<?php echo get_the_ID(); ?>"><?php the_title(); ?> </a></h3>
	            		<p id="<?php echo get_the_ID(); ?>" class="panel-collapse collapse"><?php echo get_the_content(); ?></p>
	            	</li>
	            	<?php $active="";
	            	      endwhile;
	            	?>
	            </ul>
	        </div>
	        <?php endforeach; ?>
        </div>
    </div>
</div>

</main>
</div>

</div>

</div>
<?php get_template_part('st-modal', 'part'); ?>
<?php get_footer(); ?>
