@extends('masterLayout.client.masterClientHome2')
@section('contentName')
@foreach ($banner as $br)
@if($br->active == 5)
<div id="title" class="page-title" style="background-image: url({{asset( $br->anhBanner )}});">
    <div class="section-container">
        <div class="content-title-heading">
            <h1 class="text-title-heading">
                @if (!empty($loai_dm))
                Tin Tức  - {{$loai_dm->ten}}
                @else
                Tin Tức
                @endif
            </h1>
        </div>
        <div class="breadcrumbs">
            <a href="{{route('homeClient')}}">Trang chủ</a><span class="delimiter"></span>Tin tức
        </div>
    </div>
</div>
@endif
@endforeach
@endsection
@section('contentMain')
<style>
    .list_cate::before {
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
</style>
<div id="content" class="site-content" role="main">
    <div class="section-padding">
        <div class="section-container p-l-r">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-12 col-12 sidebar left-sidebar md-b-50">
                    <!-- Block Post Search -->
                    <div class="block block-post-search">
                        <div class="block-title">
                            <h2>Tìm Kiếm</h2>
                        </div>
                        <div class="block-content">
                            <form method="get" class="search-from" action="">
                                <input type="text" value="" name="key" class="s" placeholder="Tìm kiếm...">
                                <button class="btn btn-search" type="submit" style="background-color: #000">
                                    <i class="icon-search" style="color:#ffff"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Block Post Categories -->
                    <div class="block block-post-cats">
                        <div class="block-title">
                            <h2>Tin tức</h2>
                        </div>
                        <div class="block-content">
                            <div class="post-cats-list">
                                <ul>
                                    @foreach ($danhMucTin as $dm_tin)
                                    <li class="current" id="flood-right">
                                        <a href="{{ route('blog_cate.show',['blog_cate'=>$dm_tin->id]) }}" class="list_cate">{{$dm_tin->ten}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Block Posts -->
                    <div class="block block-posts">
                        <div class="block-title">
                            <h2>Bài Viết Hot Gần đây</h2>
                        </div>
                        <div class="block-content">
                            <ul class="posts-list">
                                @foreach ($tintucHot as $hot)
                                <li class="post-item">
                                    <a href="{{ route('blog_detail.show',['blog_detail'=>$hot->id]) }}" class="post-image">
                                        <img src="{{ URL::asset('uploads')}}/{{$hot->anh}}">
                                    </a>
                                    <div class="post-content">
                                        <h2 class="post-title">
                                            <a href="{{ route('blog_detail.show',['blog_detail'=>$hot->id]) }}">
                                                {{$hot->tieu_de}}
                                            </a>
                                        </h2>
                                        <div class="post-time">
                                            <span class="post-date">{{date('d/m/Y',strtotime($hot ->created_at))}}</span>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Block Post Archives -->


                    <!-- Block Post Tags -->

                </div>

                <div class="col-xl-9 col-lg-9 col-md-12 col-12">
                    <div class="posts-list grid">
                        <div class="row">
                            @foreach ($tintuc as $tin)
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                <div class="post-entry clearfix post-wapper">
                                    <div class="post-image">
                                        <a href="{{ route('blog_detail.show',['blog_detail'=>$tin->id]) }}">
                                            <img src="{{ URL::asset('uploads')}}/{{$tin->anh}}" alt="" style="height:200px !important;width:300px;">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <div class="post-categories">
                                            <a href="{{ route('blog_cate.show',['blog_cate'=>$tin->id_dm_tt]) }}">{{$tin->blogCate->ten}}</a>

                                        </div>
                                        <h2 class="post-title">
                                            <a href="{{ route('blog_detail.show',['blog_detail'=> $tin->id]) }}">{{$tin->tieu_de}}</a>
                                        </h2>
                                        <div class="post-meta">
                                            <span class="post-time">
                                                {{date('d/m/Y',strtotime($tin->created_at))}}</span>
                                            <span class="post-comment"><i class="fa-regular fa-eye" style="font-size:10px
                                            ;"> {{$tin->views}}</i></span>
                                        </div>
                                        <div class="post-meta">
                                            <span class="post-time">
                                                {{substr($tin->tom_tat,0,500).'...'}}
                                            </span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <nav class="pagination" style="justify-content:center">
                        <!-- <ul class="page-numbers">
                            <li><a class="prev page-numbers" href="#">Kế tiếp</a></li>
                            <li><span aria-current="page" class="page-numbers current">1</span></li>
                            <li><a class="page-numbers" href="#">2</a></li>
                            <li><a class="page-numbers" href="#">3</a></li>
                            <li><a class="next page-numbers" href="#">Next</a></li>
                        </ul> -->
                        {{$tintuc->appends(request()->all())->links()}}

                    </nav>
                </div>
            </div>
        </div>
    </div>
</div><!-- #content -->
@endsection