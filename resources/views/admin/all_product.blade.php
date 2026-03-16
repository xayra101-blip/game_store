@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh mục sản phẩm
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
               
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
        </div>
      </div>
    </div>
    <div class="table-responsive">
        <?php
                                $message = Session::get('message');
                                if ($message) {
                                    echo $message;
                                    Session::put('message',null);
                                }
                            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên games</th>
            <th>Thể loại</th> 
            <th>Nội dung</th>
            <th>Status</th>
            <th>Dung lượng</th>
            <th>links</th>
            <th>Ảnh</th>
            <th>Videos</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_product as $key => $pt)
          <tr>
            <td>{{$pt->name}}</td>
            <td>{{$pt->name1}}</td>
            <td><span class="text-ellipsis">{{$pt->description}}</span></td>
            <td><span class="text-ellipsis">
                <?php 
                    if ($pt->new==0) {
                        ?>
                        <a href="{{URL::to('/unactive-product/'.$pt->id)}}"><span class="fa-thumb-style fa fa-thumbs-up"></span>
                        </a>
                        <?php 
                        }else{
                        ?>
                        <a href="{{URL::to('/active-product/'.$pt->id)}}"><span class="fa-thumb-style fa fa-thumbs-down"></span></a>
                    <?php
                    }
                ?>
            </span></td>
            <td>{{$pt->unit_price}}</td>
            <td>{{$pt->promotion_price}}</td>
            <td><img src="source/image/product/{{$pt->image}}" height="100" width="100"></td>
            <td>{{$pt->video_product}}</td>
            <td>
              <a href="{{URL::to('/edit-product/'.$pt->id)}}" class="active styling-edit" ui-toggle-class="">
              <i class="fa fa-pencil-square-o text-active"></i>
              <a onclick="return confirm('Xác nhận xóa!')" href="{{URL::to('/delete-product/'.$pt->id)}}"  class="active styling-edit" ui-toggle-class="">
              <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
@endsection