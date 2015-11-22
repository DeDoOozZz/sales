<?php

$config['backend'] = [
    [
        'title' => 'general_settings',
        'url' => '#',
        'icon' => 'fa-cog',
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
//            [
//                'title' => 'messages',
//                'url' => 'messages',
//                'permission' => 'messages',
//            ],
//            [
//                'title' => 'departments',
//                'url' => 'departments',
//                'permission' => 'departments',
//            ],
            [
                'title' => 'sms_templates',
                'url' => 'sms_templates',
                'permission' => 'sms_templates',
            ],
//            [
//                'title' => 'credit_card_types',
//                'url' => 'credit_card_types',
//                'permission' => 'credit_card_types',
//            ]
        ]
    ],
    [
        'title' => 'definitions',
        'url' => '#',
        'permission' => '',
        'sub' => [
            [
                'title' => 'devices',
                'url' => 'devices',
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

                    [
                        'title' => 'warranties',
                        'url' => 'warranties',
                        'permission' => 'warranties',
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
                'title' => 'prepaid_cards',
                'url' => 'prepaid_cards',
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
                    [
                        'title' => 'countries',
                        'url' => 'countries',
                        'permission' => 'countries',
                    ],
                    [
                        'title' => 'card_types',
                        'url' => 'card_types',
                        'permission' => 'card_types',
                    ],
                    [
                        'title' => 'service_providers',
                        'url' => 'service_providers',
                        'permission' => 'service_providers',
                    ],
                ]
            ],

            [
                'title' => 'products',
                'url' => 'products',
                'permission' => 'products',
                'sub' => [
                    [
                        'title' => 'products',
                        'url' => 'products',
                        'permission' => 'products',
                    ],
                    [
                        'title' => 'categories',
                        'url' => 'categories',
                        'permission' => 'categories',
                    ],
                    [
                        'title' => 'marks',
                        'url' => 'marks',
                        'permission' => 'marks',
                    ],

                ]
            ],

            [
                'title' => 'services',
                'url' => 'services',
                'permission' => '',
                'sub' =>
                    [
                        [
                            'title' => 'services',
                            'url' => 'services',
                            'permission' => 'services',
                        ],

                        [
                            'title' => 'sim_types',
                            'url' => 'sim_types',
                            'permission' => 'sim_types',
                        ],
                    ]
            ],
//            [
//                'title' => 'cash_types',
//                'url' => 'cash_types',
//                'permission' => 'cash_types',
//            ],


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
                'title' => 'orders',
                'url' => 'orders',
                'permission' => 'orders',
            ],
            [
                'title' => 'device_orders',
                'url' => 'device_orders',
                'permission' => 'device_orders',
            ],
//            [
//                'title' => 'service_orders',
//                'url' => 'service_orders',
//                'permission' => 'service_orders',
//            ],
            [
                'title' => 'prepaid_card_orders',
                'url' => 'prepaid_card_orders',
                'permission' => 'prepaid_card_orders',
            ],
            [
                'title' => 'format_orders',
                'url' => 'format_orders',
                'permission' => 'format_orders',
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
                'title' => 'transactions',
                'url' => 'transactions',
                'permission' => 'transactions',
            ],

        ]
    ],
//    [
//        'title' => 'customer_support',
//        'url' => '',
//        'icon' => 'linecons-cog',
//        'permission' => '',
//        'sub' => [
//            [
//                'title' => 'tickets',
//                'url' => 'tickets',
//                'permission' => 'tickets',
//            ],
//        ]
//    ],
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