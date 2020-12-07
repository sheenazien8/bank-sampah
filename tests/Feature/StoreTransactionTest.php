<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreTransactionTest extends TestCase
{
    public function test()
    {
        $user = $this->user();
        $data = $this->data();
        $response = $this->actingAs($user)->post('/transaction', $data);
        $response->dump($data);
        $response->assertSessionHas('success');

        $response->assertStatus(302);
    }

    private function data(): array
    {
        return [
            'nasabah' => $this->user(true)->nasabahProfile->id,
            'item' => [
                'Sampah',
                'Batu Kaleng',
                'Batu',
            ],
            'quantity' => [6,3,9],
            'price' => [rand(0,9).'0000', rand(0,9).'0000', rand(0,9).'0000'],
            'satuan' => ['KG', 'PCS', 'KG'],
        ];
    }

    private function user(bool $bool = false): User
    {
        return User::where('is_nasabah', $bool)->inRandomOrder()->take(1)->first();
    }

}
