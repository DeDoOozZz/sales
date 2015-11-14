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

        $this->build_menu($this->{$type . '_menu'});
        return $this->str;
    }

    public function build_menu($array)
    {
        foreach ($array as $menu) {
            $this->str .= '<li>';
            if (isset($menu['url']))
                $this->str .= '<a href="' . site_url(ADMIN . '/' . $menu['url']) . '">';

            if (isset($menu['icon']))
                $this->str .= '<i class="' . $menu['icon'] . '"></i>';

            $this->str .= '<span class="title">' . lang('menu_' . $menu['title']) . '</span>';

            if (isset($menu['url']))
                $this->str .= '</a>';

            if (isset($menu['sub'])) {
                if ($menu['sub'])
                    $this->str .= '<ul>';

                $this->build_menu($menu['sub']);

                if ($menu['sub'])
                    $this->str .= '</ul>';
            }
            $this->str .= ' </li>';
        }
        return $this->str;
    }
}