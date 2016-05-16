<?php 
if (!isset($_GET["search"]) || empty($_GET["search"])) {
	get_template_part('partials/st-article-main'); 
} else {
	get_template_part('partials/st-article-search'); 
}

?>
