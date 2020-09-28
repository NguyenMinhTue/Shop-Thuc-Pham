<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = "slides";

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
