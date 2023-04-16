@extends('masterLayout.client.masterClientHome2')
@section('contentName')
@foreach ($banner as $br)
@if($br->active == 9)
<div id="title" class="page-title" style="background-image: url({{asset( $br->anhBanner )}});">
    <div class="section-container">
        <div class="content-title-heading">
            <h1 class="text-title-heading">
                Cửa Hàng
            </h1>
        </div>
        <div class="breadcrumbs">
            <a href="{{route('homeClient')}}">Trang chủ / </a>
            @if (!empty($vat_lieu_id))
            Vật liệu
            @else
            Cửa hàng
            @endif
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
     .block-content .btn.btn-search:hover {
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

                                <input type="text" value="" name="search" class="s" placeholder="Tìm kiếm...">
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

                    <div class="block block-product-filter">
                        <div class="block-title">
                            <h2>Giá</h2>
                        </div>
                        <div class="block-content">
                            <div id="slider-range" class="price-filter-wrap">
                                <div class="filter-item price-filter">
                                    <div class="layout-slider">
                                        <form>
                                            <input type="text" id="amount" readonly style="border:0;  font-weight:bold;margin-top:6px;color:#000">
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

                    <div class="block block-product-cats" style="margin-top:117px">
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
                                                <div class="product-thumb-hover" style="height: 200px !important;">
                                                    <a href="{{ route('shop_detail.show' ,['shop_detail'=>$sp->id]) }}">
                                                        <img width="600" height="600" src="{{$sp->anh}}" class="post-image" alt="" style="height: 200px !important;">
                                                        <img width="600" height="600" src="{{$sp->anh}}" class="hover-image back" alt="" style="height: 200px !important;">
                                                    </a>
                                                </div>
                                                <form action="">
                                                    @csrf
                                                    <div class="product-button">
                                                        <div class="btn-add-to-cart" data-title="Thêm vào giỏ hàng">
                                                            <a rel="nofollow" data-value="{{$sp->id}}" href="#" class="product-btn button">Thêm vào giỏ hàng</a>
                                                        </div>
                                                        <div class="btn-wishlist" data-title="Thêm vào danh sách yêu thích">
                                                            <button class="product-btn addWishlist" value-product="{{$sp['id']}}">Thêm vào danh sách yêu thích</button>
                                                        </div>
                                                        <!-- <div class="btn-compare" data-title="Compare">
                                                            <button class="product-btn">Compare</button>
                                                        </div> -->
                                                        <span class="product-quickview" data-title="Quick View">
                                                            <a href="#" class="quickview quickview-button quickview-data" value-quickview="{{$sp['id']}}">Quick View <i class="icon-search"></i></a>
                                                        </span>
                                                    </div>
                                                </form>

                                            </div>
                                            <div class="products-content">
                                                <div class="contents text-center">
                                                    <h3 class="product-title"><a href="{{ route('shop_detail.show',['shop_detail'=>$sp->id]) }}">{{$sp->tenSP}}</a></h3>
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

                    </div>

                    <nav class="pagination" style="justify-content:center">
                        {{$sanPham->appends(request()->all())->links()}}

                    </nav>
                </div>
            </div>
        </div>
    </div>
</div><!-- #content -->


@endsection