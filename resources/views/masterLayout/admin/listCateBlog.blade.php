@extends('masterLayout.admin.masterAdminHome')
@section('section_name')
    Danh Sách Loại Tin Tức
@endsection
@section('section_content')
<style>
   .col-md-12{
            padding-left: 20%;
            padding-right: 20%;
            
        }
    .btn-outline-danger {
        color: #dc3545;
        border-color: #dc3545;
    }
    .btn-outline-success {
        color: #198754;
        border-color: #198754;
    }
</style>
<section class="section">
    <style>
        .col-md-12{
            padding-left: 20%;
            padding-right: 20%;
            
        }
        .btn-outline-danger {
            color: #dc3545;
            border-color: #dc3545;
        }
        .btn-outline-success {
            color: #198754;
            border-color: #198754;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="container-fluid">
                        <!-- Listing table -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="cust-table-cont">
                                    <div class="table-responsive">
                                      <table border="0" class="table cust-table"> 
                                        <thead>
                                            <tr style="">
                                              <th>ID</th> 
                                              <th class="text-center">Loại tin tức</th> 
                                              <th class="text-center">Thao tác</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            @foreach ( $dmblog as $cateblog)
                                                <tr>
                                                    <th>{{$cateblog->id}}</th>
                                                    <td class="text-center">{{$cateblog->ten}}</td>
                                                    <td class="text-center">
                                                        <a href="{{route('danhmucblogs.edit',$cateblog->id)}}"><button style="width: 100px" class="btn btn-primary">Sửa</button></a>
                                                        <form action="{{route ('danhmucblogs.destroy',$cateblog->id)}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" style="width: 100px" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa loại tin tức này?')">Xóa</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            
   
                                        </tbody>
                                      </table>
                                    </div>
                                    </div> <!-- End of cust-table-cont block -->
                                </div>
                            </div> <!-- ENd of row -->
                        
                    </div> <!-- /container -->
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
    <!-- /.container-fluid -->
</section>
@endsection