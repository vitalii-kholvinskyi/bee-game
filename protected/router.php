<?php

namespace App;

class Router
{
    /**
     * Finding related to request controller and action.
     *
     * @access public
     * @static
     * @return array
     */
    public static function findRelatedControllerAndAction()
    {
        $controller = 'Home';
        $action     = 'index';

        if(isset( $_GET['c'] ) && file_exists(__DIR__.'/controllers/'.ucfirst($_GET['c']).'Controller.php')){
            $controller = $_GET['c'];
        }

        if(isset( $_GET['a'] )){
            $action = $_GET['a'];
        }

        return [$controller, $action];
    }
}
