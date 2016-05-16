<!--st-search-result-->
<?php
/*
	Template Name: st-search-result
*/

 $taxonomy = 'st_article_category'; // this is the name of the taxonomy
 $terms = get_terms( $taxonomy, 'orderby=count&hide_empty=1&parent=0' ); // for more details refer to codex please.
 $ITEMS_PER_SECTION = 5;
 
?>
<?php
  /**
    Template Name: Support
  **/

  get_header();
?>


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
<ol id="helpBreadcrumb" class="st-nav breadcrumb">
  <li><a href="/help/">Support & Training </a></li>
  <li class="active"></li>
</ol>

<div id="search-filter" class="btn-group">	
	<select class="selectpicker">
		<option value="0" disabled>Filter By</option>
		<option value="-1">Show All</option>
		<?php foreach ($terms as $term) : ?>
	      <option value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
	  	<?php endforeach; ?>
		<option value="-2">Help Videos</option>
    </select>
</div>

<div class="st-search-results">
    <h1></h1>
   <div id="st-search-results-content" > 
        <a href="#">
        </a>
	</div>
</div>
</div>
</div>

<?php get_template_part('st-modal', 'part'); ?>
<?php get_footer(); ?>