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



<!--taxonomy-st_video_category-->
<?php

$term = get_queried_object();
$sub_terms = get_terms( $term->taxonomy, 'orderby=count&hide_empty=1&parent=' . $term->term_id  );
?>

<?php if(!empty($sub_terms)) : ?>
<?php BreadCrumbs('term', $term->term_id, $term->taxonomy) ?>

<div id="resource-tpl" class="content-container row">

	<h1 class="tax-title"><?php echo $term->name; ?></h1>

    <p class="tax-description"><?php echo $term->description; ?></p>

    <div class="col-md-12">

        <ul class="article-list">
            <?php foreach ($sub_terms as $sub_term) : ?>
            <li>
                <a href="<?php echo  get_term_link( $sub_term, $taxonomy ); ?>">
                    <h3><?php echo $sub_term->name; ?></h3>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<?php else:
    $query_str = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
    parse_str($query_str, $query_params);

    $page = $query_params['page'];

    $term_id = $term->term_id;

    $term = get_term( $term_id, 'st_video_category');

    $query = get_video_query(10, $term_id, $page);

    ?>

    <?php BreadCrumbs('subTerm', $term_id , 'st_video_category') ?>

    <?php if (!$query->have_posts()) : ?>
        <div class="alert alert-warning">
            <?php _e('Sorry, no results were found.', 'roots'); ?>
        </div>
    <?php endif; ?>

    <div class="st-video-list">

        <h1><?php echo $term->name ?></h1>
        <ul>
        <?php while ($query->have_posts()) : $query->the_post(); ?>

            <li>
                <a href="<?php echo get_permalink(); ?>">
                    <div id="containerIMG">
                        <img src="<?php echo get_video_thumbnail(get_field("video_hosting"), get_field("video_code")) ?>" height="40" width="70">
                        <div id="play"></div>
                    </div>
                    <div class="content video-title"><p><?php the_title(); ?></p></div>
                </a>
            </li>
        <?php endwhile; ?>
        </ul>
    </div>

    <?php if ($query->max_num_pages > 1) : ?>

        <section class="page-wrap">
          <ul class="pagination">
              <?php $page = (isset($_GET["page"]) && !empty($_GET["page"])) ? $_GET["page"] : 1;?>
              <?php if ($page <= 1) : ?>
                  <li  class="disabled"><a>&laquo;</a></li>
              <?php else : ?>
                  <li><a href="?<?php get_term_link( $term, $taxonomy ); ?>&page=<?php echo ($page - 1); ?>">&laquo;</a></li>
              <?php endif ?>

              <?php for ($i = 1; $i <= $query->max_num_pages; $i++) : ?>
              <li <?php if ($page == $i) { echo ' class="active" '; }?>><a href="?page=<?php echo $i ?>"><?php echo $i ?></a></li>
              <?php endfor; ?>
              <?php if ($page >= $query->max_num_pages) : ?>
                  <li  class="disabled"><a>&raquo;</a></li>
              <?php else : ?>
                  <li><a href="?<?php echo get_term_link( $term, $taxonomy ); ?>&page=<?php echo ($page + 1); ?>">&raquo;</a></li>
              <?php endif ?>
            </ul>
        </section>
    <?php endif; ?>


<?php endif; ?></div>

</div>

</div>
<?php get_template_part('st-modal', 'part'); ?>
<?php get_footer(); ?>
