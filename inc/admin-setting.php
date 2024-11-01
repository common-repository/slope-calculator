<?php

if (!function_exists('slop_calculator_settings_page_html')) {
    function slop_calculator_settings_page_html()
    {
?>
        <div class="wrap title_back">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>

            <form action="options.php" method="post">
                <?php
                settings_fields('slope-calculator');
                do_settings_sections('slope-calculator');
                submit_button('Save Changes');
                ?>
            </form>
        </div>
    <?php
    }
}
/**
 * Add options page
 */
if (!function_exists('slop_options_page')) {
    function slop_options_page()
    {
        // This page will be under "Settings"
        add_menu_page(
            'Slope Calculator Settings',
            'Slope Calculator',
            'manage_options',
            'slope-calculator',
            'slop_calculator_settings_page_html',
            'dashicons-calculator',
            20
        );
    }
    add_action('admin_menu', 'slop_options_page');
}

if (!function_exists('slop_settings_init')) {
    function slop_settings_init()
    {

        register_setting(
            'slope-calculator',
            'slop_color_option'
        );

        add_settings_section(
            'section_color_id',
            'Change Color',
            'slop_color_section',
            'slope-calculator'
        );

        add_settings_field(
            'input_color_id',
            'Select color',
            'slop_color_field',
            'slope-calculator',
            'section_color_id'
        );

        add_settings_field(
            'info_short_code',
            'Short code',
            'slop_info_shortcode',
            'slope-calculator',
            'section_color_id'
        );
    }
    add_action('admin_init', 'slop_settings_init');
}


if (!function_exists('slop_color_section')) {
    function slop_color_section()
    {
        echo "<p>Change calculator's main heading and button background color</p>";
    }
}

if (!function_exists('slop_color_field')) {
    function slop_color_field()
    {
        $slop_setting = get_option('slop_color_option');
        // output the field
    ?>
        <input type="color" name="slop_color_option" value="<?php echo isset($slop_setting) ? esc_attr($slop_setting) : ''; ?>">
    <?php
    }
}

if (!function_exists('slop_info_shortcode')) {
    function slop_info_shortcode()
    {
    ?>
        <span>[slope-calculator]</span>
<?php
    }
}
