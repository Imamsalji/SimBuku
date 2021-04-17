<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $primaryKey = 'id_buku';
    protected $table = 'tbl_buku';
    protected $fillable = ['judul','noisbn','penulis','penerbit','tahun','stok','harga_pokok','harga_jual','ppn','diskon'];

}
