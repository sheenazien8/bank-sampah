<?php

namespace Tests\Feature;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NasabahControllerTest extends TestCase
{
    /**
     * create nasabah test
     *
     * @return void
     */
    public function testCreateNasabah()
    {
        $data = $this->data();
        $response = $this->actingAs($this->user())
                            ->post(route('nasabah.store'), array_merge($data));

        $this->assertDatabaseHas('users', [
            'username' => $data['username'],
            'nomor_rekening' => $data['nomor_rekening'],
            'phone' => $data['phone'],
            'telegram_account' => $data['telegram_account'],
        ]);
        $this->assertDatabaseHas('nasabah', [
            'nama_lengkap' => $data['nama_lengkap'],
            'nomor_ktp' => $data['nomor_ktp'],
            'alamat' => $data['alamat'],
        ]);
    }

    private function data()
    {
        $factory = new Factory();
        return [
            'username' => $factory->unique()->userName,
            'nomor_rekening' => $factory->bankAccountNumber,
            'phone' => $factory->phoneNumber,
            'telegram_account' => $factory->userName,
            'password' => 'password',
            'nama_lengkap' => $factory->firstName . $factory->lastName,
            'nomor_ktp' => $factory->randomNumber,
            'alamat' => $factory->address
        ];
    }

    private function user()
    {
        return User::whereIsNasabah(false)->first();
    }

}
