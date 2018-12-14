<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\BillDetail;
use App\ProductType;
use App\Product;

class BilldetailController extends Controller
{
    //
    public function getDanhsach($id){
    	$bill = Bill::find($id);
    	$billdetail = $bill->bill_detail;
    	return view('admin.billdetail.danhsach',compact('billdetail','bill'));
    }
    public function getXoa($id){
    	$billdetail = BillDetail::find($id);
    	if($billdetail->status == 2){
    		$billdetail->delete();
    		return back();
    	}
    	else{
    		return back()->with('loi','Sản phẩm chưa được giao không được phép xóa');
    	}
    }
    public function getXoadonhang($id){
    	$bill = Bill::find($id);
    	$billdetail = $bill->bill_detail;
    	if($bill->status != 2){
    		return back()->with('loi','Đơn hàng chưa được giao hết không được phép xóa');
    	}
    	else{
    		foreach($billdetail as $b){
	    		if($b->status != 2){
	    			return back()->with('loi','Có sản phẩm chưa được giao không được phép xóa');
	    		} 
    		}
    		foreach($billdetail as $b){
    			$b->delete();
    		}
    		$bill->delete();
    		return redirect('admin/bill/danhsach')->with('thongbao','Bạn đã xóa đơn hàng thành công');
    	} 	
    }
    public function getThemsanpham($id){
    	$bill = Bill::find($id);
    	$producttype = ProductType::all();
    	$product = Product::all();
    	return view('admin.billdetail.them',compact('product','producttype','bill'));
    }
    public function postThemsanpham($id, Request $request){
    	$product = Product::find($request->sanpham);
    	$billdetail = Bill::find($id)->bill_detail;
    	foreach($billdetail as $b){
    		if($b->id_product == $product->id){
    			if($request->soluong < 0){
    				return back()->with('loi','Số lượng nhập vào không được âm');
    			}
    			$b->quantity += $request->soluong;
    			$b->save();
    			return redirect('admin/bill/chitiet/'.$id)->with('thongbao','Thêm sản phẩm thành công');
    		}
    	}
    	if($product->promotion_price == 0){
    		$gia = $product->unit_price;
    	}
    	else{
    		$gia = $product->promotion_price;
    	}
    	if($request->soluong < 0){
    		return back()->with('loi','Số lượng nhập vào không được âm');
    	}
    	$billdetail = new BillDetail;
    	$billdetail->id_bill = $id;
    	$billdetail->id_product = $request->sanpham;
    	$billdetail->quantity = $request->soluong;
    	$billdetail->unit_price = $gia;
    	$billdetail->status = 1;
    	$billdetail->save();
    	return redirect('admin/bill/chitiet/'.$id)->with('thongbao','Thêm sản phẩm thành công');
    }
    public function postCapnhat($id, Request $request){
    	$bill = Bill::find($id);
    	$billdetail = $bill->bill_detail;
    	$mang = array();
    	$mang = $request->arrSoLuong;
    	for($i = 0; $i < count($mang); $i++){
    		if($mang[$i] <= 0){
    			return redirect('admin/bill/chitiet/'.$id)->with('loi','Cập nhật thất bại, số lượng sản phẩm không được âm');
    		}
    	}
    	$dem = 0;
    	foreach($billdetail as $b){
    		$b->quantity = $mang[$dem];
    		$b->save();
    		$dem++;
    	}
    	return redirect('admin/bill/chitiet/'.$id)->with('thongbao','Cập nhật đơn hàng thành công');
    }
    public function changeStatus($id, $status, Request $request){
        $billdetail = BillDetail::find($id);
        if($status == 0){
            $billdetail->status = 1;
            $billdetail->save();
        }elseif ($status == 1) {
            $billdetail->status = 2;
            $billdetail->save();
        }else{
            $billdetail->status = 0;
            $billdetail->save();
        }
        return back();
    }
}
