<?php

namespace xpert\Core\admin;

class Admin_Menu
{
    private static $instance = null;

    public function __construct()
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

    }

//start adding methodes here


}