<?php
global $award_years;
		//echo '<div class="getpostdata">get_post_data: ';
		//print_r($awards_posts);
		//echo '</div>';
		//$seconds = 0.3;
?>
<?php  foreach ($award_years as $year => $posts) : ?>
	<div class="grid-item award-year">
			<h4><?php echo $year; ?></h4>
			<?php  foreach ($posts as $award) : ?>
            
                <?php $image = get_field('image', $award->ID); ?>
				<div class="award-pods">
					<div class="award-image">
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
					</div>
					<p><?php echo get_the_title($award->ID); ?></p>
				</div>
                
                <?php //$seconds = $seconds + 0.2;
				endforeach; ?>
     </div>

			
<?php endforeach; ?>
