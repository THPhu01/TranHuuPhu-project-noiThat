@extends('masterLayout.client.masterClientHome2')

@section('contentName')
<div id="site-main" class="site-main">
    <div id="main-content" class="main-content">
        <div id="primary" class="content-area">
            @foreach ($banner as $br)
            @if($br->active == 17)
            <div id="title" class="page-title" style="background-image: url({{asset( $br->anhBanner )}});">
                <div class="section-container">
                    <div class="content-title-heading">
                        <h1 class="text-title-heading">
                            Quên Mật Khẩu
                        </h1>
                    </div>
                    <div class="breadcrumbs">
                        <a href="index.html">Trang chủ</a><span class="delimiter"></span>Quên Mật Khẩu
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @endsection

            @section('contentMain')
            <div id="content" class="site-content" role="main">
                <div class="section-padding">
                    <div class="section-container p-l-r">
                        <div class="page-forget-password">
                            <form method="POST" action="{{route('sendForgotPassword')}}" class="reset-password">
                                @csrf
                                <p>Quên mật khẩu? Vui lòng nhập tên người dùng hoặc địa chỉ email của bạn. Bạn sẽ nhận được một liên kết để tạo mật khẩu mới qua email..</p>
                                <p class="form-row form-row-first">
                                    <label>Tên người dùng hoặc email:</label>
                                    <input class="input-text"  type="email" name="email" autocomplete="email" required>
                                </p>
                                @if($errors->any())
                                     <span style="color:red">{{$errors->first()}}</span>
                                @endif
                                <div class="clear"></div>
                                <p class="form-row">
                                    <button type="submit" class="button" value="Reset password">Đặt lại mật khẩu </button>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- #content -->
        </div><!-- #primary -->
    </div><!-- #main-content -->
    @endsection