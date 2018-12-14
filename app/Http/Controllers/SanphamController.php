<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;

class SanphamController extends Controller
{
    //
    public function getDanhsach(){
    	$product = Product::all();
    	return view('admin.sanpham.danhsach',compact('product'));
    }
    public function getThem(){
    	$producttype = ProductType::all();
    	return view('admin.sanpham.them',compact('producttype'));
    }
    public function postThem(Request $request){
    	$this->validate($request,
    		[
    		   'theloai'=>'required',
    		   'ten'=>'required|min:3',
    		   'mota'=>'required'
    		],[
    		   'theloai.required'=>'Ban can chon loai tin',
    		   'ten.required'=>'Ban can dien tieu de',
    		   'ten.min'=>'Tieu de co it nhat 3 ki tu',
    		   'ten.unique'=>'Tieu de da ton tai',
    		   'mota.required'=>'Ban can nhap noi dung'
    		]);
    	$product = new Product;
    	$product->name = $request->ten;
    	$product->id_type = $request->theloai;
    	$product->description = $request->mota;
    	$product->unit_price = $request->unitprice;
    	$product->promotion_price = $request->promotionprice;
    	$product->unit = $request->hinhthuc;
        $product->new = $request->noibat;

    	if($request->hasFile('hinh'))
    	{
    		$file = $request->file('hinh');
    		$duoi = $file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
    		{
    			return redirect('admin/sanpham/them')->with('loi','Chỉ được chọn file có đuôi jpg, png, jpeg');
    		}
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;
            while(file_exists("upload/product/".$Hinh))
            {
            	$Hinh = str_random(4)."_".$name;
            }
            $file->move("upload/product",$Hinh);
            $product->image = $Hinh;
    	}
    	else
    	{
    		$product->image = "";
    	}
    	$product->save();

    	return redirect('admin/sanpham/them')->with('thongbao','Bạn đã thêm thành công');
    }

    public function getSua($id, Request $request){
    	$product = Product::find($id);
    	$producttype = ProductType::all();
    	return view('admin.sanpham.sua',compact('product','producttype'));
    }
    public function postSua($id, Request $request){
    	$this->validate($request,
    		[
    		   'theloai'=>'required',
    		   'ten'=>'required|min:3',
    		   'mota'=>'required'
    		],[
    		   'theloai.required'=>'Ban can chon loai tin',
    		   'ten.required'=>'Ban can dien tieu de',
    		   'ten.min'=>'Tieu de co it nhat 3 ki tu',
    		   'ten.unique'=>'Tieu de da ton tai',
    		   'mota.required'=>'Ban can nhap noi dung'
    		]);
    	$product = Product::find($id);

    	$product->name = $request->ten;
    	$product->id_type = $request->theloai;
    	$product->description = $request->mota;
    	$product->unit_price = $request->unitprice;
    	$product->promotion_price = $request->promotionprice;
    	$product->unit = $request->hinhthuc;
        $product->new = $request->noibat;

        if($request->hasFile('hinh'))
        {
            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/sanpham/sua/'.$id)->with('loi','Chi duoc chon file co duoi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;
            while(file_exists("upload/product/".$Hinh))
            {
                $Hinh = str_random(4)."_".$name;
            }

            $file->move("upload/product",$Hinh);
            unlink("upload/product/".$product->image);
            $product->image = $Hinh;
        }
        $product->save();
        return redirect('admin/sanpham/sua/'.$id)->with('thongbao','Sửa sản phẩm thành công');
    }
    public function getXoa($id){
    	$product = Product::find($id);
    	$product->delete();
    	return redirect('admin/sanpham/danhsach')->with('thongbao','Xóa sản phẩm thành công');
    }
}
