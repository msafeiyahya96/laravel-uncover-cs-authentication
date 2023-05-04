<?php

namespace Tests\Feature;

use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CRUDTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_access_index() {
        $user   = User::factory()->create([
            'email'     => 'admin@test.com',
        ]);

        $jurusans   = Jurusan::all();

        // Response ke Halaman Index
        $response1  = $this->actingAs($user)->get('/jurusans', compact('jurusans'));
        $response1->assertStatus(200);
        $response1->assertViewIs('jurusan.index');
        $response1->assertSeeText('Tabel Jurusan');
    }

    public function test_user_create_jurusan() {
        $user   = User::factory()->create([
            'email'     => 'admin@test.com',
        ]);

        // Response ke Halaman Create
        $response1  = $this->actingAs($user)->get(route('jurusans.create'));
        $response1->assertStatus(200);
        $response1->assertViewIs('jurusan.create');
        $response1->assertSeeText('Pendaftaran Jurusan');

        // Response Validation Form
        $response2  = $this->actingAs($user)->post(route('jurusans.store'), [
            'nama_jurusan'      => 'Teknik Informatika',
            'nama_dekan'        => '',
            'jumlah_mahasiswa'  => '',
        ]);
        $response2->assertInvalid();
        $response2->assertStatus(302);
        $response2->assertRedirect(route('jurusans.create'));

        // Response Create Berhasil
        $response3  = $this->actingAs($user)->post(route('jurusans.store'), [
            'nama_jurusan'      => 'Teknik Informatika',
            'nama_dekan'        => 'Muhammad',
            'jumlah_mahasiswa'  => 12,
        ]);
        $response3->assertValid();
        $response3->assertStatus(302);
        $response3->assertRedirect('/');
        $response3->assertSessionHas('pesan');
    }

    public function test_user_update_jurusan() {
        $user   = User::factory()->create([
            'email'     => 'admin@test.com',
        ]);
        
        $jurusan    = Jurusan::create([
            'id'                => 10,
            'nama_jurusan'      => 'Teknik Informatika',
            'nama_dekan'        => 'Muhammad',
            'jumlah_mahasiswa'  => 15,
        ]);

        // Response ke Form Edit
        $response1  = $this->actingAs($user)->get(route('jurusans.edit', $jurusan));
        $response1->assertStatus(200);
        $response1->assertSeeText('Edit Jurusan');

        // Response Validasi Form
        $response2  = $this->actingAs($user)->patch(route('jurusans.update', $jurusan->id), [
            'nama_jurusan'      => '',
            'nama_dekan'        => 'Muhammad',
            'jumlah_mahasiswa'  => null,
        ]);
        $response2->assertInvalid();
        $response2->assertStatus(302);
        $response2->assertRedirect(route('jurusans.edit', $jurusan));

        // Response Update Jurusan
        $response3  = $this->actingAs($user)->patch(route('jurusans.update', $jurusan->id), [
            'nama_jurusan'      => 'Sistem Informasi',
            'nama_dekan'        => 'Safei',
            'jumlah_mahasiswa'  => 25
        ]);
        $response3->assertValid();
        $response3->assertStatus(302);
        $response3->assertRedirect('/jurusans/' . $jurusan->id);
        $response3->assertSessionHas('pesan');
    }

    public function test_user_delete_jurusan() {
        $user       = User::factory()->create([
            'email'     => 'admin@test.com',
        ]);

        $jurusan    = Jurusan::create([
            'id'                => 13,
            'nama_jurusan'      => 'Teknik Informatika',
            'nama_dekan'        => 'Muhammad',
            'jumlah_mahasiswa'  => 12,
        ]);

        // Response ke Halaman List Jurusan
        $response1  = $this->actingAs($user)->get('/');
        $response1->assertStatus(200);
        $response1->assertSeeText(method_exists('DELETE', $jurusan));

        // Response Delete jurusan
        $response2  = $this->actingAs($user)->delete(route('jurusans.destroy', $jurusan->id));
        $response2->assertStatus(302);
        $response2->assertRedirect('/');
        $response2->assertSessionHas('pesan');
    }

    public function test_user_show_jurusan() {
        $user       = User::factory()->create([
            'email'     => 'admin@test.com',
        ]);

        $jurusan    = Jurusan::create([
            'id'                => 14,
            'nama_jurusan'      => 'Teknik Informatika',
            'nama_dekan'        => 'Safei',
            'jumlah_mahasiswa'  => 15,
        ]);

        // Response ke Halaman List Jurusan
        $response1  = $this->actingAs($user)->get('/');
        $response1->assertStatus(200);
        $response1->assertSeeText($jurusan->nama_jurusan);

        // Response Show Juruan
        $response2  = $this->actingAs($user)->get(route('jurusans.show', $jurusan));
        $response2->assertStatus(200);
        $response2->assertViewIs('jurusan.show', compact('jurusan'));
        $response2->assertSeeText('Info Jurusan');
    }
}
