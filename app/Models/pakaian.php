<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pakaian extends Model
{
    use HasFactory;

    protected $visible = ['nama', 'id_merk', 'id_jenis', 'harga', 'id_supplier'];
    protected $fillable = ['nama', 'id_merk', 'id_jenis', 'harga', 'id_supplier'];
    public $timestamps = true;

    public function merk()
    {
        return $this->belongsTo('App\Models\merk', 'id_merk');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Models\supplier', 'id_supplier');
    }

    public function jenisBarang()
    {
        return $this->belongsTo('App\Models\jenisBarang', 'id_jenis');
    }
}
