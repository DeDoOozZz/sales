<?php

class Menu
{
    private $backend_menu;
    private $str = '';

    public function __construct($config)
    {
        $this->backend_menu = $config['backend'];
    }

    public function generate($type = 'backend')
    {
        foreach ($this->{$type.'_menu'} as $menu) {
            $this->str .= '<li>
                        <a href="'.site_url(ADMIN.'/'. $menu['url']).'">
                            <i class="'.$menu['icon'].'"></i>
                            <span class="title">'.lang('menu_'. $menu['title']).'</span>
                        </a>';
            if ($menu['sub'])
                $this->str .= '<ul>';

            foreach ($menu['sub'] as $sub_menu) {
                $this->str .= '<li>
                                <a href="'.site_url(ADMIN.'/'. $sub_menu['url']).'">
                                    <span class="title">'.lang('menu_'. $sub_menu['title']).'</span>
                                </a>
                            </li>';
            }
            if ($menu['sub'])
                $this->str .= '</ul>';
            $this->str .= ' </li>';
        }

        return $this->str;
    }
}