@extends('masterLayout.admin.masterAdminHome')
@section('section_name')
    Danh Sách Sản Phẩm
@endsection
@section('section_content')
<style>
    th {
        font-size: 14px;
    }
    button {
        width: 100px;
        margin: 11px 0 0 0;
    }
    td button {
        width: 70px;
        margin: 35px 0 0 5px;
        float: left;
    }
    .trang_thai {
        width: 120px;
    }
    .trang_thai>span {
        color: green;
        font-weight: bold;
    }
    .trang_thai>.stop {
        color: grey;
        font-weight: bold;
    }
    .trang_thai>.check {
        color: #b6b629;
        font-weight: bold;
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
            <h5>Sản Phẩm</h5>
        </div>
    </div>
    
    <div class="panel-body p-20">
    @include('masterLayout/admin/flash-message/flash-message')
        <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Loại Sản Phẩm</th>
                    <th>Ảnh</th>
                    <th>Chất Liệu</th>
                    <th>Giá Gốc</th>
                    <th>Giá Khuyến Mãi</th>
                    <th>Số Lượng</th>
                    <th>Tình Trạng</th>
                    <th>Mô Tả</th>
                    <th width="170px"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($sanphams as $liPro)
                <tr>
                    <td>{{$liPro->id}}</td>
                    <td>{{$liPro->tenSP}}</td>
                    <td>{{$liPro->tenLoaidm}}</td>
                    <td><img style="width:100px;height:100px" src="{{$liPro->anh}}"></td>
                    <td>{{$liPro->ten_vl}}</td>
                    <td>{{ 
                            number_format($liPro->gia_goc , 0 , '' , ',')
                        }}</td>
                    <td>{{
                            number_format($liPro->gia_khuyen_mai , 0 , '' , ',')
                        }}</td>
                    <td>{{$liPro->so_luong}}</td>
                    <td class="trang_thai">
                        @if( $liPro->tinh_trang == 1)
                            <span>Đang Bán</span>
                        @elseif(  $liPro->tinh_trang == 2 )
                            <span class="stop">Ngưng Bán</span>
                        @else
                            <span class="check">Chờ Duyệt</span>
                        @endif
                    </td>
                    <td>{{substr($liPro->mo_ta,0,120).'...'}}</td>
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
        <div style="text-align: center"> {{ $sanphams->links() }} </div>
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