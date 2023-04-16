@extends('masterLayout.client.masterClientHome2')
@section('contentName')
	<div id="title" class="page-title">
		<div class="section-container">
			<div class="content-title-heading">
				<h1 class="text-title-heading">
					Thủ Tục Thanh Toán
				</h1>
			</div>
			<div class="breadcrumbs">
				<a href="index.html">Trang chủ</a><span class="delimiter"></span><a href="shop-grid-left.html">Cửa hàng</a><span class="delimiter"></span>Thanh toán
			</div>
		</div>
	</div>
@endsection
@section('contentMain')
	<div id="content" class="site-content" role="main">
		<div class="section-padding">
			<div class="section-container p-l-r">
				<div class="shop-checkout">
					<form name="checkout" method="POST" class="checkout" action="{{route('checkout')}}" autocomplete="off">
						@csrf
						<div class="row">
							<div class="col-xl-8 col-lg-7 col-md-12 col-12">
								<div class="customer-details">
									<div class="billing-fields">
										<h3>Chi tiết thanh toán</h3>
										<div class="billing-fields-wrapper">
											<p class="form-row form-row-first validate-required">
												<label>Tên <span class="required" title="required" >*</span></label>
												<span class="input-wrapper"><input type="text" class="input-text" name="billing_first_name" value="" required></span>
											</p>
											<p class="form-row form-row-last validate-required">
												<label>Họ <span class="required" title="required">*</span></label>
												<span class="input-wrapper"><input type="text" class="input-text" name="billing_last_name" value="" required></span>
											</p>

											<p class="form-row address-field validate-required form-row-wide">
												<label>Địa chỉ <span class="required" title="required">*</span></label>
												<span class="input-wrapper">
													<input type="text" class="input-text" name="billing_address_1" placeholder="Số nhà và tên đường" value="" required>
												</span>
											</p>
											
											<p class="form-row form-row-wide validate-required validate-phone">
												<label>Số điện thoại <span class="required" title="required">*</span></label>
												<span class="input-wrapper">
													<input type="tel" class="input-text" name="billing_phone" value="" required>
												</span>
											</p>
											<p class="form-row form-row-wide validate-required validate-email">
												<label>Email <span class="required" title="required">*</span></label>
												<span class="input-wrapper">
													<input type="email" class="input-text" name="billing_email" value="" autocomplete="off" required>
												</span>
											</p>
										</div>
									</div>
									{{-- <div class="account-fields">
										<p class="form-row form-row-wide">
											<label class="checkbox">
												<input class="input-checkbox" type="checkbox" name="createaccount" value="1"> 
												<span>Create an account?</span>
											</label>
										</p>
										<div class="create-account">
											<p class="form-row validate-required">
												<label>Create account password <span class="required" title="required">*</span></label>
												<span class="input-wrapper password-input">
													<input type="password" class="input-text" name="account_password" value="" autocomplete="off">
													<span class="show-password-input"></span>
												</span>
											</p>								
											<div class="clear"></div>
										</div>
									</div> --}}
								</div>
								{{-- <div class="shipping-fields">
									<p class="form-row form-row-wide ship-to-different-address">
										<label class="checkbox">
											<input class="input-checkbox" type="checkbox" name="ship_to_different_address" value="1"> 
											<span>Ship to a different address?</span>
										</label>
									</p>
									<div class="shipping-address">
										<p class="form-row form-row-first validate-required">
											<label>First name <span class="required" title="required">*</span></label>
											<span class="input-wrapper">
												<input type="text" class="input-text" name="shipping_first_name" value="">
											</span>
										</p>
										<p class="form-row form-row-last validate-required">
											<label>Last name <span class="required" title="required">*</span></label>
											<span class="input-wrapper">
												<input type="text" class="input-text" name="shipping_last_name" value="">
											</span>
										</p>
										<p class="form-row form-row-wide">
											<label>Company name <span class="optional">(optional)</span></label>
											<span class="input-wrapper">
												<input type="text" class="input-text" name="shipping_company" value="">
											</span>
										</p>
										<p class="form-row form-row-wide address-field validate-required">
											<label for="shipping_country" class="">Country / Region <span class="required" title="required">*</span></label>
											<span class="input-wrapper">
												<select name="billing_state" class="state-select custom-select">
													<option value="">Select a country / region…</option>
													<option value="VN">Vinnytsia Oblast</option>
													<option value="VL">Volyn Oblast</option>
													<option value="DP">Dnipropetrovsk Oblast</option>
													<option value="DT">Donetsk Oblast</option>
													<option value="ZT">Zhytomyr Oblast</option>
												</select>
											</span>
										</p>
										<p class="form-row address-field validate-required form-row-wide">
											<label>Street address <span class="required" title="required">*</span></label>
											<span class="input-wrapper">
												<input type="text" class="input-text" name="shipping_address_1" placeholder="House number and street name" value="">
											</span>
										</p>
										<p class="form-row address-field form-row-wide">
											<label>Apartment, suite, unit, etc. <span class="optional">(optional)</span></label>
											<span class="input-wrapper">
												<input type="text" class="input-text" name="shipping_address_2" placeholder="Apartment, suite, unit, etc. (optional)" value="">
											</span>
										</p>
										<p class="form-row address-field validate-required form-row-wide">
											<label>Town / City <span class="required" title="required">*</span></label>
											<span class="input-wrapper"><input type="text" class="input-text" name="shipping_city" value=""></span>
										</p>
										<p class="form-row address-field validate-required validate-state form-row-wide">
											<label for="shipping_state" class="">State / County <span class="required" title="required">*</span></label>
											<span class="input-wrapper">
												<select name="billing_state" class="state-select custom-select">
													<option value="">Select a state / county…</option>
													<option value="VN">Vinnytsia Oblast</option>
													<option value="VL">Volyn Oblast</option>
													<option value="DP">Dnipropetrovsk Oblast</option>
													<option value="DT">Donetsk Oblast</option>
													<option value="ZT">Zhytomyr Oblast</option>
												</select>
											</span>
										</p>
										<p class="form-row address-field validate-required validate-postcode form-row-wide">
											<label>Postcode / ZIP <span class="required" title="required">*</span></label>
											<span class="input-wrapper">
												<input type="text" class="input-text" name="shipping_postcode" value="">
											</span>
										</p>
									</div>
								</div> --}}
								<div class="additional-fields">
									<p class="form-row notes">
										<label>Ghi chú đặt hàng <span class="optional">(tùy chọn)</span></label>
										<span class="input-wrapper">
											<textarea name="order_comments" class="input-text" placeholder="Ghi chú về đơn đặt hàng của bạn." rows="2" cols="5"></textarea>
										</span>
									</p>
								</div>
							</div>
							<div class="col-xl-4 col-lg-5 col-md-12 col-12">
								<div class="checkout-review-order">
									<div class="checkout-review-order-table">
										<div class="review-order-title">Sản phẩm</div>
										<div class="cart-items">
											@php
												$total = 0;
											@endphp
											@foreach($carts as $cart)
												@php
													if($cart->sanPham->gia_khuyen_mai != 0){
														$giaTong = $cart->sanPham->gia_khuyen_mai;
													}else{
														$giaTong = $cart->sanPham->gia_goc;
													}
												@endphp
											<div class="cart-item">
												<div class="info-product">
													<div class="product-thumbnail">
														<img width="600" height="600" src="{{$cart->sanPham->anh}}" alt="">					
													</div>
													<div class="product-name">
														{{$cart->sanPham->tenSP}}
														<strong class="product-quantity">Số lượng : {{$cart->so_luong}}</strong>											
													</div>
												</div>
												<div class="product-total">
													<span>{{number_format($giaTong * $cart->so_luong,0,'',',')  }}đ</span>
												</div>
											</div>
											@php
											$total +=  $giaTong * $cart->so_luong;
											@endphp
											@endforeach	
										</div>
										<div class="cart-subtotal">
											<h2>Tổng Phụ ( Trước giảm giá )</h2>
											<div class="subtotal-price">
												{{number_format($total,0,'',',')}}
											</div>
										</div>
										{{-- <div class="shipping-totals shipping">
											<h2>Đang vận chuyển</h2>
											<div data-title="Shipping">
												<ul class="shipping-methods custom-radio">
													<li>
														<input type="radio" name="shipping_method" data-index="0" value="free_shipping" class="shipping_method" checked="checked"><label>Miễn phí vận chuyển</label>
													</li>
													<li>
														<input type="radio" name="shipping_method" data-index="0" value="flat_rate" class="shipping_method"><label>Tỷ lệ cố định</label>					
													</li>
												</ul>
											</div>
										</div> --}}
										<div class="order-total">
											<h2>Tổng Cộng ( Sau giảm giá )</h2>
											<div class="total-price">
												<strong>
													{{number_format($total,0,'',',')}}
												</strong> 
											</div>
										</div>
									</div>
									<div id="payment" class="checkout-payment">
										<ul class="payment-methods methods custom-radio">
											<li class="payment-method">
												<input type="radio" class="input-radio" name="payment_method" value="0" checked="checked">
												<label for="payment_method_bacs">Chuyển khoản trực tiếp</label>
												<div class="payment-box">
													<p>Thực hiện thanh toán của bạn trực tiếp vào tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng ID đơn đặt hàng của bạn làm tham chiếu thanh toán. Đơn đặt hàng của bạn sẽ không được giao cho đến khi số tiền trong tài khoản của chúng tôi được thanh toán.</p>
												</div>
											</li>
											{{-- <li class="payment-method">
												<input type="radio" class="input-radio" name="payment_method" value="cheque">
												<label>Kiểm tra thanh toán</label>
												<div class="payment-box">
													<p>Vui lòng gửi séc tới Tên cửa hàng, Phố cửa hàng, Thị trấn cửa hàng, Bang / Hạt cửa hàng, Mã bưu điện cửa hàng.</p>
												</div>
											</li> --}}
											<li class="payment-method">
												<input type="radio" class="input-radio" name="payment_method" value="1">
												<label>Thanh toán khi giao hàng</label>
												<div class="payment-box">
													<p>Thanh toán bằng tiền mặt khi giao hàng.</p>
												</div>
											</li>
											{{-- <li class="payment-method">
												<input type="radio" class="input-radio" name="payment_method" value="paypal">
												<label>PayPal</label>
												<div class="payment-box">
													<p>Thanh toán qua PayPal; bạn có thể thanh toán bằng thẻ tín dụng nếu bạn không có tài khoản PayPal.</p>
												</div>
											</li> --}}
										</ul>
										<div class="form-row place-order">
											<div class="terms-and-conditions-wrapper">
												<div class="privacy-policy-text"></div>
											</div>
											<button type="submit" class="button alt" name="checkout_place_order" value="Place order">Đặt hàng</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!-- #content -->
@endsection
