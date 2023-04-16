<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Meta Data -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Diamond House</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/png" href="{{asset('img-home/favicon.jpg')}}" />
	<script src="{{ asset('js/lib/jquery-3.1.1.js') }}"></script>

	<!-- Dependency Styles -->
	<link rel="stylesheet" href="{{asset('ruper/libs/bootstrap/css/bootstrap.min.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('ruper/libs/feather-font/css/iconfont.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('ruper/libs/icomoon-font/css/icomoon.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('ruper/libs/font-awesome/css/font-awesome.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('ruper/libs/wpbingofont/css/wpbingofont.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('ruper/libs/elegant-icons/css/elegant.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('ruper/libs/slick/css/slick.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('ruper/libs/slick/css/slick-theme.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('ruper/libs/mmenu/css/mmenu.min.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('ruper/libs/slider/css/jslider.css')}}">
	<link rel="stylesheet" href="{{asset('alertify/css/alertify.min.css')}}">
	<link rel="stylesheet" href="{{asset('alertify/css/themes/default.min.css')}}">

	<!-- Site Stylesheet -->
	<link rel="stylesheet" href="{{asset('ruper/assets/css/app.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('ruper/assets/css/responsive.css')}}" type="text/css">


	<!-- Google Web Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=EB+Garamond:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="/code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">


</head>
<style>
	.error {
		color: #FF0303;
	}

	.textError {
		color: #EB455F;
	}

	.errorLoginPage {
		color: #EB455F;
	}
</style>

<body class="shop">
	<div id="page" class="hfeed page-wrapper">
		<header id="site-header" class="site-header header-v1 absolute">
			{{-- <div class="header-mobile">
					<div class="section-padding">
						<div class="section-container">
							<div class="row">
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3 header-left">
									<div class="navbar-header">
										<button type="button" id="show-megamenu" class="navbar-toggle"></button>
									</div>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 header-center">
									<div class="site-logo">
										<a href="index.html">
											<img width="400" height="79" src="{{asset('ruper/media/logo.png')}}" alt="Ruper – Furniture HTML Theme" />
			</a>
	</div>
	</div>
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3 header-right">
		<div class="ruper-topcart dropdown">
			<div class="dropdown mini-cart top-cart">
				<div class="remove-cart-shadow"></div>
				<a class="dropdown-toggle cart-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<div class="icons-cart"><i class="icon-large-paper-bag"></i><span class="cart-count">2</span></div>
				</a>
				<div class="dropdown-menu cart-popup">
					<div class="cart-empty-wrap">
						<ul class="cart-list">
							<li class="empty">
								<span>No products in the cart.</span>
								<a class="go-shop" href="shop-grid-left.html">GO TO SHOP<i aria-hidden="true" class="arrow_right"></i></a>
							</li>
						</ul>
					</div>
					<div class="cart-list-wrap">
						<ul class="cart-list ">
							<li class="mini-cart-item">
								<a href="#" class="remove" title="Remove this item"><i class="icon_close"></i></a>
								<a href="shop-details.html" class="product-image"><img width="600" height="600" src="media/product/3.jpg" alt=""></a>
								<a href="shop-details.html" class="product-name">Chair Oak Matt Lacquered</a>
								<div class="quantity">Qty: 1</div>
								<div class="price">$150.00</div>
							</li>
							<li class="mini-cart-item">
								<a href="#" class="remove" title="Remove this item"><i class="icon_close"></i></a>
								<a href="shop-details.html" class="product-image"><img width="600" height="600" src="media/product/1.jpg" alt=""></a>
								<a href="shop-details.html" class="product-name">Zunkel Schwarz</a>
								<div class="quantity">Qty: 1</div>
								<div class="price">$100.00</div>
							</li>
						</ul>
						<div class="total-cart">
							<div class="title-total">Total: </div>
							<div class="total-price"><span>$100.00</span></div>
						</div>
						<div class="free-ship">
							<div class="title-ship">Buy <strong>$400</strong> more to enjoy <strong>FREE Shipping</strong></div>
							<div class="total-percent">
								<div class="percent" style="width:20%"></div>
							</div>
						</div>
						<div class="buttons">
							<a href="shop-cart.html" class="button btn view-cart btn-primary">View cart</a>
							<a href="shop-checkout.html" class="button btn checkout btn-default">Check out</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	</div>

	<div class="header-mobile-fixed">
		<!-- Shop -->
		<div class="shop-page">
			<a href="shop-grid-left.html"><i class="wpb-icon-shop"></i></a>
		</div>

		<!-- Login -->
		<div class="my-account">
			<div class="login-header">
				<a href="page-my-account.html"><i class="wpb-icon-user"></i></a>
			</div>
		</div>


		<!-- Wishlist -->
		<div class="wishlist-box">
			<a href="shop-wishlist.html"><i class="wpb-icon-heart"></i></a>
		</div>
	</div>
	</div> --}}

	<div class="header-desktop">
		<div class="header-wrapper">
			<div class="section-padding">
				<div class="section-container p-l-r">
					<div class="row">
						<div class="col-xl-3 col-lg-2 col-md-12 col-sm-12 col-12 header-left">
							{{-- <div class="site-logo">
								<a href="index.html">
									<img width="400" height="79" src="{{ URL::asset('ruper/media/logo.png') }}" alt="Ruper – Furniture HTML Theme" />
								</a>
							</div> --}}
						</div>

						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 text-center header-center">
							<div class="site-navigation">
								<nav id="main-navigation">
									<ul id="menu-main-menu" class="menu">
										<li class="level-0 menu-item mega-menu">
											<a href="{{ url('/client/home') }}"><span class="menu-item-text">Trang chủ</span></a>
										</li>
										<li class="level-0 menu-item">
											<a href="{{ route('shop_products.index') }}"><span class="menu-item-text">cửa hàng</span></a>
										</li>
										<li class="level-0 menu-item mega-menu mega-menu-fullwidth align-center">
											<a href="{{ route('blog_cate.index') }}"><span class="menu-item-text">bài viết</span></a>
										</li>
										<li class="level-0 menu-item menu-item-has-children">
											<a href="#"><span class="menu-item-text">Liên Hệ</span></a>
											<ul class="sub-menu">
												<li>
													<a href="{{ url('/client/about') }}"><span class="menu-item-text">Về chúng tôi</span></a>
												</li>
												<li>
													<a href="{{ url('/client/contact') }}"><span class="menu-item-text">Liên hệ</span></a>
												</li>
												<li>
													<a href="{{ url('/client/faq') }}"><span class="menu-item-text">FAQ</span></a>
												</li>
											</ul>
										</li>
										<li class="level-0 menu-item menu-item-has-children">
											<a href="#"><span class="menu-item-text">Tài khoản</span></a>
											<ul class="sub-menu">
												@if (!Auth::check())
												<li>
													<a href="{{ route('viewLogin') }}"><span class="menu-item-text">Đăng nhập</span></a>
												</li>
												@endif
												@if ( Auth::check() )
												<li>
													<a href="{{url('/client/my_account')}}"><span class="menu-item-text">Quản
															lí
															tài
															khoản</span></a>
												</li>
												<li>
													<a href="{{ route('clientlogout') }}"><span class="menu-item-text">Đăng xuất</span></a>
												</li>
												@endif
												<li>
													<a href="{{ route('viewRegister') }}"><span class="menu-item-text">Đăng ký</span></a>
												</li>


											</ul>
										</li>
									</ul>
								</nav>
							</div>
						</div>

						<div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 header-right">
							<div class="header-page-link">
								<!-- Login -->
								<div class="login-header">
									@if (Auth::check())
									{!! Auth::user()->name !!}
									@endif
								</div>


								<!-- Wishlist -->
								<div class="wishlist-box">
									<a href="{{ url('/client/shop_wishlist') }}"><i class="icon-heart"></i></a>
									<span class="count-wishlist" id="countProductInWishlist">0</span>
								</div>

								<!-- Cart -->
								<div class="ruper-topcart dropdown light">
									<div class="dropdown mini-cart top-cart">
										<div class="remove-cart-shadow"></div>
										<a class="cart-icon" href="{{ route('giohangs.index') }}">
											<div class="icons-cart"><i class="icon-large-paper-bag"></i><span class="cart-count">2</span></div>
										</a>
										{{-- <div class="dropdown-menu cart-popup">
											<div class="cart-empty-wrap">
												<ul class="cart-list">
													<li class="empty">
														<span>No products in the cart.</span>
														<a class="go-shop" href="shop-grid-left.html">GO TO SHOP<i aria-hidden="true" class="arrow_right"></i></a>
													</li>
												</ul>
											</div>
											<div class="cart-list-wrap">
												<ul class="cart-list ">
													<li class="mini-cart-item">
														<a href="#" class="remove" title="Remove this item"><i class="icon_close"></i></a>
														<a href="shop-details.html" class="product-image"><img width="600" height="600" src="media/product/3.jpg" alt=""></a>
														<a href="shop-details.html" class="product-name">Chair Oak Matt Lacquered</a>
														<div class="quantity">Qty: 1</div>
														<div class="price">$150.00</div>
													</li>
													<li class="mini-cart-item">
														<a href="#" class="remove" title="Remove this item"><i class="icon_close"></i></a>
														<a href="shop-details.html" class="product-image"><img width="600" height="600" src="media/product/1.jpg" alt=""></a>
														<a href="shop-details.html" class="product-name">Zunkel Schwarz</a>
														<div class="quantity">Qty: 1</div>
														<div class="price">$100.00</div>
													</li>
												</ul>
												<div class="total-cart">
													<div class="title-total">Total: </div>
													<div class="total-price"><span>$100.00</span></div>
												</div>
												<div class="free-ship">
													<div class="title-ship">Buy <strong>$400</strong> more to enjoy <strong>FREE Shipping</strong></div>
													<div class="total-percent">
														<div class="percent" style="width:20%"></div>
													</div>
												</div>
												<div class="buttons">
													<a href="{{ route('giohangs.index') }}" class="button btn view-cart btn-primary">View cart</a>
										<a href="shop-checkout.html" class="button btn checkout btn-default">Check out</a>
									</div>
								</div>
							</div> --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	</div>
	</header>

	<div id="site-main" class="site-main">
		<div id="main-content" class="main-content">
			<div id="primary" class="content-area">
				@yield('contentName')

				@yield('contentMain')
			</div><!-- #primary -->
		</div><!-- #main-content -->
	</div>

	<footer id="site-footer" class="site-footer background">
		<div class="footer">
			<div class="section-padding">
				<div class="section-container">
					<div class="block-widget-wrap">
						<div class="row">
							<div class="col-lg-3 col-md-6">
								<div class="block block-menu m-b-20">
									<h2 class="block-title">LIÊN HỆ CHÚNG TÔI</h2>
									<div class="block-content">
										<ul>
											<li>
												<a href="page-contact.html">616.774.0561</a>
											</li>
											<li>
												<a href="page-contact.html">866.453.4748</a>
											</li>
											<li>
												<a href="page-contact.html">Nhân sự Fax: 810.222.5439</a>
											</li>
											<li>
												<a href="page-contact.html">sales@ruperfurniture.com</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-6">
								<div class="block block-menu">
									<h2 class="block-title">PHÒNG TRƯNG BÀY</h2>
									<div class="block-content">
										<p>1000 84th Street SW , Trung tâm Byron, MI 49315</p>
										<p>AmericasMart Bldg. #1</p>
										<p>Suite 5C-1, Atlanta, GA 30303</p>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-6">
								<div class="block block-menu">
									<h2 class="block-title">DỊCH VỤ</h2>
									<div class="block-content">
										<ul>
											<li>
												<a href="page-about.html">Doanh thu</a>
											</li>
											<li>
												<a href="page-about.html">vận chuyển nhanh</a>
											</li>
											<li>
												<a href="page-about.html">Những thiết kế mới</a>
											</li>
											<li>
												<a href="page-about.html">Bảo vệ vải ngẫu nhiên</a>
											</li>
											<li>
												<a href="page-about.html">Chăm sóc nội thất</a>
											</li>
											<li>
												<a href="page-about.html">Thẻ quà tặng</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	</div>

	<!-- Back Top button -->
	<div class="back-top button-show">
		<i class="arrow_carrot-up"></i>
	</div>


	<div class="quickview-popup">
		<div id="quickview-container">
			<div class="quickview-container">
				<a href="#" class="quickview-close"></a>
				<div class="quickview-notices-wrapper"></div>
				<div class="product single-product product-type-simple">
					<div class="product-detail">
						<div class="row">
							<div class="img-quickview">
								<div class="product-images-slider">
									<div id="quickview-slick-carousel">
										<div class="images">
											<div class="scroll-image">
												<div class="slick-wrap">
													<div class="slick-sliders image-additional" data-dots="true" data-columns4="1" data-columns3="1" data-columns2="1" data-columns1="1" data-columns="1" data-nav="true">
														<div class="img-thumbnail slick-slide">
															<a href="media/product/3.jpg" class="image-scroll" title="">
																<img  style="width: 600px !important;height:600px !important;object-fit:contain" class="imgQuickView1" src="{{ asset('ruper/media/product/3.jpg')}}" alt="">
															</a>
														</div>
														<div class="img-thumbnail slick-slide">
															<a href="media/product/3-2.jpg" class="image-scroll" title="">
																<img  style="width: 600px !important;height:600px !important;object-fit:contain"  class="imgQuickView2" src="{{ asset('ruper/media/product/3-2.jpg')}}" alt="">
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="quickview-single-info">
								<div class="product-content-detail entry-summary">
									<h1 class="product-title entry-title nameProduct">...</h1>
									<div class="price-single">
										<div class="price">
											<del><span class="priceDelCurr">0</span></del>
											<span class="priceProductCurr">0</span>
										</div>
									</div>
									<div class="product-rating">
										<div class="star-rating" role="img" aria-label="Rated 4.00 out of 5" id="rateQuickView">

										</div>
										<div id="UserViewProduct">

										</div>
									</div>
									<div class="descriptionQuickView">

									</div>
									<form class="cart" method="post" enctype="multipart/form-data">
										<div class="quantity-button">
											<div class="quantity">
												<button type="button" class="plus">+</button>
												<input type="number" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4" placeholder="" inputmode="numeric" autocomplete="off">
												<button type="button" class="minus">-</button>
											</div>
											<button type="submit" class="single-add-to-cart-button button alt">Thêm vào giỏ hàng !</button>
										</div>
										<button class="button quick-buy">Mua ngay !</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

	<!-- Page Loader -->
	<div class="page-preloader">
		<div class="loader">
			<div></div>
			<div></div>
		</div>
	</div>

	<!-- Dependency Scripts -->
	<script src="{{asset('ruper/libs/popper/js/popper.min.js')}}"></script>
	<script src="{{asset('ruper/libs/jquery/js/jquery.min.js')}}"></script>
	<script src="{{asset('ruper/libs/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('ruper/libs/slick/js/slick.min.js')}}"></script>
	<script src="{{asset('ruper/libs/countdown/js/jquery.countdown.min.js')}}"></script>
	<script src="{{asset('ruper/libs/mmenu/js/jquery.mmenu.all.min.js')}}"></script>
	<script src="{{asset('ruper/libs/slider/js/tmpl.js')}}"></script>
	<script src="{{asset('ruper/libs/slider/js/jquery.dependClass-0.1.js')}}"></script>
	<script src="{{asset('ruper/libs/slider/js/draggable-0.1.js')}}"></script>
	<script src="{{asset('ruper/libs/slider/js/jquery.slider.js')}}"></script>
	<script src="{{asset('ruper/libs/elevatezoom/js/jquery.elevatezoom.js')}}"></script>

	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
	<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
	<script src="{{ asset('js/dist/jquery.validate.min.js') }}"></script>
	<script src="{{ asset('js/validateform.js')}}"></script>
	<!-- Site Scripts -->
	<script src="{{asset('ruper/assets/js/app.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/2.2.3/jquery.elevatezoom.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			load_comment();

			function load_comment() {
				var sanpham_id = $('.id_san_pham').val();
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url: "/client/load-comment",
					method: "POST",
					data: {
						sanpham_id: sanpham_id,
						_token: _token
					},
					success: function(data) {
						$('#comment_show').html(data);
					}
				});
			}

			$('.send-comment').click(function() {
				var sanpham_id = $('.id_san_pham').val();
				var comment_content = $('.noi_dung').val();
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url: "/client/send-comment",
					method: "POST",
					data: {
						sanpham_id: sanpham_id,
						comment_content: comment_content,
						_token: _token
					},
					success: function(data) {
						$('#notify_comment').html('<span class="text text-success">Bình luận đã được gửi, bình luận đang chờ duyệt</span>');
						load_comment();
						$('#notify_comment').fadeOut(9000);
						$('.noi_dung').val('');
					}
				});
			});
		});
	</script>

	<script>
		function remove_backgroud(id_sanpham){
			for(var count = 1; count <= 5; count++){
				$('#'+id_sanpham+'-'+count).css('color', '#css');
			}
		}
		//hover chuột đánh giá sao
		$(document).on('mouseenter', '.rating', function(){
			var index = $(this).data('index');
			var id_sanpham = $(this).data('id_sanpham');

			remove_backgroud(id_sanpham);

			for(var count = 1; count <= index; count++){
				$('#'+id_sanpham+'-'+count).css('color', '#ffcc00');
			}
		});
		//nhả chuột không đánh giá
		$(document).on('mouseleave', '.rating', function(){
			var index = $(this).data('index');
			var id_sanpham = $(this).data('id_sanpham');
			var rating = $(this).data('rating');

			remove_backgroud(id_sanpham);

			for(var count = 1; count <= rating; count++){
				$('#'+id_sanpham+'-'+count).css('color', '#ffcc00');
			}
		});

		//click đánh giá sao
		$(document).on('click', '.rating', function(){
			var index = $(this).data("index");
			var id_sanpham = $(this).data('id_sanpham');
			var _token = $('input[name="_token"]').val();
			$.ajax({
					url: "/client/insert_rating",
					method: "POST",
					data: {
						index: index,
						id_sanpham: id_sanpham,
						_token: _token
					},
					success: function(data) {
						if(data == 'done'){
							alert("Bạn đã đánh giá "+index+" trên 5");
						}else{
							alert("Lỗi đánh giá");
						}
					}
				});
		});

	</script>

	<script>
		var acc = document.getElementsByClassName("accordion_menu");
		var i;

		for (i = 0; i < acc.length; i++) {
			acc[i].addEventListener("click", function() {
				this.classList.toggle("active_menu");
				var panel = this.nextElementSibling;
				if (panel.style.display === "block") {
					panel.style.display = "none";
				} else {
					panel.style.display = "block";
				}
			});
		}


		// <!-- Jquery UI Range slider -->

		$("#slider-range").slider({
			orientation: "horizontal",
			range: true,
			min: 0,
			max: $("#max").val(),
			step: 150000,
			values: [0, $("#max").val()],
			slide: function(event, ui) {
				// $("#amount").val(ui.values[0] + "đ - " + ui.values[1] + "đ");
				$("#min").val(ui.values[0]);
				$("#max").val(ui.values[1]);
				$("#amount").val(ui.values[0].toLocaleString('vi-VN', {
					style: 'currency',
					currency: 'VND'
				}) + " - " + ui.values[1].toLocaleString('vi-VN', {
					style: 'currency',
					currency: 'VND'
				}));
			}
		});
		$("#amount").val($("#slider-range").slider("values", 0).toLocaleString('vi-VN', {
				style: 'currency',
				currency: 'VND'
			}) +
			" - " +
			$("#slider-range").slider("values", 1).toLocaleString('vi-VN', {
				style: 'currency',
				currency: 'VND'
			}));
	</script>
	<script>
        // display a modal (small modal)
        $(document).on('click', '#smallButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });

        // display a modal (medium modal)
        $(document).on('click', '#mediumButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#mediumModal').modal("show");
                    $('#mediumBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });

    </script>
	<!-- Địa chỉ khách hàng -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
			<script>
			var citis = document.getElementById("city");
			var districts = document.getElementById("district");
			var wards = document.getElementById("ward");
			var Parameter = {
			url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json", 
			method: "GET", 
			responseType: "application/json", 
		};
		var promise = axios(Parameter);
		promise.then(function (result) {
		renderCity(result.data);
		});

		function renderCity(data) {
		for (const x of data) {
			citis.options[citis.options.length] = new Option(x.Name, x.Id);
		}
		citis.onchange = function () {
			district.length = 1;
			ward.length = 1;
			if(this.value != ""){
			const result = data.filter(n => n.Id === this.value);

			for (const k of result[0].Districts) {
				district.options[district.options.length] = new Option(k.Name, k.Id);
			}
			}
		};
		district.onchange = function () {
			ward.length = 1;
			const dataCity = data.filter((n) => n.Id === citis.value);
			if (this.value != "") {
			const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

			for (const w of dataWards) {
				wards.options[wards.options.length] = new Option(w.Name, w.Id);
			}
			}
		};
		}
	</script>
	<script src="{{ asset('js/dist/jquery.validate.min.js') }}"></script>
	<script src="{{ asset('js/validateform.js')}}"></script>
	<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
	<script src="{{ asset('js/contact.js') }}" defer></script>
	<script src="{{ URL::asset('js/notify.js') }}"></script>
	<script src="{{ asset('js/wishlist.js') }}"></script>
</body>

</html>