	@extends('master')
	@section('content')
<div class="fullwidthbanner-container">
					<div class="fullwidthbanner">
						<div class="bannercontainer" >
					    <div class="banner" >
				<ul>
				@foreach($slide as $sl)
					<!-- THE FIRST SLIDE -->
					<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
		            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
						<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="source/image/slide/{{$sl->image}}" data-src="source/image/slide/{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/image/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
						</div>
					</div>
		        </li>
		        @endforeach
				</ul>
			</div>
		</div>
		<div class="tp-bannertimer"></div>
		</div>
</div>
<!--slider-->
</div>
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4><b>Game mới cập nhật</b></h4>
							<div class="beta-products-details">
								<p class="pull-left"><b><u>Đã update {{count($new_product)}} games</u></b></p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($new_product as $new)
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
											<i class="fa fa-wpforms" aria-hidden="true">&nbsp;&nbsp;{{date('d/m/Y H:i',strtotime($new->created_at))}}</i>&nbsp;&nbsp;
											
											<i class="fa fa-eye" aria-hidden="true">&nbsp;&nbsp;{{$new->view_count}}</i>
											<div class="clearfix"></div><br>
										</div>
									</div>
								</div></center>
								@endforeach
							</div>
							<div class="row">{{$new_product->links()}}</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>News feed</h4>
							<div class="beta-products-details">
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($feed_product as $feed)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$feed->id)}}"><img src="source/image/product/{{$feed->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title"><h6>{{$feed->name}}</h6></p>
										</div><center>
										<div class="single-item-caption">
											
											<i class="fa fa-wpforms" aria-hidden="true">&nbsp;&nbsp;{{date('d/m/Y H:i',strtotime($feed->created_at))}}</i>&nbsp;&nbsp;
											
											<i class="fa fa-eye" aria-hidden="true">&nbsp;&nbsp;{{$feed->view_count}}</i>
											<div class="clearfix"></div><br>
										</div></center>
									</div>
								</div>
								@endforeach
							</div>
							<center><div class="row">{{$feed_product->links()}}</div></center>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	@endsection