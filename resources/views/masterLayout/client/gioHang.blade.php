@extends('masterLayout.client.masterClientHome2')
@section('contentMain')
<div id="site-main" class="site-main">
    <div id="main-content" class="main-content">
        <div id="primary" class="content-area">
            @foreach ($banner as $br)
            @if($br->active == 11)
            <div id="title" class="page-title" style="background-image: url({{asset( $br->anhBanner )}});">
                <div class="section-container">
                    <div class="content-title-heading">
                        <h1 class="text-title-heading">
                            Giỏ Hàng
                        </h1>
                    </div>
                    <div class="breadcrumbs">
                        <a href="index.html">Trang chủ</a><span class="delimiter"></span><a href="shop-grid-left.html">Cửa Hàng</a><span class="delimiter"></span>Giỏ hàng
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            <div id="content" class="site-content" role="main">
                <div class="section-padding">
                    <div class="section-container p-l-r">
                        <div class="shop-cart">	
                            <div class="row">
                                <div class="col-xl-8 col-lg-12 col-md-12 col-12">
                                    <form class="cart-form" action="" method="post">
                                        @csrf
                                        <div class="table-responsive">
                                            <table class="cart-items table" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th class="product-thumbnail">Sản Phẩm</th>
                                                        <th class="product-price">Giá Tiền</th>
                                                        <th class="product-quantity">Số Lượng</th>
                                                        <th class="product-subtotal">Tổng Tiền Sản Phẩm</th>
                                                        <th class="product-remove">&nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $subtotal = 0
                                                        
                                                    @endphp
                                                    @foreach ($carts as $item)
                                                        @php
                                                            if($item->sanPham->gia_khuyen_mai != 0){
                                                                $gia = $item->sanPham->gia_khuyen_mai;
                                                            }else{
                                                                $gia = $item->sanPham->gia_goc;
                                                            }
                                                        @endphp
                                                        <tr class="cart-item">		
                                                            <td class="product-thumbnail">
                                                                <a href="shop-details.html">
                                                                    <img width="600" height="600" src="{{$item->sanPham->anh}}" class="product-image" alt="">
                                                                </a>				
                                                                <div class="product-name">
                                                                    <a href="shop-details.html">{{$item->sanPham->tenSP}}</a>								
                                                                </div>
                                                            </td>
                                                            <td class="product-price">
                                                                <span class="price">{{ number_format($gia) , 0 , '' , ','}}</span>
                                                            </td>
                                                            <td class="product-quantity">
                                                                <div class="quantity">
                                                                    <button type="button" class="minus">-</button>	                     
                                                                    <input type="text" class="qty" step="1" min="0" max="" name="cartDetail[]" data-price="{{$gia}}"  value="{{$item->so_luong}}" data-value="{{$item->id}}" title="Qty" size="4" placeholder="" inputmode="numeric" autocomplete="off">

                                                                    <button type="button" class="plus">+</button>
                                                                </div>
                                                            </td>
                                                            <td class="product-subtotal">
                                                                <span id="subtotal-{{$item->id}}">{{ number_format($gia * $item->so_luong , 0 , '' , ',')}} VND</span>
                                                            </td>
                                                            <td class="product-remove">
                                                                <a href="#" class="remove"  data-value="{{$item->id}}">×</a>								
                                                            </td>
                                                        </tr>   
                                                        @php
                                                            $subtotal += $item->so_luong * $gia
                                                        @endphp
                                                    @endforeach

                                                    <tr>
                                                        <td colspan="6" class="actions">
                                                            <div class="bottom-cart">
                                                                <div class="coupon">
                                                                    <input type="text" name="coupon_code" class="input-text" id="coupon-code" value="" placeholder="Nhập mã giảm giá"> 
                                                                    <button type="submit" name="apply_coupon" class="button" value="Apply coupon">Áp dụng giảm giá</button>
                                                                </div> 
                                                                <h2><a href="{{url('/')}}">TIẾP TỤC MUA HÀNG</a></h2>
                                                                @if(isset($carts[0]))
                                                                <a  name="update_cart" id="cart-update" class="button btn-update-cart" data-value="{{$carts[0]->giohang->id}}" value="Update cart">CẬP NHẬT</a>
                                                                @endif
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
                                        <h2>Tổng tiền</h2>
                                        <div>
                                            <div class="cart-subtotal">
                                                <div class="title">Tổng tiền sản phẩm</div>
                                                <div><span id="subTotal">{{ number_format($subtotal , 0 , '' , ',')}} VND</span></div>
                                            </div>
                                            <div class="shipping-totals">
                                                <div class="title">Phí Vận Chuyển</div>
                                                <div>
                                                    <ul class="shipping-methods custom-radio">
                                                        <li>
                                                            <input type="radio" name="shipping_method" data-index="0" value="free_shipping" class="shipping_method" checked="checked"><label>Miễn Phí Vận Chuyển</label>
                                                        </li>
                                                        <li>
                                                            <input type="radio" name="shipping_method" data-index="0" value="flat_rate" class="shipping_method"><label>Flat rate</label>					
                                                        </li>
                                                    </ul>
                                                    <p class="shipping-desc">
                                                        Tiền vận chuyển 				
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="order-total">
                                                <div class="title">Tổng Thành Tiền</div>
                                                <div><span id="total">{{ number_format($subtotal , 0 , '' , ',')}} VND</span></div>
                                            </div>
                                        </div>
                                        <div class="proceed-to-checkout">		
                                            <a href="{{url('/giohang/checkout')}}" class="checkout-button button">
                                                Tiến Hành Thanh Toán
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shop-cart-empty">
                            <div class="notices-wrapper">
                                <p class="cart-empty">Giỏ hàng trống vui lòng thêm sản phẩm!</p>
                            </div>	
                            <div class="return-to-shop">
                                <a class="button" href="shop-grid-left.html">
                                    Trở về mua hàng		
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- #content -->
        </div><!-- #primary -->
    </div><!-- #main-content -->
</div>




@endsection
