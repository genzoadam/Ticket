<?php

namespace Tests\Unit;
use App\User;
use App\Pesawat;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PesawatTest extends TestCase
{
	use DatabaseTransactions;

    public function testCrudPesawat()
    {
        $pesawat = Pesawat::create(['name' => 'Sriwijaya Air']);
        $this->assertDatabaseHas('pesawats', ['name' => 'Sriwijaya Air']);

        Pesawat::find($pesawat->id)->update(['name' => 'Batik Air']);
        $this->assertDatabaseHas('pesawats', ['name'=>'Batik Air']);

        Pesawat::destroy($pesawat->id);
        $this->assertDatabaseMissing('pesawats', ['name' => 'Batik Air']);
    }

    public function testHttpTambahPesawat()
    {
    	$user = User::find(1);

    	$respon = $this->actingAs($user)->json('POST', route('pesawats.store'), ['name' => 'Citilink']);
    	$respon->assertStatus(302)
    	       ->assertRedirect(route('pesawats.index'));

    	$respon2 = $this->get($respon->headers->get('location'))->assertSee('Berhasil menambahkan pesawat Citilink');

    	$this->assertDatabaseHas('pesawats', ['name' => 'Citilink']);
    }

    public function testHttpEditPesawat()
    {
        $pesawat = Pesawat::create(['name' => 'Qatar Airways']);
        $user = User::find(1);

        $respon = $this->actingAs($user)->get(route('pesawats.edit', $pesawat->id));
        $respon->assertStatus(200)
               ->assertSee('Ubah Pesawat');
    }

    public function testHttpUpdatePesawat()
    {
        $pesawat = Pesawat::create(['name' => 'Qatar Airways']);
        $user = User::find(1);

        $respon = $this->actingAs($user)->json('POST', route('pesawats.update', $pesawat->id), ['_method'=>'PUT', 'name' => 'British Airways']);
        $respon->assertStatus(302)
               ->assertRedirect(route('pesawats.index'));

        $respon2 = $this->get($respon->headers->get('location'))->assertSee("Berhasil merubah pesawat British Airways");
    }

    public function testHttpHapusPesawat()
    {
        $pesawat = Pesawat::create(['name' => 'Qatar Airways']);
        $user = User::find(1);

        $respon = $this->actingAs($user)->json('POST', route('pesawats.destroy', $pesawat->id), ['_method' =>'DELETE']);
        $respon->assertStatus(302)
               ->assertRedirect(route('pesawats.index'));

        $respon2 = $this->get($respon->headers->get('location'))->assertSee('Berhasil menghapus pesawat');
    }
}
