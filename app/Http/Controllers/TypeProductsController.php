<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeProducts;

class TypeProductsController extends Controller
{
    public function getDanhsach()
    {
        $type_pro = TypeProducts::all();
		return view('Admin.TypeProducts.danhsach',['type_pro'=>$type_pro]);
    }
    public function getSua($id)
    {
        $type_pro = TypeProducts::find($id);
        return view('admin.TypeProducts.sua',['type_pro'=>$type_pro]);
    }
    public function postSua(Request $request,$id)
    {
  		$type_pro = TypeProducts::find($id);
  		$this->validate($request,
    		[
    			'name'=>'required|min:4',
    			'description'=>'required|min:10'
    		],
    		[
    			'name.required'=>'Bạn cần nhập tên loại sản phẩm',
    			'name.min'=>'Tên loại cần tối thiểu 4 ký tự',
    			'description.required'=>'Bạn cần nhập mô tả sản phẩm',
    			'description.min'=>'Mô tả  cần tối thiểu 10 ký tự'
    		]);
    	$type_pro->name = $request->name;
    	$type_pro->description = $request->description;

    	if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $image = $name;
            $file->move("source/image/product",$image);
            $type_pro->image = $image;
        }
        $type_pro->save();
        return redirect('admin/TypeProducts/sua/'.$id)->with('thongbao','Sửa thành công!!!');
    }
    public function getThem()
    {
    	return view('Admin.TypeProducts.them');
    }
     public function postThem(Request $request)
    {
    	$this->validate($request,
    		[
    			'name'=>'required|min:4',
    			'description'=>'required|min:10'
    		],
    		[
    			'name.required'=>'Bạn cần nhập tên loại sản phẩm',
    			'name.min'=>'Tên loại cần tối thiểu 4 ký tự',
    			'description.required'=>'Bạn cần nhập mô tả sản phẩm',
    			'description.min'=>'Mô tả  cần tối thiểu 10 ký tự'
    		]);
    	$type_pro = new TypeProducts;
    	$type_pro->name = $request->name;
    	$type_pro->description = $request->description;

    	if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $image = $name;
            $file->move("source/image/product",$image);
            $type_pro->image = $image;
        }
        else
        {
            $type_pro->image = "";
        }
        $type_pro->save();
        return redirect('admin/TypeProducts/them')->with('thongbao','Thêm thành công!!!');
    }
    public function getXoa($id)
    {
    	 $type_pro = TypeProducts::find($id);
        $type_pro->delete();
        return redirect('admin/TypeProducts/danhsach')->with('thongbao'
            ,'Bạn đã xoá thành công');
    }
}
