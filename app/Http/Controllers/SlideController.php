<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    //
    public function getDanhsach(){
    	$slide = Slide::all();
    	return view('admin.slide.danhsach',compact('slide'));
    }
    public function getThem(){
    	return view('admin.slide.them');
    }
    public function postThem(Request $request){
    	if($request->useLink == "on"){
    		$this->validate($request,
    		[
    		   'link'=>'required'
    		],[
    		   'link.required'=>'Bạn cần nhập link hình ảnh',
    		]);
    		$slide = new Slide;
    		$slide->link = $request->link;
    		$slide->image = "";
    		$slide->save();
    		return back()->with('thongbao','Bạn đã thêm slide thành công');
    	}
    	else{
    		$slide = new Slide;
    		if($request->hasFile('hinh'))
    	    {
	    		$file = $request->file('hinh');
	    		$duoi = $file->getClientOriginalExtension();
	    		if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
	    		{
	    			return redirect('admin/slide/them')->with('loi','Chỉ được chọn file có đuôi jpg, png, jpeg');
	    		}
	            $name = $file->getClientOriginalName();
	            $Hinh = str_random(4)."_".$name;
	            while(file_exists("upload/slide/".$Hinh))
	            {
	            	$Hinh = str_random(4)."_".$name;
	            }
	            $file->move("upload/slide",$Hinh);
	            $slide->image = $Hinh;
    	    }
	    	else
	    	{
	    		$slide->image = "";
	    	}
	    	$slide->link = "";
	    	$slide->save();
	    	return back()->with('thongbao','Bạn đã thêm slide thành công');
    	}
    }
    public function getSua($id){
    	$slide = Slide::find($id);
    	return view('admin.slide.sua',compact('slide'));
    }
    public function postSua($id, Request $request){
    	if($request->useLink == "on"){
    		$this->validate($request,
    		[
    		   'link'=>'required'
    		],[
    		   'link.required'=>'Bạn cần nhập link hình ảnh',
    		]);
    		$slide = Slide::find($id);
    		$slide->link = $request->link;
    		while(file_exists("upload/slide/".$slide->image))
	        {
	            unlink("upload/slide/".$slide->image);
	        }
    		
    		$slide->image = "";
    		$slide->save();
    		return back()->with('thongbao','Bạn đã sửa slide thành công');
    	}
    	else{
    		$slide = Slide::find($id);
    		if($request->hasFile('hinh'))
	        {
	            $file = $request->file('hinh');
	            $duoi = $file->getClientOriginalExtension();
	            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
	            {
	                return redirect('admin/slide/sua/'.$id)->with('loi','Chi duoc chon file co duoi jpg, png, jpeg');
	            }
	            $name = $file->getClientOriginalName();
	            $Hinh = str_random(4)."_".$name;
	            while(file_exists("upload/slide/".$Hinh))
	            {
	                $Hinh = str_random(4)."_".$name;
	            }

	            $file->move("upload/slide",$Hinh);
	            
	            $slide->image = $Hinh;
	            $slide->link = "";
	            $slide->save();
	            return back()->with('thongbao','Bạn đã sửa slide thành công');
	        }
	        else{
	        	return back()->with('loi','Bạn chưa thay đổi slide');
	        }
    	}
    }
}
