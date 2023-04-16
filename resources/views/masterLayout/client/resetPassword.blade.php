@extends('masterLayout.client.masterClientHome2')

@section('contentName')
<div id="site-main" class="site-main">
    <div id="main-content" class="main-content">
        <div id="primary" class="content-area">
            <div id="title" class="page-title">
                <div class="section-container">
                    <div class="content-title-heading">
                        <h1 class="text-title-heading">
                           Đổi mật khẩu
                        </h1>
                    </div>
                    <div class="breadcrumbs">
                        <a href="index.html">Trang chủ</a><span class="delimiter"></span> Đổi mật khẩu
                    </div>
                </div>
            </div>
            @endsection
            @section('contentMain')
            <div id="content" class="site-content" role="main">
                <div class="section-padding">
                    <div class="section-container p-l-r">
                        <div class="page-login-register">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-6 col-md-6 col-sm-12 sm-m-b-50">
                                    <div class="box-form-login">
                                        <h2>Đăng nhập</h2>
                                        <div class="box-content">
                                            <div class="form-login">
                                                <form class="login" action="{{ route('resetPassword') }}" method="POST" id="formLogin">
                                                    @csrf
                                                    <div class="password">
                                                        <label for="password">Điền lại mật khẩu<span class="required">*</span></label>
                                                        <input class="input-text" type="password" name="password" required>
                                                    </div>
                                                    <div class="password">
                                                        <label for="password">Điền lại mật khẩu<span class="required">*</span></label>
                                                        <input class="input-text" type="password" name="password2" required>
                                                    </div>
                                                    <div class="button-login">
                                                        <input type="submit" class="button" name="login" value="Đổi mật khẩu">
                                                    </div>
                                                </form>
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