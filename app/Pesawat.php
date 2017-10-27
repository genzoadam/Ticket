<?php

namespace App;

use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;

class Pesawat extends Model
{
    protected $fillable = ['name'];

    public function tickets(){
    	return $this->hasMany('App\Ticket');
    }
    public static function boot()
    {
    	parent::boot();

    	self::deleting(function($pesawat){
    		//mengecek apakah pesawat masih punya tiket
    		if ($pesawat->tickets->count() > 0) {
    			# menyiapkan pesan error
    			$html  = 'Pesawat tidak bisa dihapus karena masih memiliki tiket : ';
    			$html .= '<ul>';
    			 foreach ($pesawat->tickets as $ticket) {
    			 	$html .="<li>$ticket->lokasi ke $ticket->tujuan</li>";
    			 }
    			 $html .= '</ul>';

    			 Session::flash("flash_notification", [
    			 	"level"  => "danger",
    			 	"message"=> $html 
    			 ]);

    			 //membatalkan proses penghapusan
    			 return false;
    		}
    	});
    }
}
