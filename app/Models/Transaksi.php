<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = "transaksis",
        $fillable = [
        'kode_transaksi',
        'product_id',
        'kategori_produk',
        'tanggal',
        'jumlah_jual',
        'harga_jual'
    ];

    public static function getId()
    {
        return $getId = DB::table('transaksis')->orderBy('id', 'DESC')->take(1)->get();
    }


    public function product()
    {
        return $this->belongsTo(Product::class, "product_id", "id");
    }
}