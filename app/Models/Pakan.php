<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pakan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'ikan_id',
        'stok',
        'gambar'
    ];

    public function ikan()
    {
        return $this->belongsTo(Ikan::class, "ikan_id", "id");
    }
    
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
    
}