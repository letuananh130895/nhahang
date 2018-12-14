<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;

class LoaisanphamController extends Controller
{
    //
    public function getDanhsach(){
    	$loaisanpham = ProductType::all();
    	return view('admin.loaisanpham.danhsach',compact('loaisanpham'));
    }
    public function getThem(){
    	return view('admin.loaisanpham.them');
    }
    public function postThem(Request $request){
    	$this->validate($request,
    		[
    		   'ten'=>'required|min:3',
    		   'mota'=>'required'
    		],[
    		   'ten.required'=>'Ban can dien tieu de',
    		   'ten.min'=>'Tieu de co it nhat 3 ki tu',
    		   'mota.required'=>'Ban can nhap noi dung'
    		]);
    	$loaisanpham = new ProductType;
    	$loaisanpham->name = $request->ten;
    	$loaisanpham->description = $request->mota;

    	if($request->hasFile('hinh'))
    	{
    		$file = $request->file('hinh');
    		$duoi = $file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
    		{
    			return redirect('admin/loaisanpham/them')->with('loi','Chỉ được chọn file có đuôi jpg, png, jpeg');
    		}
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;
            while(file_exists("upload/product/".$Hinh))
            {
            	$Hinh = str_random(4)."_".$name;
            }
            $file->move("upload/product",$Hinh);
            $loaisanpham->image = $Hinh;
    	}
    	else
    	{
    		$loaisanpham->image = "";
    	}
    	$loaisanpham->save();
    	return back()->with('thongbao','Thêm loại sản phẩm thành công');
    }
    public function getSua($id, Request $request){
    	$loaisanpham = ProductType::find($id);
    	return view('admin.loaisanpham.sua',compact('loaisanpham'));
    }
    public function postSua($id, Request $request){
    	$this->validate($request,
    		[
    		   'ten'=>'required|min:3',
    		   'mota'=>'required'
    		],[
    		   'ten.required'=>'Ban can dien tieu de',
    		   'ten.min'=>'Tieu de co it nhat 3 ki tu',
    		   'mota.required'=>'Ban can nhap noi dung'
    		]);
    	$loaisanpham = ProductType::find($id);
    	$loaisanpham->name = $request->ten;
    	$loaisanpham->description = $request->mota;
    	if($request->hasFile('hinh'))
        {
            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/loaisanpham/sua/'.$id)->with('loi','Chi duoc chon file co duoi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;
            while(file_exists("upload/product/".$Hinh))
            {
                $Hinh = str_random(4)."_".$name;
            }

            $file->move("upload/product",$Hinh);
            unlink("upload/product/".$loaisanpham->image);
            $loaisanpham->image = $Hinh;
        }
        $loaisanpham->save();
        return back()->with('thongbao','Bạn đã sửa loại sản phẩm thành công');
    }
    public function getXoa($id){
    	$loaisanpham = ProductType::find($id);
    	$loaisanpham->delete();
    	return redirect('admin/loaisanpham/danhsach')->with('thongbao','Xóa loại sản phẩm thành công');
    }
}
