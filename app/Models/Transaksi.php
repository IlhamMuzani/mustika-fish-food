<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_pembeli',
        'product_id',
        'kategori_produk',
        'tanggal',
        'jumlah_jual',
        'harga_jual'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, "product_id", "id");
    }
}