<?php
global $custom_posts;
?>
<?php foreach ($custom_posts as $media_coverage_post) : ?>
<div class="media-coverage-row">
	<div class="description">
		<h3><?php echo $media_coverage_post->post_title; ?></h3>
		<span class="strong"><?php echo TbHelper::dateFormat($media_coverage_post->post_date); ?> <?php if( get_field('publication', $media_coverage_post->ID) != ''){ echo ' | ' . get_field('publication', $media_coverage_post->ID);} ?></span>
		<p><?php echo $media_coverage_post->post_content; ?></p>
		<?php if (get_field('media_link', $media_coverage_post->ID)) : ?>
		<a href="<?php the_field('media_link', $media_coverage_post->ID); ?>" target="_blank">Read full article &gt;</a>
		<?php endif; ?>
	</div>
</div>
<?php endforeach; ?>
