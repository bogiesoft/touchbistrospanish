<?php
 	add_action('wp_head', array('TbHtmlHelper', 'loadSlickSlider'));
	get_header();
	global $custom_posts;
	$post_list_data = TbDataHelper::getPostListPageData(array('posts_per_page' => 999,'post_type' => 'features','order' => 'ASC','orderby' => 'menu_order',));
	$custom_posts = $post_list_data['posts'];
	$total_post_num = $post_list_data['total_post_num'];
	$imgarray = [];
	$row = 0;
	?>
	<?php 
	$img = get_field('header_background_image');
	
	if ($img){
		?>
		<section class="business-section-generic features-index-lead lead-section" style="background-image:url('<?php  echo $img; ?>')">
		<?php
 } else { ?>
		<section class="business-section-generic features-index-lead lead-section">
		<?php
 } ?>
	<div class="container">
		<h1 class="lead-title"><?php  echo get_the_title(); ?></h1>
		<h3 class="lead-title">					<?php  echo $tag = get_field('page_tagline'); ?>
 </h3>
	</div>
</section>
<section class="business-section-generic features-index">
	<div class="container">
		<div class="left-col">
			<ul class="nav nav-item-group">
				<?php
	$i=0;
	foreach ($custom_posts as $feature) :
	$i = $i + 1;
	?>
					<?php  if (get_field('tag_line', $feature->ID)) : ?>
								<?php 
	
	if ($i == 1){
		$active = $feature->ID;
	}

	?>
									<li class="nav-item">
										<a href="<?php  echo '#' . $feature->post_name; ?>" class="nav-item-title" <?php  if (get_field('feature_group_colour', $feature->ID)) : ?>style="border-color: <?php  echo get_field('feature_group_colour',$feature->ID); ?>"<?php  endif; ?>>
											<?php  echo get_the_title($feature->ID); ?>
										</a>
										<ul class="nav-subitems" <?php  if (get_field('feature_group_colour', $feature->ID)) : ?>style="border-color: <?php  echo get_field('feature_group_colour',$feature->ID); ?>"<?php  endif; ?>>
                                        	<li class="subitem"><div class="nav-bullet" <?php  if (get_field('feature_group_colour', $feature->ID)) : ?>style="background-color: <?php  echo get_field('feature_group_colour',$feature->ID); ?>"<?php  endif; ?>></div><a href="<?php  echo '#popular-' . $feature->post_name; ?>">Popular Features</a></li>
                                        	<?php  if( have_rows('features_boxes',$feature->ID) ) : ?>
												<?php 
	while ( have_rows('features_boxes',$feature->ID) ) :
	the_row();
	$row = $row + 1;
	?>
                                                    	<li class="subitem"><div class="nav-bullet" <?php  if (get_field('feature_group_colour', $feature->ID)) : ?>style="background-color: <?php  echo get_field('feature_group_colour',$feature->ID); ?>"<?php  endif; ?>></div><a href="<?php $subitem_class = TbHelper::convertSubNaviMenuId(get_sub_field('features_title')); echo '#' . $subitem_class; ?>-features" <?php  if (get_field('feature_group_colour', $feature->ID)) : ?>style="border-color: <?php  echo get_field('feature_group_colour',$feature->ID); ?>"<?php  endif; ?>><?php  echo the_sub_field('features_title'); ?></a></li>
                                            	<?php  endwhile; ?>
											<?php  endif; ?>
                                        </ul>
									</li>
					<?php
 endif; ?>
				<?php  endforeach; ?>
			</ul>
			<div class="customers-love">
				<div class="customers-love-title">
					<?php  echo $love = get_field('why_customers_love'); ?>
				</div>
				<?php  if( have_rows('features') ) : ?>
				<?php 
	while ( have_rows('features') ) :
	the_row();
	?>
									<div class="customers-love-reason">
										<div class="customers-love-reason-image" style="background-image:url('<?php  echo the_sub_field('icon'); ?>')">
										</div>
										<div class="customers-love-reason-title">
												<?php 
	$feat =get_sub_field('feature');
	$feat = strtolower($feat);
	$feats = explode(' ',$feat);
	$imgarray["$feats[0]"] = get_sub_field('icon');
	?>
												<?php  echo the_sub_field('feature'); ?>
										</div>
									</div>
				<?php  endwhile; ?>
				<?php  endif; ?>
			</div>
		</div>
		<div class="right-col">
        <div class="all-features-list">
        		<?php
	$i=0;
	foreach ($custom_posts as $feature) :
	$i = $i + 1;
	?>
    <div id="<?php  echo $feature->post_name; ?>" class="<?php  echo $feature->post_name . ' '; ?>feature-group">
					<?php  if (get_field('tag_line', $feature->ID)) : ?>
                    <div class="feature-group-header<?php  if ($i == 1) : ?> first<?php  endif; ?>">
									<div class="feature-group-intro" >
										<h3 class="feature-group-title" <?php  if (get_field('feature_group_colour', $feature->ID)) : ?>style="color: <?php  echo get_field('feature_group_colour',$feature->ID); ?>"<?php  endif; ?>>
											<?php  echo get_the_title($feature->ID) . ' Features'; ?>
										</h3>
                                        <div class="section-blurb">
											<?php  echo get_field('introductory_paragraph',$feature->ID); ?>
										</div>
                                    </div>
                                    </div>
                                    <div class="popular-section" id="popular-<?php  echo $feature->post_name; ?>">
                                    <div class="popular-nav">
										<h4 class="section-title" <?php  if (get_field('feature_group_colour', $feature->ID)) : ?>style="color: <?php  echo get_field('feature_group_colour',$feature->ID); ?>"<?php  endif; ?>>
											<?php  echo 'Popular ' . get_the_title($feature->ID) . ' Features'; ?>
										</h4>
                                        <div class="popular-list-features">
								<?php  if( have_rows('popular_features_list',$feature->ID) ) : ?>
                                <?php $item_no=0; ?>
								<?php while ( have_rows('popular_features_list',$feature->ID) ) : the_row(); ?>
                                	<?php  if( get_sub_field('item_hover_image') != '' && $item_no < 8) : ?>
									<div class="list-item popular-feature-item hover-change<?php  if ($item_no == 0) : ?> active<?php  endif; ?>" attr-num="<?php echo $item_no; ?>"><?php  echo the_sub_field('item_text'); ?>
										<?php 
	$link = get_sub_field('link_optional');
	
	if ($link != ''){
		?>
												<a href="<?php  echo $link; ?>">see here</a>
											<?php
 } ?>
									</div>
                                    <?php $item_no = $item_no + 1; ?>
                                    <?php  endif; ?>
								<?php  endwhile; ?>
								<?php  endif; ?>
					</div>
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    <?php  if( have_rows('popular_features_list',$feature->ID) ) : ?>
                                    <?php $item_no=0; ?>
                                    <div class="popular-slider">
									<?php while ( have_rows('popular_features_list',$feature->ID)) : the_row();?>
                                    	<?php  if( get_sub_field('item_hover_image') != '' && $item_no < 8) : ?>
                                		<div class="popular-slide"><img src="<?php  echo the_sub_field('item_hover_image'); ?>"></div>
                                        <?php $item_no = $item_no + 1; ?>
                                        <?php  endif; ?>
									<?php  endwhile; ?>
                                	</div>
									<?php  endif; ?>
                                    
                                    
                                    
                                    </div>
                                    <?php  if( have_rows('features_boxes',$feature->ID) ) : ?>
												<?php 
	while ( have_rows('features_boxes',$feature->ID) ) :
	the_row();
	$row = $row + 1;
	?>
                                                    	<div id="<?php $feature_id = TbHelper::convertSubNaviMenuId(get_sub_field('features_title')); echo $feature_id; ?>-features" class="right-section">
															<h4 class="section-title" <?php  if (get_field('feature_group_colour', $feature->ID)) : ?>style="color: <?php  echo get_field('feature_group_colour',$feature->ID); ?>"<?php  endif; ?>><?php  echo the_sub_field('features_title') . ' Features'; ?></h4>
                                                            <ul class="list-features">
                                <?php  if( have_rows('features_list') ) : ?>
								<?php 
	while ( have_rows('features_list') ) :
	the_row();
	?>
									<li class="list-item feature-item" attr-num="<?php  echo $row; ?>"><?php  echo the_sub_field('item_text'); ?>
										<?php 
	$link = get_sub_field('link_optional');
	
	if ($link != ''){
		?>
												<a href="<?php  echo $link; ?>"><div class="seehere">see here</div></a>
											<?php
 } ?>
                                        
                                        <?php  if( have_rows('icon') ) : ?>
										<?php while ( have_rows('icon') ) : the_row();?>
										<img class="icon" src="<?php 
	$icon =  get_sub_field('icon');
	echo $imgarray[$icon];
	?>">
										<?php  endwhile; ?>
										<?php  endif; ?>
									</li>
								<?php  endwhile; ?>
								<?php  endif; ?>
                                </ul>
                                                        </div>
                                            	<?php  endwhile; ?>
									<?php  endif; ?>
					<?php  endif; ?>
                    </div>
				<?php  endforeach; ?>
        </div>
		</div>
	</div>
</section>
<?php  the_content(); ?>

<?php  get_footer(); ?>
<script>
	

	jQuery('.left-col').affix({
	   	offset: {
			top: jQuery('.left-col').parent().offset().top,
			bottom: jQuery('#footer').outerHeight() + 58
	    }
	});
	
	jQuery('body').scrollspy({target: ".left-col" });
	
	 jQuery('.popular-slider').slick({
  		slidesToShow: 1,
  		slidesToScroll: 1,
  		arrows: false,
  		fade: true,
		accessibility: false
	});



	jQuery(function(){
		jQuery('.nav-item-group li a').on('click', function(){
			var speed = 400;
			var href =  jQuery(this).attr('href');
			var target = jQuery(href == '#' || href == "" ? 'html' : href);
			var position = target.offset().top;
			jQuery('body, html').animate({scrollTop:position}, speed, 'swing');

			return false;
		});
		jQuery('.popular-feature-item').on('click', function(){
			var destination =  jQuery(this).attr('attr-num');
			jQuery('.popular-feature-item').removeClass( "active" );
			jQuery(this).addClass( "active" );
			jQuery(this).parents( ".popular-section" ).find(".popular-slider").slick('slickGoTo', destination);
			return false;
		});
	});

	
</script>