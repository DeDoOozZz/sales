<?php

/**
 * Created by PhpStorm.
 * User: Muhammad
 * Date: 11/16/2015
 * Time: 2:08 AM
 */
class User
{
    public $info;

    public function __construct()
    {
        if ($email = session('email'))
            $this->info = get_instance()->db->where('email', $email)->get('users')->row();
    }

    function __get($attr)
    {
        if(!isset($this->info->{$attr}))
            return null;
        return $this->info->{$attr};
    }
}