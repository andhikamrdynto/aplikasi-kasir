<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = "admins";
    protected $fillable = [
        'nama_manager','no_telp_manager','alamat_manager','nama_kasir','aktivitas'
    ];
}
