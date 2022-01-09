<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelanggan extends Model
{
    use HasFactory;

     protected $visible = ['nama', 'jk', 'alamat', 'no_tlpn'];
    protected $fillable = ['nama', 'jk', 'alamat', 'no_tlpn'];
    public $timestamps = true;

}
