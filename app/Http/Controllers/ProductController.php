<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class ProductController extends Controller
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
    public function add_product(){
        $this->AuthLogin();
        $cate_product = DB::table('type_products')->orderby('id1')->get();

        return view('admin.add_product')->with('cate_product',$cate_product);
    }
    public function all_product(){
        $this->AuthLogin();
    	$all_product = DB::table('products')->join('type_products','type_products.id1','=','products.id_type')->orderby('products.id')->get();

    	$managerproduct = view('admin.all_product')->with('all_product',$all_product);
    	return view('admin_layout')->with('admin.all_product',$managerproduct);
    }
    public function save_product(Request $request){
    	$this->AuthLogin();
    	$data = array();
    	$data['name'] = $request->product_name;
    	$data['description'] = $request->product_desc;
    	$data['new'] = $request->product_status;
        $data['promotion_price'] = $request->product_link;
        $data['video_product'] = $request->product_video;
        $data['id_type'] = $request->product_cate;
        //get anh
        $get_image = $request->file('product_image');
        if ($get_image) {
            $new_image = rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('source/image/product',$new_image);
            $data['image'] = $new_image;
            DB::table('products')->insert($data);
            Session::put('message','Thêm game thành công');
            return Redirect::to('all-product');
        }
        $data['image'] = '';
    	DB::table('products')->insert($data);
    	Session::put('message','Thêm game thành công');
    	return Redirect::to('all-product');
    }
    public function unactive_product($product_id){
        $this->AuthLogin();
    	DB::table('products')->where('id',$product_id)->update(['new'=>1]);
    	Session::put('message','games không nằm trong new');
    	return Redirect::to('all-product');
    }
    public function active_product($product_id){
        $this->AuthLogin();
    	DB::table('products')->where('id',$product_id)->update(['new'=>0]);
    	Session::put('message',' kích hoạt new games thành công');
    	return Redirect::to('all-product');
    }
    public function edit_product($product_id){
        $this->AuthLogin();
        $cate_product = DB::table('type_products')->orderby('id1')->get();

    	$edit_product = DB::table('products')->where('id',$product_id)->get();
    	$manager_product = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product);
    	return view('admin_layout')->with('admin.edit_product',$manager_product);
    }
    public function update_product(Request $request, $product_id){
        $this->AuthLogin();
    	$data = array();
    	$data['name'] = $request->product_name;
        $data['id_type'] = $request->product_cate;
        $data['description'] = $request->product_desc;
        $data['unit_price'] = $request->product_price;
        $data['promotion_price'] = $request->product_link;
        $data['video_product'] = $request->product_video;
        //get anh
        $get_image = $request->file('product_image');
        if ($get_image) {
            $new_image = rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('source/image/product',$new_image);
            $data['image'] = $new_image;
            DB::table('products')->where('id',$product_id)->update($data);
            Session::put('message','Thêm game thành công');
            return Redirect::to('all-product');
        }
    	DB::table('products')->where('id',$product_id)->update($data);
    	Session::put('message',' cập nhật games thành công');
    	return Redirect::to('all-product');
    }
        public function delete_product($product_id){
            $this->AuthLogin();
    	DB::table('products')->where('id',$product_id)->delete();
    	Session::put('message',' Xóa thể loại sản phẩm thành công');
    	return Redirect::to('all-product');
    }
}
