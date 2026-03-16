<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('admin.dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    //
    public function index(){
    	return view('admin_login');
    }
     public function show_dashboard(){
      $all_category_product = DB::table('type_products')->get();
      $all_product = DB::table('products')->get();
      $all_users = DB::table('users')->get();
      $all_comments = DB::table('comment')->get();
        $this->AuthLogin();
   		return view('admin.dashboard',compact('all_category_product','all_product','all_users','all_comments'));
    }
    public function dashboard(Request $request){
   		$admin_email = $request->admin_email;
   		$admin_password = $request->admin_password;

   		$result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password',$admin_password)->first();
   		if ($result) {
   			Session::put('admin_name',$result->admin_name);
   			Session::put('admin_id',$result->admin_id);
   			return Redirect::to('/dashboard');
   		}else{
   			Session::put('message','Sai thông tin đăng nhập');
   			return Redirect::to('/admin');
   		}
    }
    public function logout(){
   		Session::put('admin_name',null);
   		Session::put('admmin_id',null);
   		return Redirect::to('/admin');
    }
}
