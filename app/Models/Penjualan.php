<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pelangan;

class Penjualan extends Model
{
    protected $fillable = ['pelangan_id', 'tanggal_penjualan', 'total_harga'];
    
    public function pelangan()
    {
      return $this->belongsTo(Pelangan::class, 'pelangan_id');
    }
}
