	<?php
		/**
		 	Template Name: Press Release
		**/
		get_header();
	?>

<div class="press-release-lead"></div>
<section class="business-section-generic">
<div class="container">
	<section class="business-section-generic press-release press-releases-list">
		<h3><?php echo $post->post_title; ?></h3>
        <?php if (have_posts()) :
   while (have_posts()) :
      the_post();?>
    <div class="content">
                <?php the_content(); ?>
    </div>
<?php endwhile;
endif; ?>
		<a href="<?php home_url(); ?>/press-releases/" class="button">Return to Press Releases</a>
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
<?php get_footer(); ?>
