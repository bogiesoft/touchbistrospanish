<?php
$awards_section = get_field('awards_section');
?>
<section class="business-section-generic">
	<div class="container">
		<section id="awards" class="awards-three-aside">

			<h2><?php echo $awards_section[0]['title']; ?></h2>

			<?php $awards = $awards_section[0]['awards']; ?>
			<?php $x = 0.3; foreach ($awards as $row) :
				$x = $x + 0.3; ?>
				<?php $image = get_field('image', $row['award']); ?>
				<div class="award-pods os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="<?php echo $x;?>s">
					<div class="award-image">
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
					</div>
					<p><?php echo $row['award']->post_title; ?></p>
				</div>
			<?php endforeach; ?>

		</section>
	</div>
</section>
