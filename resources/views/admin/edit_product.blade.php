@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            CẬP NHẬT GAMES
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
                                 @foreach($edit_product as $key => $pro)
                                <form role="form" action="{{URL::to('/update-product/'.$pro->id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Games</label>
                                    <input type="text" value="{{$pro->name}}" name="product_name" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Thể loại</label>
                                        <select name="product_cate" class="form-control input-sm m-bot15">
                                            @foreach($cate_product as $key => $cate)
                                            @if($cate->id1==$pro->id_type)
                                            <option selected value="{{$cate->id1}}">{{$cate->name1}}</option>
                                            @else
                                            @endif <option value="{{$cate->id1}}">{{$cate->name1}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea style="resize: none" rows="7" type="text" name="product_desc" class="form-control" id="exampleInputPassword1" >{{$pro->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Dung lượng</label>
                                    <input type="text" value="{{$pro->unit_price}}" name="product_price" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Link games</label>
                                    <input type="text" value="{{$pro->promotion_price}}" name="product_link" class="form-control" id="exampleInputEmail1">
                                </div> 
                                <div class="form-group">
                                                <label for="exampleInputFile">Ảnh</label>
                                                <input type="file" name="product_image" id="exampleInputFile3">
                                                <img src="source/image/product/{{$pro->image}}" height="100" width="100">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Video plugin</label>
                                    <input type="text" value="{{$pro->video_product}}" name="product_video" class="form-control" id="exampleInputEmail1">
                                </div>  

                                <button type="submit" name="update_product" class="btn btn-info">Cập nhật games</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection