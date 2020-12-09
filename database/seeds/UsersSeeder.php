<?php

use App\Models\Nasabah;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 1)->create([
            'username' => 'admin',
            'is_nasabah' => false
        ]);
    }
}
