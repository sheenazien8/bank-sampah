<?php

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::insert($this->data());
    }

    private function data()
    {
        return [
            [
                'nama' => 'Kertas',
                'unit' => 'KG'
            ],
            [
                'nama' => 'Kardus',
                'unit' => 'KG'
            ],
            [
                'nama' => 'Plastik Campur',
                'unit' => 'KG'
            ],
            [
                'nama' => 'Plastik Aquan',
                'unit' => 'KG'
            ],
            [
                'nama' => 'Koran',
                'unit' => 'KG'
            ],
            [
                'nama' => 'Kaleng',
                'unit' => 'KG'
            ],
            [
                'nama' => 'Besi B',
                'unit' => 'KG'
            ],
            [
                'nama' => 'Plastik Putih',
                'unit' => 'KG'
            ],
            [
                'nama' => 'Plastik Hitam',
                'unit' => 'KG'
            ],
            [
                'nama' => 'Tutup Aqua',
                'unit' => 'KG'
            ],
            [
                'nama' => 'Botol KCP',
                'unit' => 'KG'
            ],
        ];
    }

}
