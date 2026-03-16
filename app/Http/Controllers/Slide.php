<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class Slide extends Controller
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
    public function add_slide(){
        $this->AuthLogin();
        return view('admin.add_slide');
    }
    public function all_slide(){
        $this->AuthLogin();
    	$all_slide = DB::table('slide')->get();
    	$managerslide = view('admin.all_slide')->with('all_slide',$all_slide);
    	return view('admin_layout')->with('admin.all_slide',$managerslide);
    }
    public function save_slide(Request $request){
    	$this->AuthLogin();
    	$data = array();
        //get anh
        $get_image = $request->file('slide_image');
        if ($get_image) {
            $new_image = rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('source\image\slide',$new_image);
            $data['image'] = $new_image;
            DB::table('slide')->insert($data);
            Session::put('message','Thêm slide thành công');
            return Redirect::to('all-slide');
        }
        $data['image'] = '';
    	DB::table('slide')->insert($data);
    	Session::put('message','Thêm slide thành công');
    	return Redirect::to('all-slide');
    }

    public function edit_slide($slide_id){
        $this->AuthLogin();

    	$edit_slide = DB::table('slide')->where('id',$slide_id)->get();
    	$manager_slide = view('admin.edit_slide')->with('edit_slide',$edit_slide);
    	return view('admin_layout')->with('admin.edit_slide',$manager_slide);
    }
    public function update_slide(Request $request, $slide_id){
        $this->AuthLogin();
    	$data = array();
        //get anh
        $get_image = $request->file('slide_image');
        if ($get_image) {
            $new_image = rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('source/image/slide',$new_image);
            $data['image'] = $new_image;
            DB::table('slide')->where('id',$slide_id)->update($data);
            Session::put('message','Thêm slide thành công');
            return Redirect::to('all-slide');
        }
    	DB::table('slide')->where('id',$slide_id)->update($data);
    	Session::put('message',' cập nhật slide thành công');
    	return Redirect::to('all-slide');
    }
        public function delete_slide($slide_id){
            $this->AuthLogin();
    	DB::table('slide')->where('id',$slide_id)->delete();
    	Session::put('message',' Xóa slide thành công');
    	return Redirect::to('all-slide');
    }
}
