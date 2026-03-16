@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            THÊM GAMES
                        </header>
                        <div class="panel-body">
                            <?php
                                $message = Session::get('message');
                                if ($message) {
                                    echo $message;
                                    Session::put('message',null);
                                }
                            ?>
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Games</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Thể loại</label>
                                        <select name="product_cate" class="form-control input-sm m-bot15">
                                            @foreach($cate_product as $key => $cate)
                                            <option value="{{$cate->id1}}">{{$cate->name1}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea style="resize: none" rows="7" type="text" name="product_desc" class="form-control" id="exampleInputPassword1" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Dung lượng</label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hiển thị trang đầu</label>
                                        <select name="product_status" class="form-control input-sm m-bot15">
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiển thị</option>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Link games</label>
                                    <input type="text" name="product_link" class="form-control" id="exampleInputEmail1">
                                </div> 
                                <div class="form-group">
                                                <label for="exampleInputFile">Ảnh</label>
                                                <input type="file" name="product_image" id="exampleInputFile3">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Video plugin</label>
                                    <input type="text" name="product_video" class="form-control" id="exampleInputEmail1">
                                </div>  

                                <button type="submit" name="add_product" class="btn btn-info">Thêm games</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection