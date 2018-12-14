<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function getDanhsach(){
    	$contact = Contact::all();
    	return view('admin.lienhe.danhsach',compact('contact'));
    }
    public function getXoa($id){
    	$contact = Contact::find($id);
    	$contact->delete();
    	return back()->with('thongbao','Bạn đã xóa thành công');
    }
}
