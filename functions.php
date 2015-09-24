<?php
/*Öne Çıkan Görsel*/
add_theme_support( 'post-thumbnails' );
/*Öne Çıkan Görsel*/

/* Widget Uyumu bas */
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<div class="sb_box">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
/* Widget Uyumu son */

/*Menü Ekleme */
add_theme_support('nav-menus');
register_nav_menu('anamenu', 'Ana Menü alanı');
/*Menü Ekleme*/