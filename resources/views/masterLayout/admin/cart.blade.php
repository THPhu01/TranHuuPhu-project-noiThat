@extends('masterLayout.admin.masterAdminHome')
@section('section_name')
    Danh Sách Đơn Hàng
@endsection
@section('section_content')
<style>
    th {
        font-size: 12px;
    }
    button {
        width: 100px;
        margin: 11px 0 0 0;
    }
</style>
<section class="section">
    <div class="container-fluid">
        <!-- /.row -->

        <div class="row">
        <div class="col-md-12">

<div class="panel">
    <div class="panel-heading">
        <div class="panel-title">
            <h5>Đơn Hàng</h5>
            <br>
        </div>
    </div>
    <div class="panel-body p-20">

        <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Loại Sản Phẩm</th>
                    <th>Ảnh</th>
                    <th>Giá Gốc</th>
                    <th>Giá Khuyến Mãi</th>
                    <th>Số Lượng</th>
                    <th>Tình Trạng</th>
                    <th>Mô Tả</th>
                    <th width="170px"></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Loại Sản Phẩm</th>
                    <th>Ảnh</th>
                    <th>Giá Gốc</th>
                    <th>Giá Khuyến Mãi</th>
                    <th>Số Lượng</th>
                    <th>Tình Trạng</th>
                    <th>Mô Tả</th>
                    <th width="170px"></th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($sanphams as $liPro)
                <tr>
                    <td>{{$liPro->id}}</td>
                    <td>{{$liPro->tenSP}}</td>
                    <td>{{$liPro->tenLoaidm}}</td>
                    <td><img style="width:100px;height:100px" src="/img/{{$liPro->anh}}"></td>
                    <td>{{$liPro->gia_goc}}</td>
                    <td>{{$liPro->gia_khuyen_mai}}</td>
                    <td>{{$liPro->so_luong}}</td>
                    <td>{{$liPro->tinh_trang}}</td>
                    <td>{{$liPro->mo_ta}}</td>
                    <td>
                        <a href="{{ route('sanphams.edit' , ['sanpham' => $liPro->id]) }}"><button class="btn btn-primary">Sửa</button></a>
                        <form method="post" action="{{ route('sanphams.destroy' , ['sanpham' => $liPro->id]) }}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa sản phẩm hay không ?')">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="col-md-12 mt-15 src-code">
            <pre class="language-html"><code class="language-html">
&lt;table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%"&gt;
&lt;thead&gt;
&lt;tr&gt;
&lt;th&gt;Name&lt;/th&gt;
&lt;th&gt;Position&lt;/th&gt;
&lt;/tr&gt;
&lt;/thead&gt;
&lt;tfoot&gt;
&lt;tr&gt;
&lt;th&gt;Name&lt;/th&gt;
&lt;th&gt;Position&lt;/th&gt;
&lt;/tr&gt;
&lt;/tfoot&gt;
&lt;tbody&gt;
&lt;tr&gt;
&lt;td&gt;Tiger Nixon&lt;/td&gt;
&lt;td&gt;System Architect&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td&gt;Garrett Winters&lt;/td&gt;
&lt;td&gt;Accountant&lt;/td&gt;
&lt;/tr&gt;
...
&lt;/tbody&gt;
&lt;/table&gt;

&lt;!-- ========== JS ========== --&gt;
&lt;script&gt;
$(function($) {
$('#example').DataTable();
});
&lt;/script&gt;
            </code></pre>
        </div>
        <!-- /.col-md-12 -->
    </div>
</div>
</div>
                                </div>
                                <!-- /.row -->

                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->
@endsection