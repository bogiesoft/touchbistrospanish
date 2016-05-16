<?php

/**
 * Created by IntelliJ IDEA.
 * User: kazuhiro
 * Date: 12/10/15
 * Time: 2:42 AM
 */
class TbDataHelper
{
    const PRESS_RELEASES_POSTS_PER_PAGE = 4;
    const CUSTOMERS_POSTS_PER_PAGE = 99;
    const REVIEWS_POSTS_PER_PAGE = 16;

    /**
     * @param array $options
     * @return array
     */
    public static function get_post_data($options = array(), $get_query_data = false)
    {
        $default = self::get_post_search_args();
        $options = array_merge($default, $options);
		//echo '<div class="getpostdata">get_post_data: ';
		//print_r($options);
		//echo '</div>';


        $query = new WP_Query($options);
        if ($get_query_data) {
            return $query;
        }
        //echo var_dump($query);
        $philo_post_data = $query->posts;
        return $philo_post_data;
    }

    /**
     * @return array
     */
    private static function get_post_search_args()
    {
        $args = array();
        if (is_category()) {
            // for category page
            $category_id = get_query_var('cat');
            $args = array_merge($args, array('cat' => $category_id));
        } elseif (is_author()) {
            // for author page
            $author_id = get_the_author_ID();
            $args = array_merge($args, array('author' => $author_id));
        } else if (is_tag()) {
            // for tag page
            $tag_id = get_query_var('tag_id');
            $args = array_merge($args, array('tag_id' => $tag_id));
        }
        return $args;
    }

//    public static function getPOSSection10Data() {
    public static function getPOSSectionFlexibleData($feild_name)
    {
        $section_contents = get_field($feild_name);
        $section_data = array();
        foreach ($section_contents as $content) {
            $section_data[$content['acf_fc_layout']] = $content;
        }
        return $section_data;
    }

    /**
     * @param array $options
     * @return mixed
     */
    public static function getPostListPageData($options = array())
    {
        $default = array(
            'posts_per_page' => self::PRESS_RELEASES_POSTS_PER_PAGE,
            'post_type' => 'press-releases',
            'order' => 'DESC',
            'orderby' => 'date',
        );
        $options = array_merge($default, $options);
        $query = self::get_post_data($options, $get_query_data = true);
        $data['posts'] = $query->posts;
        $data['total_post_num'] = $query->found_posts;
        return $data;
    }


    public function ajaxLoadMoreReviews()
    {
        $cat = $_POST['category'];
        $paged = $_POST['paged'];
        $options = array(
            'post_type' => 'reviews',
            'posts_per_page' => TbDataHelper::REVIEWS_POSTS_PER_PAGE,
            'order' => 'ASC',
            'review_category' => $cat,
            'meta_key'			=> 'position',
            'orderby'			=> 'meta_value_num'
        );
        self::ajaxLoadMorePosts($template_name = 'reviews-page', $options);
    }

    public function ajaxLoadFeature()
    {

        global $custom_posts;
        $custom_posts = $_POST['id'];

        get_template_part('features', 'part');
        exit;

    }

    public function ajaxLoadMoreCustomers()
    {

        //$cat = $_POST['category'];
		$paged = $_POST['paged'];
        //if ($cat != '*'){
        //  $options = array(
        //      'post_type' => 'customers',
        //      'posts_per_page' => TbDataHelper::CUSTOMERS_POSTS_PER_PAGE,
        //     'order' => 'ASC',
        //      'customer_category' => $cat,
         //     'meta_key'			=> 'position',
         //     'orderby'			=> 'meta_value_num'
        //  );
        //} else {
          $options = array(
              'post_type' => 'customers',
              'posts_per_page' => TbDataHelper::CUSTOMERS_POSTS_PER_PAGE,
              'order' => 'ASC',
              'meta_key'			=> 'position',
              'orderby'			=> 'meta_value_num'
          );
        //}

        self::ajaxLoadMorePosts($template_name = 'customers-page', $options);
    }

    /**
     * Function For Clicked Load More Button at Press Releases Page
     *
     */
    public function ajaxLoadMorePressReleases()
    {
        self::ajaxLoadMorePosts($template_name = 'press-releases');
		//$template_name = 'press-releases';
        //$options = array('post_type' => 'press-release');
        //self::ajaxLoadMorePosts($template_name, $options);
    }

    public function ajaxLoadMoreMediaCavarage()
    {
        $template_name = 'media-coverage';
        $options = array('post_type' => 'media_coverage');
        self::ajaxLoadMorePosts($template_name, $options);
    }

    public function ajaxLoadMorePosts($template_name, $options = array())
    {
        $paged = $_POST['paged'];
        $default = array('paged' => $paged);
        $options = array_merge($default, $options);
        $post_data = self::getPostListPageData($options);
        global $custom_posts;
        $custom_posts = $post_data['posts'];
		//echo '<div class="ajaxLoadMorePosts">get_post_data: ';
		//print_r($options);
		//echo '</div>';

        get_template_part($template_name, 'part');
        exit;
    }

}
