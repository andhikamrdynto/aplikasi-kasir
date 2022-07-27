<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = "laporans";
    protected $fillable = [
        'waktu_tanggal','laporan_transaksi','laporan_pendapatan_harian'
    ];
}
