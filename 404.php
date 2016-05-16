<?php get_header(); ?>

	<section class="business-section-generic">
		<div class="container">
			<section id="errors404">
            	<div class="errornum">404</div>
				<h3>Page Not Found</h3>
				<p>It seems the page you were looking for cannot be found.</p>
				<a href="/">Go back to the Home Page &gt;</a>
			</section>
		</div>
	</section>

<?php the_content(); ?>
<script>
ga('send', {
  hitType: 'error',
  eventCategory: '404'
});
</script>
<?php get_footer(); ?>