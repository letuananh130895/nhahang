<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewController extends Controller
{
    //
    public function getDanhsach(){
    	$new = News::all();
    	return view('admin.new.danhsach',compact('new'));
    }
    public function getThem(){
    	return view('admin.new.them');
    }
    public function postThem(Request $re){
    	$this->validate($re,
    		[
    		   'tieude'=>'required|min:3',
    		   'noidung'=>'required'
    		],[
    		   'tieude.required'=>'Ban can dien tieu de',
    		   'tieude.min'=>'Tieu de co it nhat 3 ki tu',
    		   'noidung.required'=>'Ban can nhap noi dung'
    		]);
    	$new = new News;
    	$new->title = $re->tieude;
    	$new->content = $re->noidung;

    	if($re->hasFile('hinh'))
    	{
    		$file = $re->file('hinh');
    		$duoi = $file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
    		{
    			return redirect('admin/new/them')->with('loi','Chỉ được chọn file có đuôi jpg, png, jpeg');
    		}
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;
            while(file_exists("upload/new/".$Hinh))
            {
            	$Hinh = str_random(4)."_".$name;
            }
            $file->move("upload/new",$Hinh);
            $new->image = $Hinh;
    	}
    	else
    	{
    		$new->image = "";
    	}
    	$new->save();
    	return back()->with('thongbao','Bạn đã thêm new thành công');

    }
    public function getSua($id){
    	$new = News::find($id);
    	return view('admin.new.sua',compact('new'));
    }
    public function postSua($id,Request $request){
    	$this->validate($request,
    		[
    		   'tieude'=>'required|min:3',
    		   'noidung'=>'required'
    		],[
    		   'tieude.required'=>'Ban can dien tieu de',
    		   'tieude.min'=>'Tieu de co it nhat 3 ki tu',
    		   'noidung.required'=>'Ban can nhap noi dung'
    		]);
    	$new = News::find($id);
    	$new->title = $request->tieude;
    	$new->content = $request->noidung;
    	if($request->hasFile('hinh'))
        {
            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/new/sua/'.$id)->with('loi','Chi duoc chon file co duoi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;
            while(file_exists("upload/new/".$Hinh))
            {
                $Hinh = str_random(4)."_".$name;
            }

            $file->move("upload/new",$Hinh);
            if (file_exists("upload/new/".$new->image)) {
            	unlink("upload/new/".$new->image);
        	}
            $new->image = $Hinh;
        }
        $new->save();
        return back()->with('thongbao','Bạn đã sửa thành công new');
    }
    public function getXoa($id){
    	$new = News::find($id);
    	$new->delete();
    	return back()->with('thongbao','Bạn đã xóa new thành công');
    }
}
