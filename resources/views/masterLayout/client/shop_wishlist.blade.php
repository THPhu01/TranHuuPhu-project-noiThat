@extends('masterLayout.client.masterClientHome2')
@section('contentName')
@foreach ($banner as $br)
@if($br->active == 12)
<div id="title" class="page-title" style="background-image: url({{asset( $br->anhBanner )}});">
	<div class="section-container">
		<div class="content-title-heading">
			<h1 class="text-title-heading">
				Danh Sách Yêu Thích
			</h1>
		</div>
		<div class="breadcrumbs">
			<a href="index.html">Trang chủ</a><span class="delimiter"></span><a href="shop-grid-left.html">Cửa Hàng</a><span class="delimiter"></span>Yêu thích
		</div>
	</div>
</div>
@endif
@endforeach
@endsection
@section('contentMain')
<style>
	.oops {
		width: 100%;
		height: 500px;
	}
</style>
<div id="content" class="site-content" role="main">
	<div class="section-padding">
		<div class="section-container p-l-r">
			<div class="shop-wishlist">
				<table class="wishlist-items">
					<tbody id='output'>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div><!-- #content -->
<script src="{{ URL::asset('js/wishlistService.js') }}"></script>
<script src="{{ URL::asset('js/test.js') }}"></script>
@endsection