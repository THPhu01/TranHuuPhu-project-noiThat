@extends('masterLayout.client.masterClientHome2')

@section('contentName')
<style>
    .button-face {
        background-color: #4267b2 !important;
        width: 205px;
        height: 55px;
        color: #fff;
        cursor: pointer;
    }

    .button-google {
        background-color: #EA4335 !important;
        width: 205px;
        height: 55px;
        color: #fff;
        cursor: pointer;
    }

    .button-face a {
        color: white;
    }

    .button-google a {
        color: white;
    }
</style>
<div id="site-main" class="site-main">
    <div id="main-content" class="main-content">
        <div id="primary" class="content-area">
            @foreach ($banner as $br)
            @if($br->active == 8)
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
                                <div class="col-lg-6 col-md-6 col-sm-12 sm-m-b-50">
                                    @if (session()->has('AuthExist'))
                                    <span class="text-center ml-3 mb-3 errorLoginPage"><i class="icon-user"></i>&nbsp; {!! session('AuthExist') !!}</span>
                                    @endif
                                    <div class="box-form-login">
                                        <h2>Đăng nhập</h2>
                                        <div class="box-content">
                                            <div class="form-login">
                                                @if(session()->has('errorLogin'))
                                                <ul>
                                                    <li class="errorLoginPage">{!! session('errorLogin') !!}</li>
                                                </ul>
                                                @endif
                                                <form class="login" action="{{ route('login') }}" method="POST" id="formLogin">
                                                    @csrf
                                                    <div class="username">
                                                        <label>Nhập tài khoản hoặc Email<span class="required">*</span></label>
                                                        <input type="email" class="input-text" name="emailLogin" required>
                                                    </div>
                                                    <div class="password">
                                                        <label for="password">Nhập mật khẩu <span class="required">*</span></label>
                                                        <input class="input-text" type="password" name="passwordLogin" required>
                                                    </div>
                                                    <div class="rememberme-lost">
                                                        <div class="remember-me">
                                                            <input name="remember_me" type="checkbox" value="forever">
                                                            <label class="inline"> Lưu tài khoản</label>
                                                        </div>
                                                        <div class="lost-password">
                                                            <a href="{{ route('forgotPasswordView') }}">Quên mật khẩu?</a>
                                                        </div>
                                                    </div>
                                                    <div class="button-login">
                                                        <input type="submit" class="button" name="login" value="Đăng nhập">
                                                    </div>
                                                </form>
                                                <div style="text-align: center;margin: 20px 0;color: #000;font-weight: 500;">
                                                    <span>hoặc</span>
                                                </div>
                                                <div class="button-login row d-flex justify-content-around">
                                                    <a href="{{ route('redirectFace') }}"> <button class="button-face">Facebook <i class="fa-brands fa-facebook" style="margin-left:5px"></i></button></a>

                                                    <a href="{{ route('redirectGoole') }}"> <button class="button-google">Google <i class="fa-brands fa-google" style="margin-left:5px"></i></button></a>
                                                </div>
                                                <hr>
                                                <div style="text-align: center;margin: 20px 0;color: #000;font-weight: 500;">
                                                    <span>Chưa có tài khoản? <a href="{{ route('viewRegister') }}" style="color:blue;text-decoration: underline;">Đăng kí tại đây</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-8 col-md-8 col-sm-12">
                                    <div class="box-form-login">
                                        <h2 class="register">Đăng kí</h2>
                                        <div class="box-content">
                                            <div class="form-register">
                                                <form class="register" method="POST" action="{{ route('register') }}" id="registerForm">
                                                    @csrf
                                                    <div class="email">
                                                        <label>Nhập Email <span class="required">*</span></label>
                                                        <input type="email" id="emailRegister" class="input-text" name="email" value="" required>
                                                        <span id="errorEmailRegister" class="textError"></span>
                                                    </div>
                                                    <div class="password">
                                                        <label>Nhập mật khẩu <span class="required">*</span></label>
                                                        <input type="password" id="passwordRegister" class="input-text" name="password">
                                                        <span id="errorPasswordRegister" class="textError"></span>
                                                    </div>
                                                    <div class="button-register">
                                                        <input type="submit" class="button" name="register" value="Đăng kí">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- #content -->
        </div><!-- #primary -->
    </div><!-- #main-content -->
    @endsection