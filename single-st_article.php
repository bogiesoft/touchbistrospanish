<?php
  /**

  **/

  get_header();
?>

<div class="topborder lead-section">

  <div class="container"><h2>Support &amp; Training</h2>

  </div>
</div>

<div class="row st-searchbar" role="search">
	<div class="container">
		<form id="formSearch">
			<div id="st-content-input-search" class="input-group">
				<div id="st-search">
					<img id="loading-img" src="<?php echo get_template_directory_uri() ?>/assets/images/loading.gif" style="display:none"/>
					<input id="st-input-search" type="text" class="form-control" placeholder="Enter Search Term..." autocomplete="off">
					<ul class="results">
					</ul>
				</div>
				<span class="input-group-btn">
					<input id="st-search-button" class="btn btn-primary white-button search-button" type="submit" value="Search"/>
				</span>
			</div><!-- /input-group -->
		</form>
    </div>
</div>

<div class="container support-main">
<?php get_template_part('st-side', 'part'); ?>
<div class="search-main">
<?php
 global $wp_query;
 $wp_query->the_post();
?>

<?php BreadCrumbs('single', get_the_ID(), 'st_article_category') ?>

<div id="resource-tpl" class="row">
	<div id="st-article-content" class="resource-detail">
		<h1><?php the_title(); ?></h1>
		<div class="st-article-print"><?php echo do_shortcode('[print-me target="#st-article-content" title="Print"  do_not_print=".st-article-print" do_not_print=".wistia_embed"]');?></div>



		<div id="article-content" class="article-content">
            <?php
	            $img_url = 'src="'.home_url().'/wp-content/uploads/';
	            $content = str_replace("\r", "<br />", get_the_content());
				$content = str_replace('src="/wp-content/uploads/', $img_url, apply_filters('the_content', $content));

                $videoPosts = get_field('video_relation');

                for ($i = 0; $i <= count($videoPosts) ; $i++){
                	$currentRelation = $videoPosts[$i];
                    $VideoPostID = $currentRelation->ID;
                    $CodeMatch =  '[VideoEmbed = "' . $currentRelation->post_title . '"]';
                    $videoCode = get_field('video_code', $VideoPostID);
                    $videoHosting = get_field('video_hosting', $VideoPostID);
                    $videoEmbedCode = st_video_embed_code($videoHosting, $videoCode);
                    $content = str_replace($CodeMatch, $videoEmbedCode, $content);
                }
                echo $content;
            ?>
        </div>

		<?php if (isset($attachment) && !empty($attachment)) : ?>
			<div class="resource-attachment">
				<a href="<?php echo $attachment['url']; ?>" class="resource-btn">Download File: <?php echo $attachment['title']; ?> </a>
			</div>
		<?php endif ?>
	</div>
</div>
</div>
</div>
<?php get_template_part('st-modal', 'part'); ?>

<?php get_footer(); ?>
