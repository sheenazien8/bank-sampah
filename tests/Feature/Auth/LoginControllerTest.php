<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    /**
     * Login test
     *
     * @return void
     */
    public function testErrorLogin(): void
    {
        $response = $this->post(route('login'), array_merge($this->data(), [
            'password' => ''
        ]));

        $response->assertSessionHasErrors(['password']);
        $response->assertStatus(302);
    }

    /**
     * Login Success Test
     *
     * @return void
     */
    public function testSuccessLogin()
    {
        $response = $this->post(route('login'), $this->data(true));

        $response->assertStatus(302);
    }


    private function data($isNasbah = false)
    {
        $user = User::whereIsNasabah($isNasbah)->first();
        return [
            'idenity' => $isNasbah ? $user->username : $user->nomor_rekening,
            'password' => 'password'
        ];
    }

}
