<?php
  /*
 * Plugin Name: Post View Dashboard
 * Plugin URI : https: //example.com/plugins/the-basics/
 * Description: Get custom features with this plugin.
 * Version    : 1.0.0
 * Author     : Hamim
 * Author URI : https: //author.example.com/
 * Text Domain: pvdcore
 * Domain Path: /languages
 */


class Post_View_Dashboard
{
  private static $instance;

  public static function get_instance() {
    if ( ! self::$instance ) {
        self::$instance = new self();
    }
    return self::$instance;
  }

  private function __construct() {
    $this->require_classes();
  }

  private function require_classes() {
  
    require_once __DIR__ . '/includes/admin-menu.php';

    new Post_View_Dashboard_Admin_Menu();

  }
}

Post_View_Dashboard::get_instance();
