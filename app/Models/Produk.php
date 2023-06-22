<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama', 
        'kategori_id',
        'supplier_id',
        'harga',
        'stok',
        'gambar',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}