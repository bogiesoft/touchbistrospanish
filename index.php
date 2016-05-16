<?php get_header(); ?>

	<section class="business-section">
		<?php get_template_part( 'business-section', 'part' ); ?>
	</section>

<?php the_content(); ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>