<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pembelian extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pembelian';
    protected $guarded = 'id_pembelian';
    // protected $fillable  = ['id_pembelian'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pembelian_produk()
    {
        return $this->hasMany(Pembelian_produk::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
