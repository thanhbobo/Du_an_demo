@extends('master')
@section('content')
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<div>
								<h4>Tìm kiếm</h4>
							</div>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($products)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
							  @foreach($products as $new)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											@if($new->promotion_price!=0)
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
											@else
											<div class="ribbon-wrapper"><div class="ribbon sale">Hot</div></div>
											@endif
											<a href="{{route('chitietsanpham',$new->id)}}"><img src="source/image/product/{{$new->image}}" alt="" height="235px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$new->name}}</p>
											<p class="single-item-price" >
											  @if($new->promotion_price==0)
												<span class="flash-sale" style="color:red">{{number_format($new->unit_price)}} vnđ</span>
											  @else
											  <span class="flash-del">{{number_format($new->unit_price)}} vnđ</span>
											  <span class="flash-sale"style="color:red">{{number_format($new->promotion_price)}} vnđ</span>
											  @endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$new->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$new->id)}}">Chi tiết sản phẩm <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							  @endforeach
							</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->
			</div> <!-- .main-content -->
		</div> <!-- #content -->
@endsection