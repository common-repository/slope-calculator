<?php
/*
* Plugin Name:  Slope Calculator
* Description:  A WordPress plugin to calculate slope.
* Author:       Enzipe
* Author URI:   https://www.enzipe.com/
* Version:      1.0.0
* License:      GPL v2 or later
* License URI:  https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain:  slope-calculator
*/
if (!defined('ABSPATH')) {
    echo ('Activate plugin first');
    exit;
}

class SLOP_Calculator
{

    public function __construct()
    {

        add_action('wp_enqueue_scripts', array($this, 'slop_load_assets'));

        add_action('wp_enqueue_style', array($this, 'slop_load_assets'));

        add_shortcode('slope-calculator', array($this, 'slop_load_shortcode'));
    }

    public function slop_load_assets()
    {

        wp_enqueue_style(
            'slope-calculator',
            plugin_dir_url(__FILE__) . 'lib/css/slope-cal-css.css',
            array(),
            1,
            'all'
        );

        $slop_cal_color = get_option('slop_color_option');
        $slop_custom_cal_css = "
                input.change-clr {
                    background-color: {$slop_cal_color} !important;
                   
                }
                h2.change-clr{
                color: {$slop_cal_color} !important;
                }";

        wp_add_inline_style('slope-calculator', $slop_custom_cal_css);

        wp_enqueue_script(
            'slope-calculator',
            plugin_dir_url(__FILE__) . 'lib/js/slope-cal-js.js',
            array('jquery'),
            //version
            1,
            'all'
        );
    }

    public function slop_load_shortcode()
    {
        require plugin_dir_path(__FILE__) . 'inc/main-form.php';
    }
}

new SLOP_Calculator;
require plugin_dir_path(__FILE__) . 'inc/admin-setting.php';
