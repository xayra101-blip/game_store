@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            THÊM SLIDE
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
                                <form role="form" action="{{URL::to('/save-slide')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field() }}
                                 
                                <div class="form-group">
                                                <label for="exampleInputFile">SLIDE</label>
                                                <input type="file" name="slide_image" id="exampleInputFile3">
                                </div>
                                </div>  

                                <button type="submit" name="add_slide" class="btn btn-info">Thêm slide</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection