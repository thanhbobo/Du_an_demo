<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BillDetail;
use App\Bills;
use App\Customer;
use App\Products;

class BillDetailController extends Controller
{
    public function getDanhSach()
    {
        $billdetail = BillDetail::all();
        return view('admin.BillDetail.danhsach',['billdetail'=>$billdetail]);
    }
    public function getXoa($id)
    {
    	$billdetail = BillDetail::find($id);
        $billdetail->delete();
        return redirect('admin/BillDetail/danhsach')->with('thongbao'
            ,'Bạn đã xoá thành công');
    }
    public function getSua($id)
    {
        $billdetail = BillDetail::find($id);
        return view('admin.BillDetail.sua',['billdetail'=>$billdetail]);
    }
    public function postSua(Request $request ,$id)
    {
      $billdetail = BillDetail::find($id);
      $this->validate($request,
            [
                'address' =>'required|min:3|max:100',
            ],
            [
                'address.required'=>'Bạn chưa nhập địa chỉ!!',
                'address.min'=>'Địa chỉ dùng phải từ 3 đến 100 ký tự!!',
                'address.max'=>'Địa chỉ dùng phải từ 3 đến 100 ký tự!!',
            ]);
       $billdetail->bills->customer->name = $request->full_name;
       $billdetail->bills->customer->address = $request->address;
       $billdetail->bills->customer->phone_number= $request->phone;
       $billdetail->bills->payment = $request->payment;
       $billdetail->products->name = $request->name;
       $billdetail->quantity = $request->quantity;
       $billdetail->unit_price = $request->unit_price;
       $billdetail->bills->note = $request->note;
       $billdetail->save();
        return redirect('admin/BillDetail/sua/'.$id)->with('thongbao','Sửa thành công!!!');

    }
}
