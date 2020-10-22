<?php

use App\Models\Pic;
use Illuminate\Database\Seeder;

class PicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataPetugas = [
            [
                'nama_jabatan' => 'perkap ringan',
                'keterangan' => 'petugas yang hanya mencatat Sampah yang ditimbang setelah itu lalu pulang',
                'nilai_setiap_tugas' => 1
            ],
            [
                'nama_jabatan' => 'perkap sedang',
                'keterangan' => 'Petugas yang ikut menghitung dan menerima jumlah uang penjualan Sampah',
                'nilai_setiap_tugas' => 2
            ],
            [
                'nama_jabatan' => 'perkap berat',
                'keterangan' => 'Petugas yang mengambil Sampah dari rumah ke rumah dan petugas yang menghitung sampai masuk ke rekening tabungan nasabah',
                'nilai_setiap_tugas' => 3
            ],
        ];

        foreach ($dataPetugas as $data) {
            $petugas = new Pic;
            $petugas->fill($data);
            $petugas->save();
        }
    }
}
