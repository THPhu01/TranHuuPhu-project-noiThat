@extends('masterLayout.admin.masterAdminHome')
@section('section_name')
Danh Sách Khách Hàng
@endsection
@section('section_content')
<style>
    nav{
        text-align: center;
    }
</style>
<section class="section">
    <div class="container-fluid">
        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">

                <div class="panel">
                    <div class="panel-body p-20">

                        <table id="example" class="display table table-striped table-bordered" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>ID</th>
                                    <th>Tên Khách Hàng</th>
                                    <th>Email</th>
                                    <th>Is_admin</th>
                                    <th></th>
                                </tr>
                            </thead>                        
                            <tbody>
                                @foreach($listUser as $user)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->is_admin}}</td>
                                    <td width="300px">
                                        <a href="#"><button style="width: 100px" class="btn btn-primary">Sửa</button></a>
                                        <form action="{{route ('users.destroy', $user->id)}}" method="post" class="btn">
                                            @csrf
                                            @method('DELETE')
                                            <button style="width: 100px" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?')">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $listUser->links() }}
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
