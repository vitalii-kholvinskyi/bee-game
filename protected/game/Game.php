<?php

namespace App\Game;

use \App\Game\Bee\Queen;
use \App\Game\Bee\Worker;
use \App\Game\Bee\Drone;

class Game
{
    /**
     * Bees.
     *
     * @access public
     * @static
     * @var    array
     */
    public static $bees = [];

    /**
     * Fill bees list.
     *
     * @access public
     * @static
     * @return void
     */
    protected static function fill(array $bees = [])
    {
        foreach($bees as $bee){
            static::$bees[$bee::NAME] = [];

            for($i=0; $i<$bee::LIMIT; $i++){
                array_push(static::$bees[$bee::NAME], new $bee($i));
            }
        }
    }

    /**
     * Check is game in progress.
     *
     * @access public
     * @static
     * @return boolean
     */
    public static function inProgress()
    {
        return isset($_SESSION['in-progress']);
    }

    /**
     * Initialize the game.
     *
     * @access public
     * @static
     * @return void
     */
    public static function initialize()
    {
        static::fill([
            'queen'  => Queen::class,
            'worker' => Worker::class,
            'drone'  => Drone::class
        ]);
    }

    /**
     * Returns formatted result.
     *
     * @access public
     * @return \stdClass
     */
    public static function result()
    {
        return (object)$_SESSION;
    }

    /**
     * Hit randorm bee.
     *
     * @access public
     * @static
     * @return \App\Game\Bee\Bee
     */
    public static function hitRandomBee(array $keys = [])
    {
        if(empty( $keys )){
            $keys = array_keys(static::$bees);
        }

        $rand = rand(0, count($keys) - 1);
        $type = $keys[$rand];
        $isAl = false;
        $bees = [];

        for($i=0; $i<count(static::$bees[$type]); $i++){
            $bee = static::$bees[$type][$i];

            if($bee->isAlive()){
                $isAl = true;
                array_push($bees, $i);
            }
        }

        if(!$isAl){
            array_splice($keys, $rand, 1);

            if(empty($keys)){
                return static::endGame();
            }

            return static::hitRandomBee($keys);
        }

        $randomBee = static::$bees[$type][$bees[rand(0, count($bees) - 1)]];
        $randomBee->hit();

        if(!$randomBee->isAlive() && $randomBee::IMPORTANT ){
            static::endGame();
        }

        return $randomBee;
    }

    /**
     * Is queen dead.
     *
     * @access public
     * @return bool
     */
    public static function queenDead()
    {
        if(isset($_SESSION['bee']) && isset($_SESSION['bee']['queen_o']) && (int)$_SESSION['bee']['queen_0'] == 0){
            return true;
        }

        return false;
    }

    /**
     * Ending bee game.
     *
     * @access public
     * @static
     * @param  bool  $flag
     * @return void
     */
    public static function endGame($flag = false)
    {
        session_unset();

        if(!$flag){
            $_SESSION['game-over'] = true;
        }
    }
}

include(__DIR__.'/bee/Bee.php');
include(__DIR__.'/bee/Queen.php');
include(__DIR__.'/bee/Worker.php');
include(__DIR__.'/bee/Drone.php');
