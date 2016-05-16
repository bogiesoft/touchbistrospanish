<?php

/**
 * Created by IntelliJ IDEA.
 * User: kazuhiro
 * Date: 12/10/15
 * Time: 2:42 AM
 */
class TbHelper
{
    /**
     * @param $string
     * @return mixed
     */
    public static function convertSubNaviMenuId($string)
    {
        $string = str_replace(' ', '-', mb_strtolower($string));
        $escape_strings = array(
            '!', '"', '#', '$', '%', '&', '\\', '\'', '(', ')',
            '*', '+', ',', '.', ':', ';', '<', '=', '>', '?',
            '@', '[', ']', '^', '`', '{', '|', '}', '~', '/'
        );
        $string = str_replace($escape_strings, '', $string);
        return $string;
    }

    /**
     * @return string
     */
    public static function getTemplateFileName()
    {
        global $template;
        $template_file_name = basename($template, '.php');
        return $template_file_name;
    }

    /**
     * @param $startDate
     * @param $endDate
     * @param array $options
     * @return string
     */
    public static function getDateTermStrign($startDate, $endDate, $options = array())
    {
        if (empty($startDate) && empty($endDate)) {
            return '';
        }

        $default = array(
            'date_separater' => ' - ',
        );
        $options = array_merge($default, $options);
        extract($options);
        $date_term_string = '';

        if ((!empty($startDate) && empty($endDate)) ||
            ($startDate == $endDate)) {
            $date_term_string = $startDate;
        } else {
            $date_term_string = "{$startDate}{$date_separater}{$endDate}";
        }

        return $date_term_string;
    }

    public static function dateFormat($datetime, $format = "F j, Y")
    {
        $DateTime = new DateTime($datetime);
        $date_string = $DateTime->format($format);
        return $date_string;
    }

}





/* previous site help functions */




/* =========================Util Functions ======================================== */

/* Returns a WP_Query instance for the article post type, in a specific section *
 * @section: the id of the taxonomy term 									  *
 * @count: How many posts you want to render, 0 means all 					  */
function get_article_query($count, $term_id = 0, $page = 1) {
	$args = array(
		'post_type' => 'st_article',
		'posts_per_page' => $count,
        'paged' => $page
	);

	if ($term_id > 0) {
	    $args["tax_query"] = array(
            array(
                'taxonomy' => 'st_article_category',
                'field' => 'term_id',
                'terms' => $term_id,
            )
        );
	}

	return new WP_Query($args);
}

/* Returns an integer of total posts for the article post type, in a         *
 * specific section 														  *
 * @section: the id of the taxonomy term 									  */
function get_article_count($section) {
	$query = get_article_query($section, 0);
	return $query->found_posts;
}

function get_article_search_query($searchString, $count) {
	$args = array(
		'post_type' => 'st-article',
		's' => $searchString,
		'posts_per_page' => $count,
		);
	return new WP_Query($args);
}



/* =========================Util Functions ======================================== */

/* Returns a WP_Query instance for the article post type, in a specific section *
 * @section: the id of the taxonomy term 									  *
 * @count: How many posts you want to render, 0 means all 					  */
function get_faq_query($term_id, $count) {
	$args = array(
		'st_faq' => 'post',
		'tax_query' => array(
			array(
				'taxonomy' => 'st_faq_category',
				'field' => 'term_id',
				'terms' => $term_id
			)
		)
	);
	return new WP_Query($args);
}

/* Returns an integer of total posts for the faq post type, in a         *
 * specific section 														  *
 * @section: the id of the taxonomy term 									  */
function get_faq_count($section) {
	$query = get_faq_query($section, 0);
	return $query->found_posts;
}

function get_faq_search_query($searchString, $count) {
	$args = array(
		'post_type' => 'st-faq',
		's' => $searchString,
		'posts_per_page' => $count,
		);
	return new WP_Query($args);
}





/* =========================== Utils Functions ========================================= */
function st_video_embed_code($type, $code) {
	$type = strtolower($type);
	switch ($type) {
		case 'wistia':
			return '<iframe src="//fast.wistia.net/embed/iframe/'. $code .'" allowtransparency="true"
			frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen
			msallowfullscreen width="640" height="360"></iframe>';
			break;
		case 'youtube':
			return '<iframe width="640" height="360" src="//www.youtube.com/embed/'. $code .'" frameborder="0" allowfullscreen></iframe>';
			break;
		default:
			break;
	}

}

function get_video_query($count, $term_id = 0, $page = 1) {
	$args = array(
		'post_type' => 'st_video',
		'posts_per_page' => $count,
        'paged' => $page,
		'meta_key'   => 'sort_order',
		'orderby'    => 'meta_value_num',
		'order' => 'ASC'
	);

	if ($term_id > 0) {
	    $args["tax_query"] = array(
            array(
                'taxonomy' => 'st_video_category',
                'field' => 'term_id',
                'terms' => $term_id,
            )
        );
	}
	return new WP_Query($args);
}

function get_video_thumbnail($type, $code){
    $result = '';
    switch ($type) {
		case 'wistia':
            $url = 'http://fast.wistia.com/oembed?url=http%3A%2F%2Fhome.wistia.com%2Fmedias%2F' . $code;
            ob_start();
            $json = file_get_contents($url);
            $resize_warning = ob_get_clean();
            if(empty($resize_warning)) {
                $data = json_decode($json);
                $result = $data->{'thumbnail_url'};
            }
            else {
                return get_template_directory_uri() . '/assets/images/st-img/st-search-video.png';
            }
            break;
        case 'youtube'://http://img.youtube.com/vi/U4Phn-RaH0A/default.jpg
			$result = 'http://img.youtube.com/vi/' . $code . '/default.jpg';
		default:
			break;
    }

    if ($result == ''){
        return get_template_directory_uri() . '/assets/images/st-img/st-search-video.png';
    }
    else{
        ob_start();
        $imaInfo = getimagesize($result);
        $resize_warning = ob_get_clean();
        if(empty($resize_warning)) {
            return $result;
        }
        else {
            return get_template_directory_uri() . '/assets/images/st-img/st-search-video.png';
        }
    }
}



add_action('wp_ajax_nopriv_get_search_suggestions', 'ajax_get_search_suggestions');
add_action('wp_ajax_get_search_suggestions', 'ajax_get_search_suggestions');


add_action('wp_ajax_nopriv_get_search_result', 'ajax_get_search_result');
add_action('wp_ajax_get_search_result', 'ajax_get_search_result');

add_action('wp_ajax_nopriv_get_featured_customers', 'ajax_get_featured_customers');
add_action('wp_ajax_get_featured_customers', 'ajax_get_featured_customers');

/* Functions */
function ajax_get_search_suggestions() {
    $nonce = $_POST['nonce'];
    $termString =  $_POST['term'];
    $search_string = $_POST['search_string'];
    $terms = explode(" ", $termString);
    $searchStatements = "";
    $otherStatement = "";
    $maxPostShow = get_option('settings_num_suggestions');

    $maxPostShow = (is_numeric ( $maxPostShow )) ? $maxPostShow : 4; // 4 default

    if (!wp_verify_nonce($nonce,'myajax-post-comment-nonce')) {
        die();
    }

    global $wpdb;
    $result = array('search_string' => $search_string, 'data' => array());
    $postIDs = array();

    $argsN = array(
        'sentence'   => $termString,
        'numMaxPost' => $maxPostShow
    );

    $search = new Search();
    $postIDs = $search->SearchSentence($argsN);

    $args = array(
        'post_status' => 'publish',
        'post_type' => array('st_article', 'st_video'),
        'post__in' => $postIDs,
        'orderby' => 'post__in',
    );

    /* WP Query */
    $query = new WP_Query( $args );

    if ( $query->have_posts() && (count($postIDs) > 0) ){
        while ( $query->have_posts() ){
            $query->the_post();
            $title = get_the_title();
            $post_type = get_post_type( get_the_ID() );
            $thumbnail = "";
            $isItBlog = strpos($title, $term);
            $title = highlightTerm($terms, $title);
            $imgClass = "";

            if (has_post_thumbnail() && $post_type == 'st_video') {
                $thumbnail = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
                $imgClass = 'st_video';
            } else if ($post_type == 'st_video') {
                $thumbnail = get_video_thumbnail(get_field("video_hosting"), get_field("video_code"));// '/wp-content/themes/wp-template/assets/img/st-img/st-search-video.png';
                $imgClass = 'st_video';
            } else {
                 $videoPosts = get_field('video_relation', get_the_ID());
                 if (is_array($videoPosts)) {
                    $thumbnail = get_template_directory_uri() . '/assets/images/st-img/st-search-article.png';
                    $imgClass = 'st_articleVideo';
                 }
                 else{
                     $thumbnail = get_template_directory_uri() . '/assets/images/st-img/Document_Icon.png';
                     $imgClass = 'st_article';
                 }
            }

            $item = array(
                'title' => $title,
                'post_link' => get_permalink(),
                'post_type' => $post_type,
                'thumbnail_url' => $thumbnail,
                'imgClass' => $imgClass,
                'term' => $term
                );
            array_push($result['data'], $item);
        }

        wp_reset_postdata();
    }

    echo json_encode($result);
    exit;
}


/* ============================= ajax_get_search_result ====================================*/
function ajax_get_search_result() {
    $nonce = $_POST['nonce'];
    $termString =  $_POST['term'];
    $categoryId =  $_POST['category_id'];
    $page = $_POST['page_num'];
    $maxPostShow = -1;
    $result = "";

    if (!wp_verify_nonce($nonce,'myajax-post-comment-nonce')) {
        die();
    }

    global $wpdb;

    $terms = explode(" ", $termString);
    $searchStatements = "";
    $otherStatement = "";
    $postIDs = array();

    /*Arguments for Search Order*/
    $argsN = array(
        'sentence'   => $termString,
        'numMaxPost' => $maxPostShow
    );

    $search = new Search();
    $postIDs = $search->SearchSentence($argsN);

    $args = array(
        'post__in' => $postIDs,
        'orderby' => 'post__in',
        'post_type' => array('st_article', 'st_video'),
        'posts_per_page' => 10,
        'paged' => 1
        );

    /* Search Filter Properties*/
    if($categoryId != -1){
        if (isset($categoryId) && !empty($categoryId) && $categoryId != -2) {
            $args["tax_query"] = array(
                array(
                    'taxonomy' => 'st_article_category',
                    'field' => 'id',
                    'terms' => array($categoryId)
                )
            );
        }else {
            $args["post_type"] = array('st_video');
        }
    }

    if (isset($page))
    {
        $args["paged"] = $page;
    }

    /* WP Query */
    $query = new WP_Query( $args );

    if ( $query->have_posts() && (count($postIDs) > 0) ){

        while ( $query->have_posts() ){
            $query->the_post();
            $title = get_the_title();

            $title = highlightTerm($terms, $title);

            $post_type = get_post_type( get_the_ID() );
            $isItBlog = strpos($title, $term);
            $content = get_the_content();
            $content = preg_replace("/\[.*?\]/","",$content);
            $content = preg_replace("/&nbsp;/","",$content);
            $content = strip_tags($content);
            $content = get_search_paragraph( $content, $terms);

            $content = highlightTerm($terms, $content);

            $postLink = get_permalink();
            if($post_type == 'st_video'){
                $thumbnail = get_video_thumbnail(get_field("video_hosting"), get_field("video_code"));
                $hasVideo = '<div class="thumbnail-container containerIMG"><img class="st_video" src="' . $thumbnail .'" height="35" width="50"/><div id="play"></div></div>';
            }
            else if($post_type == 'st_article'){
                $videoPosts = get_field('video_relation', get_the_ID());
                $hasVideo = (count($videoPosts) > 1 ) ? '<div class="thumbnail-container"><img class="st_articleVideo" src="' . get_template_directory_uri() . '/assets/images/st-img/st-searchresult-video.png"/></div>' : '<div class="thumbnail-container"><img class="st_article" src="' . get_template_directory_uri() . '/assets/images/st-img/Document_Icon.png"/></div>' ;
            }
            $pos = strrpos($content, $term);
            $result = $result . '<a href="' . $postLink . '"><div>' . $hasVideo . '<h3>' . $title . '</h3><p>' . $content . '</p></div></a>';
        }

        //Pagination
        if ($query->max_num_pages > 1){
            $status = '';

            if ($page <= 1) {
                $status = 'class="disabled"';
            }

            $pagePre = $page - 1;
            $pagePos = $page + 1;

            $paginationPre = '<div id="paginationContent"><ul id="SearchPagination" class="pagination"><li '. $status .'><a '. $status .' data-pageNum=" ' . $pagePre . '">&laquo;</a></li>';
            $status = '';
            if ($page >= $query->max_num_pages) {
                $status = ' class="disabled" ';
            }

            $paginationNext = '<li ' . $status . '><a ' . $status . ' data-pageNum="' . $pagePos . '">&raquo;</a></li></ul></div>';

            $status - '';
            $pagination = '';

            for ($i = 1; $i <= $query->max_num_pages; $i++){
                if ($page == $i) {
                 $status = ' class="active" ';
                }
                else{
                    $status = '';
                }
                $pagination = $pagination . '<li' . $status . '><a data-pageNum="' . $i . '">' . $i . '</a></li>';
            }

                $result = $result . $paginationPre . $pagination . $paginationNext;
        }
    }

    if($result != '')
        echo $result;
    else
        echo '<h3> No Results </h3>';


    exit;
}

/* ============================= get_search_paragraph ====================================*/

function get_search_paragraph($itext, $s_terms){
    $text = $itext;
    $maxLen = 150; //up reduce paragraph, down increase paragraph

    //$text = $s_term . " " . $pos . " " . $itext;
    foreach ($s_terms as $term) {
        $textLen = strlen ( $text );
        $termLen = strlen ( $term );
        $pos = strripos($text, $term);

        if($pos > 0){
            $textLeft = substr($text, 0, $pos );
            $textRight = substr($text, $pos ,  $textLen);
            $textLeftLen = strlen ( $textLeft );
            $textRightLen = strlen ( $textRight );


            if( $textLeftLen > $maxLen){
                $textLeft = "..." . substr($textLeft, $textLeftLen - $maxLen ,  $textLeftLen);
            }
            if( $textRightLen > $maxLen){
                $textRight = substr($textRight, 0 , $maxLen ) . "...";
            }

            $textResult = $textLeft . $textRight;
            break;
        }
        else if($textLen > 300 ){
            $textResult = substr($text, 0 , 300 ) . "...";
        }
    }

    return $textResult ;
}


function highlightTerm($terms, $text){
    $str = $text;
    foreach($terms as $k=>$v)
    {
         $str = preg_replace("/($v)(?=[^<>]*(?:<|$))/i","<mark>$0</mark>",$str);
    }

    return $str;
}

/******************************* Featured Customers Filter *******************************/

function ajax_get_featured_customers() {
    $nonce = $_POST['nonce'];
    $categoryId =  $_POST['category_id'];

    if (!wp_verify_nonce($nonce,'myajax-post-comment-nonce')) {
        die();
    }

    $result = array();

    $args = array(
        'order'    => 'DESC',
        'post_status' => 'publish',
        'post_type' => array('featured_customer'),
        'posts_per_page' => -1,
    );


    if($categoryId != -1){
        $args["tax_query"] = array(
            array(
                'taxonomy' => 'featured_customer_category',
                'field' => 'id',
                'terms' => array($categoryId)
            )
        );
    }

    $query = new WP_Query($args);

    if ( $query->have_posts() ){
        while ( $query->have_posts() ){
            $query->the_post();

            $title = get_the_title();
            /*$thumbnail = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
            $thumbnail = get_video_thumbnail(get_field("video_hosting"), get_field("video_code"));*/
            $mediaType = get_field('select_media');

            if($mediaType == 'Video'){
                $videoCode = get_field('featured_customer_video_code');
                $htmlMedia = get_video_code_embed($videoCode, 'html', NULL, NULL, 596, 338);
            }
            else{
                $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'your_thumb_handle' );
                $htmlMedia = '<img class="featured-image" src="' . $thumbnail['0'] . '"/>';
            }

            $icon = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'featured-image-2');

            $item = array(
                'title' => $title,
                'mediaType' => $mediaType,
                'htmlMedia' => $htmlMedia,
                'icon' => $icon,
            );

            array_push($result, $item);
        }

        wp_reset_postdata();
    }

    echo json_encode($result);
    exit;
}
