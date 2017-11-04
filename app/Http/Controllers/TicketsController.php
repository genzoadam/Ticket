<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Lokasi;
use App\Tujuan;
use App\Pesawat;
use App\Kelas;
//use App\Http\Requests\StoreTicketRequest;
//use App\Http\Requests\UpdateTicketRequest;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class TicketsController extends Controller
{

    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $tickets = Ticket::all();
            return Datatables::of($tickets)
            ->addColumn('action', function($ticket){
                return view('datatable._action', [
                    'model'   => $ticket,
                    'form_url'=> route('tickets.destroy', $ticket->id),
                    'edit_url'=> route('tickets.edit', $ticket->id),
                    'confirm_message' => 'Yakin mau menghapus '.$ticket->lokasi->name .' ke '.$ticket->tujuan->name.' ?'
                ]);
            })
            ->addColumn('lokasi_id', function($lokasi_di){
                $lokasi = Lokasi::where('id',$lokasi_di->lokasi_id)->get();
                foreach ($lokasi as $lok ) {
                  return $lok->name;
              }
          })
            ->addColumn('tujuan_id', function($tujuan_ke){
                $tujuan = Tujuan::where('id',$tujuan_ke->tujuan_id)->get();
                foreach ($tujuan as $tuj ) {
                  return $tuj->name;
              }
          }) 
            ->addColumn('pesawat_id', function($pesawat_pes){
                $pesawat = Pesawat::where('id',$pesawat_pes->pesawat_id)->get();
                foreach ($pesawat as $pes ) {
                  return $pes->name;
              }
          })
            ->addColumn('kelas_id', function($kelas_kel){
                $kelas = Kelas::where('id',$kelas_kel->kelas_id)->get();
                foreach ($kelas as $kel ) {
                  return $kel->name;
              }
          })->make(true);
        }

        $html = $htmlBuilder
        ->addColumn(['data'=>'lokasi_id', 'name'=>'lokasi_id', 'title'=>'Lokasi'])
        ->addColumn(['data'=>'tujuan_id', 'name'=>'tujuan_id', 'title'=>'Tujuan'])
        ->addColumn(['data'=>'pesawat_id', 'name'=>'pesawat_id', 'title'=>'Pesawat'])
        ->addColumn(['data'=>'kelas_id', 'name'=>'kelas_id', 'title'=>'Kelas'])
        ->addColumn(['data'=>'fasilitas', 'name'=>'fasilitas', 'title'=>'Fasilitas'])
        ->addColumn(['data'=>'harga', 'name'=>'harga', 'title'=>'Harga'])
        ->addColumn(['data'=>'action', 'name'=>'action','title'=>'', 'orderable'=>false, 'searchable'=>false]);
        return view('tickets.index')->with(compact('html'));
    }

    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        //KITA GUNAKAN VALIDASI DI STORETICKETREQUEST (nggak jadi)
       $request->validate([
        'lokasi_id'     => 'required|unique:tickets,lokasi_id',
        'tujuan_id'     => 'required|unique:tickets,tujuan_id',
        'pesawat_id' => 'required|exists:pesawats,id',
        'kelas_id' => 'required',
        'fasilitas' => 'required',
        'harga' => 'required',
    ]); 
       $ticket = Ticket::create($request->all());
        // isi field cover jika ada cover yang diupload 
      /*  if ($request->hasFile('cover')) { 
        // Mengambil file yang diupload
        $uploaded_cover = $request->file('cover');
        // mengambil extension file
        $extension = $uploaded_cover->getClientOriginalExtension();
        // membuat nama file random berikut extension
        $filename = md5(time()) . '.' . $extension;
        // menyimpan cover ke folder public/img
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
        $uploaded_cover->move($destinationPath, $filename);
        // mengisi field cover di book dengan filename yang baru dibuat
        $book->cover = $filename; 
        $book->save();
    }*/
    $ticket->save();
    Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menambahkan tiket ". $ticket->lokasi->name . " ke " . $ticket->tujuan->name
    ]);
    return redirect()->route('tickets.index');
}

public function show($id)
{
        //
}


public function edit($id)
{
    $ticket = Ticket::find($id);
    return view('tickets.edit')->with(compact('ticket'));
}

public function update(Request $request, $id)
{
        // KITA GUNAKAN VALIDASI DI UPDATETICKETREQUEST (nggak jadi)
   $request->validate([
    'lokasi_id'     => 'required|unique:tickets,lokasi_id,' . $id,
    'tujuan_id'     => 'required|unique:tickets,tujuan_id,    ' . $id,
    'pesawat_id' => 'required|exists:pesawats,id',
    'kelas_id' => 'required',
    'fasilitas' => 'required',
    'harga' => 'required',
]);

   $ticket = Ticket::find($id);
   $ticket->update($request->all());
       /* if ($request->hasFile('cover')) {
        // menambil cover yang diupload berikut ekstensinya
        $filename = null;
        $uploaded_cover = $request->file('cover');
        $extension = $uploaded_cover->getClientOriginalExtension();
        // membuat nama file random dengan extension
        $filename = md5(time()) . '.' . $extension;
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
        // memindahkan file ke folder public/img
        $uploaded_cover->move($destinationPath, $filename);
        // hapus cover lama, jika ada
        if ($book->cover) {
        $old_cover = $book->cover;
        $filepath = public_path() . DIRECTORY_SEPARATOR . 'img'
        . DIRECTORY_SEPARATOR . $book->cover;
        try {
        File::delete($filepath);
        } catch (FileNotFoundException $e) {
        // File sudah dihapus/tidak ada
        }
        }
        $book->cover = $filename;
        $book->save();
    }*/
    $ticket->save();
    Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan tiket ". $ticket->lokasi->name . " ke " . $ticket->tujuan->name
    ]);
    return redirect()->route('tickets.index');
}

public function destroy($id)
{
    $ticket = Ticket::find($id);
    if ($ticket) {
        $ticket->delete();
    }
    Session::flash("flash_notification", [
        "level"   => "danger",
        "message" => "Berhasil menghapus tiket"
    ]);

    return redirect()->route('tickets.index');
}

public function cari(){
    return view('tickets.cari');
}
}
