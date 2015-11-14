<?php

class Cdn {
    function image($module, $file = null) {
        if($file && is_file($image = 'cdn/'. $module .'/'. $file)) {
            return base_url().$image;
        }
        else
        {
            return base_url().'cdn/'.$module.'/default.png';
        }
    }
}