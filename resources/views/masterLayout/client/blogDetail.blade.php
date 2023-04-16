@extends('masterLayout.client.masterClientHome2')
@section('contentName')
@foreach ($banner as $br)
@if($br->active == 6)
<div id="title" class="page-title" style="background-image: url({{asset( $br->anhBanner )}});">
    <div class="section-container">
        <div class="content-title-heading">
            <h1 class="text-title-heading">
                Tin Tức
            </h1>
        </div>
        <div class="breadcrumbs">
            <a href="{{route('homeClient')}}">Trang chủ</a><span class="delimiter"></span> Tin tức
        </div>
    </div>
</div>
@endif
@endforeach
@endsection
@section('contentMain')
<style>
    .post-content.clearfix img {
        display: block;
        margin: auto;
    }
</style>
<div id="content" class="site-content" role="main">
    <div class="section-padding">
        <div class="section-container p-l-r">
            <div class="post-details no-sidebar">
                <div class="post-image">
                    <img src="{{ URL::asset('uploads')}}/{{$chiTietTin->anh}}" alt="" style="object-fit: cover;height:900px;width: 100%;">
                </div>
                <h2 class="post-title text-center">
                    {{$chiTietTin->tieu_de}}
                </h2>
                <div class="post-meta">
                    <span class="post-categories"><i class="icon_folder-alt"></i> <a href="{{ route('blog_cate.show',['blog_cate'=>$chiTietTin->id_dm_tt]) }}">{{$chiTietTin->id_dm_tt}}</a></span>
                    <span class="post-time"><i class="icon_clock_alt"></i> {{date('d/m/Y',strtotime($chiTietTin->created_at))}}</span>
                    <span class="post-comment"><i class="icon_comment_alt"></i> 1 Bình Luận</span>
                </div>
                <div class="post-content clearfix">
                    <p>{!!$chiTietTin->noi_dung!!}</p>
                    <!-- <div class="content-img">
                        <img width="1410" height="460" src="{{ URL::asset('ruper/media/blog/details.jpg') }}" alt="">
                    </div> -->
                </div>
                <div class="post-content-entry">
                    <!-- <div class="tags-links">
                        <label>Thẻ :</label> <a href="blog-grid-right.html" rel="tag">Baby Needs</a>
                    </div> -->
                    <div class="entry-social-share">
                        <label>Chia sẻ :</label>
                        <div class="social-share">
                            <a href="#" title="Facebook" class="share-facebook" target="_blank"><i class="fa-brands fa-facebook"></i>Facebook</a>
                            <a href="#" title="Twitter" class="share-twitter"><i class="fa-brands fa-twitter"></i>Twitter</a>
                            <a href="#" title="Pinterest" class="share-pinterest"><i class="fa-brands fa-pinterest-p"></i>Pinterest</a>
                        </div>
                    </div>
                </div>
                <!-- <div class="prev-next-post">
                    <div class="previous-post">
                        <a href="blog-details-right.html" rel="prev">
                            <div class="hover-extend active"><span>Previous</span></div>
                            <h2 class="title">How to Make your Home a Showplace</h2>
                        </a>
                    </div>
                    <div class="next-post">
                        <a href="blog-details-right.html" rel="next">
                            <div class="hover-extend active"><span>Next</span></div>
                            <h2 class="title">Stunning Furniture with Aesthetic Appeal</h2>
                        </a>
                    </div>
                </div> -->
                <!-- <div id="comments" class="comments-area">
                    <h3 class="comments-title">1 Bình Luận</h3>
                    <div class="comments-list">
                        <div class="comment-item">
                            <div class="comment-avatar">
                                <img alt="" src="{{ URL::asset('ruper/media/user.jpg') }}" class="avatar" height="70" width="70">
                            </div>
                            <div class="comment-content-wrap">
                                <div class="comment-author">
                                    Peter Capidal
                                </div>
                                <div class="comment-time">
                                    June 15, 2022
                                </div>
                                <div class="comment-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.</p>
                                </div>
                                <a class="comment-reply-link" href="#">Reply</a>
                            </div>
                        </div>
                    </div>
                    <div class="comment-form">
                        <div class="form-header">
                            <h3>Bình luận của khách hàng</h3>
                        </div>
                        <form action="" method="post" class="row" novalidate="">
                            <div class="comment-notes col-md-12 col-sm-12">Địa chỉ email của bạn sẽ không được công bố.</div>
                            <div class="form-group col-md-12 col-sm-12">
                                <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Bình luận" class="form-control"></textarea>
                            </div>
                            <div class="form-group col-md-6 col-sm-6">
                                <input id="author" placeholder="Tên của bạn *" name="author" type="text" value="" size="30" class="form-control">
                            </div>
                            <div class="form-group col-md-6 col-sm-6">
                                <input id="email" placeholder="Email của bạn *" name="email" type="text" value="" size="30" class="form-control">
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <input id="url" name="url" placeholder="Website" type="text" value="" size="30" class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <input name="submit" type="submit" id="submit" class="btn button-outline" value="Gửi">
                            </div>
                        </form>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div><!-- #content -->
@endsection