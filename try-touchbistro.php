	<?php
		/**
		 	Template Name: Try TouchBistro
		**/

		get_header(); 
	?>

	<section class="business-section-generic try-tb-lead full-hero-section">
    <img class="touchbistro-image" src="<?php echo get_template_directory_uri() . '/assets/images/free-trial-mobile.png' ?>" alt="TouchBistro"/>
		<div class="container">
			<div class="left-pod">
        		<h1>Try TouchBistro Free for 4 Weeks</h1>
                <div class="mkto-container">
        			<iframe src="http://go.touchbistro.com/trial-form-host.html" style="max-width:100%;" name="myiFrame" scrolling="no" frameborder="0" marginheight="0px" marginwidth="0px"  height="460px" width="478px"></iframe>
        		</div>
	        </div>
	   </div>
	</section>
	
<?php the_content(); ?>

<?php get_footer(); ?>