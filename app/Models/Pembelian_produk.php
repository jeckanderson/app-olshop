<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pembelian_produk extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pembelian_product';
    protected $guarded = 'id_pembelian_product';
    // public $timestamps = false;
    // protected $fillable = ['id_pembelian','id_produk','jumlah','created_at','updated_at'];
    // protected $table = 'Pembelian_produk';
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function pembelian()
    {
        return $this->belongsTo(Pembelian::class);
    }
}
