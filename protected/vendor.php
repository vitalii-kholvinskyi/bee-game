<?php

namespace App;

class Vendor
{
    /**
     * Game controllers.
     *
     * @access protected
     * @static
     * @var    array
     */
    protected static $controllers = [];

    /**
     * Return controller.
     *
     * @access public
     * @static
     * @param  string $name
     * @return \App\Controllers\BaseController
     */
    public static function controller($name)
    {
        if(isset( self::$controllers[$name] )){
            return self::$controllers[$name];
        }

        $controllerName = ucfirst($name).'Controller';
        include __DIR__.'/controllers/'.$controllerName.'.php';
        $withNamespace  = '\\App\\Controllers\\'.$controllerName;

        self::$controllers[$name] = new $withNamespace;
        return self::controller($name);
    }

    /**
     * Initialize game.
     *
     * @access public
     * @static
     * @return void
     */
    public static function initialize()
    {
        self::controller('Base');
        list($ctrName, $ctrAction) = Router::findRelatedControllerAndAction();
        self::controller($ctrName)->$ctrAction();
    }
}

require_once './protected/game/Game.php';
require_once './protected/router.php';
