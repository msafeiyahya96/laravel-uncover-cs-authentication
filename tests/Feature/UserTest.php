<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_redirect_to_dashboard_successfully() {
        User::factory()->create([
            'email'     => 'test@test.com',
            'password'  => bcrypt('password'),
        ]);

        $response   = $this->post('/login', [
            'email'     => 'test@test.com',
            'password'  => 'password',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/home');
    }

    public function test_auth_user_can_access_dashboard() {
        $user   = User::factory()->create();

        $response   = $this->actingAs($user)->get('/home');
        $response->assertStatus(200);
    }

    public function test_unauth_user_cannot_access_dashboard() {
        $response   = $this->get('/home');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_user_has_name_attribute() {
        $user   = User::factory()->create([
            'name'      => 'John',
            'email'     => 'john@test.com',
            'password'  => bcrypt('password'),
        ]);

        $this->assertEquals('John', $user->name);
    }

    public function test_user_auth_can_access_data_mahasiswa() {
        $user   = User::factory()->create();

        $response   = $this->actingAs($user)->get('/data-mahasiswa');
        $response->assertStatus(200);
    }

    public function test_user_unauth_cannot_access_data_mahasiswa() {
        $response   = $this->get('/data-mahasiswa');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_user_auth_can_access_tabel_mahasiswa() {
        $user   = User::factory()->create();

        $response   = $this->actingAs($user)->get('/tabel-mahasiswa');
        $response->assertStatus(200);
    }

    public function test_user_unauth_cannot_access_tabel_mahasiswa() {
        $response   = $this->get('/tabel-mahasiswa');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_user_auth_can_access_blog_mahasiswa() {
        $user   = User::factory()->create();

        $response   = $this->actingAs($user)->get('/blog-mahasiswa');
        $response->assertStatus(200);
    }

    public function test_user_unauth_cannot_access_blog_mahasiswa() {
        $response   = $this->get('/blog-mahasiswa');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_user_auth_can_logout() {
        $user   = User::factory()->create();

        $response   = $this->actingAs($user)->post(route('logout'));
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_user_unauth_cannot_logout() {
        $response   = $this->post(route('logout'));
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }
}
