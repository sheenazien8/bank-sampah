<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TarikTunaiTest extends TestCase
{
    public function test()
    {
        $user = $this->user();
        $data = $this->data();
        $response = $this->actingAs($user)->post(route('saving.tarik_tunai'), $data);
        $response->dumpSession();

        $response->assertStatus(302);
    }

    private function data(): array
    {
        return [
            'nasabah' => $this->user(true)->nasabahProfile->id,
            'jumlah_uang' => rand(1,9)."00000"
        ];
    }

    private function user(bool $bool = false): User
    {
        return User::when($bool, function ($query)
        {
            return $query->whereHas('getSaving');
        })->where('is_nasabah', $bool)->inRandomOrder()->take(1)->first();
    }

}
