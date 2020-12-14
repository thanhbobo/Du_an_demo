@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Loại Sản phẩm: {{$loai_sp->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index">Home</a> / <span>Loại Sản phẩm</span>
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
							<li><a href="{{route('loaisanpham',$l->id)}}">{{$l->name}}</a></li>
						  @endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Sản phẩm mới nhất</h4>
							<div class="beta-products-details">
								<p class="pull-left">Hiện có {{count($sp_loai)}}</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
							  @foreach($sp_loai as $sp_l)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											@if($sp_l->promotion_price!=0)
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
											@else
											<div class="ribbon-wrapper"><div class="ribbon sale">Hot</div></div>
											@endif
											<a href="{{route('chitietsanpham',$sp_l->id)}}"><img src="source/image/product/{{$sp_l->image}}" alt="" height="200px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sp_l->name}}</p>
											<p class="single-item-price">
												 @if($sp_l->promotion_price==0)
												<span class="flash-sale" style="color:red">{{number_format($sp_l->unit_price)}} vnđ</span>
											  @else
											  <span class="flash-del">{{number_format($sp_l->unit_price)}} vnđ</span>
											  <span class="flash-sale"style="color:red">{{number_format($sp_l->promotion_price)}} vnđ</span>
											  @endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$sp_l->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$sp_l->id)}}">Chi tiết sản phảm <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							  @endforeach
							</div>
							<div class="row"> {{$sp_loai->links()}} </div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khác</h4>
							<div class="beta-products-details">
								<p class="pull-left">Hiện có {{count($sp_khac)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
							   @foreach($sp_khac as $sp_k)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$sp_k->id)}}"><img src="source/image/product/{{$sp_k->image}}" alt="" height="200px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sp_k->name}}</p>
											<p class="single-item-price">
												@if($sp_k->promotion_price==0)
												<span class="flash-sale" style="color:red">{{number_format($sp_k->unit_price)}} vnđ</span>
											  @else
											  <span class="flash-del">{{number_format($sp_k->unit_price)}} vnđ</span>
											  <span class="flash-sale"style="color:red">{{number_format($sp_k->promotion_price)}} vnđ</span>
											  @endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$sp_k->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$sp_k->id)}}">Chi tiết sản phẩm <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							   @endforeach
							</div>
							<div class="row"> {{$sp_khac->links()}} </div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection