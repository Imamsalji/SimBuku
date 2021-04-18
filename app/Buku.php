<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $primaryKey = 'id_buku';
    protected $table = 'tbl_buku';
    protected $fillable = ['judul','noisbn','penulis','penerbit','tahun','stok','harga_pokok','harga_jual','ppn','diskon'];
    public function pasok()
    {
        return $this->hasMany(Pasok::class);
    }
    public function penjualan()
    {
        return $this->hasMany(Penjualan::class);
    }
    public function temp()
    {
        return $this->hasMany(Temp::class);
    }
}

