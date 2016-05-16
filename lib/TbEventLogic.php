<?php

/**
 * Created by IntelliJ IDEA.
 * User: kazuhiro
 * Date: 12/18/15
 * Time: 3:49 PM
 */
require_once('TbHelper.php');
require_once('TbDataHelper.php');
class TbEventLogic
{
    const EVENT_POSTS_PER_PAGE = 3;

    /**
     * @param array $options
     * @return mixed
     */
    public static function getEventData($options = array(), $template_name = null) {
        $template_name = !empty($template_name) ? $template_name : TbHelper::getTemplateFileName();
        if ($template_name === 'events-past') {
            $data = self::getPastEventData($options);
        } else {
            $data = self::getEventDataByWpQuery($options);
        }
        return $data;
    }

    /**
     * @param array $options
     * @return mixed
     */
    public static function getCurrentEventData($options = array())
    {
        return self::getEventDataByWpQuery($options);
    }

    /**
     * @param array $options
     * @return mixed
     */
    public static function getPastEventData($options = array())
    {
        $DateTime = new DateTime();
        $current_date = $DateTime->format('Ymd');
        $default = array(
            'order' => 'DESC',
            'meta_query' => array(
                array(
                    'key' => 'start_date',
                    'value' => $current_date,
                    'type' => 'DATE',
                    'compare' => '<',
                ),
            ),
        );
        $options = array_merge($default, $options);
        return self::getEventDataByWpQuery($options);
    }

    /**
     * @param array $options
     * @return mixed
     */
    public static function getEventDataByWpQuery($options = array())
    {
        $DateTime = new DateTime();
        $current_date = $DateTime->format('Ymd');
        $default = array(
            'posts_per_page' => self::EVENT_POSTS_PER_PAGE,
            'post_type' => 'events',
            'order' => 'ASC',
            'orderby' => 'meta_value',
            'meta_key' => 'start_date',
            'meta_query' => array(
                array(
                    'key' => 'start_date',
                    'value' => $current_date,
                    'type' => 'DATE',
                    'compare' => '>=',
                ),
            ),
        );
        $options = array_merge($default, $options);
        $query = TbDataHelper::get_post_data($options, $get_query_data = true);
        $data['event_data'] = $query->posts;
        $data['total_post_num'] = $query->found_posts;
        return $data;
    }

    public function ajaxLoadMoreEventContents()
    {
        $paged = $_POST['paged'];
        $template_name = $_POST['template_name'];
        $options = array('paged' => $paged);
        $data = self::getEventData($options, $template_name);
        global $event_data;
        $event_data = $data['event_data'];
        get_template_part('event-index', 'part');
        exit;
    }

}