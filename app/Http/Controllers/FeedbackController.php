<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;

class FeedbackController extends Controller
{
     public function getDanhsach()
    {
        $fb_kh = Feedback::all();
		return view('Admin.Feedback.danhsach',['fb_kh'=>$fb_kh]);
    }
    public function getXoa($id)
    {
    	 $fb_kh = Feedback::find($id);
        $fb_kh->delete();
        return redirect('admin/Feedback/danhsach')->with('thongbao'
            ,'Bạn đã xoá thành công');
    }
    
}
