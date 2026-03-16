@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">{{$loai_sp->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Thể loại</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
</div>
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($loai as $l)
							<li><b><a href="{{route('loaisanpham',$l->id1)}}">{{$l->name1}}</a></b></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<div class="beta-products-details">
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($sp_theoloai as $sp)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$sp->id)}}"><img src="source/image/product/{{$sp->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title"><h6>{{$sp->name}}</h6></p>
										</div>
										<center>
										<div class="single-item-caption">
											
											<i class="fa fa-wpforms" aria-hidden="true">&nbsp;&nbsp;{{date('d/m/Y H:i',strtotime($sp->created_at))}}</i>&nbsp;&nbsp;
											
											<i class="fa fa-eye" aria-hidden="true">&nbsp;&nbsp;{{$sp->view_count}}</i>
											<div class="clearfix"></div><br>
										</div></center>
									</div>
								</div>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>
						<br><br>
						<div class="beta-products-list">
							<h4>Games khác thể loại</h4>
							<div class="beta-products-details">
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sp_khac as $sp1)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$sp1->id)}}"><img src="source/image/product/{{$sp1->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title"><h6>{{$sp1->name}}</h6></p>
										</div>
										<center>
										<div class="single-item-caption">
											
											<i class="fa fa-wpforms" aria-hidden="true">&nbsp;&nbsp;{{date('d/m/Y H:i',strtotime($sp1->created_at))}}</i>&nbsp;&nbsp;
											
											<i class="fa fa-eye" aria-hidden="true">&nbsp;&nbsp;{{$sp1->view_count}}</i>
											<div class="clearfix"></div><br>
										</div></center>
									</div>
								</div>
								@endforeach
								<center><div class="row">{{$sp_khac->links()}}</div></center>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
</div> <!-- .container -source/->
@endsection