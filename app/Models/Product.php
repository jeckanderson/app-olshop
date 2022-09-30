<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // protected $fillable = ['nama_produk','harga_produk','berat','foto_produk','deskripsi_produk'];
    protected $guarded = ['id_produk'];
    protected $primaryKey = 'id_produk';

    public function pembelian_produk()
    {
        return $this->hasMany(Pembelian_produk::class);
    }

    public function pembelian()
    {
        return $this->hasMany(Pembelian::class);
    }

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }

}
