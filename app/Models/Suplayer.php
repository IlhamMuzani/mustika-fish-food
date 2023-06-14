<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suplayer extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'alamat'
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}