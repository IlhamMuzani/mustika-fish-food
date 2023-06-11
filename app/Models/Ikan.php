<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ikan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 
        'kategori',
        'jenis_ikan',
        'stok',
        'gambar'
    ];
    public function pakan()
    {
        return $this->hasMany(Pakan::class);
    }
    
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}