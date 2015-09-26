<?php
add_theme_support( 'post-thumbnails' );

/* Adding Menu */
add_theme_support('nav-menus');
register_nav_menu('sidebar', 'Sidebar');
register_nav_menu('headermenu', 'Header Menu');

/* Breadcrums Function */
function breadcrums() {
    if (!is_home()) {
        echo '<li><i class="fa fa-dashboard"></i> ';
        bloginfo('name');
        echo '</li><li  class="active">';
        if (is_category()) {
            echo '<a href="#">'.the_category('title_li=').'</a>';
        }
        elseif (is_single()) {
            echo '<a href="#">'.get_the_title() .'</a>' ;
        }

        elseif (is_page()) {
            echo  '<a href="#">'.get_the_title() .'</a>';
        }
        echo "</li>";
    }
}

/* Making Submenu */
class Sidebar_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"treeview-menu\">\n";
    }
    function start_el( &$output, $item, $depth, $args ) {
        global $wp_query;
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

        // depth dependent classes
        $depth_classes = array(
            ( $depth == 0 ? 'dropdown' : 'sub-menu-item' ),
            ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
            ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
            'menu-item-depth-' . $depth
        );
        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

        // passed classes
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

        // build html
        $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

        // link attributes
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

        $item_output = sprintf( '%1$s<a%2$s><i class="fa fa-chevron-right"></i><span>%3$s%4$s%5$s</span></a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters( 'the_title', $item->title, $item->ID ),
            $args->link_after,
            $args->after
        );

        // build html
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}
class Header_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
    }
}

//Removind ul elements
function wp_nav_menu_no_ul()
{
    $options = array(
        'echo' => false,
        'container' => false,
        'theme_location' => 'headermenu',
        'walker' => new Header_Nav_Menu()
    );

    $menu = wp_nav_menu($options);
    echo preg_replace(array(
        '#^<ul[^>]*>#',
        '#</ul>$#'
    ), '', $menu);

}

//Register Sidebars
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name' => 'Right Bar',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="control-sidebar-heading">',
        'after_title' => '</h3>',
    ));