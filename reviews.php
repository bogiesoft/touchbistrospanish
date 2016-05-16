	<?php
		/**
		 	Template Name: Reviews
		**/
		global $award_years;
		//global 
		$award_years = array();
		$awards_post_list_data = TbDataHelper::getPostListPageData(array(
			'posts_per_page' => 20,
			'post_type' => 'awards',
			'order' => 'ASC',
			'review_category' => $categories[0]->slug,
			'orderby'			=> 'post_date',
			//'meta_key'		=> 'year',
			//'meta_value'	=> 2016,
		));
		$awards_posts = $awards_post_list_data['posts'];
		$awards_total_post_num = $awards_post_list_data['total_post_num'];
		$next_year = date('Y');
		foreach ($awards_posts as $award) {
			$next_year = get_field('year', $award->ID);
			$award_years[$next_year][] = $award;
			
		}
		krsort($award_years);
		//print_r($award_years);


		global $custom_posts;
		$categories = get_categories(array(
			'taxonomy' => 'review_category',
			'hide_empty' => 0,
		));
		$post_list_data = TbDataHelper::getPostListPageData(array(
			'posts_per_page' => TbDataHelper::REVIEWS_POSTS_PER_PAGE,
			'post_type' => 'reviews',
			'order' => 'ASC',
			'review_category' => $categories[0]->slug,
			'meta_key'			=> 'position',
			'orderby'			=> 'meta_value_num',
		));
		$custom_posts = $post_list_data['posts'];
		$total_post_num = $post_list_data['total_post_num'];
		
		global $hosp_custom_posts;
		$hosp_post_list_data = TbDataHelper::getPostListPageData(array(
			'posts_per_page' => TbDataHelper::REVIEWS_POSTS_PER_PAGE,
			'post_type' => 'reviews',
			'order' => 'ASC',
			'review_category' => $categories[1]->slug,
			'meta_key'			=> 'position',
			'orderby'			=> 'meta_value_num',
		));
		$hosp_custom_posts = $hosp_post_list_data['posts'];
		$hosp_total_post_num = $hosp_post_list_data['total_post_num'];
		// $custom_posts = TbDataHelper::ajaxLoadMoreCustomers();


		get_header();
		
		$first_category = $categories[0]->slug;


	?>


	<section class="business-section-generic reviews-lead lead-section">
		<div class="container">
        	<h1 class="lead-title">TouchBistro Product Reviews &amp; Awards</h1>

	        <p class="intro-text">
	        	We think TouchBistro is the best POS on the market. But don't take our word for it.
				Check out some of the rave reviews and awards we've recived from our customers and industry experts.
	        </p>
	    </div>
	</section>

	<section class="business-section-generic reviews-filter-section">

				<section class="section-filter-navigation">
		<div class="container">
        	<ul>
<?php $active = 0; ?>
						<?php foreach ($categories as $category) : ?>
							<li><a href="#" cat-attr="<?php echo $category->slug;?>" class="catselect <?php if ($active == 0){ echo "active"; $active = 1; } ?>"> <?php echo $category->name; ?></a></li>
						<?php endforeach; ?>
                        <li><a href="#" cat-attr="award-year" class="catselect"> Awards</a></li>

        	</ul>
	    </div>
		</section>
	</section>

	<section class="business-section-generic reviews-filter-blocks">

			<div class="reg reviews-container" >

					<section id="coustom-posts-section">
					<?php get_template_part('reviews-page', 'part'); ?>
                    <?php get_template_part('hospreviews-page', 'part'); ?>
                    <?php get_template_part('awards-reviews-page', 'part'); ?>
					</section>


	    </div>
			
			<?php if ($total_post_num > TbDataHelper::REVIEWS_POSTS_PER_PAGE) : ?>
			<div class="more-pod view-more-posts-section"><span class="more-text">More Reviews</span></div>
			<?php endif; ?>
            <?php if ($hosp_total_post_num > TbDataHelper::REVIEWS_POSTS_PER_PAGE) : ?>
			<div class="hosp-more-pod view-more-posts-section"><span class="more-text">More Hosp Reviews</span></div>
			<?php endif; ?>
            <?php if ($awards_year_num > TbDataHelper::REVIEWS_POSTS_PER_PAGE) : ?>
			<div class="awards-more-pod view-more-posts-section"><span class="more-text">More Awards</span></div>
			<?php endif; ?>

	</section>

<?php the_content(); ?>

<script>
	var cat = '<?php  echo $categories[0]->slug; ?>';
	var next_year = <?php echo $next_year ?>;
	var paged = 1;
	var hosp_paged = 1;
	var total_post_num = '<?php  echo $total_post_num; ?>';
	var hosp_total_post_num = '<?php  echo $hosp_total_post_num; ?>';
	var post_per_page = '<?php  echo TbDataHelper::REVIEWS_POSTS_PER_PAGE ?>';
	//jQuery('.view-more-posts-section').hide();
	var $grid = jQuery('#coustom-posts-section');
	function onArrange(){
		//console.log('test');
		$grid.imagesLoaded().always( function() {
			$grid.isotope('layout');
			//console.log('readjusted');
		});
	
	}
	
	jQuery('.more-pod').on('click', function(e){
		e.preventDefault();
		paged = paged + 1;
		//console.log(':)');
		//console.log(paged);
		var url = '<?php  echo admin_url('admin-ajax.php'); ?>';
		jQuery.post(url, {
			'paged' : paged,
			'action' : 'ajaxLoadMoreReviews',
			'category' : '.reviews'
		}, function(data) {
			var di=data;
	    newItems = jQuery(di).appendTo($grid);
	  	//$grid.isotope('appended', newItems ).isotope('layout');
		$grid.isotope('appended', newItems );
			$grid.isotope({ sortBy : 'order' });
			//jQuery("#coustom-posts-section").isotope( 'layout' );
			//jQuery('.reviews-container').css('height','auto');
			console.log('review post count' + total_post_num);
			//console.log(post_per_page * paged);
			if (total_post_num <= post_per_page * paged) {
				jQuery('.more-pod').hide();
			}
		}, 'html');
	});
	jQuery('.hosp-more-pod').on('click', function(e){
		e.preventDefault();
		hosp_paged = hosp_paged + 1;
		//console.log(':)');
		//console.log(paged);
		var url = '<?php  echo admin_url('admin-ajax.php'); ?>';
		jQuery.post(url, {
			'paged' : paged,
			'action' : 'ajaxLoadMoreReviews',
			'category' : '.hospitality'
		}, function(data) {
			var di=data;
	    newItems = jQuery(di).appendTo($grid);
	  	//$grid.isotope('appended', newItems ).isotope('layout');
		$grid.isotope('appended', newItems );
			$grid.isotope({ sortBy : 'order' });
			//jQuery("#coustom-posts-section").isotope( 'layout' );
			//jQuery('.reviews-container').css('height','auto');
			console.log('hosp post count' + hosp_total_post_num);
			//console.log(post_per_page * hosp_paged);
			if (hosp_total_post_num <= post_per_page * hosp_paged) {
				jQuery('.hosp-more-pod').hide();
			}
		}, 'html');
	});
	jQuery('.catselect').on('click', function(e){
		e.preventDefault();
		cat = jQuery(this).attr('cat-attr');
		jQuery('.catselect').removeClass('active');
		jQuery(this).addClass('active');
		console.log(cat);
		$grid.isotope({ filter: '.'+ cat });
		$grid.isotope('layout');
		jQuery('.view-more-posts-section').hide();
		switch(cat) {
    		/*case 'award-year':
        		if (hosp_total_post_num <= post_per_page * hosp_paged) {
					jQuery('.hosp-more-pod').hide();
				}
        		break;*/
    		case 'reviews':
        		if (total_post_num > post_per_page * paged) {
					jQuery('.more-pod').show();
				}
        		break;
			case 'hospitality':
        		if (hosp_total_post_num > post_per_page * hosp_paged) {
					jQuery('.hosp-more-pod').show();
				}
        		break;
    		default:
        		break;
		}
	});
	jQuery( document ).ready(function() {
		$grid = jQuery('#coustom-posts-section').imagesLoaded().always( function() {
		$grid.isotope({
			// options
			itemSelector: '.grid-item',
			filter: '.reviews',
			masonry: {
      			columnWidth: '.half-pod'
    		},
			percentPosition: true,
			getSortData: {
				order: function(itemElem) { // function
					var weight = jQuery(itemElem).attr('data-order');
					//console.log(weight);
					return parseFloat(weight);
				}
			},
			sortBy: 'order',
			
		});
		$grid.on( 'arrangeComplete', onArrange );
		});
		
		//console.log('before');
		//$grid.delay( 3000 ).isotope('layout');
		//console.log('after');
	});

</script>

<?php get_footer(); ?>
