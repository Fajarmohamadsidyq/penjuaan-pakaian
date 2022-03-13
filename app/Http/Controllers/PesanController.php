<?php

namespace App\Http\Controllers;

use App\Models\pesan;
use App\Models\pakaian;
use App\Models\detailPembelian;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id)
    {
        $pakaian = pakaian::where('id', $id)->first();

        return view('pesan.index', compact('pakaian'));
    }

    public function pesan(Request $request, $id)
    {
        $pakaian = pakaian::where('id', $id)->first();
        return view('pesan.co',compact('pakaian'));
    }
    
    // public function checkout($id){

    //     return view('pesan.co');
    // }


}
