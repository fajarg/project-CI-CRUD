<?php

namespace App\Controllers;

class Coba extends BaseController
{
    public function __construct()
    {
        // Most services in this controller require
        // the session to be started - so fire it up!
        $this->session = service('session');
        $this->auth = service('authentication');
    }

    public function index()
    {
        $data = [
            'judul' => 'Homepage'
        ];

        echo view('template/v_header', $data);
    }



    //--------------------------------------------------------------------

}
