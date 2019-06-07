<?php

namespace App\Game\Bee;

class Bee
{
    /**
     * Store current lifespan.
     *
     * @access public
     * @var    int
     */
    public $currentLifeSpan = 0;

    /**
     * Bee sesion name.
     *
     * @access public
     * @var    string
     */
    public $sessName = '';

    /**
     * Class constructor.
     *
     * @access public
     * @param  int  $index
     * @return void
     */
    public function __construct($index)
    {
        $this->sessName = static::NAME.'_'.$index;

        if(!isset($_SESSION['bee']) || !is_array($_SESSION['bee'])){
            $_SESSION['bee'] = [];
        }

        if(!isset( $_SESSION['bee'][$this->sessName] )){
            $_SESSION['bee'][$this->sessName] = static::LIFESPAN;
        }

        $this->currentLifeSpan = (int)$_SESSION['bee'][$this->sessName];
    }

    /**
     * Hit this bee. Return true if bee is killed.
     *
     * @access public
     * @return string
     */
    public function hit()
    {
        $_SESSION['bee'][$this->sessName] = ($this->currentLifeSpan - static::HIT_POINT);

        if((int)$_SESSION['bee'][$this->sessName] < 0){
            (int)$_SESSION['bee'][$this->sessName] = 0;
        }

        $this->currentLifeSpan = (int)$_SESSION['bee'][$this->sessName];

        return $this->sessName;
    }

    /**
     * Check bee is alive.
     *
     * @access public
     * @return bool
     */
    public function isAlive()
    {
        return ($this->currentLifeSpan > 0);
    }

    /**
     * Calculate life in percents.
     *
     * @access public
     * @return int
     */
    public function percent()
    {
        return round(($this->currentLifeSpan / static::LIFESPAN) * 100);
    }
}
