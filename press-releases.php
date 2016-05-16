	<?php
		/**
		 	Template Name: Press Releases
		**/
		global $custom_posts;
		$press_release_data = TbDataHelper::getPostListPageData();
		$custom_posts = $press_release_data['posts'];
		$total_post_num = $press_release_data['total_post_num'];
		get_header();
	?>

<section class="business-section-generic press-releases-lead lead-section">
	<div class="container">
    	<h1 class="lead-title"><?php the_field('title'); ?></h1>
	</div>
</section>
<section class="business-section-generic">
<div class="container">
	<section class="business-section-generic press-releases-list">

		<section id="press-releases-posts-section">
		<?php get_template_part('press-releases', 'part'); ?>
		</section>

		<?php if ($total_post_num > TbDataHelper::PRESS_RELEASES_POSTS_PER_PAGE) : ?>
		<section class="business-section-generic scroll-section-trigger view-more-press-releases-section">
			<a href="#" class="scroll view-more-posts">Load More Press Releases</a>
		</section>
		<?php endif; ?>

	</section>

	<aside class="media-coverage">
		<div class="media-kit-pod">
			<p itemprop="member" itemscope="" itemtype="http://schema.org/Person">
                <h5>Media Contact:</h5><br>
<span itemprop="name">Kari Wise</span><br>
Boulevard Public Relations
<a href="mailto:Kari@boulevardPR.com" itemprop="email">Kari@boulevardPR.com</a>
<a href="tel:8185888074" itemprop="telephone">+1.818.588.8074</a>
			</p>
			<a href="<?php echo home_url() . '/feed/?post_type=press_releases'; ?>" class="button" target="_blank"><?php the_field('media_rss_feed_link_text'); ?></a>
		</div>
    </aside>
	
	

</div>
</section>

<?php the_content(); ?>
<script>
jQuery(function(){
	var paged = 1;
	var total_post_num = <?php echo $total_post_num; ?>;
	var post_per_page = <?php echo TbDataHelper::PRESS_RELEASES_POSTS_PER_PAGE?>;
	jQuery('.view-more-posts').on('click', function(e){
		e.preventDefault();
		paged = paged + 1;
		var url = '<?php echo admin_url('admin-ajax.php'); ?>';
		jQuery.post(url, {
			'paged' : paged,
			'action' : 'ajaxLoadMorePressReleases'
		}, function(data) {
			jQuery('#press-releases-posts-section').append(data);
			if (total_post_num <= post_per_page * paged) {
				jQuery('.view-more-press-releases-section').hide();
			}
		}, 'html');
	});
});
</script>
<?php get_footer(); ?>
