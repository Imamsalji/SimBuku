<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasok extends Model
{
    protected $primaryKey = 'id_pasok';
    protected $table = 'tbl_pasok';
    protected $fillable = ['id_distributor','id_buku','jumlah','tanggal'];

    public function distributor()
    {
        return $this->belongsTo(Distributor::class,'id_distributor','id_distributor');
    }
    public function buku()
    {
        return $this->belongsTo(Buku::class,'id_buku','id_buku');
    }
}
