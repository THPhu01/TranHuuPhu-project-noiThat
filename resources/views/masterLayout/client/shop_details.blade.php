@extends('masterLayout.client.masterClientHome2')
@section('contentName')
@foreach ($banner as $br)
@if($br->active == 3)
<div id="title" class="page-title" style="background-image: url({{asset( $br->anhBanner )}});">
	<div class="section-container">
		<div class="content-title-heading">
			<h1 class="text-title-heading">
				Cửa Hàng
			</h1>
		</div>
		<div class="breadcrumbs">
			<a href="{{route('homeClient')}}">Trang chủ</a><span class="delimiter"></span><span class="delimiter"></span>Sản phẩm
		</div>
	</div>
</div>
@endif
@endforeach
@endsection
@section('contentMain')
<div id="content" class="site-content" role="main">
	<div class="shop-details zoom" data-product_layout_thumb="scroll" data-zoom_scroll="true" data-zoom_contain_lens="true" data-zoomtype="inner" data-lenssize="200" data-lensshape="square" data-lensborder="" data-bordersize="2" data-bordercolour="#f9b61e" data-popup="false">
		<div class="product-top-info">
			<div class="section-padding">
				<div class="section-container p-l-r">
					<div class="row">
						<div class="product-images col-lg-7 col-md-12 col-12">
							<div class="row">
								<div class="col-md-2">
									<div class="content-thumbnail-scroll">
										<div class="image-thumbnail slick-carousel slick-vertical" data-asnavfor=".image-additional" data-centermode="true" data-focusonselect="true" data-columns4="5" data-columns3="4" data-columns2="4" data-columns1="4" data-columns="4" data-nav="true" data-vertical="&quot;true&quot;" data-verticalswiping="&quot;true&quot;">
											<div class="img-item slick-slide">
												<span class="img-thumbnail-scroll">
													<img width="600" height="600" src="{{ $chiTiet->anh }}" alt="">
												</span>
											</div>
											@foreach($chiTiet->thumbnail as $item)
											<div class="img-item slick-slide">
												<span class="img-thumbnail-scroll">
													<img width="600" height="600" src="{{ $item }}" alt="">
												</span>
											</div>
											@endforeach
										</div>
									</div>
								</div>
								<div class="col-md-10">
									<div class="scroll-image main-image">
										<div class="image-additional slick-carousel" data-asnavfor=".image-thumbnail" data-fade="true" data-columns4="1" data-columns3="1" data-columns2="1" data-columns1="1" data-columns="1" data-nav="true">
											<div class="img-item slick-slide">
												<img width="900" height="900" src="{{ $chiTiet->anh}}" alt="" title="">
											</div>
											@foreach($chiTiet->thumbnail as $item)
											<div class="img-item slick-slide">
												<img width="900" height="900" src="{{ $item}}" alt="" title="">
											</div>
											@endforeach


										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="product-info col-lg-5 col-md-12 col-12 ">
							<h1 class="title">{{$chiTiet->tenSP}}</h1>
							@if ($chiTiet->hot == 1)
							<span class="price">
								<del aria-hidden="true"> <span style="margin-right: 10px">{{number_format($chiTiet->gia_goc, 0, '', '.')}}đ</span></del>
								<ins><span>{{number_format($chiTiet->gia_khuyen_mai, 0, '', '.')}}đ</span></ins>
							</span>
							@else

							<span class="price" style="color:red">{{number_format($chiTiet->gia_goc, 0, '', '.')}}đ</span>

							</span>
							@endif

							<div class="rating">
								@if ($chiTiet->rate == 5)
								<div class="star star-5"></div>
								@else
								<div class="star star-4"></div>
								@endif
							</div>
							<div class="description">
								{!!$chiTiet->mo_ta!!}
							</div>
							<div class="variations">
								<table cellspacing="0">
									<tbody>
										<tr>
											<td class="label" style="width:105px">Kích thước</td>
											<td class="attributes">
												<ul class="text">
													<li><span>{{$chiTiet->kich_thuoc}}</span></li>

												</ul>
											</td>
										</tr>
										<tr>
											<td class="label" style="width:105px">Vật liệu</td>
											<td class="attributes">
												<ul class="text">
													<li><span>{{$chiTiet->vatLieu->ten_vl}}</span></li>

												</ul>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="buttons">
								<div class="add-to-cart-wrap">
									<div class="quantity">
										{{-- <button type="button" class="plus">+</button>
										<input type="number" class="qty" step="1" min="0" max="" name="quantity" value="1" title="Qty" size="4" placeholder="" inputmode="numeric" autocomplete="off">
										<button type="button" class="minus">-</button> --}}
									</div>
									<div class="btn-add-to-cart">
										<a href="#" class="button" tabindex="0" data-value="{{$chiTiet->id}}">Thêm vào giỏ</a>
									</div>
								</div>
								<div class="btn-quick-buy" data-title="Wishlist">
									{{-- <button class="product-btn">Mua ngay</button> --}}
								</div>
								<div class="btn-wishlist" data-title="Wishlist">
									<button class="product-btn">Thêm vào yêu thích</button>
								</div>
							</div>
							<div class="product-meta">
								<span class="sku-wrapper">MÃ HÀNG: <span class="sku">D2300-3-2-2</span></span>
								<span class="posted-in">Loại: <a href="shop-grid-left.html" rel="tag">{{$chiTiet->loaiDm->tenLoaidm}}</a></span>
								<span class="tagged-as">Tags: <a href="shop-grid-left.html" rel="tag">Hot</a>, <a href="shop-grid-left.html" rel="tag">Trend</a></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="product-tabs">
			<div class="section-padding">
				<div class="section-container p-l-r">
					<div class="product-tabs-wrap">
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#description" role="tab">Miêu tả</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#additional-information" role="tab">Thông tin</a>
							</li>
							<li class="nav-item active">
								<a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Đánh giá (1)</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade" id="description" role="tabpanel">
								<p>{!!$chiTiet->mo_ta!!}</p>

							</div>
							<div class="tab-pane fade" id="additional-information" role="tabpanel">
								<table class="product-attributes">
									<tbody>
										<tr class="attribute-item">
											<th class="attribute-label">Kích thước</th>
											<td class="attribute-value">{{$chiTiet->kich_thuoc}}</td>
										</tr>
										<tr class="attribute-item">
											<th class="attribute-label">Vật liệu</th>
											<td class="attribute-value">{{$chiTiet->vatLieu->ten_vl}}</td>
										</tr>
									</tbody>
								</table>
							</div>

							{{-- Đánh giá --}}
							<div class="tab-pane fade show active" id="reviews" role="tabpanel">
								<div id="reviews" class="product-reviews">
									<div id="comments">
										<h2 class="reviews-title">Đánh giá <span>{{$chiTiet->tenSP}}</span></h2>
										<form>
											@csrf
											<input type="hidden" name="id_san_pham" class="id_san_pham" value="{{$chiTiet->id}}">
											<ol class="comment-list">
												<li class="review">
													<div class="content-comment-container" id="comment_show">
													</div>
												</li>
											</ol>
										</form>
									</div>
									<div id="review-form">
										<div id="respond" class="comment-respond">
											<span id="reply-title" class="comment-reply-title">Thêm một đánh giá</span>
											<form action="" method="post" id="comment-form" class="comment-form" onsubmit="return false">
												@csrf
												@method('PUT')
												<input type="hidden" name="id_san_pham" class="id_san_pham" value="{{$chiTiet->id}}">
												<p class="comment-notes">
													<span id="email-notes">Địa chỉ email của bạn sẽ không được công bố.</span> Các trường bắt buộc được đánh dấu <span class="required">*</span>
												</p>
												<div class="comment-form-rating">
													<label for="rating">Đánh giá của bạn</label>
													<ul class="list-inline rating" style=" margin-left: -20px;">
														@for ($count=1; $count<=5; $count++)
															@php
																if ($count<=$rating) {
																	$color = 'color:#ffcc00;';
																}
																else {
																	$color = 'color:#ccc;';
																}
															@endphp
															<li id="{{$chiTiet->id}}-{{$count}}" data-index="{{$count}}" data-id_sanpham="{{$chiTiet->id}}" data-rating="{{$rating}}"
															class="rating stars" style="cursor: pointer; {{$color}} font-size:30px; margin-right: -150px;">&#9733;</li>
														@endfor
													</ul>
												</div>
												<div class="content-info-reviews">
													<p class="comment-form-comment">
														<textarea id="comment" name="noi_dung" class="noi_dung" aria-required="true" required=""></textarea>
													</p>
													<button type="submit" class="btn btn-secondary send-comment">Gửi bình luận</button>
													<div id="notify_comment"></div>
												</div>

											</form><!-- #respond -->
										</div>
									</div>
									<div class="clear"></div>
								</div>
							</div>

							{{-- Hết đánh giá --}}
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="product-related">
			<div class="section-padding">
				<div class="section-container p-l-r">
					<div class="block block-products slider">
						<div class="block-title">
							<h2>Sản phẩm tương tự</h2>
						</div>
						<div class="block-content">
							<div class="content-product-list slick-wrap">
								<div class="slick-sliders products-list grid" data-slidestoscroll="true" data-dots="false" data-nav="1" data-columns4="1" data-columns3="2" data-columns2="3" data-columns1="3" data-columns1440="4" data-columns="4">
									@foreach ($san_pham_tt as $sp)
									@if ($sp->id != $chiTiet->id)
									<div class="item-product slick-slide">
										<div class="items">
											<div class="products-entry clearfix product-wapper">
												<div class="products-thumb">
													<div class="product-lable">
														<div class="hot">
															@if ($sp->hot == 1)
															Hot
															@endif
														</div>
													</div>
													<div class="product-thumb-hover" style="height:200px!important">
														<a href="{{ route('shop_detail.show' ,['shop_detail'=>$sp->id]) }}">
															<img width="600" height="600" src="{{$sp->anh}}" class="post-image" alt="" style="height:200px!important">
															<img width="600" height="600" src="{{$sp->anh}}" class="hover-image back" alt="" style="height: 200px !important;">
														</a>
													</div>
													<div class="product-button">
														<div class="btn-add-to-cart" data-title="Thêm vào giỏ hàng">
															<a rel="nofollow" data-value="{{$sp->id}}" href="#" class="product-btn button">Thêm vào giỏ hàng</a>
														</div>
														<div class="btn-wishlist" data-title="Yêu thích">
															<button class="product-btn addWishlist" value-product="{{$sp->id}}">Thêm vào danh sách yêu thích</button>
														</div>
														<span class="product-quickview" data-title="Xem nhanh">
															<a href="#" class="quickview quickview-button quickview-data" value-quickview="{{$sp->id}}"> Xem nhanh! <i class="icon-search"></i></a>
														</span>
													</div>
												</div>
												<div class="products-content">
													<div class="contents text-center">
														<h3 class="product-title"><a href="{{ route('shop_detail.show' ,['shop_detail'=>$sp->id]) }}">{{$sp->tenSP}}</a></h3>
														@if ($sp->hot == 1)
														<span class="price" style="text-decoration: line-through;">
															{{number_format($sp->gia_goc, 0, '', '.')}}
															<span class="price">đ</span>
														</span>
														<span class="price" style="color:red;margin-left: 20px;">
															{{number_format($sp->gia_khuyen_mai, 0, '', '.')}}
															<span class="price" style="color:red;">đ</span>
														</span>
														@else
														{{number_format($sp->gia_goc, 0, '', '.')}}
														<span class="price">đ</span>
														</span>
														@endif
													</div>
												</div>
											</div>
										</div>
									</div>
									@endif
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- #content -->
@endsection