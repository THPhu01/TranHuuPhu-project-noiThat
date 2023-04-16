@extends('masterLayout.admin.masterAdminHome')
@section('section_name')
Danh Sách Loại Danh Mục
@endsection
@section('section_content')
<section class="section">
    <div class="container-fluid">
        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">

                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h5>Loại Danh Mục</h5>
                            <br>
                            @include('masterLayout/admin/flash-message/flash-message')  
                        </div>
                    </div>
                    <div class="panel-body p-20">

                        <table id="example" class="display table table-striped table-bordered" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên Loại</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên Loại</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($typeCate as $cate)
                                <tr>
                                    <td>{{$cate->id}}</td>
                                    <td>{{$cate->tenLoaidm}}</td>
                                    <td width="300px">
                                        <form action="{{route('loaidanhmucs.edit', [$cate->id])}}" method="post">
                                            @method('GET')
                                            @csrf
                                            <button style="width: 100px" class="btn btn-primary"
                                                type="submit">Sửa</button>
                                        </form>
                                        /
                                        <form action="loaidanhmucs/{{$cate->id}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button style="width: 100px" class="btn btn-danger"
                                                type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa sản phẩm hay không ?')">Xóa</button>

                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div style="text-align: center"> {{ $typeCate->links() }} </div>
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
<!-- /.sect
ion -->


@endsection