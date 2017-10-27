<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = ['name'];

    public function tickets()
    {
    	return $this->hasMany('App\Ticket');
    }
}
