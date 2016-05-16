<?php
  /**
    Template Name: Sign In
  **/

  get_header();
?>

<!--<div class="topborder">
  <div class="container">
	<h2><?php echo the_title();?></h2>
  </div>
</div>-->
	
<section class="business-section-generic login full-hero-section">
	<div class="container">

		<div class="simple-content">
			<?php echo get_the_content($postid);?>
		</div>
		
		<div class="login-container">
			<a class="logo" href="/touchbistro">
				<img src="<?php echo get_template_directory_uri() . '/assets/images/vector-smart-object.png' ?>" alt="TouchBistro Logo" height="42" width="186">
			</a>
			
			<div class="login-box">
				<h4>SIGN IN TO TOUCHBISTRO CLOUD</h4>
				<form class="login-form">
					<p><label>Username</label></p>
					<input class="username" type="text" name="username"></input>
					<br><br>
					<p><label>Password</label></p>
					<input class="password" type="password" name="password"></input>
					<input class="submit" type="submit" value="Sign In">
					
					<div class="form-etc">
						<input class="remember" type="checkbox"> Remember Me</input>
						<a class="forgot-pw" href="#">Forgot your password?</a>
					</div>
				</form>				
			</div>
			
			<div class="register">
				<p>Not a customer?<p><a href="#" class="registerfree">Try it for Free</a>				
			</div>
		</div>
		
		<div class="login-img">			
			<div class="login-img-text">
				<p>Do you know someone who would love TouchBistro? Refer them today to earn big! </p>
				<a class="refer-btn">Refer a Friend</a>
			</div>
		</div>
		
		<div class="container">
			<?php

			if( have_rows('rsl_boxes', $item->ID) ) :

			  while ( have_rows('rsl_boxes', $item->ID) ) : the_row();
			echo '  <div class="rsl-embed">	';

			  echo   $custom = get_sub_field('rsl_box');
			echo '</div>';
			 endwhile;
			 endif;

			?>
		</div>

		<div class="button"><?php echo get_field('button_text'); ?></div>
	</div>
</section>

<?php get_footer(); ?>
