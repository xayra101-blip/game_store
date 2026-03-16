@extends('admin_layout')
@section('admin_content')
<center>
	<h3><b>WEB GAME ANDROID</b></h3>
	<div class="market-updates">
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-gamepad" style="font-size: 3em;
    color:white;
   text-align: left;"> </i>
					</div>
					 <div class="col-md-8 market-update-left">
					 <h4>Số game có</h4>
					<h3>{{count($all_product)}}</h3>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>Users</h4>
						<h3>{{count($all_users)}}</h3>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-bars" style="font-size: 3em;
    color:white;
   text-align: left;"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Thể loại games</h4>
						<h3>{{count($all_category_product)}}</h3>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-4">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-lemon-o" style="font-size: 3em;
    color:white;
   text-align: left;"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Bình luận</h4>
						<h3>{{count($all_comments)}}</h3>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			
			<br>
			<div>
				
			</div>
			<div class="row">
			<div class="panel-body">
				<div class="col-md-12 w3ls-graph">
					<!--agileinfo-grap-->
						<div class="agileinfo-grap">
							<div class="agileits-box">
								<header class="agileits-box-header clearfix">
									<h3><img src="source\image\faq\giphy.gif"></h3>

								</header>

								</div>
							</div>
						</div>
</center>
        
@endsection