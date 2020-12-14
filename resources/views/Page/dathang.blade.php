@extends('master')
@section('content')
</div> <!-- #header -->
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đặt hàng</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index">Trang chủ</a> / <span>Đặt hàng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('dathang')}}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-6">
						<h4>Thông tin khách đặt hàng:</h4>
						<div class="space20">&nbsp;</div>
						@if(Auth::check())
						<div class="form-block">
							<label for="name">Mã KH*</label>
							<input type="text" id="name" value="{{Auth::user()->id}}" name="id_user" placeholder="Họ tên" readonly="" required>
						</div>
							<div class="form-block">
							<label for="name">Họ tên*</label>
							<input type="text" id="name" readonly="" value="{{Auth::user()->full_name}}" name="name" placeholder="Họ tên" required>
						</div>
						<div class="form-block">
							<label>Giới tính </label>
							<input id="gender" type="radio" class="input-radio" name="gender" value="{{Auth::user()->gender}}" checked="checked" style="width: 10%"><span style="margin-right: 10%">{{Auth::user()->gender}}</span>
								{{-- <input id="gender" type="radio" class="input-radio" name="gender" value="{{Auth::user()->gender}}" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nữ</span> --}}		
						</div>

						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" id="email" readonly="" name="email" value="{{Auth::user()->email}}" required >
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input type="text" id="adress" name="address" value="{{Auth::user()->address}}" placeholder="Street Address" required>
						</div>
						<div class="form-block">
							<label for="phone">Điện thoại*</label>
							<input type="text" id="phone" name="phone_number" value="{{Auth::user()->phone}}" required>
						</div>
						<div class="form-block">
							<label for="notes">Ghi chú</label>
							<textarea id="notes" name="note"></textarea>
						</div>
						@else
						<div class="form-block">
							<label for="name">Họ tên*</label>
							<input type="text" id="name" name="name" placeholder="Họ tên" required>
						</div>
						<div class="form-block">
							<label>Giới tính </label>
							<input id="gender" type="radio" class="input-radio" name="gender" value="Nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
							<input id="gender" type="radio" class="input-radio" name="gender" value="Nữ" style="width: 10%"><span>Nữ</span>
										
						</div>

						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" id="email" name="email" required placeholder="expample@gmail.com">
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input type="text" id="adress" name="address" placeholder="Street Address" required>
						</div>
						

						<div class="form-block">
							<label for="phone">Điện thoại*</label>
							<input type="text" id="phone" name="phone_number" required>
						</div>
						
						<div class="form-block">
							<label for="notes">Ghi chú</label>
							<textarea id="notes" name="note"></textarea>
						</div>
						@endif
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									<div>
								 @if(Session::has('cart'))
							     @foreach($products_cart as $products_c)
									<!--  one item	 -->
										<div class="media">
											<img width="25%" src="source/image/product/{{$products_c['item']['image']}}" alt="" height="100px" class="pull-left">
											<div class="media-body">
												<p class="font-large">{{$products_c['item']['name']}}</p>
											<span class="cart-item-amount"><span>@if($products_c['item']['promotion_price']==0){{$products_c['item']['unit_price']}}@else {{$products_c['item']['promotion_price']}}@endif vnđ</span></span>
												<span class="color-gray your-order-info">Số lượng: {{$products_c['qty']}}</span>
											</div>
										</div>
									<!-- end one item -->
								 @endforeach
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">@if(Session::has('cart')){{number_format($totalPrice)}}@else 0 @endif vnđ</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<!-- <li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" value="COD" checked="checked" data-order_button_text="" name="payment">
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
										</div>						
									</li>
									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" value="ATM" data-order_button_text="" name="payment">
										<label for="payment_method_cheque">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 123 456 789
											<br>- Chủ TK: Nguyễn Văn Thành
											<br>- Ngân hàng Agribank, Chi nhánh Yên Bái
										</div>						
									</li> -->

									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment" value="COD" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
										</div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment" value="ATM" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: block;">
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 123 456 789
											<br>- Chủ TK: Nguyễn Văn Thành
											<br>- Ngân hàng Agribank, Chi nhánh Yên Bái
											<br>- Sau khi nhận được thông tin chuyển khoản,chúng tôi sẽ gủi hàng cho bạn.
										</div>						
									</li>
								</ul>
							</div>

							<div class="text-center"><button type="submit" class="beta-btn primary" href="#">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>
					@endif
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection