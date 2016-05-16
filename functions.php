<?php
add_action( 'after_setup_theme', 'touchbistro_setup' );
function touchbistro_setup()
{
	load_theme_textdomain( 'touchbistro', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 640;

}

function register_my_menus() {
  register_nav_menus(
    array(
      'initial-menu' => __( 'Initial Menu' ),
      'main-menu' => __( 'Main Menu' ),
       'footer-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

function get_tb_menu () {
   $menus = wp_get_nav_menu_items('main-menu');
   $parent_menus = array();
   $sub_menus = array();
   $mega_menu_categories = array();

   foreach ($menus as $menu) {
       if (!empty($menu->menu_item_parent)) {
           if ($menu->object == 'category') {
               $mega_menu_categories[$menu->menu_item_parent][] = $menu;
           } else {
               $sub_menus[$menu->menu_item_parent][] = $menu;
           }
       } else {
           $parent_menus[$menu->ID] = $menu;
       }
   }

   foreach ($parent_menus as $parent_menu) {
       // main manu
       echo '<li class="' . implode(' ', $parent_menu->classes) . '">';
       if (!empty($sub_menus[$parent_menu->ID])) {
           // sub manu
		   echo '<div>' . $parent_menu->title . '</div>';
           showTbSubMenu($sub_menus[$parent_menu->ID]);
       } elseif (!empty($mega_menu_categories[$parent_menu->ID])) {
           // mega menu
		   echo '<div>' . $parent_menu->title . '</div>';
           showTbMegaMenu($mega_menu_categories[$parent_menu->ID], $sub_menus);
       } else {
		   echo '<a href="' . $parent_menu->url . '"> ' . $parent_menu->title . '</a>';
	   }
       echo '</li>';
   }
}

function showTbSubMenu ($sub_menus) {
   echo '<ul class="sub-menu">';
   foreach ($sub_menus as $sub_menu) {
       echo '<li><a href="' . $sub_menu->url . '">' . $sub_menu->title . '</a></li>';
   }
   echo '</ul>';
}

function showTbMegaMenu($categories, $mega_menu_posts) {
   $column_classes = array(
       1 => 'primary-column', 2 => 'primary-column',
       3 => 'secondary-column', 4 => 'third-column',
       5 => 'third-column',
   );
   echo '<ul class="sub-menu">';
   $loop_num = 1;
   $column = '';
   foreach ($categories as $category) {
       if ($loop_num == 4) {
           $column .= '<div class="third-column-contact">';
       } elseif ($loop_num == 5) {
           $column .= '<div class="getting-started">';
       }                            $column .= '<div class="heading"><span>' . $category->title . '</span></div>';
       if (!empty($mega_menu_posts[$category->ID])) {
           foreach ($mega_menu_posts[$category->ID] as $post) {
               $column .= '<li class="' . implode($post->classes). '"><a href="'. $post->url . '">' . $post->title . '</a></li>';
           }
       }                            if ($loop_num == 4 || $loop_num == 5) {
           $column .= '</div>';
       }                            if ($loop_num == 2 ||
           $loop_num == 3 ||
           $loop_num == 5) {
           echo sprintf('<div class="nav-column ' . $column_classes[$loop_num] . '">' . "%s</div>", $column);
           $column = '';
       }
       $loop_num++;
   }
   echo '<ul class="mobile-menu-extras"><li><a class="mx" href="/mx/">Español</a></li><li><a href="http://restaurantsuccess.touchbistro.com/">Restaurant Success Library</a></li><li><a href="/help/">English Support</a></li><li><a href="/contact-us/">Contact Us</a></li><li><a href="https://cloud.touchbistro.com/" rel="nofollow">Sign In</a></li></ul>';

   echo '</ul>';
}

/**
 * Proper way to enqueue scripts and styles
 */
function theme_name_scripts() {
	wp_enqueue_script('jquery');

	if ( is_page('mx')) {
		wp_enqueue_style( 'mx', get_template_directory_uri() . '/assets/stylesheets/mx.css"', array(), '1.0.0', 'screen, projection' );
	}else{
		wp_enqueue_style( 'screen', get_template_directory_uri() . '/assets/stylesheets/screen.min.css"', array(), '1.0.0', 'screen, projection' );
	}
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/stylesheets/font-awesome.min.css"', array(), '1.0.0', 'screen, projection' );
	wp_enqueue_script( 'functions', get_template_directory_uri() . '/assets/js/functions.min.js', array( 'jquery'), '1.0.0', true);
  wp_enqueue_script( 'bootstrap.min', get_template_directory_uri() . '/assets/js/bootstrap.min.js', '3.3.6', true);
  if ( is_page( array( 'reviews', 'customers' ) ) ) {
	wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', array( 'jquery'), '1.0.0', true);
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array( 'jquery'), '1.0.0', true);}
  if ( is_page( array( 'support', 'help', 'Results', 'st-search-result') ) || is_singular( array( 'st_article', 'st_video') ) || is_archive( array( 'st_article', 'st_video') )) {
	wp_enqueue_script( 'bootstrap-select', get_template_directory_uri() . '/assets/js/bootstrap-select.min.js', array( 'jquery'), '1.0.0', true);
	wp_enqueue_script( 'supportjs', get_template_directory_uri() . '/assets/js/support.min.js', array( 'jquery'), '1.0.0', true);
	wp_localize_script( 'supportjs', 'AjaxUtil', array( 'url' => admin_url( 'admin-ajax.php' ), 'nonce' => wp_create_nonce( 'myajax-post-comment-nonce' ) ) );
  }
  
  
}


add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );


add_action( 'comment_form_before', 'touchbistro_enqueue_comment_reply_script' );
function touchbistro_enqueue_comment_reply_script()
{
	if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'touchbistro_title' );
function touchbistro_title( $title ) {
	if ( $title == '' ) {
		return '&rarr;';
	} else {
		return $title;
	}
}
add_filter( 'wp_title', 'touchbistro_filter_wp_title' );
function touchbistro_filter_wp_title( $title )
{
	return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'touchbistro_widgets_init' );
function touchbistro_widgets_init()
{
	register_sidebar( array (
		'name' => __( 'Sidebar Widget Area', 'touchbistro' ),
		'id' => 'primary-widget-area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</li>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );
}



/* =======================================================================================*/
function BreadCrumbs($type, $id, $taxonomy) {

    echo '<div class="breadcrumbs" itemprop="breadcrumb"><div class="container"><div class="row"><ol class="breadcrumb">';
    echo '<li><a href="' . home_url() . '/help/">Support & Training</a></li>';
     if ($type == 'term'){
         $term = get_term( $id, $taxonomy);
         echo '<li class="active">' . $term->name . '</li>';
     }
     else if ($type == 'subTerm'){
         $term = get_term( $id, $taxonomy);
         $actual = $term->name;
         $term = get_term( $term->parent, $term->taxonomy);
         $termLink = get_term_link( $term, $taxonomy );
		
		
         echo '<li><a href="'. $termLink .'">' . $term->name . '</a></li>';
         echo '<li class="active">' . $actual . '</li>';
     }
     else if ($type == 'single'){
         $post = get_post($id);
         $actual = $post->post_title;
         $terms = wp_get_post_terms( $id, $taxonomy);
         $term = $terms[0];
		
         foreach ($terms as $sterm) {
             if($term->parent < $sterm->parent){
                 $term = $sterm;
             }
         }
		
         $parent = $term->name;
         $parentLink = get_term_link( $term, $taxonomy );;
         $term = get_term( $term->parent, $term->taxonomy);
         $grandParent = $term->name;
        $grandParentLink = get_term_link( $term->term_id, $term->taxonomy );
		
         if(($grandParent != '') && ($parent != '')){
             echo '<li><a href="'. $grandParentLink .'">' . $grandParent . '</a></li>';
             echo '<li><a href="'. $parentLink .'">' . $parent . '</a></li>';
         }
		
         echo '<li class="active">' . $actual . '</li>';
     }

    echo '</ol></div></div></div>';
}

/*=============================================== Video Embeded ============================================*/
function get_video_code_embed($code, $typeReturn, $width = NULL, $height = NULL, $popoverWidth = NULL, $popoverHeight = NULL, $embedType = NULL ){//More Info: http://wistia.com/doc/oembed
    $url = 'http://fast.wistia.com/oembed?url=http%3A%2F%2Fhome.wistia.com%2Fmedias%2F' . $code. '?autoPlay=false';                               //  typeReturn:  html, type, provider_name, title, thumbnail_url, duration

    if($width != NULL && $height != NULL)
    {
        $url = $url . '&height='. $height . '&width=' . $width;
    }

    if($popoverWidth != NULL && $popoverHeight != NULL)
    {
        $url = $url . '&embedType=popover&popoverHeight='. $popoverHeight .'&popoverWidth=' . $popoverWidth;
    }

    ob_start();
    $json = file_get_contents($url);
    $resize_warning = ob_get_clean();
    if(empty($resize_warning)) {
        $json=str_replace('https://embed-ssl.wistia.com', 'http://embed.wistia.com', $json);
        $data = json_decode($json);
        return $data->{$typeReturn};
    }
    else {
        return '<img src="/wp-content/themes/wp-template/assets/img/error_video.png">';
    }
}



function touchbistro_custom_pings( $comment )
{
	$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
	<?php
}
add_filter( 'get_comments_number', 'touchbistro_comments_number' );
function touchbistro_comments_number( $count )
{
	if ( !is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}

// load custom program
if (file_exists(dirname(__FILE__) . '/lib/TbDataHelper.php')) {
	require_once dirname(__FILE__) . '/lib/TbDataHelper.php';
}
if (file_exists(dirname(__FILE__) . '/lib/TbHelper.php')) {
	require_once dirname(__FILE__) . '/lib/TbHelper.php';
}
if (file_exists(dirname(__FILE__) . '/lib/TbHtmlHelper.php')) {
	require_once dirname(__FILE__) . '/lib/TbHtmlHelper.php';
}
if (file_exists(dirname(__FILE__) . '/lib/TbEventLogic.php')) {
    require_once dirname(__FILE__) . '/lib/TbEventLogic.php';
}
if (file_exists(dirname(__FILE__) . '/lib/search.php')) {
    require_once dirname(__FILE__) . '/lib/search.php';
}

add_action('wp_ajax_ajaxLoadMoreEventContents', array('TbEventLogic', 'ajaxLoadMoreEventContents'));
add_action('wp_ajax_nopriv_ajaxLoadMoreEventContents', array('TbEventLogic', 'ajaxLoadMoreEventContents'));

add_action('wp_ajax_ajaxLoadMorePressReleases', array('TbDataHelper', 'ajaxLoadMorePressReleases'));
add_action('wp_ajax_nopriv_ajaxLoadMorePressReleases', array('TbDataHelper', 'ajaxLoadMorePressReleases'));

add_action('wp_ajax_ajaxLoadMoreMediaCavarage', array('TbDataHelper', 'ajaxLoadMoreMediaCavarage'));
add_action('wp_ajax_nopriv_ajaxLoadMoreMediaCavarage', array('TbDataHelper', 'ajaxLoadMoreMediaCavarage'));

add_action('wp_ajax_ajaxLoadMoreCustomers', array('TbDataHelper', 'ajaxLoadMoreCustomers'));
add_action('wp_ajax_nopriv_ajaxLoadMoreCustomers', array('TbDataHelper', 'ajaxLoadMoreCustomers'));


add_action('wp_ajax_ajaxLoadMoreReviews', array('TbDataHelper', 'ajaxLoadMoreReviews'));
add_action('wp_ajax_nopriv_ajaxLoadMoreReviews', array('TbDataHelper', 'ajaxLoadMoreReviews'));


add_action('wp_ajax_ajaxLoadFeature', array('TbDataHelper', 'ajaxLoadFeature'));
add_action('wp_ajax_nopriv_ajaxLoadFeature', array('TbDataHelper', 'ajaxLoadFeature'));


function convertToClassName($string) {
        $string = str_replace(' ', '-', mb_strtolower($string));
        $escape_strings = array(
            '!', '"', '#', '$', '%', '&', '\\', '\'', '(', ')',
            '*', '+', ',', '.', ':', ';', '<', '=', '>', '?',
            '@', '[', ']', '^', '`', '{', '|', '}', '~', '/'
        );
        $string = str_replace($escape_strings, '', $string);
        return $string;
}

function check_user_agent ( $type = NULL ) {
        $user_agent = strtolower ( $_SERVER['HTTP_USER_AGENT'] );
        if ( $type == 'bot' ) {
                // matches popular bots
                if ( preg_match ( "/googlebot|adsbot|yahooseeker|yahoobot|msnbot|watchmouse|pingdom\.com|feedfetcher-google/", $user_agent ) ) {
                        return true;
                        // watchmouse|pingdom\.com are "uptime services"
                }
        } else if ( $type == 'browser' ) {
                // matches core browser types
                if ( preg_match ( "/mozilla\/|opera\//", $user_agent ) ) {
                        return true;
                }
        } else if ( $type == 'mobile' ) {
                // matches popular mobile devices that have small screens and/or touch inputs
                // mobile devices have regional trends; some of these will have varying popularity in Europe, Asia, and America
                // detailed demographics are unknown, and South America, the Pacific Islands, and Africa trends might not be represented, here
                if ( preg_match ( "/phone|iphone|itouch|ipod|symbian|android|htc_|htc-|palmos|blackberry|opera mini|iemobile|windows ce|nokia|fennec|hiptop|kindle|mot |mot-|webos\/|samsung|sonyericsson|^sie-|nintendo/", $user_agent ) ) {
                        // these are the most common
                        return true;
                } else if ( preg_match ( "/mobile|pda;|avantgo|eudoraweb|minimo|netfront|brew|teleca|lg;|lge |wap;| wap /", $user_agent ) ) {
                        // these are less common, and might not be worth checking
                        return true;
                }
        }
        return false;
}

function wpdocs_excerpt_more( $more ) {
    return sprintf( '... <a class="read-more" href="%1$s">%2$s</a>',
        get_permalink( get_the_ID() ),
        __( 'Read More &gt;', 'textdomain' )
    );
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );