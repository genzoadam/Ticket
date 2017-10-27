<?php

use Illuminate\Database\Seeder;
use App\Pesawat;
use App\Ticket;
use App\Pemesanan;
use App\User;
use App\Kelas;
use App\Lokasi;
use App\Tujuan;

class TicketsSeeder extends Seeder
{

    public function run()
    {
        //sample pesawat
        $pesawat1 = Pesawat::create(['name' => 'Lion Air']);
        $pesawat2 = Pesawat::create(['name' => 'Garuda Indonesia']);
        $pesawat3 = Pesawat::create(['name' => 'Fly Emirates']);

        //sample kelas

        $kelas1 = Kelas::create(['name' => 'Economy']);
        $kelas2 = Kelas::create(['name' => 'Business']);
        $kelas3 = Kelas::create(['name' => 'Premium']);

        //SAMPLE Lokasi

        $lokasi = Lokasi::create(['name' => 'Batam (BTH)']);
        $lokasi1 = Lokasi::create(['name' => 'Banda Aceh (BTJ)']);
        $lokasi2 = Lokasi::create(['name' => 'Deli Serdang (KNO)']);
        $lokasi3 = Lokasi::create(['name' => 'Kota Padang (PDG)']);
        $lokasi4 = Lokasi::create(['name' => 'Pekanbaru (PKU)']);
        $lokasi5 = Lokasi::create(['name' => 'Palembang (PLM)']);
        $lokasi6 = Lokasi::create(['name' => 'Tanjungpinang (TNJ)']);
        $lokasi7 = Lokasi::create(['name' => 'Bengkulu (BKS)']);
        $lokasi8 = Lokasi::create(['name' => 'Bandar Lampung (TKG)']);
        $lokasi9 = Lokasi::create(['name' => 'Siborong-Borong (DTB)']);
        $lokasi10 = Lokasi::create(['name' => 'Bandung (BDO)']);
        $lokasi11 = Lokasi::create(['name' => 'Tangerang (CGK)']);
        $lokasi12 = Lokasi::create(['name' => 'Yogyakarta (JOG)']);
        $lokasi13 = Lokasi::create(['name' => 'Solo (SOC)']);
        $lokasi14 = Lokasi::create(['name' => 'Semarang (SRG)']);
        $lokasi15 = Lokasi::create(['name' => 'Surabaya (SUB)']);
        $lokasi16 = Lokasi::create(['name' => 'Masalembo (MSI)']);
        $lokasi17 = Lokasi::create(['name' => 'Denpasar (DPS)']);
        $lokasi18 = Lokasi::create(['name' => 'Lombok Tengah (LOP)']);
        $lokasi19 = Lokasi::create(['name' => 'Tarakan (TRK)']);
        $lokasi20 = Lokasi::create(['name' => 'Berau (BEJ)']);
        $lokasi21 = Lokasi::create(['name' => 'Banjarmasin (BDJ)']);
        $lokasi22 = Lokasi::create(['name' => 'Samarinda (-)']);
        $lokasi23 = Lokasi::create(['name' => 'Pontianak (PNK)']);
        $lokasi24 = Lokasi::create(['name' => 'Palangkaraya (PKY)']);
        $lokasi25 = Lokasi::create(['name' => 'Balikpapan (BPN)']);
        $lokasi26 = Lokasi::create(['name' => 'Tabalong (-)']);
        $lokasi27 = Lokasi::create(['name' => 'Manado (MDC)']);
        $lokasi28 = Lokasi::create(['name' => 'Makassar (UPG)']);
        $lokasi29 = Lokasi::create(['name' => 'Kendari (KDI)']);
        $lokasi30 = Lokasi::create(['name' => 'Nabire (NBX)']);
        $lokasi31 = Lokasi::create(['name' => 'Oksibil (ORG)']);
        $lokasi32 = Lokasi::create(['name' => 'Jayapura (DJJ)']);
        $lokasi33 = Lokasi::create(['name' => 'Biak (BIK)']);
        $lokasi34 = Lokasi::create(['name' => 'Tembagapura (TIM)']);
        $lokasi35 = Lokasi::create(['name' => 'Merauke (MKQ)']);
        $lokasi36 = Lokasi::create(['name' => 'Jakarta (HLP)']);

        //sample tujuan
        $tujuan = Tujuan::create(['name' => 'Batam (BTH)']);
        $tujuan1 = Tujuan::create(['name' => 'Banda Aceh (BTJ)']);
        $tujuan2 = Tujuan::create(['name' => 'Deli Serdang (KNO)']);
        $tujuan3 = Tujuan::create(['name' => 'Kota Padang (PDG)']);
        $tujuan4 = Tujuan::create(['name' => 'Pekanbaru (PKU)']);
        $tujuan5 = Tujuan::create(['name' => 'Palembang (PLM)']);
        $tujuan6 = Tujuan::create(['name' => 'Tanjungpinang (TNJ)']);
        $tujuan7 = Tujuan::create(['name' => 'Bengkulu (BKS)']);
        $tujuan8 = Tujuan::create(['name' => 'Bandar Lampung (TKG)']);
        $tujuan9 = Tujuan::create(['name' => 'Siborong-Borong (DTB)']);
        $tujuan10 = Tujuan::create(['name' => 'Bandung (BDO)']);
        $tujuan11 = Tujuan::create(['name' => 'Tangerang (CGK)']);
        $tujuan12 = Tujuan::create(['name' => 'Yogyakarta (JOG)']);
        $tujuan13 = Tujuan::create(['name' => 'Solo (SOC)']);
        $tujuan14 = Tujuan::create(['name' => 'Semarang (SRG)']);
        $tujuan15 = Tujuan::create(['name' => 'Surabaya (SUB)']);
        $tujuan16 = Tujuan::create(['name' => 'Masalembo (MSI)']);
        $tujuan17 = Tujuan::create(['name' => 'Denpasar (DPS)']);
        $tujuan18 = Tujuan::create(['name' => 'Lombok Tengah (LOP)']);
        $tujuan19 = Tujuan::create(['name' => 'Tarakan (TRK)']);
        $tujuan20 = Tujuan::create(['name' => 'Berau (BEJ)']);
        $tujuan21 = Tujuan::create(['name' => 'Banjarmasin (BDJ)']);
        $tujuan22 = Tujuan::create(['name' => 'Samarinda (-)']);
        $tujuan23 = Tujuan::create(['name' => 'Pontianak (PNK)']);
        $tujuan24 = Tujuan::create(['name' => 'Palangkaraya (PKY)']);
        $tujuan25 = Tujuan::create(['name' => 'Balikpapan (BPN)']);
        $tujuan26 = Tujuan::create(['name' => 'Tabalong (-)']);
        $tujuan27 = Tujuan::create(['name' => 'Manado (MDC)']);
        $tujuan28 = Tujuan::create(['name' => 'Makassar (UPG)']);
        $tujuan29 = Tujuan::create(['name' => 'Kendari (KDI)']);
        $tujuan30 = Tujuan::create(['name' => 'Nabire (NBX)']);
        $tujuan31 = Tujuan::create(['name' => 'Oksibil (ORG)']);
        $tujuan32 = Tujuan::create(['name' => 'Jayapura (DJJ)']);
        $tujuan33 = Tujuan::create(['name' => 'Biak (BIK)']);
        $tujuan34 = Tujuan::create(['name' => 'Tembagapura (TIM)']);
        $tujuan35 = Tujuan::create(['name' => 'Merauke (MKQ)']);
        $tujuan36 = Tujuan::create(['name' => 'Jakarta (HLP)']);


        //sample ticket
        $ticket1 = Ticket::create(['lokasi_id'=>$lokasi9->id, 'tujuan_id'=>$tujuan8->id, 'pesawat_id'=>$pesawat1->id, 'kelas_id'=>$kelas1->id, 'Fasilitas'=>'20kg', 'harga'=>'600.000 IDR']);
        $ticket2 = Ticket::create(['lokasi_id'=>$lokasi5->id, 'tujuan_id'=>$tujuan4->id, 'pesawat_id'=>$pesawat2->id,'kelas_id'=>$kelas2->id, 'Fasilitas'=>'20kg', 'harga'=>'500.000 IDR']);
        $ticket3 = Ticket::create(['lokasi_id'=>$lokasi1->id, 'tujuan_id'=>$tujuan7->id, 'pesawat_id'=>$pesawat3->id,'kelas_id'=>$kelas2->id , 'Fasilitas'=>'20kg', 'harga'=>'1.000.000 IDR' ]);
        $ticket4 = Ticket::create(['lokasi_id'=>$lokasi1->id, 'tujuan_id'=>$tujuan->id, 'pesawat_id'=>$pesawat3->id,'kelas_id'=>$kelas3->id, 'Fasilitas'=> '20kg', 'harga'=>'1.600.000 IDR']);

        //sample pemesanan

      /* $member = User::where('email', 'member@ticket.com')->first();
        Pemesanan::create(['user_id'=>$member->id, 'ticket_id'=>$ticket1->id, 'is_paid' => 0]);
        Pemesanan::create(['user_id'=>$member->id, 'ticket_id'=>$ticket2->id, 'is_paid' => 0]);
        Pemesanan::create(['user_id'=>$member->id, 'ticket_id'=>$ticket3->id, 'is_paid' => 1]);*/
    }
}
