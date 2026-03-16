@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            CẬP NHẬT SLIDE
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
                                 @foreach($edit_slide as $key => $pro)
                                <form role="form" action="{{URL::to('/update-slide/'.$pro->id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field() }}
                        
                                <div class="form-group">
                                                <label for="exampleInputFile">Ảnh</label>
                                                <input type="file" name="slide_image" id="exampleInputFile3">
                                                <img src="source/image/slide/{{$pro->image}}" height="100" width="100">  

                                <button type="submit" name="update_slide" class="btn btn-info">Cập nhật slide</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection