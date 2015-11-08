<?php

$config['backend'] = [
    [
        'title' => 'general_settings',
        'url' => '#',
        'icon' => 'linecons-cog',
        'permission' => 'general_settings,branches',
        'sub' => [
            [
                'title' => 'general_settings',
                'url' => 'general_settings',
                'permission' => 'general_settings',
            ],
            [
                'title' => 'branches',
                'url' => 'branches',
                'permission' => 'branches',
            ],
        ]
    ],
    [
        'title' => 'general_settings',
        'url' => '#',
        'icon' => 'linecons-cog',
        'permission' => 'general_settings,branches',
        'sub' => [
            [
                'title' => 'general_settings',
                'url' => 'general_settings',
                'permission' => 'general_settings',
            ],
            [
                'title' => 'branches',
                'url' => 'branches',
                'permission' => 'branches',
            ],
        ]
    ],

];