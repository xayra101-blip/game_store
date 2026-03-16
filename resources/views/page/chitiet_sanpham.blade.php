@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Games {{$sanpham->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Home</a> / <span>Chi tiết sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="source/image/product/{{$sanpham->image}}" alt="" height="250px">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title"><h6><b>{{$sanpham->name}}</b></h6></p><br>
								<p class="single-item-price">
									<span><p>Dung lượng trò chơi:</p></span>
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<span><h6><b>{{number_format($sanpham->unit_price)}}</b> Mb</span></h6>
							</div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-options">


								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Giới thiệu</a></li>
							<li><a href="#tab-reviews">Bình luận ({{count($comments)}})</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p><b><big>{{$sanpham->description}}</big></b></p>
							<iframe width="100%" height="500" src="{{$sanpham->video_product}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
						<div class="panel" id="tab-reviews">
							@foreach($comments as $cmt)
						<table>
							<tr>
								<td>
									<p><b><img width="25px" height="25px" src="source\image\faq\user-300x300.png">&nbsp;&nbsp;&nbsp;{{$cmt->com_name}}&nbsp;&nbsp;</b>đã update vào
									<span><u>{{date('d/m/Y H:i',strtotime($cmt->created_at))}}</u></span>
								</td>
								</tr>
								<tr>
								<td>
									{{$cmt->com_content}}<br><hr><br>
								</td>
							</tr>
						</table>
					@endforeach
						</div>
					</div><br><br>
					<div>
						<form method="POST">
						<h5 style="color:#FF9900 "><b><u>Bình luận</u></b></h5><br>
						<div class="panel" id="tab-description">
						<div class="form-block">
							<label for="phone"><b>Email</b></label>
							<input type="text" name="emailcomment" required>
						</div>
							<div class="form-block">
							<label for="phone"><b>Tên</b></label>
							<input type="text" name="namecomment" required>
						</div>
							<p><b>Bình luận:</b></p>
							<textarea rows="1" cols="20" name="contentcomment" required>
							</textarea>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Gửi</button>
						</div>
						</div>
						{{csrf_field()}}
					</form>
					</div>
					@foreach($comments as $cmt)
						<table>
							<tr>
								<td>
									<p><b>{{$cmt->com_name}}&nbsp;&nbsp;</b>đã update vào
									<span>{{date('d/m/Y H:i',strtotime($cmt->created_at))}}</span>
								</td>
								</tr>
								<tr>
								<td>
									{{$cmt->com_content}}<br><br>
								</td>
							</tr>
						</table>
					@endforeach
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
							<h4>Games cùng thể loại</h4>
							<div class="beta-products-details">
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sp_tuongtu as $sp2)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$sp2->id)}}"><img src="source/image/product/{{$sp2->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title"><h6>{{$sp2->name}}</h6></p>
										</div>
										<center>
										<div class="single-item-caption">
											<i class="fa fa-wpforms" aria-hidden="true">&nbsp;&nbsp;{{date('d/m/Y H:i',strtotime($sp2->created_at))}}</i>&nbsp;&nbsp;
										
											<i class="fa fa-eye" aria-hidden="true">&nbsp;&nbsp;{{$sp2->view_count}}</i>
											<div class="clearfix"></div><br>
										</div></center>
									</div>
								</div>
								@endforeach
								<center><div class="row">{{$sp_tuongtu->links()}}</div></center>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
				</div>
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection