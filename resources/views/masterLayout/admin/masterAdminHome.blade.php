<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Options Admin - Responsive Web Application Kit</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- ========== COMMON STYLES ========== -->
        <link rel="stylesheet" href="{{ URL::asset('options-admin/css/bootstrap.min.css')}}" media="screen" >
        <link rel="stylesheet" href="{{ URL::asset('options-admin/css/font-awesome.min.css')}}" media="screen" >
        <link rel="stylesheet" href="{{ URL::asset('options-admin/css/animate-css/animate.min.css')}}" media="screen" >
        <link rel="stylesheet" href="{{ URL::asset('options-admin/css/lobipanel/lobipanel.min.css')}}" media="screen" >

        <!-- ========== PAGE STYLES ========== -->
        <link rel="stylesheet" href="{{ URL::asset('options-admin/css/prism/prism.css')}}" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" href="{{ URL::asset('options-admin/css/toastr/toastr.min.css')}}" media="screen" >
        <link rel="stylesheet" href="{{ URL::asset('options-admin/css/icheck/skins/line/blue.css')}}" >
        <link rel="stylesheet" href="{{ URL::asset('options-admin/css/icheck/skins/line/red.css')}}" >
        <link rel="stylesheet" href="{{ URL::asset('options-admin/css/icheck/skins/line/green.css')}}" >
        <link rel="stylesheet" href="{{ URL::asset('options-admin/css/bootstrap-tour/bootstrap-tour.css')}}" >

        <!-- ========== THEME CSS ========== -->
        <link rel="stylesheet" href="{{ URL::asset('options-admin/css/main.css')}}" media="screen" >

        <!-- ========== MODERNIZR ========== -->
        <script src="{{ URL::asset('options-admin/js/modernizr/modernizr.min.js')}}"></script>
        <script src="//cdn.ckeditor.com/4.20.2/full/ckeditor.js"></script>
    </head>
    <style>
        .main-page {
            height: auto;
            padding-bottom : 50px;
        }
    </style>
    <body>
        <div class="main-wrapper">

            <div class="content-wrapper">
                <div class="content-container">

                    <!-- ========== LEFT SIDEBAR ========== -->
                    <div class="left-sidebar fixed-sidebar bg-black-300 box-shadow tour-three">
                        <div class="sidebar-content">
                            <div class="user-info closed">
                                <img src="http://placehold.it/90/c2c2c2?text=User" alt="John Doe" class="img-circle profile-img">
                            </div>
                            <!-- /.user-info -->

                            <div class="sidebar-nav">
                                <ul class="side-nav color-gray">
                                    <li class="nav-header">
                                        <span class="">Trang Quản Lý</span>
                                    </li>
                                    <li class="">
                                        <a href="{{ route('homeAdmin') }}"><i class="fa fa-dashboard"></i> <span>Thống Kê</span></a>
                                    </li>

                                    <li class="nav-header">
                                        <span class="">QUẢN LÝ</span>
                                    </li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-file-text"></i> <span>Danh Mục</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="{{ route('danhmucs.index') }}"><i class="fa fa-sign-in"></i> <span>Danh Sách Danh Mục</span></a></li>
                                            <li><a href="{{ route('danhmucs.create') }}"><i class="fa fa-sign-in"></i> <span>Thêm Danh Mục</span></a></li>
                                        </ul>
                                    </li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-file-text"></i> <span>Loại Danh Mục</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                        <li><a href="{{ route('loaidanhmucs.index') }}"><i class="fa fa-sign-in"></i> <span>Danh Sách Loại</span></a></li>
                                            <li><a href="{{ route('loaidanhmucs.create') }}"><i class="fa fa-sign-in"></i> <span>Thêm Loại</span></a></li>
                                        </ul>
                                    </li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-file-text"></i> <span>Sản Phẩm</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                        <li><a href="{{ route('sanphams.index') }}"><i class="fa fa-sign-in"></i> <span>Danh Sách Sản Phẩm</span></a></li>
                                            <li><a href="{{ route('sanphams.create') }}"><i class="fa fa-sign-in"></i> <span>Thêm Sản Phẩm</span></a></li>
                                        </ul>
                                    </li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-file-text"></i> <span>Vật Liệu</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                        <li><a href="{{ route('vatlieus.index') }}"><i class="fa fa-sign-in"></i> <span>Danh Sách Vật Liệu</span></a></li>
                                            <li><a href="{{ route('vatlieus.create') }}"><i class="fa fa-sign-in"></i> <span>Thêm Vật Liệu</span></a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-header">
                                        <span class="">QUẢN LÝ BLOG</span>
                                    </li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-comments-o"></i> <span>Loại Tin Tức</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                        <li><a href="{{ route('danhmucblogs.index') }}"><i class="fa fa-sign-in"></i> <span>Danh Sách Loại Tin</span></a></li>
                                            <li><a href="{{ route('danhmucblogs.create') }}"><i class="fa fa-sign-in"></i> <span>Thêm Loại Tin</span></a></li>
                                        </ul>
                                    </li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-comments-o"></i> <span>Blog - Tin tức</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                        <li><a href="{{ route('tintucs.index') }}"><i class="fa fa-sign-in"></i> <span>Danh Sách Tin Tức</span></a></li>
                                            <li><a href="{{ route('tintucs.create') }}"><i class="fa fa-sign-in"></i> <span>Thêm bài viết</span></a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-header">
                                        <span class="">QUẢN LÝ ĐƠN HÀNG</span>
                                    </li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-bar-chart-o"></i> <span>Đơn Hàng</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="{{ route('donhangs.index') }}"><i class="fa fa-barcode"></i> <span>Danh Sách Đơn Hàng</span></a></li>
                                            {{-- <li><a href="{{ route('donhangs.create') }}"><i class="fa fa-barcode"></i> <span>Tạo đơn hàng</span></a></li> --}}
                                        </ul>
                                    </li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-bar-chart-o"></i> <span>Mã Giảm Giá</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="{{ route('coupons.index') }}"><i class="fa fa-barcode"></i> <span>Danh Sách Mã Giảm Giá</span></a></li>
                                            <li><a href="{{ route('coupons.create') }}"><i class="fa fa-barcode"></i> <span>Thêm Mã Giảm Giá</span></a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-header">
                                        <span class="">QUẢN LÝ NGƯỜI DÙNG</span>
                                    </li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-bar-chart-o"></i> <span>Khách Hàng</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="{{route('users.index')}}"><i class="fa fa-barcode"></i> <span>Danh Sách Khách Hàng</span></a></li>
                                        </ul>
                                    </li>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-bar-chart-o"></i> <span>Bình Luận</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="{{route('binhluans.index')}}"><i class="fa fa-barcode"></i> <span>Danh Sách Bình Luận</span></a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <!-- /.side-nav -->
                            </div>
                            <!-- /.sidebar-nav -->
                        </div>
                        <!-- /.sidebar-content -->
                    </div>
                    <!-- /.left-sidebar -->
                <div class="main-page">
                    <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">@yield('section_name')</h2>
                                </div>
                                <!-- /.col-md-6 -->
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="index.html"><i class="fa fa-home"></i> Trang chủ</a></li>
            							<li class="active">@yield('section_name')</li>
            						</ul>
                                </div>
                                <!-- /.col-md-6 -->
                            </div>
                            <!-- /.row -->
                        </div>
                    @yield('section_content')
                </div>

        <!-- ========== COMMON JS FILES ========== -->
        <script src="{{ URL::asset('options-admin/js/jquery/jquery-2.2.4.min.js') }}"></script>
        <script src="{{ URL::asset('options-admin/js/jquery-ui/jquery-ui.min.js') }}"></script>
        <script src="{{ URL::asset('options-admin/js/bootstrap/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('options-admin/js/pace/pace.min.js') }}"></script>
        <script src="{{ URL::asset('options-admin/js/lobipanel/lobipanel.min.js') }}"></script>
        <script src="{{ URL::asset('options-admin/js/iscroll/iscroll.js') }}"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="{{ URL::asset('options-admin/js/prism/prism.js') }}"></script>
        <script src="{{ URL::asset('options-admin/js/waypoint/waypoints.min.js') }}"></script>
        <script src="{{ URL::asset('options-admin/js/counterUp/jquery.counterup.min.js') }}"></script>
        <script src="{{ URL::asset('options-admin/js/amcharts/amcharts.js') }}"></script>
        <script src="{{ URL::asset('options-admin/js/amcharts/serial.js') }}"></script>
        <script src="{{ URL::asset('options-admin/js/amcharts/plugins/export/export.min.js') }}"></script>
        <link rel="stylesheet" href="{{ URL::asset('options-admin/js/amcharts/plugins/export/export.css') }}" type="text/css" media="all" />
        <script src="{{ URL::asset('options-admin/js/amcharts/themes/light.js') }}"></script>
        <script src="{{ URL::asset('options-admin/js/toastr/toastr.min.js') }}"></script>
        <script src="{{ URL::asset('options-admin/js/icheck/icheck.min.js') }}"></script>
        <script src="{{ URL::asset('options-admin/js/bootstrap-tour/bootstrap-tour.js') }}"></script>

        <!-- ========== THEME JS ========== -->
        <script src="{{ URL::asset('options-admin/js/main.js') }}"></script>
        <script src="{{ URL::asset('options-admin/js/production-chart.js') }}"></script>
        <script src="{{ URL::asset('options-admin/js/traffic-chart.js') }}"></script>
        <script src="{{ URL::asset('options-admin/js/task-list.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.bl_duyet').click(function () {    
                    var comment_id = $(this).data('bl_id');
                    var comment_sanpham_id = $(this).attr('id');
                    var comment_status = $(this).data('bl_status');
                    if(comment_status==0){
                        var alert = 'Thay đổi duyệt thành công'
                    }else{
                        var alert = 'Thay đổi không duyệt thành công'
                    }
                    $.ajax({
                        url: "/admin/allow-comment",
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            comment_id: comment_id,
                            comment_sanpham_id: comment_sanpham_id,
                            comment_status: comment_status
                        },
                        success: function (data) {
                            $('#notify_comment').html(alert);
                            location.reload();
                        }
                    });            
                });
                $('.btn-reply-bl').click(function () {    
                    var comment_id = $(this).data('bl_id');
                    var comment = $('.reply_bl_'+comment_id).val();
                    var comment_sanpham_id = $(this).data('sanpham_id');
                    $.ajax({
                        url: "/admin/reply-comment",
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            comment_id: comment_id,
                            comment: comment,
                            comment_sanpham_id: comment_sanpham_id,
                        },
                        success: function (data) {
                            $('.reply_bl_'+comment_id).val('');
                            $('#notify_comment').html('Trả lời bình luận thành công');
                            location.reload();
                        }
                    });            
                });
            });
        </script>
        <script>
            $(function(){

                // Counter for dashboard stats
                $('.counter').counterUp({
                    delay: 10,
                    time: 1000
                });

                // Welcome notification
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "3500",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                // toastr["success"]("One stop solution to your website admin panel!", "Welcome to Options!");

            });
        </script>

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
