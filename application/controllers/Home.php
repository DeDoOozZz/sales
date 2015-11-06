<?php

class Home extends Brightery_Controller
{
    public $layout = 'full';
    public $module = 'home';

    public function index()
    {
        $this->load->view('index');
    }

}
