<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Products;
use App\TypeProducts;
use App\Cart;
use App\Bills;
use Session;
use App\Customer;
use App\BillDetail;
use App\User;
use App\Feedback;
use Illuminate\Http\Request;
use DB;
//use Illuminate\Support\Facades\Auth;
//use App\Http\Requests;
use Auth;

class PageController extends Controller
{
    public function getIndex(){
    	$slide = Slide::all();
    	$new_products = Products::where('new',1)->paginate(8,['*'],'pag');
    	$sanpham_sale = Products::where('promotion_price','<>',0)->paginate(8);
    	//return view('Page.trangchu',['slide'=>$slide]);
    	return view('Page.trangchu',compact('slide','new_products','sanpham_sale'));
    }
    public function getLoaiSp($type){
        $sp_loai = Products::where('id_type',$type)->paginate(6,['*'],'pag');
        $sp_khac = Products::where('id_type','<>',$type)->paginate(8);
        $loai = TypeProducts::all();
        $loai_sp = TypeProducts::where('id',$type)->first();
    	return view('Page.loai_sanpham',compact('sp_loai','sp_khac','loai','loai_sp'));
    }
    public function getChitietSp(Request $req){
        $sanpham = Products::where('id',$req->id)->first();
        $sp_cungloai = Products::where('id_type',$sanpham->id_type)->paginate(6,['*'],'pag');
        // $sp_banchay = BillDetail::where('id_product',$sanpham->id_product)->paginate(3,['*'],'pag');
         $sp_banchays = Products::join('bill_detail', 'bill_detail.id_product', '=', 'products.id')
                        ->selectRaw('products.*, count(bill_detail.id_product) as countId')
                        ->groupBy('products.id')
                        ->orderBy('countId', 'DESC')
                        ->take(5)
                        ->get(); 
        $new_products = Products::where('new',1)->paginate(6,['*'],'pag');
    	return view('Page.chitiet_sanpham',compact('sanpham','sp_cungloai','new_products','sp_banchays'));
    }
      /*public function postChitietSp(Request $req){
        $bill_detail = new BillDetail;
        $bill_detail->quantity = $req->quantity;
        $bill_detail->save();
      }*/
    public function getLienhe(){
    	return view('Page.lienhe');
    }
    public function postLienhe(Request $request){
        $this->validate($request,
            [
                'your_name'=>'required|min:4',
                'your_email'=>'required|min:10',
                'your_message'=>'required|min:10'
            ],
            [
                'your_name.required'=>'Bạn cần nhập tên loại sản phẩm',
                'your_name.min'=>'Tên loại cần tối thiểu 4 ký tự',
                'your_email.required'=>'Bạn cần nhập mô tả sản phẩm',
                'your_email.min'=>'Mô tả  cần tối thiểu 10 ký tự'
            ]);
        $fb_kh = new Feedback;
        $fb_kh->your_name = $request->your_name;
        $fb_kh->your_email = $request->your_email;
        $fb_kh->your_message = $request->your_message;
        $fb_kh->save();
        return view('Page.lienhe')->with('thongbao','Thêm thành công!!!');
    }
    public function getGioithieu(){
    	return view('Page.gioithieu');
    }
     public function getAddtoCart(Request $req,$id){
        $products = Products::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($products,$id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }
    public function getDelItemCart($id){
       $oldCart = Session::has('cart')?Session::get('cart'):null;
       $cart = new Cart($oldCart);
       $cart->removeItem($id);
       if(count($cart->items)>0)
       {
         Session::put('cart',$cart);
       }
       else{
        Session::forget('cart');
       }
       return redirect()->back();
    }

    public function getDonhang(){
        $alldonhangs = BillDetail::leftJoin('bills', 'bill_detail.id_bill', '=', 'bills.id')
                    ->where('bills.id_customer', Auth::user()->customer->id)
                    ->groupBy('bill_detail.id_bill')
                    ->get();
        $donhangs = Products::join('bill_detail', 'bill_detail.id_product', '=', 'products.id')
                    ->join('bills', 'bill_detail.id_bill', '=', 'bills.id')
                    ->where('bills.id_customer', Auth::user()->customer->id)
                    ->get();
        //dd($alldonhangs);
         return view('Page.donhang', ['donhangs' => $donhangs,  'alldonhangs' => $alldonhangs]);
    }

    public function xoaDonhang($id){
        $bill = Bills::find($id);
        $bill_detail = BillDetail::where('id_bill', '=', $bill->id)->delete();
        if ($bill_detail) {
            Bills::find($id)->delete();
        }
        return redirect()->back();
    }
    public function xoaSP($id){
        $billdetail = BillDetail::find($id);
        $billdetail->delete();
        return redirect()->back();
        //dd($id);
    }

    public function getDelBill_detail($id)
    {
        $billdetail = BillDetail::find($id);
        $billdetail->delete();
       return view('Page.dathang')->with('thongbao'
            ,'Bạn đã xoá thành công');
    }


    public function getDathang(){
        return view('Page.dathang');
    }
    public function postDathang(Request $req){
        $cart = Session::get('cart');
        $check = Customer::where('id_user', $req->id_user)->first();
        if(Auth::check() && $check == null){
            $customer = new Customer;
            $customer->name = $req->name;
            $customer->id_user = $req->id_user;
            $customer->gender = $req->gender;
            $customer->email = $req->email;
            $customer->address = $req->address;
            $customer->phone_number = $req->phone_number;
            $customer->note = $req->note;
            $customer->save();
        }
        if(!Auth::check()){
            $customer = new Customer;
            $customer->name = $req->name;
            $customer->id_user = $req->id_user;
            $customer->gender = $req->gender;
            $customer->email = $req->email;
            $customer->address = $req->address;
            $customer->phone_number = $req->phone_number;
            $customer->note = $req->note;
            $customer->save();
        }


        $bill = new Bills;
        if($check == null)
            {
                $bill->id_customer = $customer->id;
            }
         else{ 
            $bill->id_customer = $check->id;
        }
        //$bill->id_customer = $check->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment;
        $bill->note = $req->note;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect('index')->with('thongbao','Đặt hàng thành công!!!');

    }
    public function getDangnhapUser(){
        return view('Page.login_user');
    }

     public function postDangnhapUser(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:12'
            ],
            [
                'email.required'=>'Bạn chưa nhập email!!',
                'email.email'=>'Định dạng email sai!!!',
                'password.required'=>'Bạn chưa nhập password!!',
                'password.min'=>'Mật khẩu phải từ 6 đến 12 ký tự!!',
                'password.max'=>'Mật khẩu  phải từ 6 đến 12 ký tự!!'
            ]);
        $credentials = array('email'=>$req->email,'password'=>$req->password);
        if(Auth::attempt($credentials)){
            //return redirect()->back()->with('Thong bao','Đăng nhập thành công !!');
            return redirect()->route('trangchu')->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
        }
        else{
            return redirect()->back()->with('Thong bao','Đăng nhập không thành công !!');
            /*return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập thất bại!!']);*/
            /*return redirect()->back()
                ->withInput()
                ->withErrors([
                    'login' => 'Login unsuccessful! Please check your account information!',
                ]);*/
        }

     }
     public function getDangkyUser(){
        return view('Page.signup_user');
    }

     public function postDangkyUser(Request $req){
        $this->validate($req,
            [
                'full_name'=>'required',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:12',
                'phone'=>'required',
                'address'=>'required',
                'repassword'=>'required|same:password'

            ],
            [
                'email.required'=>'Bạn chưa nhập email!!',
                'email.email'=>'Định dạng email sai!!!',
                'email.unique'=>'Email đã tồn tại,vui lòng thử lại 1 email khác!!',
                'password.required'=>'Bạn chưa nhập password!!',
                'full_name.required'=>'Bạn chưa nhập họ tên!!',
                'address.required'=>'Bạn chưa nhập địa chỉ!!',
                'phone.required'=>'Bạn chưa nhập số điện thoại!!',
                'repassword.required'=>'Bạn chưa nhập lại password!!',
                'repassword.same'=>'Nhập lại password chưa đúng!!',
                'password.min'=>'Mật khẩu phải từ 6 đến 12 ký tự!!',
                'password.max'=>'Mật khẩu phải từ 6 đến 12 ký tự!!',
            ]);
        $users = new User;
        $users->full_name = $req->full_name;
        $users->email = $req->email;
        $users->password = bcrypt($req->password);
        $users->phone = $req->phone;
        $users->address = $req->address;
        $users->gender = $req->gender;
        $users->quyen = $req->quyen;
        $users->save();
        return redirect()->back()->with('Thong bao','Đăng ký thành công !!');
    }

     public function postDangxuatUser(Request $req){
       Auth::logout();
        return redirect()->route('trangchu');
    }
    public function getTimkiemSp(Request $req){
        $products = Products::where('name','like','%'.$req->key.'%')
                    ->orWhere('unit_price',$req->key)
                    ->get();
                    return view('Page.timkiem_sp',compact('products'));
    }
    function __construct()
    {
        if (Auth::check()) {
            $customer = Auth::User();
            View::share(['customer' => $customer]);
        }
        // else
        // {

        // }
    }


}
