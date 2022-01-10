<?php

namespace App\Http\Controllers;

use App\Models\chart;
use App\Models\pakaian;
use App\Models\pelanggan;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chart = chart::all();
        return view('chart.index' , compact('chart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelanggan = pelanggan::all();
        $pakaian = pakaian::all();
        $chart = chart::all();
        return view('chart.create', compact('pakaian', 'chart', 'pelanggan'));
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
            'id_pelanggan' => 'required',
            'id_pakaian' => 'required',
            'qty' => 'required',
            'total_harga' => 'required',
        ]);

        $chart = new chart;
        $chart->id_pelanggan = $request->id_pelanggan;
        $chart->id_pakaian = $request->id_pakaian;
        $chart->qty = $request->qty;
        $chart->total_harga = $request->total_harga;
        $chart->save();
        return redirect()->route('chart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chart = chart::findOrFail($id);
        $pelanggan = pelanggan::all();
        $pakaian = pakaian::all();
        return view('chart.show', compact('chart', 'pelanggan', 'pakaian'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chart = chart::findOrFail($id);
        $pelanggan = pelanggan::all();
        $pakaian = pakaian::all();
        return view('chart.edit', compact('chart', 'pelanggan', 'pakaian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validasi data
        $validate = $request->validate([
            'id_pelanggan' => 'required',
            'id_pakaian' => 'required',
            'qty' => 'required',
            'total_harga' => 'required',
        ]);

        $chart = chart::findOrFail($id);
        $chart->id_pelanggan = $request->id_pelanggan;
        $chart->id_pakaian = $request->id_pakaian;
        $chart->qty = $request->qty;
        $chart->total_harga = $request->total_harga;
        $chart->save();
        return redirect()->route('chart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chart = chart::findOrFail($id);
        $chart->delete();
        return redirect()->route('chart.index');
    }
}
