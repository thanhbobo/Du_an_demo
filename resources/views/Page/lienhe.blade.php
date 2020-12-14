@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Kết nối</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index">Home</a> / <span>Contacts</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="beta-map">
		
		<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/d/u/0/embed?mid=1dvpr-42CPhsrX4ibwQj3kPL9-Diwa45W" width="640" height="480"></iframe></div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-8">
					<h2>Feedback của bạn về cửa hàng chúng tôi</h2>
					<div class="space20">&nbsp;</div>
					<p>Sức khoẻ và sự hài lòng của quý khách làm nên thương hiệu của chúng tôi!<br> Xin chân thành cảm ơn quý khách đã ủng hộ cửa hàng trong suốt thời gian vừa qua.<br>Chúc quý khách sức khoẻ và thịnh vượng.</p>
					<div class="space20">&nbsp;</div>
					@if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                            {{$err}}<br>
                            @endforeach
                        </div>
                        @endif

                        @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                        
                        @endif
					<form action="lien-he" method="post" class="contact-form" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}">	
						<div class="form-block">
							<input name="your_name" type="text" placeholder="Your Name (required)">
						</div>
						<div class="form-block">
							<input name="your_email" type="email" placeholder="Your Email (required)">
						</div>
						<div class="form-block">
							<textarea name="your_message" placeholder="Your Message"></textarea>
						</div>
						<div class="form-block">
							<button type="submit" class="beta-btn primary">Send Message <i class="fa fa-chevron-right"></i></button>
						</div>
					</form>
				</div>
				<div class="col-sm-4">
					<h2>Thông tin liên hệ</h2>
					<div class="space20">&nbsp;</div>

					<h6 class="contact-title">Địa chỉ</h6>
					<p>
						Tổ 6,<br>
						Thị trấn Tam Sơn, Quản Bạ <br>
						Hà Giang
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Thắc mắc về kinh doanh của chúng tôi</h6>
					<p>
						Liên hệ với người sáng lập <br>
						<a href="mailto:thanhlovesnsd98@gmail.com">thanhlovesnsd98@gmail.com</a>
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Công việc</h6>
					<p>
						Chúng tôi luôn tìm kiếm những người tài năng để
						tham gia nhóm của chúng tôi. <br>
						<a href="hr@betadesign.com">hr@betadesign.com</a>
					</p>
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
