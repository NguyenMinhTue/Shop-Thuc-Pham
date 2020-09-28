<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = "detail";
    public function product(){
        return $this->hasOne('App\Product','id','id_product');
    }
    public function bills(){
        return $this->belongsTo('App\Bill','id_bill','id');
    }

}
