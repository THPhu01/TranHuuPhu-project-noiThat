@extends('masterLayout.admin.masterAdminHome')
@section('section_name')
    Danh Sách Đơn Hàng
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
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Phương thức thanh toán</th>
                    <th>Ngày tạo</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($donHangs as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->ho_va_ten}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{number_format($item->tong,0,'',',')}}</td>
                    <td> <span class="badge badge-{{$item->getTrangThai()[1]}}"> {{$item->getTrangThai()[0]}} </span></td>
                    <td>{{$item->payment_method}}</td>
                    <td>{{$item->created_at}}</td>
                    <td width="300px">
                        <a href="{{ route('donhangs.edit', $item->id)}}"><button style="width: 100px" class="btn btn-primary">Chi tiết</button></a>
                        <form action="{{ route('donhangs.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="width: 100px" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="text-align: center"> {{ $donHangs->links() }} </div>
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
