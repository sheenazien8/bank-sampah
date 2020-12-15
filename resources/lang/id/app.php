<?php
return [
    'nasabah' => [
        'title' => [
            'index' => 'Nasabah',
            'create' => 'Buat Nasabah',
            'edit' => 'Ubah Nasabah',
            'show' => 'Detail Nasabah'
        ],
        'column' => [
            'name' => 'Nama',
            'id_number' => 'Nomor KTP',
            'full_name' => 'Nama Lengkap',
            'address' => 'Alamat',
            'username' => 'Username',
            'account_number' => 'Nomor Rekening',
            'nomor_rekening' => 'Nomor Rekening',
            'nama_lengkap' => 'Nama Lengkap',
            'nomor_ktp' => 'Nomor KTP',
            'alamat' => 'Alamat',
            'saldo_akhir' => 'Saldo Akhir',
            'phone' => 'Nomor Telepon',
            'telegram_account' => 'Akun Telegram',
            'password' => 'Password'
        ],
        'placeholder' => [
            'name' => 'Masukkan Nama',
            'id_number' => 'Masukkan Nomor KTP',
            'full_name' => 'Masukkan Nama Lengkap',
            'address' => 'Masukkan Alamat',
            'username' => 'Masukkan Username',
            'account_number' => 'Masukkan Nomor Rekening',
            'phone' => 'Nomor Telepon',
            'telegram_account' => 'Masukkan Akun Telegram',
            'password' => 'Masukkan Password'
        ]
    ],
    'user' => [
        'title' => [
            'index' => 'User',
            'create' => 'Buat User',
            'edit' => 'Ubah User',
            'show' => 'Detail User'
        ],
        'column' => [
            'username' => 'Username',
            'phone' => 'Phone',
            'telegram_account' => 'Akun Telegram',
            'password' => 'Password'
        ],
        'placeholder' => [
            'username' => 'Masukkan Username',
            'phone' => 'Masukkan Phone',
            'telegram_account' => 'Masukkan Akun Telegram',
            'password' => 'Masukkan Password'
        ]
    ],
    'transaction' => [
        'title' => [
            'index' => 'Riwayat Transaksi',
            'create' => 'Buat Transaksi',
            'edit' => 'Ubah Transaksi',
            'menu' => 'Transaksi',
            'show' => 'Detail Transaksi'
        ],
        'add_item' => 'Tambah Sampah',
        'column' => [
            'nasabah' => 'Nasabah',
            'item' => 'Sampah',
            'price' => 'Harga',
            'satuan' => 'Satuan',
            'quantity' => 'Jumlah',
            'tanggal_transaksi' => 'Tanggal Transaksi',
        ],
        'placeholder' => [
            'nasabah' => 'Cari Nasabah',
            'item' => 'Cari Sampah',
            'price' => 'Masukkan Harga',
            'satuan' => 'Masukkan Satuan',
            'quantity' => 'Masukkan Jumlah',
            'tanggal_transaksi' => 'Tanggal Transaksi',
        ]
    ],
    'item' => [
        'title' => [
            'index' => 'Data Sampah',
            'create' => 'Buat Sampah',
            'edit' => 'Edit Sampah',
            'show' => 'Detail Jenis Sampah'
        ],
        'column' => [
            'name' => 'Jenis Sampah',
            'nama' => 'Jenis Sampah',
            'unit' => 'Satuan',
            'price' => 'Harga',
        ],
        'placeholder' => [
            'name' => 'Masukkan Nama Jenis Sampah',
            'unit' => 'Masukkan Nama Satuan',
            'price' => 'Masukkan Harga',
        ]
    ],
    'pic' => [
        'title' => [
            'index' => 'Petugas (Person In Charge)',
            'create' => 'Buat Petugas',
            'edit' => 'Ubah Petugas',
            'menu' => 'Petugas',
            'show' => 'Detail Petugas'
        ],
        'column' => [
            'name' => 'Nama Pekerjaan',
            'nama_jabatan' => 'Nama Jabatan',
            'keterangan' => 'Keterangan',
            'nilai_setiap_tugas' => 'Nilai Per Pekerjaan',
            'value' => 'Nilai Per Pekerjaan',
            'description' => 'Keterangan'
        ],
        'placeholder' => [
            'name' => 'Masukkan Nama Pekerjaan',
            'value' => 'Masukkan Nilai Per Pekerjaan',
            'description' => 'Masukkan Keterangan'
        ]
    ],
    'today_pic' => [
        'title' => [
            'index' => 'Jadwal Petugas',
            'create' => 'Buat Petugas',
            'edit' => 'Ubah Petugas',
            'show' => 'Detail Petugas'
        ],
        'column' => [
            'date' => 'Tanggal Tugas',
            'user' => 'Nasabah',
            'pics' => 'Pekerjaan',
            'name' => 'Nasabah',
            'pin' => 'PIN'
        ],
        'placeholder' => [
            'date' => 'Masukkan Tanggal Tugas',
            'user' => 'Masukkan Nasabah',
            'pics' => 'Masukkan Pekerjaan'
        ]
    ],
    'content' => [
        'title' => [
            'index' => 'Konten',
            'create' => 'Buat Konten',
            'edit' => 'Ubah Konten',
            'show' => 'Detail Konten'
        ],
        'column' => [
            'title' => 'Judul',
            'body' => 'Isi Konten image(*.png)',
            'writer' => 'Penulis',
        ],
        'placeholder' => [
            'title' => 'Masukkan Judul',
            'body' => 'Masukkan Isi Konten image(*.png)',
            'writer' => 'Masukkan Penulis',
        ]
    ],
    'activity' => [
        'title' => [
            'index' => 'Kegiatan',
            'create' => 'Buat Kegiatan',
            'edit' => 'Ubah Kegiatan',
            'show' => 'Detail Kegiatan'
        ],
        'column' => [
            'title' => 'Judul',
            'agenda' => 'Agenda',
            'tanggal' => 'Tanggal',
        ],
        'placeholder' => [
            'title' => 'Masukkan Title',
            'agenda' => 'Masukkan Agenda',
            'tanggal' => 'Masukkan Tanggal',
        ]
    ],
    'saving' => [
        'title' => [
            'index' => 'Daftar Tabungan',
            'show' => 'Detail Tabungan',
        ],
        'column' => [
            'nasabah' => 'Nasabah',
            'nomor_rekening' => 'Nomor Rekening',
            'transaksi_terakhir' => 'Transaksi Terakhir',
            'saldo_akhir' => 'Saldo Akhir',
        ],
        'message' => [
            'tarik_tunai' => 'Sukses Tarik Tunai.'
        ],
        'detail' => 'Detail',
        'tarik_tunai' => 'Tarik Tunai',
        'tanggal_transaksi' => 'Tanggal Transaksi',
        'type' => 'Type',
        'jumlah_uang' => 'Jumlah Uang'
    ],
    'auth' => [
        'username_or_pin' => 'Username, Nomor Rekening atau PIN',
        'password' => 'Password'
    ],
    'setting' => [
        'title' => [
            'index' => 'Pengaturan'
        ],
        'succes' => 'Sukses',
        'bahasa' => 'Bahasa',
        'profit_bank_sampah' => 'Profit Bank Sampah (%)',
        'profit_total_petugas' => 'Profit Total Petugas (%)',
        'pin_register_telegram' => 'Pin Untuk Pendaftaran Telegram',
        'placeholder' => [
            'profit_bank_sampah' => 'Tentukan Profit untuk Bank Sampah',
            'profit_total_petugas' => 'Tentukan Total Profit untuk PIC (Person in Charge)',
            'pin_register_telegram' => 'Atur Pin Secara Berkala',
        ]
    ],
    'dashboard' => [
        'total_admin' => 'Total Admin',
        'total_nasabah' => 'Total Nasabah',
        'total_jenis_sampah' => 'Total Jenis Sampah',
        'profit_bank_sampah' => 'Profit BS',
        'tabungan' => 'Saldo Akhir'
    ],
    'report' => [
        'title' => [
            'index' => 'Laporan'
        ]
    ],
    'global' => [
        'add' => 'Tambah',
        'save' => 'Simpan',
        'show' => 'Detail',
        'edit' => 'Ubah',
        'delete' => 'Hapus?',
        'ohno422' => 'Kamu Harus melengkapi form',
        'wellcome' => 'Selamat Datang, :user',
        'profile' => 'Profil',
        'generate' => 'Generate',
        'totalPrice' => 'Sub Total',
        'grandTotal' => 'Total Harga'
    ]
];
