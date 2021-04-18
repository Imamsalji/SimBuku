<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $primaryKey = 'id_distributor';
    protected $table = 'tbl_distributor';
    protected $guarded  = [];
    public function pasok()
    {
        return $this->hasMany(Pasok::class,'id_distributor','id_distributor');
    }
}
