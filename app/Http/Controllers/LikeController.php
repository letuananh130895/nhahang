<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;

class LikeController extends Controller
{
    public function postLike(Request $request){
    	$lsp = $request->uathich;
    	if($lsp){
	    	$daco = Like::where('id_type', $lsp)->get();
	    	$c = null;
	    	$id = null;
	    	foreach ($daco as $d) {
	    		$id = $d->id;
	    		$c = $d->click;
	    	}
	    	$c = $c + 1;
	    	if($c > 1){
	    		$like = Like::find($id);
	    		$like->click = $c;
	    		$like->save();
	    		return back();
	    	}else{
	    		$like = new Like;
	    		$like->id_type = $lsp;
	    		$like->click = 1;
	    		$like->save();
	    		return back();
	    	}
    	}
    	return back();

    }
}
