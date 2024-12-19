<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class LoginTest extends TestCase
{

    public function test_login(): void
    {
        Artisan::call('migrate:fresh --seed');

        $carga = $this->get(route('login'));
        $carga->assertStatus(200);

        $login = $this->post(route('login'), ["email" => "admin@uco.es", "password" => "1234"]);
        $login->assertStatus(302)->assertRedirect(route('destinos.admin'));
    }
    public function test_loginmal(): void    {
        $this->withMiddleware();
        $this->withoutExceptionHandling();
        $loginmal = $this->post(route('login'), ["email"=>"a2n@uco.es", "password"=>"1234"]);
        $loginmal->assertSessionHasErrors();
        dd(session()->all());
    }
}
