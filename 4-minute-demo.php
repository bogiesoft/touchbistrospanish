<?php
	/**
	 	Template Name: 4 Minute Demo
	**/

	get_header(); 
?>


<section class="business-section-generic four-min-demo-lead lead-section">
	<div class="container">
		<h1>Watch a 4 Minute Demo</h1>
	</div>
</section>

<section class="business-section-generic four-min-demo-content">
	<div class="container">
		<div class="column-one">
			<h6><span>Step 1:</span> See a Sneak Peek of TouchBistro</h6>
			
			<div class="video-pod">
				<span class="four-minute-demo">4 Minute Demo:</span>
				<h6 class="service-title">Full Service Restaurants</h6>
				<img src="<?php echo get_template_directory_uri() . '/assets/images/video-hold.jpg' ?>" alt="">
			</div>

			<div class="video-pod">
				<span class="four-minute-demo">4 Minute Demo:</span>
				<h6 class="service-title">quick Service Restaurants</h6>
				<img src="<?php echo get_template_directory_uri() . '/assets/images/video-hold.jpg' ?>" alt="">
			</div>

		</div>

		<div class="column-two">
			<h6><span>Step 2:</span> Schedule a Full Demo of TouchBistro</h6>

			<p>
				Intrigued? We thought you might be! Check out a full demo of TouchBistro. We’ll have one of our POS specialists get in touch to walk you through a live demo of TouchBistro. 
			</p>

			<a href="<?php echo get_template_directory_uri() . '/book-a-live-tour/' ?>" class="take-tour">Schedule a Guided Tour</a>

			<div class="quote">
				<img src="<?php echo get_template_directory_uri() . '/assets/images/lilibela.png' ?>" alt="">
				<p>Before TouchBistro we used old school paper receipts and recording our numbers was tiresome. Now we can spend more time thinking about generating more business and growing the company.
				<span class="source">Lalibela |  JR Anderson</span>
				</p>
				
			</div>
				
			<?php get_template_part( 'award-winning-pos', 'part' ); ?>
		</div>
	</div>
</section>



<?php the_content(); ?>

<?php get_footer(); ?>