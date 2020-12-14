@extends('master')
@section('content')
<div class="container" >
<div id="content">
	<div class="col-sm-6" align="center">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng đã đặt của bạn</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									 @if(Auth::check())
									     @foreach($alldonhangs as $alldh)
									     @if($alldh->note == null)
									     	<a style="float: right;font-weight: 600;" class="btn" href="{{ asset('xoa-don-hang/'.$alldh->id) }}" onclick="if(confirm('Bạn có chắc chắn muốn huỷ đơn hàng này?')) return true; else return false;">Huỷ đơn hàng <i class="fa fa-times"></i></a>

									     @endif
										
									     <div>
												<h4 class="color-black">Mã đơn hàng: DH-{{$alldh->id_bill}}</h4>

										 </div>
									     <div>
											<h4 class="color-black">Ngày đặt hàng: {{$alldh->date_order}}</h4>
										 </div>
											<!--  one item	 -->
											@foreach($donhangs as $dh)
												@if($dh->id_bill == $alldh->id_bill)
													<div class="media">
														<div class="media-body">
															<img width="25%" src="source/image/product/{{$dh->image}}" alt="" height="100px" class="pull-left">
															<p class="font-large">Tên sản phẩm:{{$dh->name}}</p>
															{{-- @if($alldh->note == null)
															<a style="float: right;font-weight: 600;" class="btn" href="{{ asset('xoa-sp/'.$dh->id_product) }}" onclick="if(confirm('Bạn có chắc chắn muốn xoá mặt hàng này?')) return true; else return false;">Xoá <i class="fa fa-times"></i></a> @endif --}}
															<br>

															<span class="color-black your-order-info">Số lượng: {{$dh->quantity}}</span><br>
															<span class="cart-item-amount">Đơn giá: @if($dh->promotion_price==0){{ $dh->unit_price }}@else {{$dh->promotion_price}}@endif <span>vnđ</span></span>	
														</div>
													</div>
												@endif
											@endforeach
											<!-- end one item -->
											{{-- <div>
												<p class="color-black">Ngày đặt hàng: {{$alldh->date_order}}</p>
											</div> --}}
											<div class="your-order-item">
												<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
												<div class="pull-right"><h5 class="color-black">
													{{number_format($alldh->bills->total)}} vnđ</h5></div>	
											</div>
											<div class="clearfix"></div>
											<div>
												<h6 class="color-black">Trạng thái đơn hàng: {{$alldh->bills->note}}</h6>
											</div>
											<hr style="border-top: 1px dashed; ">
										 @endforeach
									@endif
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div> <!-- .your-order -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection