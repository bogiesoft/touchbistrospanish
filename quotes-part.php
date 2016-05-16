<div class="container">
	<h2>Restaurants love TouchBistro</h2>
	<?php

		$quotes = get_field('quotes');

		if($quotes)
		{
			foreach($quotes as $quote)
			{
				echo 	'<span class="quote">' . $quote[quote] . '</span>' .
						'<span class="author">' . $quote[author] . '</span>'; 	
			}
		}
	?>
</div>
