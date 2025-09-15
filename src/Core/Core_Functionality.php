<?php

namespace xpert\Core;

use xpert\Core\admin\Admin_Menu;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Core_Functionality
{
    private static $instance = null;

    private function __construct()
    {
        $this->init_Core();
    }

    public static function get_instance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function init_Core()
    {
        Admin_Menu::get_instance();
    }


}
