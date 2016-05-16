	<?php
	/**
		Template Name: Customers Page
	**/
	global $custom_posts;
	$post_list_data = TbDataHelper::getPostListPageData(array(
		'posts_per_page' => TbDataHelper::CUSTOMERS_POSTS_PER_PAGE,
		'post_type' => 'customers',
		'order' => 'ASC',
		'meta_key'			=> 'position',
		'orderby'			=> 'meta_value_num',
	));
	$custom_posts = $post_list_data['posts'];
	$total_post_num = $post_list_data['total_post_num'];
	// $custom_posts = TbDataHelper::ajaxLoadMoreCustomers();
	$categories = get_categories(array(
		'taxonomy' => 'customer_category',
		'hide_empty' => 0,
	));
	get_header();
	?>
	<div class="happiness-inner">




	<section class="business-section-generic our-customers-lead lead-section">
		<?php  if( have_rows('lead_section') ) : ?>
		<?php while ( have_rows('lead_section') ) : the_row(); ?>
			<div class="container">
				<h1 class="lead-title"><?php the_sub_field('title'); ?></h1>
				<h2 class="lead-title">We're passionate about the success of our customers.</h2>
				<p class="intro-text">
					<?php the_sub_field('introduction'); ?>
				</p>
			</div>
		<?php endwhile; ?>
		<?php endif; ?>
    </section>

	<section class="business-section-generic">

		<section class="customer-navigation section-filter-navigation">
			<div class="container">
				<!-- ACF REPEATER? -->
				<ul>
					<li><a href="#" cat-attr='*' class="catselect active">Featured</a></li>

					<?php foreach ($categories as $category) : ?>
						<li><a href="#" cat-attr="<?php echo $category->slug;?>" class="catselect"> <?php echo $category->name; ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</section>

		<section id="customer-pods">
		   	<div class="customer-container">
				<section id="coustom-posts-section">
				<?php get_template_part('customers-page', 'part'); ?>
				</section>

			</div>
			<?php if ($total_post_num > TbDataHelper::CUSTOMERS_POSTS_PER_PAGE) : ?>
			<div class="more-pod view-more-posts-section"><span class="more-text">More</span></div>
			<?php endif; ?>
		</section>
	</section>


<?php the_content(); ?>


<script>

	var cat = '*';
	var paged = 1;
	var total_post_num = '<?php echo $total_post_num; ?>';
	var post_per_page = '<?php echo TbDataHelper::CUSTOMERS_POSTS_PER_PAGE?>';
	var $grid = jQuery('#coustom-posts-section');
	function onArrange(){
		console.log('test');
		$grid = jQuery('#coustom-posts-section').imagesLoaded().always( function() {
			$grid.isotope('layout');
			console.log('readjusted');
		});
	
	}
	jQuery('.more-pod').on('click', function(e){
		e.preventDefault();
		paged = paged + 1;
		//console.log(':)');
		console.log('loading page ' + paged);
		var url = '<?php echo admin_url('admin-ajax.php'); ?>';
		jQuery.post(url, {
			'paged' : paged,
			'action' : 'ajaxLoadMoreCustomers',
			//'category' : cat
			//'category' : '*'
		}, function(data) {

			var di=data;
			//console.log(di);
	    newItems = jQuery(di).appendTo($grid);
	  	jQuery($grid).isotope('appended', newItems );
			//
			// jQuery('#coustom-posts-section').isotope({ sortBy : 'order' });


			jQuery($grid).isotope( 'layout' );
			//jQuery('.customer-container').css('height','auto');



			console.log('total posts ' + total_post_num);
			console.log( post_per_page * paged);
			if (total_post_num <= post_per_page * paged) {
				jQuery('.view-more-posts-section').hide();
			}


			if (total_post_num > post_per_page * paged) {
				jQuery('.view-more-posts-section').show();
			}

		}, 'html');
	});
	
	jQuery('.catselect').on('click', function(e){
		e.preventDefault();
		cat = jQuery(this).attr('cat-attr');
		jQuery('.catselect').removeClass('active');
		jQuery(this).addClass('active');
		console.log(cat);
		if (cat == '*') {
			$grid.isotope({ filter: '*' });
		} else {
			$grid.isotope({ filter: '.'+ cat });
		}
	});


	
	jQuery( document ).ready(function() {
		console.log('Ready!');
		$grid = jQuery('#coustom-posts-section').imagesLoaded().always( function() {
			console.log('images Loaded');
		$grid.isotope({
			// options
			itemSelector: '.customer-pods',
			//filter: '.reviews',
			masonry: {
      			columnWidth: '.customer-pods'
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
	});


</script>

<?php get_footer(); ?>
