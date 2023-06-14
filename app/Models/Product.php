<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 
        'kategori',
        'suplayer_id',
        'jenis',
        'harga',
        'stok',
        'gambar'
    ];

    public function suplayer()
    {
        return $this->belongsTo(Suplayer::class, "suplayer_id", "id");
    }
    
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}