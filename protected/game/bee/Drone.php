<?php

namespace App\Game\Bee;

class Drone extends Bee
{
    /**
     * Bee name.
     *
     * @access public
     * @var    string
     */
    const NAME = 'drone';

    /**
     * Limit of same bees.
     *
     * @access public
     * @var    int
     */
     const LIMIT = 8;

    /**
     * Bee lifespan.
     *
     * @access public
     * @var    int
     */
    const LIFESPAN = 50;

    /**
     * How much hit point will minused from lifespan.
     *
     * @access public
     * @var    int
     */
    const HIT_POINT = 12;

    /**
     * Is bee important for other bees.
     *
     * @access public
     * @var    bool
     */
    const IMPORTANT = false;
}
