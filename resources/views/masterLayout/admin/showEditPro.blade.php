@extends('masterLayout.admin.masterAdminHome')
@section('section_name')
    Sửa Sản Phẩm
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
            <form action="{{ Route ('sanphams.update' , ['sanpham' => $showSanpham->id ]) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name12" class="col-sm-3 control-label">Mã Sản Phẩm</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                            <input type="text" class="form-control" name="maSP" id="name12" value="{{$showSanpham->id}}" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name12" class="col-sm-3 control-label">Loại Sản Phẩm</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                            <select type="text" class="form-control" name="loai" id="name12">
                                    <option value="{{$showSanpham->id_loai_dm}}">{{$showSanpham->tenLoaidm}}</option>
                                @foreach($cate as $cat)
                                    <option value="{{$cat->id}}">{{$cat->tenLoaidm}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name12" class="col-sm-3 control-label">Chất Liệu Sản Phẩm</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                            <select type="text" class="form-control" name="vatLieu" id="name12">
                                    <option value="{{$showSanpham->id_vl}}">{{$showSanpham->ten_vl}}</option>
                                @foreach($vatLieu as $vl)
                                    <option value="{{$vl->id}}">{{$vl->ten_vl}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="username12" class="col-sm-3 control-label">Tên Sản Phẩm</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                            <input type="text" class="form-control" value="{{$showSanpham->tenSP}}" name="tenSP" id="username12">
                        </div>
                                @error('tenSP')
                                     <span style="color:red">Lỗi : {{ $message }}</span>
                                @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail12" class="col-sm-3 control-label">Ảnh</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-photo"></i></span>
                            <input type="file" class="form-control" name="img" id="exampleInputEmail12">
                        </div>
                                @error('img')
                                     <span style="color:red">Lỗi : {{ $message }}</span>
                                @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword12" class="col-sm-3 control-label">Thumbnail</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-photo"></i></span>
                            <input type="file" class="form-control" name="thumb[]" id="exampleInputPassword12" multiple>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="username12" class="col-sm-3 control-label">Giá Gốc</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-money"></i></span>
                            <input type="number" class="form-control" name="giaGoc" value="{{$showSanpham->gia_goc}}" id="username12">
                        </div>
                                @error('giaGoc')
                                     <span style="color:red">Lỗi : {{ $message }}</span>
                                @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="username12" class="col-sm-3 control-label">Giá Khuyến Mãi</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-money"></i></span>
                            <input type="number" class="form-control" name="giaKM" value="{{$showSanpham->gia_khuyen_mai}}" id="username12">
                        </div>
                                @error('giaKM')
                                     <span style="color:red">Lỗi : {{ $message }}</span>
                                @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="username12" class="col-sm-3 control-label">Số Lượng</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-archive"></i></span>
                            <input type="number" class="form-control" name="soLuong" value="{{$showSanpham->so_luong}}" id="username12">
                        </div>
                                @error('soLuong')
                                     <span style="color:red">Lỗi : {{ $message }}</span>
                                @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="username12" class="col-sm-3 control-label">Tình Trạng</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-info"></i></span>
                            <select type="text" class="form-control" name="tinhTrang" id="name12">
                                <option value="1">Đang Bán</option>
                                <option value="2">Ngưng Bán</option>
                                <option value="3">Chờ Duyệt</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="username12" class="col-sm-3 control-label">Mô Tả</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-commenting"></i></span>
                            <textarea style="height: 150px;" class="form-control"  name="moTa" id="editor1" >{{$showSanpham->mo_ta}}</textarea>
                        </div>
                                @error('moTa')
                                     <span style="color:red">Lỗi : {{ $message }}</span>
                                @enderror
                    </div>
                    <script>
                            CKEDITOR.replace( 'editor1' );
                        </script>
                </div>
                <div style="margin-right : 350px;" class="btn-group pull-right mt-10" role="group">
                    <button type="reset" class="btn btn-gray btn-wide"><i class="fa fa-times"></i>Hủy</button>
                    <button type="submit" name="submit" class="btn bg-black btn-wide"><i class="fa fa-arrow-right"></i>Lưu</button>
                </div>
                <!-- /.btn-group -->
                @method('PATCH')
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