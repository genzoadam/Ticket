<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Datatables;
use App\Ticket;
use Laratrust\LaratrustFacade as Laratrust;

class TamuController extends Controller
{
    public function index(Request $request, Builder $htmlBuilder)
    {
    	if ($request->ajax())
    	{
    		$tickets = Ticket::with(['pesawat', 'lokasi', 'tujuan', 'kelas']);
    		return Datatables::of($tickets)
    		 ->addColumn('action', function($ticket){
    		 	if (Laratrust::hasRole('admin')) return '<a class="btn btn-xs btn-success" href="#">Detail</a>';
    		 	return	'<a class="btn btn-xs btn-primary" href="#">Pesan</a>';
    		 	 })->make(true);
    	}

    $html = $htmlBuilder
        ->addColumn(['data'=>'lokasi.name', 'name'=>'lokasi.name', 'title'=>'Lokasi'])
        ->addColumn(['data'=>'tujuan.name', 'name'=>'tujuan.name', 'title'=>'Tujuan'])
        ->addColumn(['data'=>'pesawat.name', 'name'=>'pesawat.name', 'title'=>'Pesawat'])
        ->addColumn(['data'=>'kelas.name', 'name'=>'kelas.name', 'title'=>'Kelas'])
        ->addColumn(['data'=>'fasilitas', 'name'=>'fasilitas', 'title'=>'Fasilitas'])
        ->addColumn(['data'=>'harga', 'name'=>'harga', 'title'=>'Harga'])
                ->addColumn(['data'=>'action', 'name'=>'action','title'=>'', 'orderable'=>false, 'searchable'=>false]);
        return view('tamus.index')->with(compact('html'));
    }
}
