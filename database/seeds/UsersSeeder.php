<?php

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
            'is_nasabah' => false
        ]);
        factory(User::class, 9)->create()->each(function($user) {
            $nasabash = factory(App\Models\Nasabah::class)->make();
            $user->nasabahProfile()->save($nasabash);
        });
    }
}
