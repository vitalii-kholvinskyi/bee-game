<?php

namespace App\Game\Bee;

class Worker extends Bee
{
    /**
     * Bee name.
     *
     * @access public
     * @var    string
     */
    const NAME = 'worker';

    /**
     * Limit of same bees.
     *
     * @access public
     * @var    int
     */
     const LIMIT = 5;

     /**
      * Bee lifespan.
      *
      * @access public
      * @var    int
      */
     const LIFESPAN = 75;

     /**
      * How much hit point will minused from lifespan.
      *
      * @access public
      * @var    int
      */
     const HIT_POINT = 10;

     /**
      * Is bee important for other bees.
      *
      * @access public
      * @var    bool
      */
     const IMPORTANT = false;
}
