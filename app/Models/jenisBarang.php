<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenisBarang extends Model
{
    use HasFactory;

    protected $visible = ['jenis_barang', 'bahan', 'ukuran', 'harga'];
    protected $fillable = ['jenis_barang', 'bahan', 'ukuran', 'harga'];
    public $timestamps = true;

    public function pakaian()
    {
        return $this->hasMany('App\Models\pakaian', 'id_jenis');
    }

}
