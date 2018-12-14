<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;

class AjaxController extends Controller
{
    //
    public function getSanpham($id){
    	$pt = ProductType::find($id);
    	$product = $pt->product;
    	foreach($product as $p){
    		echo '<option value="'.$p->id.'">'.$p->name.'</option>';
    	}
    }
}
