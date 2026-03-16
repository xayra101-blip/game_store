@extends('master')
@section('content')
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4><b>Tìm kiếm</b></h4>
							<div class="beta-products-details">
								<p class="pull-left"><b><u>Đã update {{count($product)}} games</u></b></p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($product as $new)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$new->id)}}"><img src="source/image/product/{{$new->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<h4 class="single-item-title"><b><center>{{$new->name}}</center></b></h4>
											</p>
										</div><center>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$new->id)}}"><i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$new->id)}}"><b>Xem chi tiết</b><i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div><br>
										</div>
									</div>
								</div></center>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
@endsection