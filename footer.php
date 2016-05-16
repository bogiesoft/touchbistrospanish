
<?php if( !is_page_template( 'nav-less.php' ) ) : ?>
<footer id="footer" role="contentinfo">
	<div class="container">
		<div class="table">
			<div class="row">

<?php

global $custom_posts;
$post_list_data = TbDataHelper::getPostListPageData(array(
	'posts_per_page' => 0,
	'post_type' => 'footer',
	'order' => 'ASC',
	'meta_key'			=> 'order',
	'orderby'			=> 'meta_value_num',
));


foreach ($post_list_data as $item){
$all = $item;
break;
}

foreach ($all as $item){
			$post = $item;
			setup_postdata( $post );
	echo '<div class="footer-section">	<span class="footer-headings">';
	echo the_title();

	$bottom_text = get_field('bottom_text', $item->ID);
	$bold_items = get_field("bold_items",$item->ID);

	if ($bold_items){
			echo '</span>	<ul class="get-started">';
	} else {
			echo '</span>	<ul>';
	}


	 wp_reset_postdata();
	if( have_rows('menu_items', $item->ID) ) :

		while ( have_rows('menu_items', $item->ID) ) : the_row();

			$custom = get_sub_field('custom_title');

	  	$post_object = get_sub_field('page');





		if( $post_object ):

			$post = $post_object;
			setup_postdata( $post );


			echo '<a href="';
			if ($post->ID === 1602) {
				echo 'http://restaurantsuccess.touchbistro.com/';
			} else {
				echo  get_page_link($post->ID);
			}
			echo '">';

			if ($custom){
				echo '<li>'.$custom.'</li>';

			}else {
				echo '<li>';
				echo the_title();
				echo '</li>';

			}
			echo '</a>';


			 wp_reset_postdata();
		endif;
		?>


	<?php endwhile; ?>
<?php endif;
if ($bottom_text){
	echo $bottom_text;
}

echo '</ul></div>';


}
?>


		</div>

		<img src="<?php echo get_template_directory_uri() . '/assets/images/the-motor.png' ?>" class="car os-animation" data-os-animation="fadeInRight" data-os-animation-delay="0.5s">
	</div>


		<!--<div class="footer-sections">
			<?php if( have_rows('footer_section', 4) ):
			    while ( have_rows('footer_section', 4) ) : the_row(); ?>
			     	<div class="footer-section">
						<span class="footer-headings"><?php echo the_sub_field('section_title'); ?></span>
						<?php
							$section_title = get_sub_field('section_title', 4);
							$section_title = str_replace(' ', '-', $section_title);
							$section_title = strtolower($section_title);
						?>
						<ul class="<?php echo $section_title ?>">
					        <?php if( have_rows('footer_content', 4) ):
					        	while ( have_rows('footer_content', 4) ) : the_row(); ?>
							        <li>
							        	<?php if( get_sub_field('url') ): ?>
							        		<a href="<?php echo the_sub_field('url', 4); ?>">
							        			<?php echo the_sub_field('title', 4); ?>
							        		</a>
							        	<?php else: ?>
							        		<?php echo the_sub_field('title', 4); ?>
							        	<?php endif; ?>
							        </li>
								<?php endwhile; ?>
							<?php endif; ?>
					    </ul>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
			<img src="<?php echo get_template_directory_uri() . '/assets/images/the-motor.png' ?>" class="car">
		</div>-->
	</div> <!-- container end -->

	<div class="container">
		<div id="notices">
			<div class="table">
				<div class="row">
					<div class="cell">
						<img src="<?php echo get_template_directory_uri() . '/assets/images/touch-bistro-footer.png' ?>" class="company-logo">
						<div class="socialicons">

							<?php
							$links = [];

							$menu_items = wp_get_nav_menu_items(27);
							foreach ($menu_items as $item){
								$links[$item->title] = $item->url;

							}

							?>
							<a href="<?php echo $links['twitter'];?>" target="_blank"><div class="twitter sicon"><i class="fa fa-twitter"></i></div></a>

							<a href="<?php echo $links['facebook'];?>" target="_blank"><div class="facebook sicon"><i class="fa fa-facebook"></i></div></a>

							<a href="<?php echo $links['instagram'];?>" target="_blank"><div class="instagram sicon"><i class="fa fa-instagram"></i></div></a>

							<a href="<?php echo $links['google'];?>" target="_blank"><div class="google sicon"><i class="fa fa-google-plus"></i></div></a>

							<a href="<?php echo $links['youtube'];?>" target="_blank"><div class="youtube sicon"><i class="fa fa-youtube"></i></div></a>


						</div>
					</div>
					<div class="cell cell-right">
						<a href="<?php echo esc_url( home_url() ); ?>/privacy-policy/" alt="Privacy Policy">Privacy Policy</a>
						<a href="<?php echo esc_url( home_url() ); ?>/terms-of-service/" alt="Terms of Service">Terms of Service</a>
						<a href="#" alt="Lang" class="lang">
							<img src="<?php echo get_template_directory_uri() . '/assets/images/earth-icon-arrow.png' ?>">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>



</footer>
<div id="capture"></div>
<?php wp_footer(); ?>


	<div class="fixed-bottom">
		<div class="fixed-bottom-container">
		<?php
		//fixed bottom menu
		$links = [];

		$menu_items = wp_get_nav_menu_items(28);
		if ($menu_items){
			foreach ($menu_items as $item){

				echo '<a href="'.$item->url.'" class="fixed-bottom-button ' . convertToClassName($item->title) . '" target="_blank">'.$item->title.'</a>';
				
			}
		}


		?>
        <a href="<?php echo esc_url( home_url() ); ?>/book-a-live-tour/" class="fixed-bottom-button book-a-demo" target="_blank">Book a Demo</a>
		</div>
	</div>
	
<?php endif; ?>
</div>
<div class="remarketing">
<!-- Google Code for Remarketing Tag -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1006410992;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1006410992/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<!-- END Google Code for Remarketing Tag -->
</div>
</body>
</html>
