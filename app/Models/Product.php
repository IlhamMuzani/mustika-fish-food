<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products',
    $fillable = [
        'nama', 
        'kode_product',
        'kategori',
        'suplayer_id',
        'jenis',
        'harga',
        'stok',
        'gambar'
    ];

    public static function getId()
    {
        return $getId = DB::table('products')->orderBy('id', 'DESC')->take(1)->get();
    }

    public function suplayer()
    {
        return $this->belongsTo(Suplayer::class, "suplayer_id", "id");
    }
    
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}