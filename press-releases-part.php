<?php
global $post;
global $custom_posts;
?>
<?php foreach ($custom_posts as $press_release_post) : 
setup_postdata($press_release_post);?>
<div class="press-releases-row">
	<div class="description">
		<h3><?php echo $press_release_post->post_title; ?></h3>
		<span class="strong"><?php echo TbHelper::dateFormat($press_release_post->post_date); ?></span>
        <p> 
		<?php $more = '... <a class="read-more" href="'. get_permalink($press_release_post->ID) .'">Read more &gt;</a>'; ?>
		<?php echo wp_trim_words( $press_release_post->post_content, 50, $more ); ?></p>
	</div>
</div>
<?php wp_reset_postdata(); ?>
<?php endforeach; ?>