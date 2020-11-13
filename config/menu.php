<?php

return [
    /* [ */
    /*     'route' => 'dashboard.index', */
    /*     'active' => ['dashboard.index'], */
    /*     'menu_title' => 'Dashboard', */
    /*     'display_for' => ['nasabah', 'admin'], */
    /*     'icon' => 'fas fa-th' */
    /* ], */
    [
        'menu-header' => 'Menu',
        'route' => 'nasabah.index',
        'active' => ['nasabah.index'],
        'menu_title' => 'Nasabah',
        'display_for' => ['admin'],
        'icon' => 'fas fa-th'
    ],
    [
        'route' => 'unit.index',
        'display_for' => ['admin'],
        'active' => ['unit.index'],
        'menu_title' => 'Unit',
        'icon' => 'fas fa-th'
    ],
    [
        'route' => 'item.index',
        'active' => ['item.index'],
        'display_for' => ['admin'],
        'menu_title' => 'Item',
        'icon' => 'fas fa-th'
    ],
    [
        'route' => 'pic.index',
        'active' => ['pic.index'],
        'menu_title' => 'Pic',
        'display_for' => ['admin'],
        'icon' => 'fas fa-th'
    ],
    [
        'route' => 'today-pic.index',
        'active' => ['today-pic.index'],
        'display_for' => ['admin'],
        'menu_title' => 'Today Pic',
        'icon' => 'fas fa-th'
    ],
    [
        'route' => 'saving.index',
        'active' => ['saving.index'],
        'display_for' => ['admin'],
        'menu_title' => 'Saving',
        'icon' => 'fas fa-th'
    ],
    [
        'route' => 'transaction.index',
        'display_for' => ['nasabah', 'admin'],
        'active' => ['transaction.index'],
        'menu_title' => 'Transaction',
        'icon' => 'fas fa-th'
    ],
    [
        'route' => 'content.index',
        'display_for' => ['nasabah', 'admin'],
        'active' => ['content.index'],
        'menu_title' => 'Content',
        'icon' => 'fas fa-th'
    ],
    [
        'route' => 'activity.index',
        'display_for' => ['nasabah', 'admin'],
        'active' => ['activity.index'],
        'menu_title' => 'Activity',
        'icon' => 'fas fa-th'
    ],
    [
        'menu-header' => 'Setting',
        'route' => 'setting.index',
        'display_for' => ['nasabah', 'admin'],
        'active' => ['setting.index'],
        'menu_title' => 'Setting',
        'icon' => 'fas fa-cogs'
    ],
    [
        'active' => ['setting.index'],
        'menu_title' => 'Setting',
        'icon' => 'fas fa-th',
        'has_dropdown' => [
            'route' => 'setting.index',
            'active' => ['setting.index'],
            'menu_title' => 'System',
        ]
    ]
];
