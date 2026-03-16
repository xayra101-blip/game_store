<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use App\News;
use App\Comment;
use Hash;
use Auth;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function getIndex(){
    	$slide = Slide::all();
    	$new_product = Product::where('new',0)->paginate(4);
    	$feed_product = Product::where('new',1)->paginate(8);
    	return view('page.trangchu',compact('slide','new_product','feed_product'));
    }
    public function getLoaiSp($type){
    	$sp_theoloai = Product::where('id_type',$type)->get();
    	$sp_khac = Product::where('id_type','<>',$type)->paginate(3);
    	$loai = ProductType::all();
    	$loai_sp = ProductType::where('id1',$type)->first();
    	return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loai_sp'));
    }
    public function getChitiet(Request $req,$id){
    	$sanpham = Product::where('id',$req->id)->first();
        $comments = Comment::where('id_product',$id)->get();
    	$sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(3);
        $sanpham->increment('view_count');
    	return view('page.chitiet_sanpham',compact('sanpham','sp_tuongtu','comments'));
    }
    public function getLienHe(){
        $commentslh = News::all();
        return view('page.lienhe',compact('commentslh'));
    }
    public function postLienHe(Request $req){
        $Com = new News;
        $Com->name = $req->namecommentlh;
        $Com->content = $req->contentcommentlh;
        $Com->save();
        return back();
    }
     public function getGioiThieu(){
    	return view('page.gioithieu');
    }
        public function getAddtoCart(Request $req,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }
        public function getDelItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }
        public function getLogin(){
        return view('page.dangnhap');
    }
        public function getSignin(){
        return view('page.dangki');
    }
        public function postSignin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'fullname'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email đã có người sử dụng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                're_password.same'=>'Mật khẩu không giống nhau',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự'
            ]);
        $user = new User();
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }
    public function postLogin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không đúng định dạng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu không quá 20 kí tự'
            ]
        );
        $credentialsAdmin = array('email'=>$req->email,'password'=>$req->password,'phone' => 1);
        $credentials = array('email'=>$req->email,'password'=>$req->password);
            if(Auth::attempt($credentialsAdmin)){

            return redirect()->route('indexadmin');
            }
            elseif (Auth::attempt($credentials)) {
                return redirect()->back()->with(['flag'=>'success','message'=>'Chao member']);
            }
            else{
                return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
            }        
    }
    public function postLogout(){
        Auth::logout();
        return redirect()->route('trang-chu');
    }
    public function getSearch(Request $req){
        $product = Product::where('name','like','%'.$req->key.'%')
                                ->orWhere('unit_price',$req->key)
                                ->get();
        return view('page.search',compact('product'));
    }
    public function postComment($id,Request $req){
        $Comment = new Comment;
        $Comment->com_email = $req->emailcomment;
        $Comment->com_name = $req->namecomment;
        $Comment->com_content = $req->contentcomment;
        $Comment->id_product = $id;
        $Comment->save();
        return back();
    }
}
