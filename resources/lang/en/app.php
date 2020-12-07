<?php
return [
    'nasabah' => [
        'title' => [
            'index' => 'List Nasabah',
            'create' => 'Create Nasabah',
            'edit' => 'Edit Nasabah',
        ],
        'column' => [
            'name' => 'Name',
            'id_number' => 'Id Number',
            'full_name' => 'Full Name',
            'address' => 'Address',
            'username' => 'Username',
            'account_number' => 'Account Number',
            'phone' => 'Phone',
            'telegram_account' => 'Telegram Account',
            'password' => 'Password'
        ],
        'placeholder' => [
            'name' => 'Input Name',
            'id_number' => 'Input Id Number',
            'full_name' => 'Input Full Name',
            'address' => 'Input Address',
            'username' => 'Input Username',
            'account_number' => 'Input Account Number',
            'phone' => 'Phone',
            'telegram_account' => 'Input Telegram Account',
            'password' => 'Input Password'
        ]
    ],
    'user' => [
        'title' => [
            'index' => 'List User',
            'create' => 'Create User',
            'edit' => 'Edit User'
        ],
        'column' => [
            'username' => 'Username',
            'phone' => 'Phone',
            'telegram_account' => 'Telegram Account',
            'password' => 'Password'
        ],
        'placeholder' => [
            'username' => 'Input Username',
            'phone' => 'Input Phone',
            'telegram_account' => 'Input Telegram Account',
            'password' => 'Input Password'
        ]
    ],
    'transaction' => [
        'title' => [
            'index' => 'Transaction Histories',
            'create' => 'Create Transaction',
            'edit' => 'Edit Transaction'
        ],
        'add_item' => 'Add Item',
        'column' => [
            'nasabah' => 'Nasabah',
            'item' => 'Item',
            'price' => 'Price',
            'satuan' => 'Unit',
            'quantity' => 'Quantity',
            'tanggal_transaksi' => 'Transaction Date',
        ],
        'placeholder' => [
            'nasabah' => 'Search Nasabah',
            'item' => 'Search Item',
            'price' => 'Input Price',
            'satuan' => 'Input Unit',
            'quantity' => 'Input Quantity',
            'tanggal_transaksi' => 'Transaction Date',
        ]

    ],
    'item' => [
        'title' => [
            'index' => 'List Item',
            'create' => 'Create Item',
            'edit' => 'Edit Item'
        ],
        'column' => [
            'name' => 'Item Name',
            'unit' => 'Unit'
        ],
        'placeholder' => [
            'name' => 'Input Item Name',
            'unit' => 'Input Unit'
        ]

    ],
    'pic' => [
        'title' => [
            'index' => 'List Pic (Person In Charge)',
            'create' => 'Create Pic',
            'edit' => 'Edit Pic'
        ],
        'column' => [
            'name' => 'Job Name',
            'value' => 'Value Per Job',
            'description' => 'Description'
        ],
        'placeholder' => [
            'name' => 'Input Job Name',
            'value' => 'Input Value Per Job',
            'description' => 'Input Description'
        ]

    ],
    'today_pic' => [
        'title' => [
            'index' => 'List Today Pic',
            'create' => 'Create Today Pic',
            'edit' => 'Edit Today Pic'
        ],
        'column' => [
            'date' => 'Job Date',
            'user' => 'PIC (Person In Charge)',
            'pics' => 'Job'
        ],
        'placeholder' => [
            'date' => 'Input Job Date',
            'user' => 'Input PIC (Person In Charge)',
            'pics' => 'Input Job'
        ]
    ],
    'content' => [
        'title' => [
            'index' => 'List Content',
            'create' => 'Create Content',
            'edit' => 'Edit Content'
        ],
        'column' => [
            'title' => 'Title',
            'body' => 'Body',
        ],
        'placeholder' => [
            'title' => 'Input Title',
            'body' => 'Input Body',
        ]
    ],
    'activity' => [
        'title' => [
            'index' => 'List Activity',
            'create' => 'Create Activity',
            'edit' => 'Edit Activity'
        ],
        'column' => [
            'title' => 'Title',
            'agenda' => 'Agenda',
            'tanggal' => 'Tanggal',
        ],
        'placeholder' => [
            'title' => 'Title',
            'agenda' => 'Agenda',
            'tanggal' => 'Tanggal',
        ]
    ],
    'saving' => [
        'title' => [
            'index' => 'List Saving',
            'show' => 'Saving Histories',
        ],
        'column' => [
            'nasabah' => 'Nasabah',
            'nomor_rekening' => 'Account Number',
            'transaksi_terakhir' => 'Last Transaction',
            'saldo_akhir' => 'Current Saldo',
        ],
    ],
    'global' => [
        'add' => 'Add',
        'save' => 'Save',
        'show' => 'Detail',
        'edit' => 'Edit',
        'delete' => 'Delete',
        'ohno422' => 'You Must Complete the field'
    ]
];
