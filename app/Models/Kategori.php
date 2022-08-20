<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = "kategoris";
    protected $fillable = [
        'daftar_menu_id','kategori'
    ];

    public function menu(){
        return $this->belongsTo(Menu::class, 'daftar_menu_id');
    }
}

