<?php

return [
    [
        'menu-header' => 'Dashboard',
        'route' => 'dashboard.index',
        'active' => ['dashboard.index'],
        'menu_title' => 'Dashboard',
        'display_for' => ['nasabah', 'admin', 'pic'],
        'icon' => 'fas fa-th'
    ],
    [
        'menu-header' => 'Menu',
        'route' => 'nasabah.index',
        'active' => ['nasabah.index', 'nasabah.create', 'nasabah.edit', 'nasabah.show'],
        'menu_title' => 'Nasabah',
        'display_for' => ['admin'],
        'icon' => 'fas fa-user-friends'
    ],
    [
        'route' => 'user.index',
        'active' => ['user.index', 'user.create', 'user.edit', 'user.show'],
        'menu_title' => 'User',
        'display_for' => ['admin'],
        'icon' => 'fas fa-users'
    ],
    [
        'route' => 'item.index',
        'active' => ['item.index', 'item.create', 'item.edit', 'item.show'],
        'display_for' => ['admin'],
        'menu_title' => 'Item',
        'icon' => 'fas fa-pastafarianism'
    ],
    [
        'route' => 'pic.index',
        'active' => ['pic.index', 'pic.edit', 'pic.create', 'pic.show'],
        'menu_title' => 'Pic',
        'display_for' => ['admin'],
        'icon' => 'fas fa-user'
    ],
    [
        'route' => 'today-pic.index',
        'active' => ['today-pic.index', 'today-pic.edit', 'today-pic.create', 'today-pic.show'],
        'display_for' => ['admin'],
        'menu_title' => 'Today Pic',
        'icon' => 'fas fa-user-cog'
    ],
    [
        'route' => 'saving.index',
        'active' => ['saving.index', 'saving.show'],
        'display_for' => ['admin', 'nasabah'],
        'menu_title' => 'Saving',
        'icon' => 'fas fa-piggy-bank'
    ],
    [
        'route' => 'transaction.index',
        'active' => ['transaction.index', 'transaction.edit', 'transaction.show'],
        'display_for' => ['admin', 'pic'],
        'menu_title' => 'Transaction',
        'icon' => 'fas fa-money-check-alt'
    ],
    /* [ */
    /*     'route' => 'report.index', */
    /*     'active' => ['report.index', 'report.edit', 'report.show'], */
    /*     'display_for' => ['admin'], */
    /*     'menu_title' => 'Report', */
    /*     'icon' => 'fas fa-list-alt' */
    /* ], */
    [
        'route' => 'content.index',
        'display_for' => ['nasabah', 'admin'],
        'active' => ['content.index', 'content.show', 'content.create', 'content.edit'],
        'menu_title' => 'Content',
        'icon' => 'fas fa-cubes'
    ],
    [
        'route' => 'activity.index',
        'display_for' => ['nasabah', 'admin'],
        'active' => ['activity.index', 'activity.show', 'activity.create', 'activity.edit'],
        'menu_title' => 'Activity',
        'icon' => 'fas fa-th-list'
    ],
    [
        'route' => 'setting.index',
        'display_for' => ['admin'],
        'active' => ['setting.index'],
        'menu_title' => 'Setting',
        'icon' => 'fas fa-cogs'
    ],
];
