<?php if (!have_posts()) : ?>
	<div class="alert alert-warning">
		<?php _e('Sorry, no results were found.', 'roots'); ?>
	</div>
	<?php get_search_form(); ?>
<?php endif; ?>

<div id="video-tpl" class="content-container row">

	<?php while (have_posts()) : the_post(); ?>

	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
		<article>
			<header>
				<a href="<?php the_permalink(); ?>" />
				<figure>
					<?php if (has_post_thumbnail()) : ?>
						<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>">
					<?php else : ?>
						<img src="http://placehold.it/260x146">
					<?php endif; ?>
					<div class="hover-layer"></div>
				</figure>
				</a>
			</header>

			<div class="video-inner">
				<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<?php the_excerpt(); ?>
			</div>

		</article>
	</div>

	<?php endwhile; ?>

	<?php if ($wp_query->max_num_pages > 1) : ?>
		<nav class="post-nav">
			<ul class="pager">
				<li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
				<li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
			</ul>
		</nav>
	<?php endif; ?>

</div>

