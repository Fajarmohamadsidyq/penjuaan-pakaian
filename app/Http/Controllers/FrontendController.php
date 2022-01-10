<?php

namespace App\Http\Controllers;
use App\Models\merk;
use App\Models\jenisBarang;
use App\Models\supplier;
use App\Models\pakaian;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $pakaian = pakaian::all();
        return view('layouts.frontend' , compact('pakaian'));
    }
}
