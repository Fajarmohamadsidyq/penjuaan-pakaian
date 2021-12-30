<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    use HasFactory;

    protected $visible = ['nama_merk'];
    protected $fillable = ['nama_merk'];
    public $timestamps = true;

    public function pakaian()
    {
        return $this->hasMany('App\Models\pakaian', 'id_merk');
    }

}
