<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\TypeProducts;

class ProductsController extends Controller
{
    public function getDanhSach()
    {
        $products = Products::all();
        return view('admin.Products.danhsach',['products'=>$products]);
    }
    public function getSua($id)
    {
    	$type_products = TypeProducts::all();
        $products = Products::find($id);
        return view('admin.Products.sua',['products'=>$products,'type_products'=>$type_products]);
    }
    public function postSua(Request $request,$id)
    {
  		$products = Products::find($id);
  		$this->validate($request,
    		[
    			'name'=>'required|min:4',
    			'description'=>'required|min:10',
    			'name_loai'=>'required',
    			'unit_price'=>'required',
    			'promotion_price'=>'required',
    			'unit'=>'required',
    			'new'=>'required',
    		],
    		[
    			'name.required'=>'Bạn cần nhập tên sản phẩm',
    			'name_loai.required'=>'Bạn chưa chọn loại sản phẩm',
    			'unit_price.required'=>'Bạn cần nhập giá sản phẩm',
    			'unit.required'=>'Bạn cần nhập đơn vị tính sản phẩm',
    			'new.required'=>'Bạn cần nhập loại hàng',
    			'promotion_price.required'=>'Bạn cần nhập giá khuyến mại',
    			'name.min'=>'Tên loại cần tối thiểu 4 ký tự',
    			'description.required'=>'Bạn cần nhập mô tả sản phẩm',
    			'description.min'=>'Mô tả  cần tối thiểu 10 ký tự'
    		]);
    	$products->name = $request->name;
    	$products->id_type = $request->name_loai;
    	$products->description = $request->description;
        $products->description_ct = $request->description_ct;
    	$products->unit_price =  $request->unit_price;
    	$products->promotion_price =  $request->promotion_price;

    	if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $image = $name;
            $file->move("source/image/product",$image);
            $products->image = $image;
        }
        $products->unit =  $request->unit;
        $products->new =  $request->new;
        $products->save();
        return redirect('admin/Products/sua/'.$id)->with('thongbao','Sửa thành công!!!');
    }
    public function getThem()
    {
    	$type_products = TypeProducts::all();
    	return view('Admin.Products.them',['type_products'=>$type_products]);
    }
     public function postThem(Request $request)
    {
    	$this->validate($request,
    		[
    			'name'=>'required|min:4',
    			'description'=>'required|min:10',
    			'name_loai'=>'required',
    			'unit_price'=>'required',
    			'promotion_price'=>'required',
    			'unit'=>'required',
    			'new'=>'required',
    		],
    		[
    			'name.required'=>'Bạn cần nhập tên sản phẩm',
    			'name_loai.required'=>'Bạn chưa chọn loại sản phẩm',
    			'unit_price.required'=>'Bạn cần nhập giá sản phẩm',
    			'unit.required'=>'Bạn cần nhập đơn vị tính sản phẩm',
    			'new.required'=>'Bạn cần nhập loại hàng',
    			'promotion_price.required'=>'Bạn cần nhập giá khuyến mại',
    			'name.min'=>'Tên loại cần tối thiểu 4 ký tự',
    			'description.required'=>'Bạn cần nhập mô tả sản phẩm',
    			'description.min'=>'Mô tả  cần tối thiểu 10 ký tự'
    		]);
    	$products = new Products;
    	$products->name = $request->name;
    	$products->id_type = $request->name_loai;
    	$products->description = $request->description;
        $products->description_ct = $request->description_ct;
    	$products->unit_price =  $request->unit_price;
    	$products->promotion_price =  $request->promotion_price;

    	if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $image = $name;
            $file->move("source/image/product",$image);
            $products->image = $image;
        }
        else
        {
            $products->image = "";
        }
        $products->unit =  $request->unit;
        $products->new =  $request->new;
        $products->save();
        return redirect('admin/Products/them')->with('thongbao','Thêm thành công!!!');
    }
    public function getXoa($id)
    {
    	 $products = Products::find($id);
        $products->delete();
        return redirect('admin/Products/danhsach')->with('thongbao'
            ,'Bạn đã xoá thành công');
    }
}
