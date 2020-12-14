<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    //
    public function getDanhSach()
    {
        $user = User::all();
        return view('admin.User.danhsach',['user'=>$user]);
    }
    public function getSua($id)
    {
        $user = User::find($id);
        return view('admin.User.sua',['user'=>$user]);
    }
    public function postSua(Request $request ,$id)
    {
      $user = User::find($id);
      $this->validate($request,
            [
                'full_name' =>'required|min:3|max:100',
                'email' =>'required|min:3|max:100', 
                'password' =>'required|min:6|max:32',
                'NLPassword' =>'required|same:password'
            ],
            [
                'full_name.required'=>'Bạn chưa nhập tên người dùng!!',
                'email.required'=>'Bạn chưa nhập tên tài khoản!!',
                'password.required'=>'Bạn chưa nhập mật khẩu!!',
                'NLPassword.required'=>'Bạn chưa nhập lại mật khẩu!!',
                'NLPassword.same'=>'Mật khẩu nhập lại chưa đúng!!',
                'full_name.min'=>'Tên người dùng phải từ 3 đến 100 ký tự!!',
                'full_name.max'=>'Tên người dùng phải từ 3 đến 100 ký tự!!',
                 'email.min'=>'Email phải từ 3 đến 100 ký tự!!',
                'email.max'=>'Email phải từ 3 đến 100 ký tự!!',
            ]);
       $user->full_name = $request->full_name;
       $user->email = $request->email;
       $user->password = bcrypt($request->password);
       $user->phone= $request->phone;
       $user->address = $request->address;
       $user->gender = $request->gender;
        $user->quyen = $request->quyen;
        $user->save();
        return redirect('admin/User/sua/'.$id)->with('thongbao','Sửa thành công!!!');

    }
    public function getThem()
    {
        return view('admin.User.them');
    }
    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'full_name' =>'required|min:3|max:100',
                'email' =>'required|email|min:3|max:100|unique:users,email', 
                'password' =>'required|min:6|max:32',
                'NLPassword' =>'required|same:password'
            ],
            [
                'full_name.required'=>'Bạn chưa nhập tên người dùng!!',
                'email.email'=>'Định dạng email sai!!!',
                'email.required'=>'Bạn chưa nhập tên tài khoản!!',
                'password.required'=>'Bạn chưa nhập mật khẩu!!',
                'NLPassword.required'=>'Bạn chưa nhập lại mật khẩu!!',
                'NLPassword.same'=>'Mật khẩu nhập lại chưa đúng!!',
                'email.unique'=>'Đã tồn tại email này!!',
                'full_name.min'=>'Tên người dùng phải từ 3 đến 100 ký tự!!',
                'full_name.max'=>'Tên người dùng phải từ 3 đến 100 ký tự!!',
                 'email.min'=>'Email phải từ 3 đến 100 ký tự!!',
                'email.max'=>'Email phải từ 3 đến 100 ký tự!!',
            ]);
        $user = new User;
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone= $request->phone;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->quyen = $request->quyen;
        $user->save();
        return redirect('admin/User/them')->with('thongbao','Thêm thành công!!!');
    }
     public function getXoa($id)
    {
       $user = User::find($id);
        $user->delete();
        return redirect('admin/User/danhsach')->with('thongbao'
            ,'Bạn đã xoá thành công');
    }
    public function getDangnhapAdmin()
    {
        return view('admin.login_ad');
    }
    public function postDangnhapAdmin(Request $request)
    {
        $this->validate($request,
        [
            'email'=>'required',
            'password'=>'required' 
        ],
        [
            'email.required'=>'Bạn chưa nhập tên tài khoản!!',
            'password.required'=>'Bạn chưa nhập mật khẩu!!',
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            $user=Auth::user();
           if ($user->quyen == 1)
            return redirect('admin/index');
            // return redirect('/'); 
        }
        else
        {
            return redirect('admin/login_ad')->with('thongbao','Đăng nhập không thành công,xem lại tài khoản hoặc mật khẩu');
        }
    }
    public function postDangxuatAdmin(Request $request)
    {
        Auth::logout();
        return redirect('admin/login_ad');
    }

    
}
