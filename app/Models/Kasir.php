<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    protected $table = "kasirs";
    protected $fillable = [
        'nama_kasir','alamat_kasir','no_telp','aktivitas'
    ];
}
