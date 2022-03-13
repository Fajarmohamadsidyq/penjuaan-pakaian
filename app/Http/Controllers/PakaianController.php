<?php

namespace App\Http\Controllers;

use App\Models\merk;
use App\Models\jenisBarang;
use App\Models\supplier;
use App\Models\pakaian;
use Illuminate\Http\Request;

class PakaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pakaian = pakaian::all();
        return view('pakaian.index' , compact('pakaian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pakaian = pakaian::all();
        $merk = merk::all();
        $supplier = supplier::all();
        $jenisBarang = jenisBarang::all();
        return view('pakaian.create', compact('pakaian', 'merk', 'supplier', 'jenisBarang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi data
        $validate = $request->validate([
            'nama' => 'required',
            'id_merk' => 'required',
            'id_jenis' => 'required',
            'bahan' => 'required',
            'ukuran' => 'required',
            'harga' => 'required',
            'id_supplier' => 'required',
        ]);

        $pakaian = new pakaian;
        $pakaian->nama = $request->nama;
        $pakaian->id_merk = $request->id_merk;
        $pakaian->id_jenis = $request->id_jenis;
        $pakaian->bahan = $request->bahan;
        $pakaian->ukuran = $request->ukuran;
        $pakaian->harga = $request->harga;
        $pakaian->id_supplier = $request->id_supplier;
        // upload image / foto
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('image/pakaian/', $name);
            $pakaian->foto = $name;
        }
        $pakaian->save();
        return redirect()->route('pakaian.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pakaian  $pakaian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pakaian = pakaian::findOrFail($id);
        $merk = merk::all();
        $supplier = supplier::all();
        $jenisBarang = jenisBarang::all();
        return view('pakaian.show', compact('pakaian', 'merk', 'supplier', 'jenisBarang'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pakaian  $pakaian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pakaian = pakaian::findOrFail($id);
        $merk = merk::all();
        $supplier = supplier::all();
        $jenisBarang = jenisBarang::all();
        return view('pakaian.edit', compact('pakaian', 'merk', 'supplier', 'jenisBarang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pakaian  $pakaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validasi data
        $validated = $request->validate([
            'nama' => 'required',
            'id_merk' => 'required',
            'id_jenis' => 'required',
            'bahan' => 'required',
            'ukuran' => 'required',
            'harga' => 'required',
            'id_supplier' => 'required',
        ]);

        $pakaian = pakaian::findOrFail($id);
        $pakaian->nama = $request->nama;
        $pakaian->id_merk = $request->id_merk;
        $pakaian->id_jenis = $request->id_jenis;
        $pakaian->bahan = $request->bahan;
        $pakaian->ukuran = $request->ukuran;
        $pakaian->harga = $request->harga;
        $pakaian->id_supplier = $request->id_supplier;
        // upload image / foto
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('image/pakaian/', $name);
            $pakaian->foto = $name;
        }
        $pakaian->save();

        return redirect()->route('pakaian.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pakaian  $pakaian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pakaian = pakaian::findOrFail($id);
        $pakaian->delete();
        return redirect()->route('pakaian.index');
    }

    public function cart($id)
    {
        $pakaian = pakaian::findOrFail($id);
        $merk = merk::all();
        $supplier = supplier::all();
        $jenisBarang = jenisBarang::all();
        return view('pesan.index', compact('pakaian', 'merk', 'supplier', 'jenisBarang'));


    }
}
