<?php

add_action('init', 'of_options');

if (!function_exists('of_options')) {
    function of_options()
    {

// VARIABLES
        $themename = wp_get_theme();
        $themename = $themename['Name'];
        $shortname = "al";

// Populate OptionsFramework option in array for use in theme
        global $of_options;
        $of_options = get_option('of_options');

        $GLOBALS['template_path'] = OF_DIRECTORY;

//Access the WordPress Categories via an Array
        $of_categories = array();
        $of_categories_obj = get_categories('hide_empty=0');
        foreach ($of_categories_obj as $of_cat) {
            $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;
        }

//Access the WordPress Pages via an Array
        $of_pages = array();
        $of_pages_obj = get_pages('sort_column=post_parent,menu_order');
        foreach ($of_pages_obj as $of_page) {
            $of_pages[$of_page->ID] = $of_page->post_name;
        }

// Column Width Options
        $widths = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12");

// Theme Color Options
        $colors = array('black', 'black-light', 'blue', 'blue-light', 'green', 'green-light', 'purple', 'red', 'red-light', 'yellow', 'yellow-light');

// Theme Layout Options
        $layouts = array('layout-boxed', 'layout-top-nav', 'fixed', 'layout-top-nav fixed');

//Stylesheets Reader
        $alt_stylesheet_path = OF_FILEPATH . '/styles/';
        $alt_stylesheets = array();

        if (is_dir($alt_stylesheet_path)) {
            if ($alt_stylesheet_dir = opendir($alt_stylesheet_path)) {
                while (($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false) {
                    if (stristr($alt_stylesheet_file, ".css") !== false) {
                        $alt_stylesheets[] = $alt_stylesheet_file;
                    }
                }
            }
        }

//More Options
        $uploads_arr = wp_upload_dir();
        $all_uploads_path = $uploads_arr['path'];
        $all_uploads = get_option('of_uploads');
        $thumbsekil = array("Solda", "Şerit");
// Set the Options Array
        $options = array();

        $options[] = array(
            "name" => "General Settings",
            "type" => "heading"
        );

        $options[] = array(
            'name' => __('Theme Color', 'options_check'),
            'desc' => __('You can change the theme color.', 'options_check'),
            'id' => 'theme_color',
            'std' => 'blue',
            'type' => 'select',
            'options' => $colors);

        $options[] = array(
            'name' => __('Theme Layout', 'options_check'),
            'desc' => __('You can change the theme layout. Not: If you selet "layout-top-nav", left menu will not appear.', 'options_check'),
            'id' => 'theme_layout',
            'std' => 'fixed',
            'type' => 'select',
            'options' => $layouts);

        $options[] = array(
            'name' => __('Do you want left menu collapsed?', 'options_check'),
            'desc' => __('Do you want left menu collapsed?', 'options_check'),
            'id' => 'left_menu_check',
            'std' => '0',
            'type' => 'checkbox');

        $options[] = array(
            'name' => __('Do you want logo panel?', 'options_check'),
            'desc' => __('Do you want logo panel? If you check, it\'ll appear at top of the side menu.', 'options_check'),
            'id' => 'panel',
            'std' => '0',
            'type' => 'checkbox');

        $options[] = array(
            "name" => "Logo",
            "desc" => "You can upload an image for logo. If you check logo panel true, it'll appear.",
            "id" => "logo",
            'std' => '',
            "type" => "upload");

        $options[] = array(
            'name' => __('Panel Info Text', 'options_check'),
            'desc' => __('A mini text that will appear next to the logo.', 'options_check'),
            'id' => 'info',
            'std' => '',
            'type' => 'text');

        $options[] = array(
            'name' => __('Facebook Url', 'options_check'),
            'desc' => __('You can enter your Facebook profile url.', 'options_check'),
            'id' => 'facebook',
            'std' => '',
            'type' => 'text');

        $options[] = array(
            'name' => __('Twitter Url', 'options_check'),
            'desc' => __('You can enter your Twitter profile url.', 'options_check'),
            'id' => 'twitter',
            'std' => '',
            'type' => 'text');

        $options[] = array(
            'name' => __('Google+ Url', 'options_check'),
            'desc' => __('You can enter your Google+ profile url.', 'options_check'),
            'id' => 'google-plus',
            'std' => '',
            'type' => 'text');

        $options[] = array(
            'name' => __('Pinterest Url', 'options_check'),
            'desc' => __('You can enter your Pinterest profile url.', 'options_check'),
            'id' => 'pinterest',
            'std' => '',
            'type' => 'text');

        $options[] = array(
            'name' => __('Instagram Url', 'options_check'),
            'desc' => __('You can enter your Instagram profile url.', 'options_check'),
            'id' => 'instagram',
            'std' => '',
            'type' => 'text');

        $options[] = array(
            'name' => __('Linkedin Url', 'options_check'),
            'desc' => __('You can enter your Linkedin profile url.', 'options_check'),
            'id' => 'linkedin',
            'std' => '',
            'type' => 'text');

        $options[] = array(
            'name' => __('Do you want Side Bar?', 'options_check'),
            'desc' => __('Do you want Side Bar? If you check, it will not appear at posts.', 'options_check'),
            'id' => 'sidebar_check',
            'std' => '0',
            'type' => 'checkbox');

        $options[] = array(
            "name" => "Home Page Settings",
            "type" => "heading"
        );

        $options[] = array(
            'name' => __('Do you want Carousel Slider?', 'options_check'),
            'desc' => __('Do you want Carousel Slider? If you check, it\'ll appear at home page.', 'options_check'),
            'id' => 'carousel_check',
            'std' => '0',
            'type' => 'checkbox');

        $options[] = array(
            'name' => __('Which Category\'s posts will be displayed at Carousel Slider?', 'options_check'),
            'desc' => __('Select which category\'s posts will be displayed at carousel slider.', 'options_check'),
            'id' => 'carousel_category',
            'std' => '1',
            'type' => 'select',
            'options' => $of_categories);

        $options[] = array(
            'name' => __('How many post will be displayed at Carousel Slider?', 'options_check'),
            'desc' => __('How many post will be displayed at Carousel Slider?', 'options_check'),
            'id' => 'carousel_post_count',
            'std' => '5',
            'type' => 'text');

        $options[] = array(
            'name' => __('Carousel Slider Width', 'options_check'),
            'desc' => __('You can set the Carousel Slider\'s feed. You can enter 1 to 12. 12 is full width.', 'options_check'),
            'id' => 'carousel_width',
            'std' => '12',
            'type' => 'select',
            'options' => $widths);

        $options[] = array(
            'name' => __('Do you want Collapsible Accordion?', 'options_check'),
            'desc' => __('Do you want Collapsible Accordion? If you check, it\'ll appear at home page.', 'options_check'),
            'id' => 'accordion_check',
            'std' => '0',
            'type' => 'checkbox');

        $options[] = array(
            'name' => __('Collapsible Accordion\'s Title', 'options_check'),
            'desc' => __('You can set collapsible accordion\'s title.', 'options_check'),
            'id' => 'accordion_title',
            'std' => '',
            'type' => 'text');

        $options[] = array(
            'name' => __('Which Category\'s posts will be displayed at Collapsible Accordion?', 'options_check'),
            'desc' => __('Select which category\'s posts will be displayed at Collapsible Accordion.', 'options_check'),
            'id' => 'accordion_category',
            'std' => '1',
            'type' => 'select',
            'options' => $of_categories);

        $options[] = array(
            'name' => __('How many post will be displayed at Collapsible Accordion?', 'options_check'),
            'desc' => __('How many post will be displayed at Collapsible Accordion?', 'options_check'),
            'id' => 'accordion_post_count',
            'std' => '5',
            'type' => 'text');

        $options[] = array(
            'name' => __('Collapsible Accordion Width', 'options_check'),
            'desc' => __('You can set the Collapsible Accordion\'s feed. You can enter 1 to 12. 12 is full width.', 'options_check'),
            'id' => 'accordion_width',
            'std' => '12',
            'type' => 'select',
            'options' => $widths);

        $options[] = array(
            'name' => __('Do you want Last Articles?', 'options_check'),
            'desc' => __('Do you want Last Articles? If you check, it\'ll appear at home page.', 'options_check'),
            'id' => 'last_articles_check',
            'std' => '0',
            'type' => 'checkbox');

        $options[] = array(
            'name' => __('Last Articles\'s Title', 'options_check'),
            'desc' => __('You can set last articles\'s title.', 'options_check'),
            'id' => 'last_articles_title',
            'std' => '',
            'type' => 'text');

        $options[] = array(
            'name' => __('Which Category\'s posts will be displayed at Last Articles?', 'options_check'),
            'desc' => __('Select which category\'s posts will be displayed at Last Articles.', 'options_check'),
            'id' => 'last_articles_category',
            'std' => '1',
            'type' => 'select',
            'options' => $of_categories);

        $options[] = array(
            'name' => __('How many post will be displayed at Last Articles?', 'options_check'),
            'desc' => __('How many post will be displayed at Last Articles?', 'options_check'),
            'id' => 'last_articles_post_count',
            'std' => '5',
            'type' => 'text');

        $options[] = array(
            'name' => __('Last Articles Width', 'options_check'),
            'desc' => __('You can set the Last Articles\'s feed. You can enter 1 to 12. 12 is full width.', 'options_check'),
            'id' => 'last_articles_width',
            'std' => '6',
            'type' => 'select',
            'options' => $widths);

        $options[] = array(
            'name' => __('Do you want GitHub Activity Feed?', 'options_check'),
            'desc' => __('Do you want GitHub Activity Feed? If you check, it\'ll appear at home page.', 'options_check'),
            'id' => 'github_check',
            'std' => '0',
            'type' => 'checkbox');

        $options[] = array(
            'name' => __('GitHub Activity Feed Username', 'options_check'),
            'desc' => __('Enter your GitHub username.', 'options_check'),
            'id' => 'github_username',
            'std' => '',
            'type' => 'text');

        $options[] = array(
            'name' => __('GitHub Activity Feed Title', 'options_check'),
            'desc' => __('You can edit GitHub Activity Feed Title here.', 'options_check'),
            'id' => 'github_title',
            'std' => '',
            'type' => 'text');

        $options[] = array(
            'name' => __('GitHub Activity Limit', 'options_check'),
            'desc' => __('You can edit GitHub Activity Limit here. You muust enter a number value', 'options_check'),
            'id' => 'github_limit',
            'std' => '',
            'type' => 'text');

        $options[] = array(
            'name' => __('GitHub Repository?', 'options_check'),
            'desc' => __('If you want to show one of your GitHub repository, you can write here.', 'options_check'),
            'id' => 'github_repository',
            'std' => '',
            'type' => 'text');

        $options[] = array(
            'name' => __('GitHub Activity Feed Width', 'options_check'),
            'desc' => __('You can set the GitHubb Activity Feed\'s feed. You can enter 1 to 12. 12 is full width.', 'options_check'),
            'id' => 'github_width',
            'std' => '12',
            'type' => 'select',
            'options' => $widths);

        $options[] = array(
            "name" => "Footer Settings",
            "type" => "heading");

        $options[] = array(
            'name' => __('Footer Text', 'options_check'),
            'desc' => __('You can set the Footer text.', 'options_check'),
            'id' => 'footer_text',
            'std' => '',
            'type' => 'textarea');

        $options[] = array(
            "name" => "Advertisement Settings",
            "type" => "heading");

        $options[] = array(
            'name' => __('Header Ad', 'options_check'),
            'desc' => __('Header Ad Code.', 'options_check'),
            'id' => 'ad_header',
            'std' => '',
            'type' => 'textarea');

        $options[] = array(
            'name' => __('Header Ad Mobile', 'options_check'),
            'desc' => __('Header Ad Mobile Code. It\'ll appear in mobile.', 'options_check'),
            'id' => 'ad_header_mobile',
            'std' => '',
            'type' => 'textarea');

        $options[] = array(
            'name' => __('Menu Ad', 'options_check'),
            'desc' => __('Menu Ad Code. Width must be maximum 220px.', 'options_check'),
            'id' => 'ad_menu',
            'std' => '',
            'type' => 'textarea');

        $options[] = array(
            'name' => __('Loop Ad', 'options_check'),
            'desc' => __('Loop Ad Code. This will appear at each post group loaded to the timeline.', 'options_check'),
            'id' => 'ad_loop',
            'std' => '',
            'type' => 'textarea');

        $options[] = array(
            'name' => __('Loop Ad Mobile', 'options_check'),
            'desc' => __('Loop Ad Mobile Code. This will appear at each post group loaded to the timeline in mobile.', 'options_check'),
            'id' => 'ad_loop_mobile',
            'std' => '',
            'type' => 'textarea');

        $options[] = array(
            'name' => __('Footer Ad', 'options_check'),
            'desc' => __('Footer Ad Code.', 'options_check'),
            'id' => 'ad_footer',
            'std' => '',
            'type' => 'textarea');

        $options[] = array(
            'name' => __('Footer Ad Mobile', 'options_check'),
            'desc' => __('Footer Ad Mobile Code. It\'ll appear in mobile.', 'options_check'),
            'id' => 'ad_footer_mobile',
            'std' => '',
            'type' => 'textarea');

        update_option('of_template', $options);
        update_option('of_themename', $themename);
        update_option('of_shortname', $shortname);

    }
}
?>