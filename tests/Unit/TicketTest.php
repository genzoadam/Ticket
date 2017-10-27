<?php

namespace Tests\Unit;
use App\Ticket;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CrudTest extends TestCase
{
   use DatabaseTransactions;

    public function testCrudTicket()
    {
    	//TEST MENAMBAHKAN TICKET
        //$this->assertTrue(true);

        $ticket = Ticket::create(["lokasi_id" => "Bandar Lampung","tujuan_id" => "Jogjakarta", "pesawat_id" => "2", "kelas_id" => "Economy", "fasilitas" => "20kg", "harga"=>"300.000 IDR"
        ]);
		$this->assertDatabaseHas('tickets', [
		         'lokasi_id' => 'Bandar Lampung','tujuan_id' => "Jogjakarta", 'pesawat_id'=> "2", 'kelas_id' => 'Economy', 'fasilitas' => "20kg", 'harga' => "300.000 IDR"
		]);

		//TEST UPDATE TICKET
	    Ticket::find($ticket->id)->update(["lokasi_id" => "Moscow","tujuan_id" =>"London", "pesawat_id" => "1", "kelas_id" => "Business", "fasilitas" => "30kg, food & drink", "harga"=>"1.200.000IDR"]);
		$this->assertDatabaseHas('tickets', [
		         'lokasi_id' => 'Moscow','tujuan_id' => "London", 'pesawat_id'=> "1", 'kelas_id' => 'Business', 'fasilitas' => "30kg, food & drink", 'harga'=>"1.200.000IDR"
		]);

		//TEST HAPUS TICKET
		Ticket::destroy($ticket->id);
				$this->assertDatabaseMissing('tickets', [
					'lokasi_id' => 'Moscow','tujuan_id' => "London", 'pesawat_id'=> "1", 'kelas_id' => 'Business', 'fasilitas' => "30kg, food & drink", 'harga'=>"1.200.000IDR"
		]);
    }

    public function testHttpTambahTicket()
    {

        //login user -> admin
        $user = User::find(1);

        $response = $this->actingAs($user)->json('POST', route('tickets.store'), ["lokasi_id" => "4", "tujuan_id" => "7", "pesawat_id" => "2", "kelas_id" => "3", "fasilitas" => "20kg", "harga"=>"300.000 IDR"]);

        $response->assertStatus(302)
                 ->assertRedirect(route('tickets.index'));
        

        $response2 = $this->get($response->headers->get('location'))->assertSee('Berhasil menambahkan tiket ');

        $this->assertDatabaseHas("tickets",["lokasi_id" => "4","tujuan_id" => "7", "pesawat_id" => "2", "kelas_id" => "3", "fasilitas" => "20kg", "harga"=>"300.000 IDR"]);
    
    }

   public function testHttpEditTicket()
    {
        $ticket = Ticket::create(["lokasi_id" => "22","tujuan_id" => "25", "pesawat_id" => "2", "kelas_id" => "Business", "fasilitas" => "20kg", "harga"=>"300.000 IDR"]);
        $user = User::find(1);

        $respon = $this->actingAs($user)->get(route('tickets.edit', $ticket->id));
        $respon->assertStatus(200)
               ->assertSee('Ubah Tiket');
    }

    public function testHttpUpdateTicket()
    {
        $ticket = Ticket::create(["lokasi_id" => "21","tujuan_id" => "11", "pesawat_id" => "2", "kelas_id" => "Economy", "fasilitas" => "20kg", "harga"=>"300.000 IDR"]);
        $user = User::find(1);

        $respon = $this->actingAs($user)->json('POST', route('tickets.update', $ticket->id), ['_method'=>'PUT', "lokasi_id" => "15","tujuan_id" => "16", "pesawat_id" => "2", "kelas_id" => "Premium", "fasilitas" => "20kg", "harga"=>"500.000 IDR"]);
        $respon->assertStatus(302)
               ->assertRedirect(route('tickets.index'));

        $respon2 = $this->get($respon->headers->get('location'))->assertSee("Berhasil menyimpan ");
    }

    public function testHttpHapusTicket()
    {
        $ticket = Ticket::create(["lokasi_id" => "17","tujuan_id" => "8", "pesawat_id" => "2", "kelas_id" => "Business", "fasilitas" => "20kg", "harga"=>"300.000 IDR"]);
        $user = User::find(1);

        $respon = $this->actingAs($user)->json('POST', route('tickets.destroy', $ticket->id), ['_method' =>'DELETE']);
        $respon->assertStatus(302)
               ->assertRedirect(route('tickets.index'));

        $respon2 = $this->get($respon->headers->get('location'))->assertSee('Berhasil menghapus tiket');
    }

}
