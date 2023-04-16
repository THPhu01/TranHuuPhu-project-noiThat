@extends('masterLayout.admin.masterAdminHome')
@section('section_name')
    Thêm Mã Giảm Giá
@endsection
@section('section_content')
<style>
    .panel {
        margin: 50px 0 0 200px;
    }
</style>
<div class="col-md-10">
    <div class="panel">
        <div class="panel-heading">
        </div>
        <div class="panel-body">
            <form action="{{ route('coupons.store') }}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label for="username12" class="col-sm-3 control-label">Tên Mã Giảm Giá</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                            <input type="text" class="form-control" name="coupon" id="username12">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="username12" class="col-sm-3 control-label">Ngày Bắt Đầu</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calculator"></i></span>
                            <input type="date" class="form-control" name="ngayBD" id="username12">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="username12" class="col-sm-3 control-label">Ngày Kết Thúc</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calculator"></i></span>
                            <input type="date" class="form-control" name="ngayKT" id="username12">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="username12" class="col-sm-3 control-label">Loại Giảm Giá</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <!-- <label class="checkbox-inline" for="vehicle1"> <input type="checkbox" class="form-control" name="percent" id="username12">Phần Trăm</label>
                            <label class="checkbox-inline" for="vehicle2"> <input type="checkbox" class="form-control" name="coDinh" id="username12"></label> -->
                            <label class="checkbox-inline">
                            <input type="checkbox" value="%" name="percent">Phần trăm (%)
                            </label>
                            <label class="checkbox-inline">
                            <input type="checkbox" value="co_dinh" name="coDinh">Cố Định (.000đ)
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="username12" class="col-sm-3 control-label">Mô Tả</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-commenting"></i></span>
                            <textarea style="height: 150px;" class="form-control" name="moTa" id="username12" ></textarea>
                        </div>
                    </div>
                </div>
                <div style="margin-right : 350px;" class="btn-group pull-right mt-10" role="group">
                    <button type="reset" class="btn btn-gray btn-wide"><i class="fa fa-times"></i>Hủy</button>
                    <button type="submit" name="submit" class="btn bg-black btn-wide"><i class="fa fa-arrow-right"></i>Lưu</button>
                </div>
                <!-- /.btn-group -->
            </form>

            <div class="col-md-12 mt-15 src-code">
                <pre class="language-html"><code class="language-html">
&lt;form class="form-horizontal"&gt;
&lt;div class="form-group"&gt;
&lt;label for="name12" class="col-sm-3 control-label"&gt;Full Name*&lt;/label&gt;
&lt;div class="col-sm-9"&gt;
&lt;div class="input-group"&gt;
&lt;span class="input-group-addon"&gt;&lt;i class="fa fa-pencil"&gt;&lt;/i&gt;&lt;/span&gt;
&lt;input type="text" class="form-control" id="name12"&gt;
&lt;/div&gt;
&lt;span class="help-block text-right"&gt;To be printed on invoice.&lt;/span&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="form-group"&gt;
&lt;label for="username12" class="col-sm-3 control-label"&gt;Username*&lt;/label&gt;
&lt;div class="col-sm-9"&gt;
&lt;div class="input-group"&gt;
&lt;span class="input-group-addon"&gt;&lt;i class="fa fa-user"&gt;&lt;/i&gt;&lt;/span&gt;
&lt;input type="text" class="form-control" id="username12"&gt;
&lt;/div&gt;
&lt;span class="help-block text-right"&gt;Desired username for application.&lt;/span&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="form-group"&gt;
&lt;label for="exampleInputEmail12" class="col-sm-3 control-label"&gt;Email address&lt;/label&gt;
&lt;div class="col-sm-9"&gt;
&lt;div class="input-group"&gt;
&lt;span class="input-group-addon"&gt;&lt;i class="fa fa-envelope-o"&gt;&lt;/i&gt;&lt;/span&gt;
&lt;input type="email" class="form-control" id="exampleInputEmail12"&gt;
&lt;/div&gt;
&lt;span class="help-block text-right"&gt;To receive communication.&lt;/span&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="form-group"&gt;
&lt;label for="exampleInputPassword12" class="col-sm-3 control-label"&gt;Password&lt;/label&gt;
&lt;div class="col-sm-9"&gt;
&lt;div class="input-group"&gt;
&lt;span class="input-group-addon"&gt;&lt;i class="fa fa-key"&gt;&lt;/i&gt;&lt;/span&gt;
&lt;input type="text" class="form-control" id="exampleInputPassword12"&gt;
&lt;/div&gt;
&lt;span class="help-block text-right"&gt;At-least 6 characters.&lt;/span&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="checkbox text-right"&gt;
&lt;label&gt;
&lt;input type="checkbox"&gt; I accept &lt;a href="#" class="color-primary"&gt;terms & conditions&lt;/a&gt;
&lt;/label&gt;
&lt;/div&gt;
&lt;div class="btn-group pull-right mt-10" role="group"&gt;
&lt;button type="reset" class="btn btn-gray btn-wide"&gt;&lt;i class="fa fa-times"&gt;&lt;/i&gt;Cancel&lt;/button&gt;
&lt;button type="button" class="btn bg-black btn-wide"&gt;&lt;i class="fa fa-arrow-right"&gt;&lt;/i&gt;Submit&lt;/button&gt;
&lt;/div&gt;
&lt;!-- /.btn-group --&gt;
&lt;/form&gt;
                </code></pre>
            </div>
            <!-- /.col-md-12 -->
        </div>
    </div>
</div>
@endsection