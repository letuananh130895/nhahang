<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\Customer;
use App\BillDetail;

class BillController extends Controller
{
    //
    public function getDanhsach(){
    	$bill = Bill::all();
    	return view('admin.bill.danhsach',compact('bill'));
    }
    public function getThem(){
    	$customer = Customer::all();
    	return view('admin.bill.them',compact('customer'));
    }
    public function postThem(Request $request){
    	$this->validate($request,
    		[
    		   'tongtien'=>'required',
    		   'ghichu'=>'required'
    		],[
    		   'tongtien.required'=>'Bạn cần nhập tổng tiền hóa đơn',
    		   'ghichu.required'=>'Bạn cần điền ghi chú đơn hàng'
    		]);
    	$bill = new Bill;
    	$bill->id_customer = $request->khachhang;
    	$bill->date_order = date('Y-m-d');
    	$bill->total = $request->tongtien;
    	$bill->payment = $request->hinhthuc;
    	$bill->note = $request->ghichu;
    	$bill->status = $request->trangthai;

    	$bill->save();
    	return back()->with('thongbao','Bạn đã thêm hóa đơn thành công');
    }
    public function getSua($id){
    	$bill = Bill::find($id);
    	$customer = Customer::all();
    	return view('admin.bill.sua',compact('bill','customer'));
    }
    public function postSua($id,Request $request){
    	$this->validate($request,
    		[
    		   'ghichu'=>'required'
    		],[
    		   'ghichu.required'=>'Bạn cần điền ghi chú đơn hàng'
    		]);
    	$bill = Bill::find($id);
    	$bill->id_customer = $request->khachhang;
    	$bill->payment = $request->hinhthuc;
    	$bill->note = $request->ghichu;
    	$bill->status = $request->trangthai;

    	$bill->save();
    	return back()->with('thongbao','Bạn đã sửa hóa đơn thành công');
    }
    public function getXoa($id){
    	$bill = Bill::find($id);
    	$billdetail = $bill->bill_detail;
    	if($bill->status != 2){
    		return back()->with('loi','Đơn hàng chưa được giao hết không được phép xóa');
    	}
    	else{
    		foreach($billdetail as $b){
	    		if($b->status != 2){
	    			return back()->with('loi','Đơn hàng chưa được giao hết không được phép xóa');
	    		} 
    		}
    		foreach($billdetail as $b){
    			$b->delete();
    		}
    		$bill->delete();
    		return back()->with('thongbao','Bạn đã xóa đơn hàng thành công');
    	} 	
    }
}
