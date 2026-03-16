@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh mục slide
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

            <th>slide</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_slide as $key => $pt)
          <tr>
            <td><img src="source/image/slide/{{$pt->image}}" height="350" width="700"></td>
            <td>
              <a href="{{URL::to('/edit-slide/'.$pt->id)}}" class="active styling-edit" ui-toggle-class="">
              <i class="fa fa-pencil-square-o text-active"></i>
              <a onclick="return confirm('Xác nhận xóa!')" href="{{URL::to('/delete-slide/'.$pt->id)}}"  class="active styling-edit" ui-toggle-class="">
              <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
@endsection