@extends('masterLayout.admin.masterAdminHome')
@section('section_name')
    Mã Giảm Giá
@endsection
@section('section_content')
<style>
    th {
        font-size: 15px;
    }
    td {
        font-size : 15px;
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
            <h5>Mã Giảm Giá</h5>
            <br>
            @include('masterLayout/admin/flash-message/flash-message')
        </div>
    </div>
    <div class="panel-body p-20">

        <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Giảm giá</th>
                    <th>Mô Tả</th>
                    <th>Ngày Bắt Đầu</th>
                    <th>Ngày Kết Thúc</th>
                    <th>Loại Giảm Giá</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($coupons as $coup)
                    <tr>
                        <td>{{$coup->id}}</td>
                        <td>{{$coup->coupon}}</td>
                        <td>{{$coup->mo_ta}}</td>
                        <td>{{ date('d-m-Y' , strtotime($coup->ngay_bat_dau))}}</td>
                        <td>{{ date('d-m-Y' , strtotime($coup->ngay_ket_thuc))}}</td>
                        <td>{{$coup->loai_coupon}}</td>
                        <td>
                            <a href="{{ route('coupons.edit' , ['coupon' => $coup->id]) }}"><button class="btn btn-primary">Sửa</button></a>
                            <form method="post" action="{{ route('coupons.destroy' , ['coupon' => $coup->id]) }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa sản phẩm hay không ?')">Xóa</button>
                            </form>
                        </td>
                    </tr>   
                @endforeach
            </tbody>
        </table>
        <div style="text-align: center"> {{ $coupons->links() }} </div>
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