<!--archive-st_video-->
<?php 
$query_str = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY); 
parse_str($query_str, $query_params);
 
$page = $query_params['page'];
     
$term_id = (isset($_GET["category"]) && !empty($_GET["category"])) ? $_GET["category"] : 0;

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
              <li><a href="?<?php echo 'category=' . $term_id ?>&page=<?php echo ($page - 1); ?>">&laquo;</a></li>
          <?php endif ?>
          
          <?php for ($i = 1; $i <= $query->max_num_pages; $i++) : ?>
          <li <?php if ($page == $i) { echo ' class="active" '; }?>><a href="?<?php echo 'category=' . $term_id ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>
          <?php endfor; ?> 
          <?php if ($page >= $query->max_num_pages) : ?>
              <li  class="disabled"><a>&raquo;</a></li>
          <?php else : ?>
              <li><a href="?<?php echo 'category=' . $term_id ?>&page=<?php echo ($page + 1); ?>">&raquo;</a></li>
          <?php endif ?>
        </ul>
    </section>
<?php endif; ?>