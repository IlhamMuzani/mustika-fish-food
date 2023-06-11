<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_pembeli',
        'ikan_id',
        'pakan_id',
        'kategori_produk',
        'tanggal',
        'jumlah_jual',
        'harga_jual'
    ];

    public function ikan()
    {
        return $this->belongsTo(Ikan::class, "ikan_id", "id");
    }
    public function pakan()
    {
        return $this->belongsTo(Ikan::class, "pakan_id", "id");
    }
}