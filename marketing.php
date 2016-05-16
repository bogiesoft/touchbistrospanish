<?php
/*
Template Name: Marketing Landing Page
*/
 	get_header();
	
	$img = get_field('header_background_image');
	
	if ($img){
		?>
		<section class="business-section-generic one-box-lead lead-section" style="background-image:url('<?php  echo $img; ?>')">
		<?php
 } else { ?>
		<section class="business-section-generic one-box-lead lead-section">
		<?php
 } ?>
 <div class="container">
 
<?php while (have_posts()) : the_post(); ?>
	<?php /* the_content();*/ ?>
	<!--[if IE 8]>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/ie8-marketing.css">

		<style>
				.quotepricing {
		background-image: url('<?php the_field('quote_image_ie8'); ?>') !important;
		height:295px;
		}
		.pheader {
		    background-size:auto 29.5%;
		    background-image: url(<?php the_field('header_image_ie8'); ?>) !important;
		}

		</style>
		<![endif]-->
		<!--[if IE 9]>

		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/ie9-marketing.css">

		<![endif]-->

		<style>
		<?php $bgimage = get_field('background_image'); $bgmobileimage = get_field('background_image_mobile'); ?>
		#marketing .mheader {
		background-image:url('<?php echo $bgimage['url']; ?>');
		}
		@media (max-width:992px) {
		#marketing .mheader {
		background-image:url('<?php echo $bgmobileimage['url']; ?>');
		    padding: 49px 0px 30px;
		}


		}


		#marketing .mheader .signupform {
			background-color:<?php the_field('form_background_color'); ?> !important;

		}
		#marketing .mktoHtmlText h4 span, #marketing .mktoLabel, #marketing .mktoForm .mktoAsterix, #marketing .mktoHtmlText p, #marketing .signupform .mktoButton {
			color:<?php the_field('form_text_color'); ?> !important;
		}

		</style>

		<div id="marketing">


			<!-- header and subheader desktop/tablet -->
			<script src="<?php echo get_template_directory_uri() ?>/assets/js/woothemes-FlexSlider-83b3cae/jquery.flexslider.js"></script>

			<div class="mheader col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="mribbon"><div class="leftcorner"></div><div class="ribboncontent"><h1 class="title"><?php the_field('page_title'); ?></h1></div><div class="rightcorner"></div></div>


				<!--   end of unlimited desktop/tablet -->

				<script>
					jQuery( document ).ready(function() {
						jQuery( ".submitbutton" ).click(function() {
							jQuery( ".mktoButton" ).trigger( "click" );
						});

						jQuery('.flexslider').flexslider({
							animation: "slide",
							animationLoop: true,
							itemWidth: 202,
							maxItems: 3,
							move: 1,
							controlNav: false,
							prevText:'',
							nextText:'',
							touch: true
						});

						jQuery('.previousnav').on('click', function(){
							jQuery('.flexslider').flexslider('prev')
							return false;
						})

						jQuery('.nextnav').on('click', function(){
							jQuery('.flexslider').flexslider('next')
							return false;
						})


					setTimeout( function(){


								jQuery( "#marketing #subscribed" ).removeClass( "mktoField" );
							jQuery("#marketing #subscribed").attr("id", "fixed");


					  }
					 , 2000 );

					setTimeout( function(){


								jQuery( "#marketing #subscribed" ).removeClass( "mktoField" );
							jQuery("#marketing #subscribed").attr("id", "fixed");


					  }
					 , 3000 );

					setTimeout( function(){


								jQuery( "#marketing #subscribed" ).removeClass( "mktoField" );
							jQuery("#marketing #subscribed").attr("id", "fixed");


					  }
					 , 4000 );


					});



				</script>


				<div class="signupform">		<?php the_field('sign_up_form_code'); ?>


			</div>







		</div>






		<div class="cityoverview col-xs-12 col-sm-12 col-md-12 col-lg-12" >
			<!-- Place somewhere in the <body> of your page -->

			<div class="cityoverviewtitle">
				<?php the_field('city_overview_title'); ?>
			</div>

			<div class="cityoverviewfield">
				<?php the_field('city_overview'); ?>
			</div>

			<div class="cityboxes">

				<div class="cityboxone">
					<div class="fl">
                    <?php $image = get_field('city_population_image'); ?>
						<div class="populationimage" style="background-image:url('<?php echo $image['url']; ?>');">
						</div>
					</div>
					<div class="fl">
						<div class="populationtitle"><?php the_field('city_population_title'); ?>
						</div>
						<div class="population"><?php the_field('city_population'); ?>
						</div>
					</div>
				</div>


				<div class="cityboxtwo">
					<div class="fl">
                    <?php $image = get_field('city_restaurants_image'); ?>
						<div class="restaurantimage" style="background-image:url('<?php echo $image['url']; ?>');">
						</div>
					</div>
					<div class="fl">
						<div class="restaurantstitle"><?php the_field('city_restaurants_title'); ?>
						</div>
						<div class="restaurants"><?php the_field('city_restaurants'); ?>
						</div>
					</div>
				</div>

			</div>

		</div>






		<?php

			// check if the repeater field has rows of data
		if( have_rows('videos') ):
			?>
		<div class="mvideo col-xs-12 col-sm-12 col-md-12 col-lg-12" >

			<div class="videostitle"><?php the_field('video_section_title'); ?></div>
			<!-- Place somewhere in the <body> of your page -->
			<div class="previousnav">
			</div>

			<div class="videos">

				<div class="flexslider">
					<ul class="slides">
						<?php
			 	// loop through the rows of data
						while ( have_rows('videos') ) : the_row();

			        // display a sub field value
						$title = get_sub_field('video_title');
						$code = get_sub_field('video_code');

						echo '<li class="slideritem"><div class="videoback">';
						echo $code;
						echo '<div class="videotitle">';
						echo $title;
						echo '</div></div></li>';

						endwhile;
						?>



						<!-- items mirrored twice, total of 12 -->
					</ul>



				</div>
			</div>




			<div class="nextnav">
			</div>


			<div class="mobilevideos">



						<?php
			 	// loop through the rows of data
						while ( have_rows('videos') ) : the_row();

			        // display a sub field value
						$title = get_sub_field('video_title');
						$code = get_sub_field('video_code');
						$show = get_sub_field('show_on_mobile');
						echo $show;
						if ($show =='yes'){
							echo '<div class="mobilevideoback">';
							echo $code;
							echo '<div class="videotitle">';
							echo $title;
							echo '</div></div>';
						}


						endwhile;
						?>



						<!-- items mirrored twice, total of 12 -->





			</div>

		</div>

		<?php
		else :

			    // no rows found

			endif;

		?>




		<div class="interviews col-xs-12 col-sm-12 col-md-12 col-lg-12" >
			<div class="interviewstitle"><?php the_field('interview_section_title'); ?>
			</div>


					<?php

						// check if the repeater field has rows of data
					if( have_rows('interviews') ):
						$i = 0;
						$z= 0;
						?>
						<?php
						 	// loop through the rows of data
									while ( have_rows('interviews') ) : the_row();
									$z=$z+1;
									echo '<div class="interviewbox"><div class="picturebox"><div class="fr">';
						        // display a sub field value
									$image = get_sub_field('customer_photo');
									$name = get_sub_field('customer_name');
									$title = get_sub_field('customer_title');
									$description = get_sub_field('customer_description');


									echo '<img src="'.$image['url'].'" class="interviewpic"></div></div><div class="qanda"><div class="iname">'.$name.'</div><div class="ititle">'.$title.'</div>';

									if (isset($description)){
										echo '<div class="idescription">'.$description.'</div>';
									}
									if( have_rows('q_and_a') ):
										echo '<div class="iaccordion"><div class="tab-content" id="accordion"><div class="mtab tab-pane active" id="term-'.$z.'"><ul>';
										while ( have_rows('q_and_a') ) : the_row();
											$i = $i + 1;
											$question = get_sub_field('question');
											 $answer = get_sub_field('answer');
											 echo '<li><h3>';
											echo '<a class="iquestion collapsed" data-toggle="collapse" data-parent="#accordion" href="#'.$i.'">'.$question.'</a></h3>
										<div style="height: auto;" id="'.$i.'" class="ianswer panel-collapse collapse">'.$answer.'</div></li>';
										endwhile;

										?>
													</ul>
							</div>


						</div>

					</div>
				</div>
					</div>
										<?
									else :
										?>
					</div>

									<?php
									endif;



									endwhile;
									?>

					<?php
					else :

						    // no rows found

						endif;

					?>










		</div>


		<div class="testimonials">


			<div class="testimonialstitle"><?php the_field('testimonial_section_title'); ?>
			</div>

				<div class="customer-carousel-container container-fluid">
			<div id="customer-carousel" class="carousel slide" data-ride="carousel" data-interval="8000">
				<div class="carousel-inner">




					<?php

						// check if the repeater field has rows of data
					if( have_rows('testimonials') ):
						$i = 0;
						?>
						<?php
						 	// loop through the rows of data
									while ( have_rows('testimonials') ) : the_row();
									$i = $i + 1;
									if ($i == 1){
										echo '<div class="item active">';
									}else {
										echo '<div class="item">';
									}
						        // display a sub field value
									$image = get_sub_field('restaurant_image');
									$testimonial = get_sub_field('restaurant_testimonial');
									$info = get_sub_field('restaurant_info');

									echo '<img class="featured-image" src="'.$image['url'].'">
		                        <p><img class="openquote quote" src="' . get_template_directory_uri() .'/assets/images/open-quote.png">'.$testimonial.'<img class="closequote quote" src="' . get_template_directory_uri() .'/assets/images/close-quote.png"></p>
		                    	<div class="restaurantinfo">'.$info.'
		                   	</div> </div>';
									endwhile;
									?>

					<?php
					else :

						    // no rows found

						endif;

					?>




							</div>
				<a class="left carousel-control" href="#customer-carousel" data-slide="prev">
					<i class="fa"></i>
				</a>
				<a class="right carousel-control" href="#customer-carousel" data-slide="next">
					<i class="fa"></i>
				</a>
			</div>
		</div>


		</div>



	</div>

	<div class="glide"></div>
	<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
<?php endwhile; ?>
</div>
</section>
<?php  the_content(); ?>

<?php  get_footer(); ?>