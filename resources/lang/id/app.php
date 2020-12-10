<?php
return [
    'nasabah' => [
        'title' => [
            'index' => 'Daftar Nasabah',
            'create' => 'Buat Nasabah',
            'edit' => 'Ubah Nasabah',
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
            'phone' => 'Phone',
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
            'phone' => 'Phone',
            'telegram_account' => 'Masukkan Akun Telegram',
            'password' => 'Masukkan Password'
        ]
    ],
    'user' => [
        'title' => [
            'index' => 'Daftar Pengguna',
            'create' => 'Buat Pengguna',
            'edit' => 'Ubah Pengguna'
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
            'menu' => 'Transaksi'
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
            'index' => 'Daftar Sampah',
            'create' => 'Buat Sampah',
            'edit' => 'Edit Sampah'
        ],
        'column' => [
            'name' => 'Jenis Sampah',
            'nama' => 'Jenis Sampah',
            'unit' => 'Satuan'
        ],
        'placeholder' => [
            'name' => 'Masukkan Nama Jenis Sampah',
            'unit' => 'Masukkan Nama Satuan'
        ]
    ],
    'pic' => [
        'title' => [
            'index' => 'Daftar Petugas (Person In Charge)',
            'create' => 'Buat Petugas',
            'edit' => 'Ubah Petugas',
            'menu' => 'Daftar Petugas'
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
            'index' => 'Daftar Petugas Hari Ini',
            'create' => 'Buat Petugas Hari Ini',
            'edit' => 'Ubah Petugas Hari Ini'
        ],
        'column' => [
            'date' => 'Tanggal Tugas',
            'user' => 'Nasabah',
            'pics' => 'Pekerjaan'
        ],
        'placeholder' => [
            'date' => 'Masukkan Tanggal Tugas',
            'user' => 'Masukkan Nasabah',
            'pics' => 'Masukkan Pekerjaan'
        ]
    ],
    'content' => [
        'title' => [
            'index' => 'Daftar Konten',
            'create' => 'Buat Konten',
            'edit' => 'Ubah Konten'
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
            'index' => 'Daftar Kegiatan',
            'create' => 'Buat Kegiatan',
            'edit' => 'Ubah Kegiatan'
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
        'detail' => 'Detail',
        'tarik_tunai' => 'Tarik Tunai',
        'tanggal_transaksi' => 'Tanggal Transaksi',
        'type' => 'Type',
        'jumlah_uang' => 'Jumlah Uang'
    ],
    'auth' => [
        'username_or_pin' => 'Usernam, Nomor Rekening atau PIN',
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
    'global' => [
        'add' => 'Tambah',
        'save' => 'Simpan',
        'show' => 'Detail',
        'edit' => 'Ubah',
        'delete' => 'Hapus?',
        'ohno422' => 'Kamu Harus melengkapi form',
        'wellcome' => 'Selamat Datan, :user',
        'profile' => 'Profil'
    ]
];
