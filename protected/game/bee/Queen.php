<?php

namespace App\Game\Bee;

class Queen extends Bee
{
    /**
     * Bee name.
     *
     * @access public
     * @var    string
     */
    const NAME = 'queen';

    /**
     * Limit of same bees.
     *
     * @access public
     * @var    int
     */
    const LIMIT = 1;

    /**
     * Bee lifespan.
     *
     * @access public
     * @var    int
     */
    const LIFESPAN = 100;

    /**
     * How much hit point will minused from lifespan.
     *
     * @access public
     * @var    int
     */
    const HIT_POINT = 8;

    /**
     * Is bee important for other bees.
     *
     * @access public
     * @var    bool
     */
    const IMPORTANT = true;
}
