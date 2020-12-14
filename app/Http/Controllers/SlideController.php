<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{ public function getDanhsach()
    {
        $slide = Slide::all();
		return view('Admin.Slide.danhsach',['slide'=>$slide]);
    }
    public function getSua($id)
    {
        $slide = Slide::find($id);
        return view('admin.Slide.sua',['slide'=>$slide]);
    }
    public function postSua(Request $request,$id)
    {
  		$slide = Slide::find($id);
  		$this->validate($request,
    		[
    			'image'=>'unique:slide,image'
    		],
    		[
    			'name.unique'=>'Đã có slide này trên database'
    		]);
    	$slide->link = $request->link;
    	if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $image = $name;
            $file->move("source/image/slide",$image);
            $slide->image = $image;
        }
        $slide->save();
        return redirect('admin/Slide/sua/'.$id)->with('thongbao','Sửa thành công!!!');
    }
     public function getXoa($id)
    {
    	 $slide = Slide::find($id);
        $slide->delete();
        return redirect('admin/Slide/danhsach')->with('thongbao'
            ,'Bạn đã xoá thành công');
    }
     public function getThem()
    {
    	return view('Admin.Slide.them');
    }
     public function postThem(Request $request)
    {
    	$this->validate($request,
    		[
    			'link'=>'unique:slide,link'
    		],
    		[
    			'link.unique'=>'Đã có link ảnh này trên database'
    		]);
    	$slide = new Slide;
    	$slide->link = $request->link;

    	if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $image = $name;
            $file->move("source/image/slide",$image);
            $slide->image = $image;
        }
        else
        {
            $slide->image = "";
        }
        $slide->save();
        return redirect('admin/Slide/them')->with('thongbao','Thêm thành công!!!');
    }
}
