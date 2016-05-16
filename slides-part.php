<?php $slides = get_field('slides');

	if($slides)
	{
		foreach($slides as $slide)
		{
			echo '<div class="slide">' .	
					'<div class="container">' .
						'<h2 class="slide-title">' . $slide[title] . '</h2>' .
						'<div class="product-description">' .
							'<h4 class="slide-subtitle">' . $slide[subtitle] . '</h3>' .
							'<span class="slide-description">' . $slide[description] . '</span>' .
						'</div>' .
					'</div>' .
				 	'<div class="background">' .
				 		'<img src="' . $slide[image] . '">' .
					'</div>' .
				 '</div>'; 
		}
	}
?>