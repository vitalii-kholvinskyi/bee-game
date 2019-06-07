<?php

namespace App\Controllers;

class BaseController
{
    /**
     * Render view template.
     *
     * @access public
     * @param  string $__t
     * @param  array  $data
     * @return void
     */
    public function view($__t, array $data = [])
    {
        foreach($data as $variable => $varData){
            $$variable = $varData;
        }

        include __DIR__.'/../templates/base-template.php';
    }
}
