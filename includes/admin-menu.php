<?php

class Post_View_Dashboard_Admin_Menu {

    public function __construct() {
        add_action('admin_menu', array($this, 'add_admin_menu'));
    }

    public function add_admin_menu() {
        add_menu_page(
            'Post View Dashboard', 
            'Post View Dashboard', 
            'manage_options', 
            'post-view-dashboard', 
            [ $this, 'admin_menu_callback' ],
        );
    }

    public function admin_menu_callback() {

        $args = [];

        if( isset ($_GET['post_view_cat']) ){
            $args[ 'category' ] = $_GET[ 'post_view_cat' ];
        } else {
            $args[ 'category' ] = 0;
        }

        $posts = get_posts($args);
        $categories = get_categories();
        $selected_category = isset( $_GET['post_view_cat'] ) ? $_GET['post_view_cat'] : '-1';

        include_once __DIR__ . '/templates/admin-menu-view.php';
    }

}