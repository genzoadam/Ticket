<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['lokasi_id', 'tujuan_id', 'pesawat_id', 'kelas_id', 'fasilitas', 'harga'];

    public function lokasi(){
        return $this->hasOne('App\Lokasi','id', 'lokasi_id');
    }
      public function tujuan(){
        return $this->hasOne('App\Tujuan', 'id', 'tujuan_id');
    }
    public function pesawat(){
    	return $this->hasOne('App\Pesawat', 'id', 'pesawat_id');
    }
    public function kelas(){
    	return $this->hasOne('App\Kelas', 'id', 'kelas_id');
    }


}
