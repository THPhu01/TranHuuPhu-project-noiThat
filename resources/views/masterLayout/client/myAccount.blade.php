@extends('masterLayout.client.masterClientHome2')

@section('contentName')
<style>
    .form-select {
        width: 100%;
    }
</style>
<div id="site-main" class="site-main">
    <div id="main-content" class="main-content">
        <div id="primary" class="content-area">
            @foreach ($banner as $br)
            @if($br->active == 7)
            <div id="title" class="page-title" style="background-image: url({{asset( $br->anhBanner )}});">
                <div class="section-container">
                    <div class="content-title-heading">
                        <h1 class="text-title-heading">
                            Tài Khoản Của Tôi
                        </h1>
                    </div>
                    <div class="breadcrumbs">
                        <a href="index.html">Trang chủ</a><span class="delimiter"></span>Tài Khoản Của Tôi
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
                        <div class="page-my-account">
                            <div class="my-account-wrap clearfix">
                                <nav class="my-account-navigation">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#dashboard" role="tab">Bảng điều khiển</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#orders" role="tab">Đơn đặt
                                                hàng</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#addresses" role="tab">Địa
                                                chỉ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#account-details" role="tab">Thông tin tài khoản</a>
                                        </li>
                                        @if (!empty($data['user']) && empty($data['user']->google_id) && empty($data['user']->facebook_id) )
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#re-password" role="tab">
                                                Đổi mật khẩu
                                            </a>
                                        </li>
                                        @endif
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('/client/logout')}}">Đăng xuất</a>
                                        </li>
                                    </ul>
                                </nav>
                                <div class="my-account-content tab-content">
                                    <div class="tab-pane fade show active" id="dashboard" role="tabpanel">
                                        <div class="my-account-dashboard">
                                            <p>
                                                Xin chào
                                                <strong>
                                                    {{Auth::user()->name}}
                                                </strong>
                                                (không phải
                                                <strong>
                                                    {{Auth::user()->name}}
                                                </strong>? <a href="{{ route('clientlogout') }}">Đăng xuất</a>)
                                            </p>
                                            <strong>
                                                Từ bảng điều khiển tài khoản của bạn, bạn có thể thay đổi thông tin và quản lý đơn hàng
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="orders" role="tabpanel">
                                        <div class="my-account-orders">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>MÃ ĐƠN</th>
                                                            <th>NGÀY ĐẶT</th>
                                                            <th>TRẠNG THÁI</th>
                                                            <th>TỔNG</th>
                                                            <th>CHI TIẾT ĐƠN HÀNG</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (!$data['donHang']->isEmpty())
                                                        @foreach ($data['donHang'] as $donHang)
                                                        <tr>
                                                            <td>$donHang->id</td>
                                                            <td>

                                                            </td>
                                                            <td>

                                                            </td>
                                                            <td>$125.00</td>
                                                            <td><a href="#" class="btn-small d-block">Xem</a></td>
                                                        </tr>
                                                        @endforeach
                                                        @else
                                                        <tr>
                                                            <td>Bạn chưa có đơn hàng !</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><a href="#" class="btn-small d-block"></a></td>
                                                        </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="addresses" role="tabpanel">
                                        <div class="my-account-addresses">
                                            <p>
                                                Các địa chỉ sau sẽ được sử dụng trên trang thanh toán theo mặc định
                                            </p>
                                            <div class="addresses">
                                                <div class="addresses-col">
                                                    <header class="col-title">
                                                        <h3>Địa chỉ của bạn</h3>
                                                        <a data-toggle="modal" id="mediumButton" data-target="#mediumModal">Sửa</a>
                                                        <!-- medium modal -->
                                                        <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" style="margin-top : 150px"  role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body" id="mediumBody">
                                                                        <div class="mt-3">
                                                                            <form method="post" action="{{ URL::asset('client/my_account_upDiachi') }}">
                                                                                @csrf
                                                                                <p class="text-center font-weight-bold" style="font-size : 20px;">CẬP NHẬT ĐỊA CHỈ</p>
                                                                                    <select class="form-select form-select-sm mb-3" id="city" name="tinh" aria-label=".form-select-sm">
                                                                                        <option value="" selected>Chọn tỉnh thành</option>
                                                                                    </select>
                                                                                    <select class="form-select form-select-sm mb-3" id="district" name="quan" aria-label=".form-select-sm">
                                                                                        <option value="" selected>Chọn quận huyện</option>
                                                                                    </select>
                                                                                    <select class="form-select form-select-sm mb-3" id="ward" name="phuong" aria-label=".form-select-sm">
                                                                                        <option value="" selected>Chọn phường xã</option>
                                                                                    </select>
                                                                                <div>
                                                                                    <input class="form-select form-select-sm mb-3" type="text" name="duong" placeholder="Nhập số nhà, đường" aria-label="default input example">
                                                                                </div>
                                                                                <div>
                                                                                    <input class="form-select btn btn-warning" value="Cập nhật" type="submit" aria-label="default input example">
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </header>
                                                    <address>
                                                        @if (!empty($data['user']->diaChi))
                                                        {!! $data['user']->diaChi !!}
                                                        @else
                                                        <h3>
                                                            Bạn chưa cập nhật địa !<br>
                                                        </h3>
                                                        @endif
                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="account-details" role="tabpanel">
                                        <div class="my-account-account-details">
                                            <form class="edit-account" onsubmit="return false" id="formChangeDetail">
                                                <div class="clear"></div>
                                                <p class="form-row">
                                                    <label>Họ và tên<span class="required">*</span></label>
                                                    <input type="text" class="input-text account_display_name" name="account_display_name" value="{{Auth::user()->name}}">
                                                    <span><em>
                                                            Đây sẽ là cách tên của bạn sẽ được hiển thị trong phần tài
                                                            khoản và trong các bài đánh giá</em></span>
                                                </p>
                                                <p class="form-row">
                                                    <label>Số điện thoại<span class="required">*</span></label>
                                                    <input type="text" class="input-text account_phone" name="account_phone" value="{{Auth::user()->phone}}">
                                                </p>
                                                <div class="clear"></div>
                                                <p class="form-row">
                                                    <label>Địa chỉ email <span class="required">*</span></label>

                                                    <input type="email" class="input-text account_email" name="account_email" value="{{Auth::user()->email}}">
                                                </p>
                                                <div class="clear"></div>
                                                <p class="form-row">
                                                    <button type="submit" class="button btnchangeDetail" name="save_account_details" value="Save changes">Lưu thay đổi</button>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="re-password" role="tabpanel">
                                        <div class="my-account-account-details">
                                            <form class="edit-account" onsubmit="return false">
                                                <fieldset>
                                                    <legend>Đổi mật khẩu</legend>
                                                    <p class="form-row">
                                                        <label>Mật khẩu hiện tại</label>
                                                        <input type="password" class="input-text" name="password_current"  autocomplete="off" placeholder="Mật khẩu hiện tại ...">
                                                        <span style="color:red" class="current_password text-error"></span>
                                                    </p>
                                                    <p class="form-row">
                                                        <label>Mật khẩu mới</label>
                                                        <input type="password" class="input-text" name="password_1" autocomplete="off"  placeholder="Mật khẩu mới ...">
                                                        <span style="color:red" class="new_password1 text-error"></span>
                                                    </p>
                                                    <p class="form-row">
                                                        <label>Nhập lại mật khẩu mới</label>
                                                        <input type="password" class="input-text" name="password_2" autocomplete="off"  placeholder="Nhập lại mật khẩu ...">
                                                        <span style="color:red" class="new_password2 text-error"></span>
                                                    </p>
                                                </fieldset>
                                                <div class="clear"></div>
                                                <p class="form-row">
                                                    <button type="submit" class="button" name="save_account_details" value="Save change">Lưu thay đổi</button>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- #content -->
        </div><!-- #primary -->
    </div>
    <!--
#main-content -
->
    @endsection