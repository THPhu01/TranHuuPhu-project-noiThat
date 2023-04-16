<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Meta Data -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Diamond House</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('img-home/favicon.jpg')}}">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<!-- Dependency Styles -->
	<link rel="stylesheet" href="{{ URL::asset('ruper/libs/bootstrap/css/bootstrap.min.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ URl::asset('ruper/libs/feather-font/css/iconfont.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ URl::asset('ruper/libs/icomoon-font/css/icomoon.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ URl::asset('ruper/libs/font-awesome/css/font-awesome.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ URl::asset('ruper/libs/wpbingofont/css/wpbingofont.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ URl::asset('ruper/libs/elegant-icons/css/elegant.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ URl::asset('ruper/libs/slick/css/slick.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ URl::asset('ruper/libs/slick/css/slick-theme.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ URl::asset('ruper/libs/mmenu/css/mmenu.min.css') }}" type="text/css">

	<!-- Site Stylesheet -->
	<link rel="stylesheet" href="{{ URl::asset('ruper/assets/css/app.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ URl::asset('ruper/assets/css/responsive.css') }}" type="text/css">

	<!-- Google Web Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=EB+Garamond:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="/maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

</head>

<body class="home home-11 title-11">
	<div id="page" class="hfeed page-wrapper">
		<header id="site-header" class="site-header header-v3 relative">
			<div class="header-mobile">
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
									<a href="index11.html">
										<img width="400" height="79" src="{{ asset('ruper/media/logo.png') }}" alt="Ruper – Furniture HTML Theme" />
									</a>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3 header-right">
								<div class="ruper-topcart dropdown">
									<div class="dropdown mini-cart top-cart">
										<div class="remove-cart-shadow"></div>
										<a class="cart-icon" href="{{ route('giohangs.index') }}">
											<div class="icons-cart"><i class="icon-large-paper-bag"></i><span class="cart-count">0</span></div>
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
													<a href="shop-cart.html" class="button btn view-cart btn-primary">View cart</a>
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

					<!-- Search -->
					<div class="search-box">
						<div class="search-toggle"><i class="wpb-icon-magnifying-glass"></i></div>
					</div>

					<!-- Wishlist -->
					<div class="wishlist-box">
						<a href="shop-wishlist.html"><i class="wpb-icon-heart"></i></a>
					</div>
				</div>
			</div>

			<div class="header-desktop">
				<div class="header-wrapper">
					<div class="section-padding">
						<div class="section-container large p-l-r">
							<div class="row">
								<div class="col-xl-6 col-lg-8 col-md-12 col-sm-12 col-12 header-left">
									<div class="site-navigation">
										<nav id="main-navigation">
											<ul id="menu-main-menu" class="menu">
												<li class="level-0 menu-item mega-menu current-menu-item">
													<a href="{{ url('/client/home') }}"><span class="menu-item-text">Trang chủ</span></a>
												</li>
												<li class="level-0 menu-item">
													<a href="{{ route('shop_products.index') }}"><span class="menu-item-text">Cửa Hàng</span></a>
												</li>
												<li class="level-0 menu-item mega-menu mega-menu-fullwidth align-center">
													<a href="{{ url('/client/blog_cate') }}"><span class="menu-item-text">Bài Viết</span></a>
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

								<div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 col-12 header-right">
									<div class="header-search-form hidden-md hidden-sm hidden-xs">
										<form role="search" method="get" class="search-from ajax-search" action="{{ route('shop_products.index') }}">
											@csrf
											<div class="search-box">
												<input type="text" value="" name="search" id="search" class="input-search s" placeholder="Bạn cần tìm gì?">
												<div class="result-search-products-content">
													<div class="result-search-products" id="product_list">
														<!-- <ul class="items-search">
															<li class="item-search">
																<a class="item-image" href="shop-details.html">
																	<img class="pull-left" src="{{ asset('media/product/3.jpg') }}">
																</a>
																<div class="item-content">
																	<a href="shop-details.html" title="Chair Oak Matt Lacquered">
																		<span>Ghế Oak Matt Lacquered</span>
																	</a>
																	<div class="price">600.000 <small>vnđ</small></div>
																</div>
															</li>
															
														</ul> -->
													</div>
												</div>
											</div>
											<button id="search-submit" class="btn" type="submit">
												<span class="search-icon">
													<i class="icon-search"></i>
												</span>
												<span>Search</span>
											</button>
										</form>
									</div>

									<div class="header-page-link">
										<!-- Login -->
										<div class="login-header icon">
											@if (Auth::check())
											Xin chào , {!! Auth::user()->name !!}
											@endif
										</div>

										<!-- Search -->
										<div class="search-box hidden-lg">
											<div class="search-toggle"><i class="wpb-icon-magnifying-glass"></i></div>
										</div>

										<!-- Wishlist -->
										<div class="wishlist-box">
											<a href="{{ url('/client/shop_wishlist') }}"><i class="icon-heart"></i></a>
											<span class="count-wishlist">0</span>
										</div>

										<!-- Cart -->
										<div class="ruper-topcart dropdown light">
											<div class="dropdown mini-cart top-cart">
												<div class="remove-cart-shadow"></div>
												<a class="cart-icon" href="{{ route('giohangs.index') }}">
													<div class="icons-cart"><i class="icon-large-paper-bag"></i><span class="cart-count">0</span></div>
												</a>
												<div class="dropdown-menu cart-popup">
													<div class="cart-empty-wrap">
														<ul class="cart-list">
															<li class="empty">
																<span>Không có sản phẩm trong giỏ.</span>
																<a class="go-shop" href="shop-grid-left.html">ĐẾN SHOP NGAY<i aria-hidden="true" class="arrow_right"></i></a>
															</li>
														</ul>
													</div>
													<div class="cart-list-wrap">
														<ul class="cart-list ">
															<li class="mini-cart-item">
																<a href="#" class="remove" title="Remove this item"><i class="icon_close"></i></a>
																<a href="shop-details.html" class="product-image"><img width="600" height="600" src="media/product/3.jpg" alt=""></a>
																<a href="shop-details.html" class="product-name">GhếChair Oak Matt Lacquered</a>
																<div class="quantity">Số lượng : 1</div>
																<div class="price">600.000 <small>vnđ</small></div>
															</li>
															<li class="mini-cart-item">
																<a href="#" class="remove" title="Remove this item"><i class="icon_close"></i></a>
																<a href="shop-details.html" class="product-image"><img width="600" height="600" src="media/product/1.jpg" alt=""></a>
																<a href="shop-details.html" class="product-name">Bàn Zunkel Schwarz</a>
																<div class="quantity">Số lượng : 1</div>
																<div class="price">600.000 <small>vnđ</small></div>
															</li>
														</ul>
														<div class="total-cart">
															<div class="title-total">Tổng : </div>
															<div class="total-price"><span>1xxxxxxxxx</span></div>
														</div>
														<div class="free-ship">
															<div class="title-ship">Mua <strong>1xxxxxxxx</strong> mua thêm nữa <strong>Miễn phí ship</strong></div>
															<div class="total-percent">
																<div class="percent" style="width:20%"></div>
															</div>
														</div>
														<div class="buttons">
															<a href="shop-cart.html" class="button btn view-cart btn-primary">Xem giỏ hàng</a>
															<a href="shop-checkout.html" class="button btn checkout btn-default">Kiểm tra giỏ hàng</a>
														</div>
													</div>
												</div>
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

		@yield('contentHome')

		<footer id="site-footer" class="site-footer small-space">
			<div class="footer">
				<div class="section-padding">
					<div class="section-container">
						<div class="block-widget-wrap">
							<div class="row">
								<div class="col-lg-3 col-md-6">
									<div class="block block-menu">
										<h2 class="block-title">Liên hệ với chúng tôi</h2>
										<div class="block-content">
											<ul>
												<li>
													<a href="page-contact.html">616.774.0561</a>
												</li>
												<li>
													<a href="page-contact.html">866.453.4748</a>
												</li>
												<li>
													<a href="page-contact.html">HR Fax: 810.222.5439</a>
												</li>
												<li>
													<a href="page-contact.html">ShiftF5@ruperfurniture.com</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-6">
									<div class="block block-menu">
										<h2 class="block-title">Dịch vụ</h2>
										<div class="block-content">
											<ul>
												<li>
													<a href="page-about.html">Sale</a>
												</li>
												<li>
													<a href="page-about.html">Ship Nhanh</a>
												</li>
												<li>
													<a href="page-about.html">Thiết kế mới</a>
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
								<div class="col-lg-3 col-md-6">
									<div class="block block-menu">
										<h2 class="block-title">Help</h2>
										<div class="block-content">
											<ul>
												<li>
													<a href="page-faq.html">Contact & FAQ</a>
												</li>
												<li>
													<a href="page-faq.html">Quá trình vận chuyển</a>
												</li>
												<li>
													<a href="page-faq.html">Đổi trả và hoàn tiền</a>
												</li>
												<li>
													<a href="page-faq.html">Shipping & Delivery</a>
												</li>
												<li>
													<a href="page-faq.html">Lead Times</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-6">
									<div class="block block-menu">
										<h2 class="block-title">Connect</h2>
										<div class="block-content">
											<ul>
												<li>
													<a href="#">Facebook</a>
												</li>
												<li>
													<a href="#">Instagram</a>
												</li>
												<li>
													<a href="#">Pinterest</a>
												</li>
												<li>
													<a href="#">Brosa Blog</a>
												</li>
												<li>
													<a href="#">Careers</a>
												</li>
												<li>
													<a href="#">Media Enquiries</a>
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

	<!-- Search -->
	<div class="search-overlay">
		<div class="close-search"></div>
		<div class="wrapper-search">
			<form role="search" method="get" class="search-from ajax-search" action="">
				<div class="search-box">
					<button id="searchsubmit" class="btn" type="submit">
						<i class="icon-search"></i>
					</button>
					<input id="myInput" type="text" autocomplete="off" value="" name="s" class="input-search s" placeholder="Search...">
					<div class="search-top">
						<div class="close-search">Cancel</div>
					</div>
					<div class="content-menu_search">
						<label>Suggested</label>
						<ul id="menu_search" class="menu">
							<li><a href="#">Furniture</a></li>
							<li><a href="#">Home Décor</a></li>
							<li><a href="#">Industrial</a></li>
							<li><a href="#">Kitchen</a></li>
						</ul>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- Compare -->
	<!-- <div class="compare-popup">
		<div class="compare-popup-inner">
			<div class="compare-table">
				<div class="compare-table-inner">
					<a href="#" id="compare-table-close" class="compare-table-close">
						<span class="compare-table-close-icon"></span>
					</a>
					<div class="compare-table-items">
						<table id="product-table" class="product-table">
							<thead>
								<tr>
									<th>
										<a href="#" class="compare-table-settings">Settings</a>
									</th>
									<th>
										<a href="shop-details.html">GhếChair Oak Matt Lacquered</a> <span class="remove">Xóa</span>
									</th>
									<th>
										<a href="shop-details.html">Bàn Zunkel Schwarz</a> <span class="remove">Xóa</span>
									</th>
									<th>
										<a href="shop-details.html">GhếNamaste Vase</a> <span class="remove">Xóa</span>
									</th>
								</tr>
							</thead>
							<tbody>
								<tr class="tr-image">
									<td class="td-label">Hình</td>
									<td>
										<a href="shop-details.html">
											<img width="600" height="600" src="{{ asset('ruper/media/product/3.jpg')}}" alt="">
										</a>
									</td>
									<td>
										<a href="shop-details.html">
											<img width="600" height="600" src="{{ asset('ruper/media/product/1.jpg')}}" alt="">
										</a>
									</td>
									<td>
										<a href="shop-details.html">
											<img width="600" height="600" src="{{ asset('ruper/media/product/2.jpg')}}" alt="">
										</a>
									</td>
								</tr>
								<tr class="tr-sku">
									<td class="td-label">SKU</td>
									<td>VN00189</td>
									<td></td>
									<td>D1116</td>
								</tr>
								<tr class="tr-rating">
									<td class="td-label">Đánh giá</td>
									<td>
										<div class="star-rating">
											<span style="width:80%"></span>
										</div>
									</td>
									<td>
										<div class="star-rating">
											<span style="width:100%"></span>
										</div>
									</td>
									<td></td>
								</tr>
								<tr class="tr-price">
									<td class="td-label">Giá</td>
									<td><span class="amount">1xxxx</span></td>
									<td><del><span class="amount">1xxxx</span></del> <ins><span class="amount">1xxxx</span></ins></td>
									<td><span class="amount">1xxxxx</span></td>
								</tr>
								<tr class="tr-add-to-cart">
									<td class="td-label">Thêm vào giỏ hàng</td>
									<td>
										<div data-title="Add to cart">
											<a href="#" class="button">Thêm vào giỏ hàng</a>
										</div>
									</td>
									<td>
										<div data-title="Add to cart">
											<a href="#" class="button">Thêm vào giỏ hàng</a>
										</div>
									</td>
									<td>
										<div data-title="Add to cart">
											<a href="#" class="button">Thêm vào giỏ hàng</a>
										</div>
									</td>
								</tr>
								<tr class="tr-description">
									<td class="td-label">Description</td>
									<td>Phasellus sed volutpat orci. Fusce eget lore mauris vehicula elementum gravida
										nec dui. Aenean aliquam varius ipsum, non ultricies tellus sodales eu. Donec
										dignissim viverra nunc, ut aliquet magna posuere eget.</td>
									<td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
										incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
										nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
										fugiat nulla pariatur.</td>
									<td>The EcoSmart Fleece Hoodie full-zip hooded jacket provides medium weight fleece
										comfort all year around. Feel better in this sweatshirt because Hanes keeps
										plastic bottles of landfills by using recycled polyester.7.8 ounce fleece
										sweatshirt made with up to 5 percent polyester created from recycled plastic.
									</td>
								</tr>
								<tr class="tr-content">
									<td class="td-label">Content</td>
									<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
										incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
										nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
										fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
										culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde
										omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam
										rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
										beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit
										aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui
										ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum
										quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi
										tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</td>
									<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
										incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
										nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
										fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
										culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde
										omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam
										rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
										beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit
										aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui
										ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum
										quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi
										tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</td>
									<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
										incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
										nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
										fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
										culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde
										omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam
										rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
										beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit
										aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui
										ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum
										quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi
										tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</td>
								</tr>
								<tr class="tr-dimensions">
									<td class="td-label">Dimensions</td>
									<td>N/A</td>
									<td>N/A</td>
									<td>N/A</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div> -->

	<!-- Quickview -->
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
									<form class="cart" method="POST" action="{{ route('addToCartByQuickView') }}">
										@csrf
										<div class="quantity-button">
											<div class="quantity">
												<button type="button" class="plus">+</button>
												<input type="hidden" name="idProductQuickView" class="idProductQuickView" value="">
												<input type="number" class="input-text qty text inputQuatityQuickView" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4" placeholder="" inputmode="numeric" autocomplete="off">
												<button type="button" class="minus">-</button>
											</div>
											<button class="single-add-to-cart-button button alt">Thêm vào giỏ hàng !</button>
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
	<script src="{{ URL::asset('js/lib/jquery-3.1.1.js') }}"></script>
	<script src="{{ URL::asset('js/notify.js') }}"></script>
	<script src="{{ URL::asset('js/wishlist.js') }}"></script>
	<script src="{{ URL::asset('ruper/libs/popper/js/popper.min.js') }}"></script>
	<script src="{{ URL::asset('ruper/libs/jquery/js/jquery.min.js') }}"></script>
	<script src="{{ URL::asset('ruper/libs/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ URL::asset('ruper/libs/slick/js/slick.min.js') }}"></script>
	<script src="{{ URL::asset('ruper/libs/countdown/js/jquery.countdown.min.js') }}"></script>
	<script src="{{ URL::asset('ruper/libs/mmenu/js/jquery.mmenu.all.min.js') }}"></script>
	<!-- Site Scripts -->
	<script src="{{ URL::asset('ruper/assets/js/app.js') }}"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#search').on('keyup', function() {
				var value = $(this).val();
				$.ajax({
					url: "{{ route('homeClient') }}",
					method: "GET",
					data: {
						'search': value
					},
					success: function(data) {
						$('#product_list').html(data);
					}
				});
			});
			
		});
	</script>

</body>

</html>