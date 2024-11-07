<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;

class DetailPenjualan extends Model
{
    protected $fillable = ['penjualan_id', 'produk_id', 'jumlah_produk',
    'subtotal'];
    
    public function produk()
    {
     return $this->belongsTo(Produk::class, 'produk_id');
    }
}
