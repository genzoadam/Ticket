<?php

namespace App\Http\Controllers;

use Session;
use App\Pesawat;
use App\Http\Requests\StorePesawatRequest;
use App\Http\Requests\UpdatePesawatRequest;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Datatables;
use Illuminate\Http\Request;

class PesawatsController extends Controller
{

    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $pesawats = Pesawat::select(['id', 'name']);
            return Datatables::of($pesawats)
             ->addColumn('action', function($pesawats){
                return view('datatable._action', [
                    'model'    => $pesawats,
                    'form_url' => route('pesawats.destroy', $pesawats->id),
                    'edit_url' =>route('pesawats.edit', $pesawats->id),
                    'confirm_message' => 'Yakin ingin menghapus pesawat '. $pesawats->name . '?'
            ]);
             })->make(true  );
        }

        $html = $htmlBuilder
         ->addColumn(['data'=>'name', 'name'=>'name', 'title'=> 'Nama'])
         ->addColumn(['data'=>'action', 'name'=>'action', 'title'=> '', 'orderable'=>false, 'searchable'=>false]);

         return view('pesawats.index')->with(compact('html'));
    }

    public function create()
    {
        return view('pesawats.create');
    }

    public function store(StorePesawatRequest $request)
    {
        //$this->validate($request, ['name' => 'required|unique:pesawats']);
        $pesawat = Pesawat::create($request->only('name'));
         Session::flash("flash_notification", [
            "level"   => "success",
            "message" => "Berhasil menambahkan pesawat $pesawat->name"
         ]);
        return redirect()->route('pesawats.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $pesawat = Pesawat::find($id);
        return view('pesawats.edit')->with(compact('pesawat'));
    }

    public function update(UpdatePesawatRequest $request, $id)
    {
        //$this->validate($request, ['name' => 'required|unique:pesawats,name,'.$id]);
        $pesawat = Pesawat::find($id);
        $pesawat->update($request->only('name'));
         Session::flash("flash_notification", [
            "level"   => "success",
            "message" => "Berhasil merubah pesawat $pesawat->name"
         ]);
        return redirect()->route('pesawats.index');
    }

    public function destroy($id)
    {
        if(!Pesawat::destroy($id)) return redirect()->back();
         Session::flash("flash_notification", [
            "level"   => "success",
            "message" => "Berhasil menghapus pesawat"
        ]);
         return redirect()->route('pesawats.index');
    }
}
