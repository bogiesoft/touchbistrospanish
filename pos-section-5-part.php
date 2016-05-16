<section class="business-section-generic pos-solutions pos-text-blocks" id="<?php echo TbHelper::convertSubNaviMenuId(get_field('section_5_name')); ?>">
	<section class="supplementary-text-pods">
		<div class="container">

			<?php if (get_field('section_5_title')) : ?>
				<h3><?php the_field('section_5_title'); ?></h3>
			<?php endif; ?>
            <div class="supplementary-pods-container">

			<?php  if( have_rows('section_5_text_pods') ) : ?>
			<?php while ( have_rows('section_5_text_pods') ) : the_row(); ?>
			<div class="supplementary-pods">
				<div class="text-pod-image">
					<?php $sec5_image = get_sub_field('image'); ?>
					<?php if (!empty($sec5_image) && !empty($sec5_image['url'])) : ?>
						<img src="<?php echo $sec5_image['url'] ?>">
					<?php endif; ?>
				</div>
				<h6><?php the_sub_field('title'); ?></h6>
				<p>
					<?php the_sub_field('text'); ?>
				</p>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
            </div>

			<p class="features">
				<a href="<?php echo esc_url( home_url( '/features/' ) ); ?>"><?php the_field('section_5_feature_area_text'); ?></a>
			</p>

		</div>
	</section>
</section>
