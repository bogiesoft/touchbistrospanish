<?php
/*
	Template Name: st-main
*/

 $taxonomy = 'st_article_category'; // this is the name of the taxonomy
 $terms = get_terms( $taxonomy, 'orderby=count&hide_empty=1&parent=0' ); // for more details refer to codex please.
 $ITEMS_PER_SECTION = 5;
?>

<div class="st-home">
<!-- 	<h1>Support & Training</h1> -->
	
	<?php foreach ($terms as $term) : ?>    
        <div>
            <a class="resource-btn" href="<?php echo get_term_link( $term, $taxonomy ); ?>">
                <img src="<?php echo get_field('category_image', $term); ?>" />
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
            <img src="/wp-content/themes/wp-template/assets/img/st-img/st-video.png" />
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