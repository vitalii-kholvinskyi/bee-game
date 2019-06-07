<?php

namespace App\Controllers;

use \App\Game\Game;

class HomeController extends BaseController
{
    /**
     * Initializr the game.
     *
     * @access public
     * @return void
     */
    public function __construct()
    {
        Game::initialize();
    }

    /**
     * Home index page.
     *
     * @access public
     * @return void
     */
    public function index()
    {
        $this->view('home/index');
    }

    /**
     * Start the game.
     *
     * @access public
     * @return void
     */
    public function play()
    {
        $log  = isset($_POST['hit']) ? Game::hitRandomBee() : false;
        $game = Game::class;

        if(isset($_GET['again'])){
            Game::endGame(true);
            Game::initialize();
        }

        $this->view('home/play', compact('log', 'game'));
    }
}
