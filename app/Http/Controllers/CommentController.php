<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Product;

class CommentController extends Controller
{
    public function getXoa($id, $idTinTuc)
    {
       $comment = Comment::find($id);
       $comment->delete();

       return redirect('admin/tintuc/sua/'.$idTinTuc)->with('thongbao','Xóa bình luận thành công');
    }
    public function postComment(Request $request, $id)
    {
    	$product = Product::find($id);
    	$comment = new Comment;
    	$comment->product_id = $id;
    	$comment->user_id = Auth::user()->id;
    	$comment->content = $request->content;
    	$comment->save();
    	return redirect("chi-tiet-san-pham/".$product->id)->with('thongbao','Đăng bình luận thành công');
    }
}
