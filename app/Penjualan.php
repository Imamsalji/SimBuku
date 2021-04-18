<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    
    protected $table = 'tbl_penjualan';
    protected $guarded  = [];
    public function buku()
    {
        return $this->belongsTo(Buku::class,'id_buku','id_buku');
    }
    public function kasir()
    {
        return $this->belongsTo(User::class,'id_kasir','id');
    }
}
