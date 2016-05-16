<?php

/**
 * Created by IntelliJ IDEA.
 * User: kazuhiro
 * Date: 12/10/15
 * Time: 2:42 AM
 */
require_once('TbHelper.php');
require_once('TbDataHelper.php');

class TbHtmlHelper
{
    /**
     * @param $section_name
     * @param $class_type
     * @return array
     */
    public static function getPosSectionClass($section_name, $class_type)
    {
        $classes = array();

        switch ($section_name) {
            case 'lead_section':
                $classes = self::getLeadSectionClass();
                break;
            case 'section_3':
                $classes = self::getPosSection3Class();
                break;
            case 'section_7':
                $classes = self::getPosSection7Class();
                break;
            case 'section_8':
                $classes = self::getPosSection8Class();
                break;
            default:
                break;
        }
        $template_file_name = TbHelper::getTemplateFileName();
        return !empty($classes[$template_file_name][$class_type])
            ? $classes[$template_file_name][$class_type]
            : '';
    }

    /**
     * @return array
     */
    public static function getLeadSectionClass()
    {
        return array(
            'pos-solutions-restaurant' => array(
                'section' => 'pos-restaurants-lead',
                'video' => 'video-cta',
                'black_opacity' => 'black-opacity-cover',
            ),
            'pos-solutions-quick-service' => array(
                'section' => 'pos-quick-service-lead',
                'video' => 'video-cta-centred',
                'black_opacity' => 'black-opacity-cover',
            ),
            'pos-brewery' => array(
                'section' => 'pos-brewery-lead',
                'video' => 'video-cta-centred',
                'black_opacity' => 'black-opacity-cover',
            ),
            'pos-solutions-bars-and-clubs' => array(
                'section' => 'pos-bars-clubs-lead ',
                'black_opacity' => 'black-opacity-cover',
            ),
            'pos-foodtruck' => array(
                'section' => 'pos-foodtruck-lead',
                'black_opacity' => 'black-opacity-cover',
            ),
            'pos-solutions-chains' => array(
                'section' => 'pos-chains-lead',
                'black_opacity' => 'black-opacity-cover',
            ),
        );
    }

    /**
     * @return array
     */
    public static function getPosSection3Class()
    {
        return array(
            'pos-solutions-restaurant' => array(
                'section' => 'pos-restaurant-key-features',
                'text_pod' => 'right-text-pod',
                'black_opacity' => 'black-opacity-cover',
            ),
            'pos-solutions-quick-service' => array(
                'section' => 'pos-quick-service-hero',
                'text_pod' => 'left-text-pod',
                'black_opacity' => 'black-opacity-cover',
            ),
            'pos-brewery' => array(
                'section' => 'pos-brewery-key-features full-hero-section black-opacity',
                'text_pod' => 'right-text-pod',
                'black_opacity' => 'black-opacity-cover',
            ),
            'pos-solutions-bars-and-clubs' => array(
                'section' => 'pos-bars-clubs-key-features full-hero-section',
                'text_pod' => 'text-pod',
                'black_opacity' => 'black-opacity-cover',
            ),
            'pos-foodtruck' => array(
                'section' => 'pos-foodtruck-key-features full-hero-section',
                'text_pod' => 'right-text-pod',
                'black_opacity' => 'black-opacity-cover',
            ),
            'pos-solutions-chains' => array(
                'section' => 'pos-chains-key-features',
                'text_pod' => 'right-text-pod',
                'chain_image' => 'chain_image',
            ),
        );
    }

    /**
     * @return array
     */
    public static function getPosSection8Class()
    {
        return array(
            'pos-solutions-restaurant' => array(
                'section' => 'pos-on-demand-reports full-hero-section',
            ),
            'pos-solutions-quick-service' => array(
                'section' => 'pos-slide-hover-hero full-hero-section',
            ),
            'pos-brewery' => array(
                'section' => 'pos-slide-hover-hero full-hero-section',
            ),
            'pos-solutions-bars-and-clubs' => array(
                'section' => 'pos-slide-hover-hero full-hero-section',
            ),
            'pos-foodtruck' => array(
                'section' => 'pos-food-truck-on-demand-insights full-hero-section',
            ),
            'pos-solutions-chains' => array(
                'section' => 'pos-chains-on-demand-insights full-hero-section',
            ),
        );
    }

    /**
     * @return array
     */
    public static function getPosSection7Class()
    {
        return array(
            'pos-solutions-chains' => array(
                'section' => 'pos-chains-slide-hover',
            ),
        );
    }

    /**
     * @return array
     */
    public static function getPosSubMenuItems()
    {
        $sub_menu_items = array();
        $template_file_name = TbHelper::getTemplateFileName();
        switch ($template_file_name) {
            case 'pos-solutions-restaurant':
                $sub_menu_items[3] = get_field('section_3_name');
                $sub_menu_items[4] = get_field('section_4_name');
				$sub_menu_items[5] = get_field('section_5_name');
                $sub_menu_items[6] = get_field('section_6_name');
                $sub_menu_items[7] = get_field('section_7_name');
                $sub_menu_items[8] = get_field('section_8_name');
                break;
            case 'pos-solutions-quick-service':
                $sub_menu_items[3] = get_field('section_3_name');
                $sub_menu_items[9] = get_field('section_9_name');
                $sub_menu_items[5] = get_field('section_5_name');
                $sub_menu_items[7] = get_field('section_7_name');
                $sub_menu_items[8] = get_field('section_8_name');
                break;
            case 'pos-brewery':
                $sub_menu_items[3] = get_field('section_3_name');
                $section_10_data = TbDataHelper::getPOSSectionFlexibleData('section_10_contents');
                $sub_menu_items['10_group1'] = $section_10_data['group1']['name'];
                //$sub_menu_items['10_group2'] = $section_10_data['group2']['name'];
				$sub_menu_items[4] = get_field('animated_box_title');
                $sub_menu_items['10_group3'] = $section_10_data['group3']['name'];
                $sub_menu_items['10_group4'] = $section_10_data['group4']['name'];
                $sub_menu_items[7] = get_field('section_7_name');
                $sub_menu_items[8] = get_field('section_8_name');
                break;
            case 'pos-solutions-bars-and-clubs':
                $sub_menu_items[3] = get_field('section_3_name');
                $section_10_data = TbDataHelper::getPOSSectionFlexibleData('section_10_contents');
                $sub_menu_items['fast-bar-mode'] =  get_field('animated_box_title');
                $sub_menu_items['10_group5'] = $section_10_data['group5']['name'];
				$sub_menu_items['10_group1'] = $section_10_data['group1']['name'];
                $section_12_data = get_field('section_12_one_image_contents');
                $sub_menu_items['12_group1'] = $section_12_data[0]['name'];
                $sub_menu_items['12_group2'] = $section_12_data[1]['name'];
                $sub_menu_items[7] = get_field('section_7_name');
                $sub_menu_items[8] = get_field('section_8_name');
                break;
            case 'pos-foodtruck':
                $sub_menu_items[3] = get_field('section_3_name');
                $section_13_data = TbDataHelper::getPOSSectionFlexibleData('section_13_contents');
                $sub_menu_items['13_group4'] = $section_13_data['group4']['name'];
                $sub_menu_items['13_group5'] = $section_13_data['group5']['name'];
                $sub_menu_items['13_group3'] = $section_13_data['group3']['name'];
                $sub_menu_items[7] = get_field('section_7_name');
                $sub_menu_items[8] = get_field('section_8_name');
                break;
            case 'pos-solutions-chains':
                // $sub_menu_items[3] = get_field('section_3_name');
                $section_10_data = TbDataHelper::getPOSSectionFlexibleData('section_10_contents');

                $sub_menu_items['10_group6'] = $section_10_data['group6']['name'];

                $section_14_data = TbDataHelper::getPOSSectionFlexibleData('section_14_contents');
                $sub_menu_items['13_group1'] = $section_14_data['group1']['name'];
                $sub_menu_items['13_group2'] = $section_14_data['group2']['name'];
                $sub_menu_items['13_group3'] = $section_14_data['group3']['name'];
                $sub_menu_items[7] = get_field('section_7_name');
                $sub_menu_items[8] = get_field('section_8_name');
                break;
            default:
                break;
        }
        return $sub_menu_items;
    }

    public static function makeLinkImageTag($image_url, $link_url = null, $options = array())
    {
        $default = array(
            'image' => array(
                'class' => '',
            ),
        );
        $options = array_merge($default, $options);
        $image_class = $options['image']['class'];
        $image_tag = '';
        if (!empty($image_url)) {
            $image_tag = <<<EOL
<img src="{$image_url}" alt="" class="{$image_class}">
EOL;
            if (!empty($link_url)) {
                $image_tag = sprintf('<a href="' . $link_url . ' " target="_blank">' . "%s" . '</a>', $image_tag);
            }
        }
        return $image_tag;
    }

    public static function loadSlickSlider()
    {
        $html = '
<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/assets/js/slick-1.5.9/slick/slick.css"/>
<script type="text/javascript" src="' . get_template_directory_uri() . '/assets/js/slick-1.5.9/slick/slick.min.js"></script>
        ';
        echo $html;
    }
}
