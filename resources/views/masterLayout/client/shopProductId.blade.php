@extends('masterLayout.client.masterClientHome2')
@section('contentName')
@foreach ($banner as $br)
@if($br->active == 2)
<div id="title" class="page-title" style="background-image: url({{asset( $br->anhBanner )}});">
    <div class="section-container">
        <div class="content-title-heading">
            <h1 class="text-title-heading">
                Cửa hàng
            </h1>
        </div>
        <div class="breadcrumbs">
            <a href="{{route('homeClient')}}">Trang chủ</a><span class="delimiter"></span>Sản Phẩm
        </div>
    </div>
</div>
@endif
@endforeach
@endsection
@section('contentMain')
<style>
    .list_dm::before {
        content: "\e915";
        font-size: 15px;
        font-family: wpbingofont;
        display: inline-block;
        margin-right: 10px;
    }

    #flood-right a {
        background-image: linear-gradient(to right,
                #000,
                #000 50%,
                #000 50%);
        background-size: 200% 100%;
        background-position: -100%;
        display: inline-block;
        padding: 5px 0;
        position: relative;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        transition: all 0.3s ease-in-out;
    }

    #flood-right a:before {
        content: '';
        background: #000;
        display: block;
        position: absolute;
        bottom: -3px;
        left: 0;
        width: 0;
        height: 1px;
        transition: all 0.3s ease-in-out;
    }

    #flood-right a:hover {
        background-position: 0;
    }

    #flood-right a:hover::before {
        width: 100%;
    }
    .block-content .btn.btn-search:hover {
        background: rgba(0, 0, 0, .75) !important;
    }
    .layout-slider .btn.btn-loc-gia:hover {
        background: rgba(0, 0, 0, .75) !important;
    }
</style>
<div id="content" class="site-content" role="main">
    <div class="section-padding">
        <div class="section-container p-l-r">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-12 col-12 sidebar left-sidebar md-b-50">
                    <!-- Block Product Categories -->
                    <div class="block block-post-search">
                        <div class="block-title">
                            <h2>Tìm Kiếm</h2>
                        </div>
                        <div class="block-content">
                            <form method="GET" class="search-from search-menu-hover" action="">
                                <input type="text" value="" name="key" class="s" placeholder="Tìm kiếm...">
                                <button class="btn btn-search" type="submit" style="background-color: #000">
                                    <i class="icon-search" style="color: #ffff"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="block block-product-cats">
                        <div class="block-title">
                            <h2>Danh Mục</h2>
                        </div>
                        <div class="block-content">
                            <div class="product-cats-list">
                                <ul>
                                    @foreach ($danhMuc as $dm)
                                    <li class="current">

                                        <button class="accordion_menu">{{$dm ->ten_dm}}</a><span class="count">{{$dm->loaiDanhMucs->count()}}</span></button>
                                        <div class="panel">
                                            @if ($dm->loaiDanhMucs->count())
                                            <ul>
                                                @foreach ($dm->loaiDanhMucs as $ldm)
                                                <li id="flood-right">
                                                    <a href="{{ route('shop_productId.show' ,['shop_productId'=>$ldm->id]) }}"><span class="list_dm">{{$ldm->tenLoaidm}}</span>
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Block Product Filter -->
                    <div class="block block-product-filter">
                        <div class="block-title">
                            <h2>Giá</h2>
                        </div>
                        <div class="block-content">
                            <div id="slider-range" class="price-filter-wrap">
                                <div class="filter-item price-filter">
                                    <div class="layout-slider">
                                        <form>
                                            <input type="text" id="amount" readonly style="border:0; color:#000; font-weight:bold;margin-top:6px">
                                            <input type="hidden" id="min" name="price_min" value="0">
                                            <input type="hidden" id="max" name="price_max" value="{{$max_price + 150000}}">
                                            <input type="submit" value="Lọc giá" class="btn btn-loc-gia" style="background: #000;border: 0;font-size: 13px;color: #fff;text-transform: uppercase;cursor: pointer;font-weight: 500; letter-spacing: .1em;margin-left: 195px;">

                                            <div id="slider-range">
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="block block-product-cats">
                        <div class="block-title">
                            <h2>Vật liệu</h2>
                        </div>
                        <div class="block-content">
                            <div class="product-cats-list">
                                <ul>
                                    @foreach ($vat_lieu as $vl)
                                    <a href="{{ route('shop_products.show' ,['shop_product'=>$vl->id]) }}">
                                        <li class="current">
                                            <button class="accordion_menu">{{$vl ->ten_vl}}
                                                <span class="count">{{$vl->sanPhams->count()}}</span></button>

                                        </li>
                                    </a>

                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Block Product Filter -->


                    <!-- Block Product Filter -->


                    <!-- Block Products -->

                </div>

                <div class="col-xl-9 col-lg-9 col-md-12 col-12">
                    <div class="products-topbar clearfix">
                        <div class="products-topbar-left">
                            <div class="products-count">



                            </div>
                        </div>
                        <div class="products-topbar-right">
                            <div class="products-sort dropdown">

                                <span class="sort-toggle dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Lọc mặc định</span>
                                <ul class="sort-list dropdown-menu" x-placement="bottom-start">
                                    <li class="active"><a href="{{route('shop_products.index')}}">Lọc mặc định</a></li>
                                    <li><a href="{{Request::url()}}?loc_sp=tang_dan">Lọc giá từ thấp đến cao</a></li>
                                    <li><a href="{{Request::url()}}?loc_sp=giam_dan">Lọc giá từ cao đến thấp</a></li>
                                    <li><a href="{{Request::url()}}?loc_sp=ten_az">Lọc tên A-Z</a></li>
                                    <li><a href="{{Request::url()}}?loc_sp=ten_za">Lọc tên Z-A</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="layout-grid" role="tabpanel">
                            <div class="products-list grid">
                                <div class="row">
                                    @foreach ($sanPham as $sp)
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                        <div class="products-entry clearfix product-wapper">
                                            <div class="products-thumb">
                                                <div class="product-lable">
                                                    <div class="hot">
                                                        @if ($sp->hot == 1)
                                                        Hot
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="product-thumb-hover" style="height:200px !important;">
                                                    <a href="{{ route('shop_detail.show' ,['shop_detail'=>$sp->id]) }}">
                                                        <img width="600" height="600" src="{{$sp->anh}} " class="post-image" alt="" style="height:200px !important;">
                                                        <img width="600" height="600" src="{{$sp->anh}}  " class="hover-image back" alt="" style="height:200px !important;">
                                                    </a>
                                                </div>
                                                <div class="product-button">
                                                    <div class="btn-add-to-cart" data-title="Thêm vào giỏ hàng">
                                                        <a rel="nofollow" href="#" class="product-btn button">Thêm vào giỏ hàng</a>
                                                    </div>
                                                    <div class="btn-wishlist" data-title="Thêm vào danh sách yêu thích">
                                                        <button class="product-btn">Thêm vào danh sách yêu thích</button>
                                                    </div>
                                                    <!-- <div class="btn-compare" data-title="Compare">
                                                        <button class="product-btn"></button>
                                                    </div> -->
                                                    <span class="product-quickview" data-title="Quick View">
                                                        <a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="products-content">
                                                <div class="contents text-center">
                                                    <h3 class="product-title"><a href="{{ route('shop_detail.show',['shop_detail'=>$sp->id]) }}">{{$sp->tenSP}} </a></h3>
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
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        <!-- <div class="tab-pane fade" id="layout-list" role="tabpanel">
                            <div class="products-list list">
                                <div class="products-entry clearfix product-wapper">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="products-thumb">
                                                <div class="product-lable">
                                                    <div class="hot">Hot</div>
                                                </div>
                                                <div class="product-thumb-hover">
                                                    <a href="shop-details.html">
                                                        <img width="600" height="600" src="media/product/6.jpg" class="post-image" alt="">
                                                        <img width="600" height="600" src="media/product/6-2.jpg" class="hover-image back" alt="">
                                                    </a>
                                                </div>
                                                <span class="product-quickview" data-title="Quick View">
                                                    <a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="products-content">
                                                <h3 class="product-title"><a href="shop-details.html">Dining Table</a></h3>
                                                <span class="price">$150.00</span>
                                                <div class="rating">
                                                    <div class="star star-5"></div>
                                                    <div class="review-count">
                                                        (1<span> review</span>)
                                                    </div>
                                                </div>
                                                <div class="product-button">
                                                    <div class="btn-add-to-cart" data-title="Add to cart">
                                                        <a rel="nofollow" href="#" class="product-btn button">Add to cart</a>
                                                    </div>
                                                    <div class="btn-wishlist" data-title="Wishlist">
                                                        <button class="product-btn">Add to wishlist</button>
                                                    </div>
                                                    <div class="btn-compare" data-title="Compare">
                                                        <button class="product-btn">Compare</button>
                                                    </div>
                                                </div>
                                                <div class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis…</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="products-entry clearfix product-wapper">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="products-thumb">
                                                <div class="product-lable">
                                                    <div class="hot">Hot</div>
                                                </div>
                                                <div class="product-thumb-hover">
                                                    <a href="shop-details.html">
                                                        <img width="600" height="600" src="media/product/4.jpg" class="post-image" alt="">
                                                        <img width="600" height="600" src="media/product/4-2.jpg" class="hover-image back" alt="">
                                                    </a>
                                                </div>
                                                <span class="product-quickview" data-title="Quick View">
                                                    <a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="products-content">
                                                <h3 class="product-title"><a href="shop-details.html">Pillar Dining Table Round</a></h3>
                                                <span class="price">
                                                    <del aria-hidden="true"><span>$150.00</span></del>
                                                    <ins><span>$100.00</span></ins>
                                                </span>
                                                <div class="rating">
                                                    <div class="star star-0"></div>
                                                    <div class="review-count">
                                                        (0<span> review</span>)
                                                    </div>
                                                </div>
                                                <div class="product-button">
                                                    <div class="btn-add-to-cart" data-title="Add to cart">
                                                        <a rel="nofollow" href="#" class="product-btn button">Add to cart</a>
                                                    </div>
                                                    <div class="btn-wishlist" data-title="Wishlist">
                                                        <button class="product-btn">Add to wishlist</button>
                                                    </div>
                                                    <div class="btn-compare" data-title="Compare">
                                                        <button class="product-btn">Compare</button>
                                                    </div>
                                                </div>
                                                <div class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis…</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="products-entry clearfix product-wapper">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="products-thumb">
                                                <div class="product-lable">
                                                    <div class="hot">Hot</div>
                                                </div>
                                                <div class="product-thumb-hover">
                                                    <a href="shop-details.html">
                                                        <img width="600" height="600" src="media/product/7.jpg" class="post-image" alt="">
                                                        <img width="600" height="600" src="media/product/7-2.jpg" class="hover-image back" alt="">
                                                    </a>
                                                </div>
                                                <span class="product-quickview" data-title="Quick View">
                                                    <a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="products-content">
                                                <h3 class="product-title"><a href="shop-details.html">Mags Sofa 2.5 Seater</a></h3>
                                                <span class="price">$150.00</span>
                                                <div class="rating">
                                                    <div class="star star-4"></div>
                                                    <div class="review-count">
                                                        (1<span> review</span>)
                                                    </div>
                                                </div>
                                                <div class="product-button">
                                                    <div class="btn-add-to-cart" data-title="Add to cart">
                                                        <a rel="nofollow" href="#" class="product-btn button">Add to cart</a>
                                                    </div>
                                                    <div class="btn-wishlist" data-title="Wishlist">
                                                        <button class="product-btn">Add to wishlist</button>
                                                    </div>
                                                    <div class="btn-compare" data-title="Compare">
                                                        <button class="product-btn">Compare</button>
                                                    </div>
                                                </div>
                                                <div class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis…</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="products-entry clearfix product-wapper">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="products-thumb">
                                                <div class="product-lable">
                                                    <div class="hot">Hot</div>
                                                </div>
                                                <div class="product-thumb-hover">
                                                    <a href="shop-details.html">
                                                        <img width="600" height="600" src="media/product/8.jpg" class="post-image" alt="">
                                                        <img width="600" height="600" src="media/product/8-2.jpg" class="hover-image back" alt="">
                                                    </a>
                                                </div>
                                                <span class="product-quickview" data-title="Quick View">
                                                    <a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="products-content">
                                                <h3 class="product-title"><a href="shop-details.html">Spinning pendant lamp</a></h3>
                                                <span class="price">
                                                    <del aria-hidden="true"><span>$120.00</span></del>
                                                    <ins><span>$100.00</span></ins>
                                                </span>
                                                <div class="rating">
                                                    <div class="star star-0"></div>
                                                    <div class="review-count">
                                                        (0<span> review</span>)
                                                    </div>
                                                </div>
                                                <div class="product-button">
                                                    <div class="btn-add-to-cart" data-title="Add to cart">
                                                        <a rel="nofollow" href="#" class="product-btn button">Add to cart</a>
                                                    </div>
                                                    <div class="btn-wishlist" data-title="Wishlist">
                                                        <button class="product-btn">Add to wishlist</button>
                                                    </div>
                                                    <div class="btn-compare" data-title="Compare">
                                                        <button class="product-btn">Compare</button>
                                                    </div>
                                                </div>
                                                <div class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis…</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="products-entry clearfix product-wapper">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="products-thumb">
                                                <div class="product-lable">
                                                    <div class="hot">Hot</div>
                                                </div>
                                                <div class="product-thumb-hover">
                                                    <a href="shop-details.html">
                                                        <img width="600" height="600" src="media/product/9.jpg" class="post-image" alt="">
                                                        <img width="600" height="600" src="media/product/9-2.jpg" class="hover-image back" alt="">
                                                    </a>
                                                </div>
                                                <span class="product-quickview" data-title="Quick View">
                                                    <a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="products-content">
                                                <h3 class="product-title"><a href="shop-details.html">Bora Armchair</a></h3>
                                                <span class="price">
                                                    <del aria-hidden="true"><span>$100.00</span></del>
                                                    <ins><span>$90.00</span></ins>
                                                </span>
                                                <div class="rating">
                                                    <div class="star star-5"></div>
                                                    <div class="review-count">
                                                        (3<span> review</span>)
                                                    </div>
                                                </div>
                                                <div class="product-button">
                                                    <div class="btn-add-to-cart" data-title="Add to cart">
                                                        <a rel="nofollow" href="#" class="product-btn button">Add to cart</a>
                                                    </div>
                                                    <div class="btn-wishlist" data-title="Wishlist">
                                                        <button class="product-btn">Add to wishlist</button>
                                                    </div>
                                                    <div class="btn-compare" data-title="Compare">
                                                        <button class="product-btn">Compare</button>
                                                    </div>
                                                </div>
                                                <div class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis…</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="products-entry clearfix product-wapper">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="products-thumb">
                                                <div class="product-lable">
                                                    <div class="hot">Hot</div>
                                                </div>
                                                <div class="product-thumb-hover">
                                                    <a href="shop-details.html">
                                                        <img width="600" height="600" src="media/product/10.jpg" class="post-image" alt="">
                                                        <img width="600" height="600" src="media/product/10-2.jpg" class="hover-image back" alt="">
                                                    </a>
                                                </div>
                                                <span class="product-quickview" data-title="Quick View">
                                                    <a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="products-content">
                                                <h3 class="product-title"><a href="shop-details.html">Panton Dining Table</a></h3>
                                                <span class="price">
                                                    <del aria-hidden="true"><span>$79.00</span></del>
                                                    <ins><span>$50.00</span></ins>
                                                </span>
                                                <div class="rating">
                                                    <div class="star star-5"></div>
                                                    <div class="review-count">
                                                        (2<span> review</span>)
                                                    </div>
                                                </div>
                                                <div class="product-button">
                                                    <div class="btn-add-to-cart" data-title="Add to cart">
                                                        <a rel="nofollow" href="#" class="product-btn button">Add to cart</a>
                                                    </div>
                                                    <div class="btn-wishlist" data-title="Wishlist">
                                                        <button class="product-btn">Add to wishlist</button>
                                                    </div>
                                                    <div class="btn-compare" data-title="Compare">
                                                        <button class="product-btn">Compare</button>
                                                    </div>
                                                </div>
                                                <div class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis…</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="products-entry clearfix product-wapper">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="products-thumb">
                                                <div class="product-lable">
                                                    <div class="hot">Hot</div>
                                                </div>
                                                <div class="product-thumb-hover">
                                                    <a href="shop-details.html">
                                                        <img width="600" height="600" src="media/product/11.jpg" class="post-image" alt="">
                                                        <img width="600" height="600" src="media/product/11-2.jpg" class="hover-image back" alt="">
                                                    </a>
                                                </div>
                                                <span class="product-quickview" data-title="Quick View">
                                                    <a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="products-content">
                                                <h3 class="product-title"><a href="shop-details.html">Kittchen Table</a></h3>
                                                <span class="price">$120.00</span>
                                                <div class="rating">
                                                    <div class="star star-4"></div>
                                                    <div class="review-count">
                                                        (1<span> review</span>)
                                                    </div>
                                                </div>
                                                <div class="product-button">
                                                    <div class="btn-add-to-cart" data-title="Add to cart">
                                                        <a rel="nofollow" href="#" class="product-btn button">Add to cart</a>
                                                    </div>
                                                    <div class="btn-wishlist" data-title="Wishlist">
                                                        <button class="product-btn">Add to wishlist</button>
                                                    </div>
                                                    <div class="btn-compare" data-title="Compare">
                                                        <button class="product-btn">Compare</button>
                                                    </div>
                                                </div>
                                                <div class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis…</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="products-entry clearfix product-wapper">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="products-thumb">
                                                <div class="product-lable">
                                                    <div class="hot">Hot</div>
                                                </div>
                                                <div class="product-thumb-hover">
                                                    <a href="shop-details.html">
                                                        <img width="600" height="600" src="media/product/12.jpg" class="post-image" alt="">
                                                        <img width="600" height="600" src="media/product/12-2.jpg" class="hover-image back" alt="">
                                                    </a>
                                                </div>
                                                <span class="product-quickview" data-title="Quick View">
                                                    <a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="products-content">
                                                <h3 class="product-title"><a href="shop-details.html">Mundo Sofa With Cushion</a></h3>
                                                <span class="price">
                                                    <del aria-hidden="true"><span>$200.00</span></del>
                                                    <ins><span>$180.00</span></ins>
                                                </span>
                                                <div class="rating">
                                                    <div class="star star-5"></div>
                                                    <div class="review-count">
                                                        (4<span> review</span>)
                                                    </div>
                                                </div>
                                                <div class="product-button">
                                                    <div class="btn-add-to-cart" data-title="Add to cart">
                                                        <a rel="nofollow" href="#" class="product-btn button">Add to cart</a>
                                                    </div>
                                                    <div class="btn-wishlist" data-title="Wishlist">
                                                        <button class="product-btn">Add to wishlist</button>
                                                    </div>
                                                    <div class="btn-compare" data-title="Compare">
                                                        <button class="product-btn">Compare</button>
                                                    </div>
                                                </div>
                                                <div class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis…</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="products-entry clearfix product-wapper">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="products-thumb">
                                                <div class="product-lable">
                                                    <div class="hot">Hot</div>
                                                </div>
                                                <div class="product-thumb-hover">
                                                    <a href="shop-details.html">
                                                        <img width="600" height="600" src="media/product/5.jpg" class="post-image" alt="">
                                                        <img width="600" height="600" src="media/product/5-2.jpg" class="hover-image back" alt="">
                                                    </a>
                                                </div>
                                                <span class="product-quickview" data-title="Quick View">
                                                    <a href="#" class="quickview quickview-button">Quick View <i class="icon-search"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="products-content">
                                                <h3 class="product-title"><a href="shop-details.html">Amp Pendant Light Large</a></h3>
                                                <span class="price">$140.00</span>
                                                <div class="rating">
                                                    <div class="star star-5"></div>
                                                    <div class="review-count">
                                                        (1<span> review</span>)
                                                    </div>
                                                </div>
                                                <div class="product-button">
                                                    <div class="btn-add-to-cart" data-title="Add to cart">
                                                        <a rel="nofollow" href="#" class="product-btn button">Add to cart</a>
                                                    </div>
                                                    <div class="btn-wishlist" data-title="Wishlist">
                                                        <button class="product-btn">Add to wishlist</button>
                                                    </div>
                                                    <div class="btn-compare" data-title="Compare">
                                                        <button class="product-btn">Compare</button>
                                                    </div>
                                                </div>
                                                <div class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis…</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <nav class="pagination">
                        <!-- <ul class="page-numbers">
                            <li><a class="prev page-numbers" href="#">Previous</a></li>
                            <li><span aria-current="page" class="page-numbers current">1</span></li>
                            <li><a class="page-numbers" href="#">2</a></li>
                            <li><a class="page-numbers" href="#">3</a></li>
                            <li><a class="next page-numbers" href="#">Next</a></li>
                        </ul> -->
                        {{$sanPham->appends(request()->all())->links()}}

                    </nav>
                </div>
            </div>
        </div>
    </div>
</div><!-- #content -->
@endsection