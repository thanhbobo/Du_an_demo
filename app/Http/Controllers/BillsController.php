<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BillDetail;
use App\Bills;
use App\Customer;
use App\Products;

class BillsController extends Controller
{
    public function getDanhSach()
    {
        $bills = Bills::all();
        return view('admin.Bills.danhsach',['bills'=>$bills]);
    }
    public function getXoa($id)
    {
    	$bill = Bills::find($id);
        $bill_detail = BillDetail::where('id_bill', '=', $bill->id)->delete();
        if ($bill_detail) {
            Bills::find($id)->delete();
        }
        return redirect('admin/Bills/danhsach')->with('thongbao'
            ,'Bạn đã xoá thành công');
    }
    public function getSua($id)
    {
        $bills= Bills::find($id);
        return view('admin.Bills.sua',['bills'=>$bills]);
    }
    public function postSua(Request $request ,$id)
    {
      $bills = Bills::find($id);
      // $this->validate($request,
      //       [
      //           'address' =>'required|min:3|max:100',
      //       ],
      //       [
      //           'address.required'=>'Bạn chưa nhập địa chỉ!!',
      //           'address.min'=>'Địa chỉ dùng phải từ 3 đến 100 ký tự!!',
      //           'address.max'=>'Địa chỉ dùng phải từ 3 đến 100 ký tự!!',
      //       ]);
       $bills->customer->name = $request->full_name;
       $bills->date_order = $request->date_order;
       $bills->total= $request->total;
       $bills->payment = $request->payment;
       $bills->note = $request->note;
       $bills->save();
        return redirect('admin/Bills/sua/'.$id)->with('thongbao','Sửa thành công!!!');

    }
}
