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
            [
                'title' => 'cash_types',
                'url' => 'cash_types',
                'permission' => 'cash_types',
            ],
            [
                'title' => 'card_types',
                'url' => 'card_types',
                'permission' => 'card_types',
            ],
            [
                'title' => 'categories',
                'url' => 'categories',
                'permission' => 'categories',
            ],
            [
                'title' => 'countries',
                'url' => 'countries',
                'permission' => 'countries',
            ],
            [
                'title' => 'credit_card_types',
                'url' => 'credit_card_types',
                'permission' => 'credit_card_types',
            ],
            [
                'title' => 'departments',
                'url' => 'departments',
                'permission' => 'departments',
            ],



            [
                'title' => 'devices',
                'url' => '#',
                'permission' => '',
                'sub' => [
                    [
                        'title' => 'devices',
                        'url' => 'devices',
                        'permission' => 'devices',
                    ],
                    [
                        'title' => 'device_types',
                        'url' => 'device_types',
                        'permission' => 'device_types',
                    ],
                ]
            ],


            [
                'title' => 'fees',
                'url' => 'fees',
                'permission' => 'fees',
                'sub' => [
                    [
                        'title' => 'fees',
                        'url' => 'fees',
                        'permission' => 'fees',
                    ],
                    [
                        'title' => 'fee_types',
                        'url' => 'fee_types',
                        'permission' => 'fee_types',
                    ],
                ]
            ],



            [
                'title' => 'marks',
                'url' => 'marks',
                'permission' => 'marks',
            ],
            [
                'title' => 'messages',
                'url' => 'messages',
                'permission' => 'messages',
            ],

            [
                'title' => 'prepaid_cards',
                'url' => '#',
                'permission' => '',
                'sub' => [
                    [
                        'title' => 'prepaid_cards',
                        'url' => 'prepaid_cards',
                        'permission' => 'prepaid_cards',
                    ],
                    [
                        'title' => 'prepaid_card_types',
                        'url' => 'prepaid_card_types',
                        'permission' => 'prepaid_card_types',
                    ],
                ]
            ],

            [
                'title' => 'products',
                'url' => 'products',
                'permission' => 'products',
            ],

            [
                'title' => 'services',
                'url' => '#',
                'permission' => '',
                'sub' =>
                [
                    [
                        'title' => 'services',
                        'url' => 'services',
                        'permission' => 'services',
                    ],
                    [
                        'title' => 'service_providers',
                        'url' => 'service_providers',
                        'permission' => 'service_providers',
                    ],

                    [
                        'title' => 'sim_types',
                        'url' => 'sim_types',
                        'permission' => 'sim_types',
                    ],
                ]
            ],




            [
                'title' => 'sms_templates',
                'url' => 'sms_templates',
                'permission' => 'sms_templates',
            ],
            [
                'title' => 'tickets',
                'url' => 'tickets',
                'permission' => 'tickets',
            ],

            [
                'title' => 'warranties',
                'url' => 'warranties',
                'permission' => 'warranties',
            ],


        ]
    ],
    [
        'title' => 'users',
        'url' => '#',
        'icon' => 'linecons-cog',
        'permission' => '',
        'sub' => [
            [
                'title' => 'users',
                'url' => 'users',
                'permission' => 'users',
            ],
            [
                'title' => 'usergroups',
                'url' => 'usergroups',
                'permission' => 'usergroups',
            ],
        ]
    ],
    [
        'title' => 'sales',
        'url' => '#',
        'icon' => 'linecons-cog',
        'permission' => '',
        'sub' => [
            [
                'title' => 'device_orders',
                'url' => 'device_orders',
                'permission' => 'device_orders',
            ],
            [
                'title' => 'prepaid_card_orders',
                'url' => 'prepaid_card_orders',
                'permission' => 'prepaid_card_orders',
            ],
            [
                'title' => 'format',
                'url' => 'format',
                'permission' => 'format',
            ],
            [
                'title' => 'invoices',
                'url' => 'invoices',
                'permission' => 'invoices',
            ],
            [
                'title' => 'pending_orders',
                'url' => 'pending_orders',
                'permission' => 'pending_orders',
            ],

            [
                'title' => 'service_orders',
                'url' => 'service_orders',
                'permission' => 'service_orders',
            ],
            [
                'title' => 'transactions',
                'url' => 'transactions',
                'permission' => 'transactions',
            ],

        ]
    ],
    [
        'title' => 'reports',
        'url' => 'reports',
        'icon' => 'linecons-cog',
        'permission' => '',
    ],
    [
        'title' => 'logout',
        'url' => 'logout',
        'icon' => 'linecons-cog',
        'permission' => '',
    ],

];