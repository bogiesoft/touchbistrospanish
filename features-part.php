<?php
/**
Template Name: Features
 **/





global $custom_posts;
$active = $custom_posts;

?>





		<?php  if( have_rows('info_boxes',$active) ) : ?>
		<?php while ( have_rows('info_boxes',$active) ) : the_row();
		$row = $row + 1;
		?>


						<?php if ($row != 1){
							?>

				<div class="right-section" style="border-top:1px #ccc solid;padding-top:50px;">
						<?php }else {
							?>
				<div class="right-section">

							<?php
						} ?>

				<?php if ($row == 1){
					?>
					<div class="section-title" style="background-image:url('<?php echo get_field('main_icon',$active); ?>')">

										<?php echo get_the_title($active); ?>
					</div>
					<div class="section-blurb">
						<?php echo get_field('introductory_paragraph',$active); ?>
					</div>
					<?php
				}?>


				<div class="imagecontainer">
					<img class="img-responsive <?php echo 'img'.$row;?>" src="<?php echo the_sub_field('default_image'); ?>">
				</div>
				<div class="section-blurb-right">
					<div class="blurb-title">
							<?php echo the_sub_field('hover_features_title'); ?>
					</div>
					<ul class="list-features">


								<?php  if( have_rows('hover_features_list') ) : ?>
								<?php while ( have_rows('hover_features_list') ) : the_row(); ?>


									<li class="list-item hover-change" attr-num="<?php echo $row;?>" attr-image="<?php echo the_sub_field('item_hover_image'); ?>"><?php echo the_sub_field('item_text'); ?>

										<?php $link = get_sub_field('link_optional');
										if ($link != ''){
											?>
												<a href="<?php echo $link;?>"><div class="seehere">see here</div></a>
											<?php
										}?>



									</li>

											<?php  if( have_rows('icons') ) : ?>
											<?php while ( have_rows('icons') ) : the_row(); ?>

											<div class="icon" style="background-image:url('<?php $icon =  get_sub_field('icon'); echo $imgarray[$icon];?>')"></div>

											<?php endwhile; ?>
											<?php endif; ?>




								<?php endwhile; ?>
								<?php endif; ?>

					</ul>

				</div>


			</div>


			<div class="right-section">



								<div class="left-text-blurb text-blurb">
									<div class="blurb-title">
											<?php echo the_sub_field('non_hover_features_title_#1'); ?>
									</div>
									<ul class="list-features">


																		<?php  if( have_rows('non_hover_features_list_#1') ) : ?>
																		<?php while ( have_rows('non_hover_features_list_#1') ) : the_row(); ?>


																			<li class="list-item"><?php echo the_sub_field('item_text'); ?>

																				<?php $link = get_sub_field('link_optional');
																				if ($link != ''){
																					?>
																						<a href="<?php echo $link;?>"><div class="seehere">see here</div></a>
																					<?php
																				}?>



																			</li>

																					<?php  if( have_rows('icon') ) : ?>
																					<?php while ( have_rows('icon') ) : the_row(); ?>

																					<div class="icon" style="background-image:url('<?php $icon =  get_sub_field('icon'); echo $imgarray[$icon];?>')"></div>

																					<?php endwhile; ?>
																					<?php endif; ?>




																		<?php endwhile; ?>
																		<?php endif; ?>


									</ul>

								</div>
								<div class="right-text-blurb text-blurb">
									<div class="blurb-title">
											<?php echo the_sub_field('non_hover_features_title_#2'); ?>
									</div>
									<ul class="list-features">


																		<?php  if( have_rows('non_hover_features_list_#2') ) : ?>
																		<?php while ( have_rows('non_hover_features_list_#2') ) : the_row(); ?>


																			<li class="list-item"><?php echo the_sub_field('item_text'); ?>

																				<?php $link = get_sub_field('link_optional');
																				if ($link != ''){
																					?>
																						<a href="<?php echo $link;?>"><div class="seehere">see here</div></a>
																					<?php
																				}?>



																			</li>

																					<?php  if( have_rows('icon') ) : ?>
																					<?php while ( have_rows('icon') ) : the_row(); ?>

																					<div class="icon" style="background-image:url('<?php $icon =  get_sub_field('icon'); echo $imgarray[$icon];?>')"></div>

																					<?php endwhile; ?>
																					<?php endif; ?>




																		<?php endwhile; ?>
																		<?php endif; ?>


									</ul>

								</div>


			</div>


						<?php endwhile; ?>
						<?php endif; ?>


		</div>
