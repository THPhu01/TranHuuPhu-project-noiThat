@extends('masterLayout.admin.masterAdminHome')
@section('section_name')
Danh Sách Bình Luận
@endsection
@section('section_content')
<section class="section">
    <style>
        nav{
            text-align: center;
        }
        .list_rep{
            list-style-type: decimal;
            color: blue;
        }
    </style>
    <div class="container-fluid">
        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">

                <div class="panel">
                    <div class="panel-body p-20">
                        <div id="notify_comment"><div>
                        <table id="example" class="display table table-striped table-bordered" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    {{-- <th>ID</th> --}}
                                    <th>Nội dung</th>
                                    <th>Trạng thái</th>
                                    <th>Tên khách hàng</th>
                                    <th>Sản phẩm</th>
                                    <th>Ngày bình luận</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($binhluan as $item)
                                <tr>
                                    <td>{{++$i}}</td>
                                    {{-- <td>{{$item->id}}</td> --}}
                                    <td>{{$item->noi_dung}}
                                        <ul class="list_rep">
                                            @foreach ($rep_binhluan as $bl_reply)
                                                @if($bl_reply->reply_bl==$item->id)
                                                    <li>Trả lời: {{$bl_reply->noi_dung}}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                        @if($item->trang_thai==0)
                                            <br><textarea name="" id="" class="form-control reply_bl_{{$item->id}}" rows="5"></textarea>
                                            <br><button class="btn btn-default btn-xs btn-reply-bl" data-bl_id="{{$item->id}}" data-sanpham_id="{{$item->id_san_pham}}">Trả lời bình luận</button>

                                        @endif
                                    </td>
                                    <td>
                                        @if($item->trang_thai==1)
                                            <input type="button" data-bl_id="{{$item->id}}" id="{{$item->id_san_pham}}" data-bl_status="0" class="btn btn-danger bl_duyet" value="Chờ Duyệt">
                                        @else
                                            <input type="button" data-bl_id="{{$item->id}}" id="{{$item->id_san_pham}}" data-bl_status="1" class="btn btn-primary bl_duyet" value="Đã Duyệt">
                                        @endif                            
                                    </td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->sanpham->tenSP}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td width="300px">
                                        <form action="{{ route('binhluans.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="width: 100px" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này?')">Xóa</button>
                                        </form>
                                        <button type="submit" style="width: 100px" class="btn btn-primary">Sửa</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $binhluan->links() }}
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