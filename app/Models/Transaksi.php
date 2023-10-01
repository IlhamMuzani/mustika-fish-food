<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'kode',
        'nama',
    ];

    public function detail_transaksis()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}