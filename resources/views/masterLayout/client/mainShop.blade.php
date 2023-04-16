@extends('masterLayout.client.masterClientHome2')
@section('contentName')
    <div id="title" class="page-title">
        <div class="section-container">
            <div class="content-title-heading">
                <h1 class="text-title-heading">
                    Giỏ Hàng
                </h1>
            </div>
            <div class="breadcrumbs">
                <a href="index.html">Trang chủ</a><span class="delimiter"></span><a href="shop-grid-left.html">Shop</a><span class="delimiter"></span>Giỏ hàng
            </div>
        </div>
    </div>
@endsection
@section('contentMain')
    <div id="content" class="site-content" role="main">
        <div class="section-padding">
            <div class="section-container p-l-r">
                <div class="shop-cart">	
                    <div class="row">
                        <div class="col-xl-8 col-lg-12 col-md-12 col-12">
                            <form class="cart-form" action="" method="post">
                                <div class="table-responsive">
                                    <table class="cart-items table" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="product-thumbnail">Sản phẩm</th>
                                                <th class="product-price">Gía</th>
                                                <th class="product-quantity">Số lượng</th>
                                                <th class="product-subtotal">Tổng phụ</th>
                                                <th class="product-remove">&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="cart-item">		
                                                <td class="product-thumbnail">
                                                    <a href="shop-details.html">
                                                        <img width="600" height="600" src="media/product/3.jpg" class="product-image" alt="">
                                                    </a>				
                                                    <div class="product-name">
                                                        <a href="shop-details.html">Chair Oak Matt Lacquered</a>								
                                                    </div>
                                                </td>
                                                <td class="product-price">
                                                    <span class="price">$150.00</span>
                                                </td>
                                                <td class="product-quantity">
                                                    <div class="quantity">
                                                        <button type="button" class="minus">-</button>	
                                                        <input type="number" class="qty" step="1" min="0" max="" name="quantity" value="2" title="Qty" size="4" placeholder="" inputmode="numeric" autocomplete="off">
                                                        <button type="button" class="plus">+</button>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal">
                                                    <span>$300.00</span>
                                                </td>
                                                <td class="product-remove">
                                                    <a href="#" class="remove">×</a>								
                                                </td>
                                            </tr>
                                            <tr class="cart-item">		
                                                <td class="product-thumbnail">
                                                    <a href="shop-details.html">
                                                        <img width="600" height="600" src="media/product/1.jpg" class="product-image" alt="">
                                                    </a>				
                                                    <div class="product-name">
                                                        <a href="shop-details.html">Zunkel Schwarz</a>								
                                                    </div>
                                                </td>
                                                <td class="product-price">
                                                    <span>$180.00</span>
                                                </td>
                                                <td class="product-quantity">
                                                    <div class="quantity">
                                                        <button type="button" class="minus">-</button>	
                                                        <input type="number" class="qty" step="1" min="0" max="" name="quantity" value="1" title="Qty" size="4" placeholder="" inputmode="numeric" autocomplete="off">
                                                        <button type="button" class="plus">+</button>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal">
                                                    <span class="price">$180.00</span>
                                                </td>
                                                <td class="product-remove">
                                                    <a href="#" class="remove">×</a>								
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" class="actions">
                                                    <div class="bottom-cart">
                                                        <div class="coupon">
                                                            <input type="text" name="coupon_code" class="input-text" id="coupon-code" value="" placeholder="Mã giảm giá"> 
                                                            <button type="submit" name="apply_coupon" class="button" value="Apply coupon">Nhập mã giảm giá</button>
                                                        </div>
                                                        <h2><a href="shop-grid-left.html">Tiếp tục mua sắm</a></h2>
                                                        <button type="submit" name="update_cart" class="button" value="Update cart">Cập nhật giỏ hàng</button>
                                                    </div>	
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                        <div class="col-xl-4 col-lg-12 col-md-12 col-12">
                            <div class="cart-totals">
                                <h2>Tổng giỏ hàng</h2>
                                <div>
                                    <div class="cart-subtotal">
                                        <div class="title">Tổng phụ</div>
                                        <div><span>$480.00</span></div>
                                    </div>
                                    <div class="shipping-totals">
                                        <div class="title">Đang vận chuyển</div>
                                        <div>
                                            <ul class="shipping-methods custom-radio">
                                                <li>
                                                    <input type="radio" name="shipping_method" data-index="0" value="free_shipping" class="shipping_method" checked="checked"><label>Miễn phí vận chuyển</label>
                                                </li>
                                                <li>
                                                    <input type="radio" name="shipping_method" data-index="0" value="flat_rate" class="shipping_method"><label>Tỷ lệ cố định</label>					
                                                </li>
                                            </ul>
                                            <p class="shipping-desc">
                                                Tùy chọn vận chuyển sẽ được cập nhật trong quá trình thanh toán.			
                                            </p>
                                        </div>
                                    </div>
                                    <div class="order-total">
                                        <div class="title">Tổng cộng</div>
                                        <div><span>$480.00</span></div>
                                    </div>
                                </div>
                                <div class="proceed-to-checkout">		
                                    <a href="shop-checkout.html" class="checkout-button button">
                                        Tiến hành kiểm tra hàng
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="shop-cart-empty">
                    <div class="notices-wrapper">
                        <p class="cart-empty">Your cart is currently empty.</p>
                    </div>	
                    <div class="return-to-shop">
                        <a class="button" href="shop-grid-left.html">
                            Return to shop		
                        </a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div><!-- #content -->
@endsection