@extends('masterLayout.client.masterClientHome2')
@section('contentName')
@foreach ($banner as $br)
@if($br->active == 15)
<div id="title" class="page-title" style="background-image: url({{asset( $br->anhBanner )}});">
		<div class="section-container">
			<div class="content-title-heading">
				<h1 class="text-title-heading">
					Liên Hệ
				</h1>
			</div>
			<div class="breadcrumbs">
				<a href="index.html">Trang chủ</a><span class="delimiter"></span>Liên Hệ
			</div>
		</div>
	</div>
@endif
@endforeach
@endsection
@section('contentMain')
<style>
	.button:hover {
		background : white;
		color : black;
	}
</style>
	<div id="content" class="site-content" role="main">
		<div class="page-contact">
			<section class="section section-padding">
				<div class="section-container small">
					<!-- Block Contact Map -->
					<div class="block block-contact-map">
						<div class="block-widget-wrap">
							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15673.79357972976!2d106.6262514!3d10.8534601!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528dfcf546de7%3A0xf872809fb8deded!2zVHLGsMahzIBuZyBDYW8gxJDEg8yJbmcgRlBUIFBvbHl0ZWNobmljIEjhu5MgQ2jDrSBNaW5o!5e0!3m2!1svi!2s!4v1679379222697!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>
					</div>
				</div>
			</section>	

			<section class="section section-padding m-b-70">
				<div class="section-container">
					<!-- Block Contact Info -->
					<div class="block block-contact-info">
						<div class="block-widget-wrap">
							<div class="info-icon">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="svg-icon2 plant" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve"><g><path xmlns="http://www.w3.org/2000/svg" d="m320.174 28.058a8.291 8.291 0 0 0 -7.563-4.906h-113.222a8.293 8.293 0 0 0 -7.564 4.907l-66.425 148.875a8.283 8.283 0 0 0 7.564 11.655h77.336v67.765a20.094 20.094 0 1 0 12 0v-67.765h27.7v288.259h-48.441a6 6 0 0 0 0 12h108.882a6 6 0 0 0 0-12h-48.441v-288.259h117.04a8.284 8.284 0 0 0 7.564-11.657zm-103.874 255.567a8.094 8.094 0 1 1 8.094-8.093 8.1 8.1 0 0 1 -8.094 8.093zm-77.61-107.036 63.11-141.437h108.4l63.11 141.437z" fill="" data-original="" style=""></path></g></svg>
							</div>
							<div class="info-title">
								<h2>Cần giúp đỡ?</h2>
							</div>
							<div class="info-items">
								<div class="row">
									<div class="col-md-4 sm-m-b-30">
										<div class="info-item">
											<div class="item-tilte">
												<h2>ĐIỆN THOẠI</h2>
											</div>
											<div class="item-content">
												810.222.5439
											</div>
										</div>
									</div>
									<div class="col-md-4 sm-m-b-30">
										<div class="info-item">
											<div class="item-tilte">
												<h2>DỊCH VỤ KHÁCH HÀNG</h2>
											</div>
											<div class="item-content">
												<p>Thứ Hai đến thứ Sáu</p>
												<p>8:00 sáng – 4:00 chiều</p>
												<p>Thứ bảy và chủ nhật đóng cửa</p>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="info-item">
											<div class="item-tilte">
												<h2>TRẢ LẠI</h2>
											</div>
											<div class="item-content small-width">
												Để biết thông tin về Trả lại và Hoàn tiền, vui lòng nhấp vào đây.
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="section section-padding contact-background m-b-0">
				<div class="section-container small">
					<!-- Block Contact Form -->
					<div class="block block-contact-form">
						<div class="block-widget-wrap">
							<div class="block-title">
								<h2>Liên hệ với chúng tôi!</h2>
								<div class="sub-title">Chúng tôi sẽ liên hệ lại với bạn trong vòng 24 giờ làm việc!.</div>
								@include('masterLayout/admin/flash-message/flash-message')
							</div>
							<div class="block-content">
								<form action="{{URL::asset('/guilienhe')}}" id="contact" method="post" class="contact-form" novalidate="novalidate">
									@csrf
									<div class="contact-us-form">
										<div class="row">
											<div class="col-sm-12 col-md-6">
												<label class="required">Tên</label><br>
												<span class="form-control-wrap">
													<input type="text" name="name" value="" size="40" class="form-control" aria-required="true">
												</span>
											</div>
											<div class="col-sm-12 col-md-6">
												<label class="required">Email</label><br>
												<span class="form-control-wrap">
													<input type="email" name="email" value="" size="40" class="form-control" aria-required="true">
												</span>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<label class="required">Tin nhắn</label><br>
												<span class="form-control-wrap">
													<textarea name="message" cols="40" rows="10" class="form-control" aria-required="true"></textarea>
												</span>
											</div>
										</div>
										<div class="form-button">
											<input class="button" type="Submit" value="Gửi"></span>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div><!-- #content -->
@endsection
