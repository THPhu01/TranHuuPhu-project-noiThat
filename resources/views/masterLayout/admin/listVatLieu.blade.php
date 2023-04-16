@extends('masterLayout.admin.masterAdminHome')
@section('section_name')
    Danh Sách Vật Liệu
@endsection
@section('section_content')
<section class="section">
    <div class="container-fluid">
        <!-- /.row -->

        <div class="row">
        <div class="col-md-12">

<div class="panel">
    <div class="panel-body p-20">
    @include('masterLayout/admin/flash-message/flash-message')
        <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Vật Liệu</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                 @foreach($listVatLieu as $vatLieu)
                <tr>
                    <td>{{$vatLieu->id}}</td>
                    <td>{{$vatLieu->ten_vl}}</td>
                    <td width="300px">
                        <a href=" {{ route('vatlieus.edit' , ['vatlieu' => $vatLieu->id ]) }} "><button style="width: 100px" class="btn btn-primary">Sửa</button></a>
                        <form action=" {{ route('vatlieus.destroy' , ['vatlieu' => $vatLieu->id ]) }} " method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="width: 100px" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="text-align: center"> {{ $listVatLieu->links() }} </div>
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
