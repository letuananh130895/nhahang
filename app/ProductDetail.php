<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $table = "products_detail";
    public function product(){
    	return $this->belongsTo('App\Product','id_product','id');
    }
}
