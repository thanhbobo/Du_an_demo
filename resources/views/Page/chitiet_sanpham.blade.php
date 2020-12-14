@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm: {{$sanpham->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trangchu')}}">Home</a> / <span>Chi tiết sản phẩm</span>
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
							<img src="source/image/product/{{$sanpham->image}}" alt="" height="200px">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title"><h2>{{$sanpham->name}}</h2></p>
								<p class="single-item-price">
									@if($sanpham->promotion_price==0)
												<span class="flash-sale" style="color:red">{{number_format($sanpham->unit_price)}} vnđ</span>
											  @else
											  <span class="flash-del">{{number_format($sanpham->unit_price)}} vnđ</span>
											  <span class="flash-sale"style="color:red">{{number_format($sanpham->promotion_price)}} vnđ</span>
											  @endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$sanpham->description}}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>{{$sanpham->unit}}:</p>
							<div class="single-item-options">
								<select class="wc-select" name="quantity">
									<option value="1">1</option>
									{{-- <option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option> --}}
								</select>
								<a class="add-to-cart pull-left" href="{{route('themgiohang',$sanpham->id)}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Mô tả sản phẩm:</a></li>
						</ul>
						<div class="panel" id="tab-description">
							<p>{{$sanpham->description_ct}}</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm cùng loại:</h4>
						<div class="row">
						   @foreach($sp_cungloai as $sp_cl)
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										@if($sp_cl->promotion_price!=0)
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
											@else
										@endif
										<a href="{{route('chitietsanpham',$sp_cl->id)}}"><img src="source/image/product/{{$sp_cl->image}}" alt="" height="200px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$sp_cl->name}}</p>
										<p class="single-item-price">
											@if($sp_cl->promotion_price==0)
												<span class="flash-sale" style="color:red">{{number_format($sp_cl->unit_price)}} vnđ</span>
											  @else
											  <span class="flash-del">{{number_format($sp_cl->unit_price)}} vnđ</span>
											  <span class="flash-sale"style="color:red">{{number_format($sp_cl->promotion_price)}} vnđ</span>
											  @endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('themgiohang',$sp_cl->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chitietsanpham',$sp_cl->id)}}">Chi tiết sản phẩm <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						   @endforeach
						</div>
						<div class="row"> {{$sp_cungloai->links()}} </div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Top Sản phẩm bán chạy</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($sp_banchays as $sale)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham',$sale->id)}}"><img src="source/image/product/{{$sale->image}}" alt=""></a>
									<div class="media-body">
										{{$sale->name}}<br>
										<span class="beta-sales-price">
											@if($sale->promotion_price==0)
												<span class="flash-sale" style="color:red">{{number_format($sale->unit_price)}} vnđ</span>
											  @else
											  <span class="flash-sale"style="color:red">{{number_format($sale->promotion_price)}} vnđ</span>
											  @endif</span>
									</div>
								</div>
								@endforeach
							</div>
							{{-- <div class="row"> {{$sp_banchays->links()}} </div> --}}
						</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Sản phẩm mới</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($new_products as $new)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham',$new->id)}}"><img src="source/image/product/{{$new->image}}" alt=""></a>
									<div class="media-body">
										{{$new->name}}<br>
										<span class="beta-sales-price">
											@if($new->promotion_price==0)
												<span class="flash-sale" style="color:red">{{number_format($new->unit_price)}} vnđ</span>
											  @else
											  <span class="flash-sale"style="color:red">{{number_format($new->promotion_price)}} vnđ</span>
											  @endif</span>
									</div>
								</div>
								@endforeach
							</div>
							<div class="row"> {{$new_products->links()}} </div>
						</div>
					</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection