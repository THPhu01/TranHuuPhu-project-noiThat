@extends('masterLayout.admin.masterAdminHome')
@section('section_name')
    Danh Sách Danh Mục
@endsection
@section('section_content')
<section class="section">
    <div class="container-fluid">
        <!-- /.row -->

        <div class="row">
        <div class="col-md-12">

<div class="panel">
    <div class="panel-body p-20">

        <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Danh Mục</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listCate as $cate)
                <tr>
                    <td>{{$cate->id}}</td>
                    <td>{{$cate->ten_dm}}</td>
                    <td width="300px">
                        <a href="{{ route('danhmucs.edit', $cate->id)}}"><button style="width: 100px" class="btn btn-primary">Sửa</button></a>
                        <form action="{{ route('danhmucs.destroy', $cate->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="width: 100px" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
