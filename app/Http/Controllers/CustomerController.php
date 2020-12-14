<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\User;

class CustomerController extends Controller
{
   public function getDanhSach()
    {
        $customer = Customer::all();
        return view('admin.Customer.danhsach',['customer'=>$customer]);
    }
    public function getXoa($id)
    {
    	 $customer = Customer::find($id);
        $customer->delete();
        return redirect('admin/Customer/danhsach')->with('thongbao'
            ,'Bạn đã xoá thành công');
    }
}
