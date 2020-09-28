<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function billdetail(){
        return $this->belongsTo('App\BillDetail','id_product','id');
    }
}
