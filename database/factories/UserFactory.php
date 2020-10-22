<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $username = $faker->unique()->userName;
    return [
        'username' => $username,
        'nomor_rekening' => $faker->bankAccountNumber,
        'phone' => $faker->phoneNumber,
        'is_nasabah' => true,
        'telegram_account' => $username,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\Models\Nasabah::class, function (Faker $faker)
{
    return [
        'nama_lengkap' => $faker->firstName . ' ' . $faker->lastName,
        'nomor_ktp' => Str::upper(Str::random(10)),
        'alamat' => $faker->address,
        'saldo_akhir' => 0,
    ];
});

$factory->define(App\Models\Pic::class, function (Faker $faker)
{
    return [
        'nama_lengkap' => $faker->firstName . ' ' . $faker->lastName,
        'nomor_ktp' => Str::upper(Str::random(10)),
        'alamat' => $faker->address,
        'saldo_akhir' => 0,
    ];
});
