<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'harga',
        'image',
        'description',
    ];
}