@extends('masterLayout.client.masterClientHome2')

@section('contentName')
<div id="site-main" class="site-main">
    <div id="main-content" class="main-content">
        <div id="primary" class="content-area">
            @foreach ($banner as $br)
            @if($br->active == 13)
            <div id="title" class="page-title" style="background-image: url({{asset( $br->anhBanner )}});">
                <div class="section-container">
                    <div class="content-title-heading">
                        <h1 class="text-title-heading">
                            Đăng nhập / Đăng kí
                        </h1>
                    </div>
                    <div class="breadcrumbs">
                        <a href="index.html">Trang chủ</a><span class="delimiter"></span>Đăng nhập / Đăng kí
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
                        <div class="page-login-register">
                            <div class="row d-flex justify-content-center">
                                <!-- <div class="col-lg-6 col-md-6 col-sm-12 sm-m-b-50">
                                    <div class="box-form-login">
                                        <h2>Đăng nhập</h2>
                                        <div class="box-content">
                                            <div class="form-login">
                                                <form class="login" action="{{ route('login') }}" method="POST" >
                                                    @csrf
                                                    <div class="username">
                                                        <label>Nhập tài khoản hoặc Email<span class="required">*</span></label>
                                                        <input type="email" class="input-text" name="emailLogin">
                                                    </div>
                                                    <div class="password">
                                                        <label for="password">Nhập mật khẩu <span class="required">*</span></label>
                                                        <input class="input-text" type="password" name="passwordLogin">
                                                    </div>
                                                    <div class="rememberme-lost">
                                                        <div class="remember-me">
                                                            <input name="remember_me" type="checkbox" value="forever">
                                                            <label class="inline"> Lưu tài khoản</label>
                                                        </div>
                                                        <div class="lost-password">
                                                            <a href="page-forgot-password.html">Quên mật khẩu?</a>
                                                        </div>
                                                    </div>
                                                    <div class="button-login">
                                                        <input type="submit" class="button" name="login" value="Đăng nhập">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <div class="box-form-login">
                                        <h2 class="register">Đăng kí</h2>
                                        <div class="box-content">
                                            <div class="form-register">
                                                <form class="register" id="registerForm">
                                                    @csrf
                                                    <div class="email">
                                                        <label>Nhập Username <span class="required">*</span></label>
                                                        <input type="text" id="usernameRegister" class="input-text" name="username" value="">
                                    
                                                    </div>
                                                    <div class="email">
                                                        <label>Nhập Email <span class="required">*</span></label>
                                                        <input type="email" id="emailRegister" class="input-text" name="email" value="">
                                                       
                                                    </div>
                                                    <div class="email">
                                                        <label>Nhập Số Điện Thoại <span class="required">*</span></label>
                                                        <input type="number" id="phoneRegister" class="input-text" name="phone" value=""
                                                       
                                                    </div>
                                                    <div class="password">
                                                        <label>Nhập mật khẩu <span class="required">*</span></label>
                                                        <input type="password" id="passwordRegister" class="input-text" name="password">
                                                        
                                                    </div>
                                                    <div class="password">
                                                        <label>Nhập địa chỉ <span class="required">*</span></label>
                                                        <input type="text" id="addressRegister" class="input-text" name="address">
                                                        
                                                    </div>
                                                    <div class="button-register">
                                                        <input type="submit" class="button" name="register" value="Đăng kí">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- #content -->
        </div><!-- #primary -->
    </div><!-- #main-content -->
    @endsection