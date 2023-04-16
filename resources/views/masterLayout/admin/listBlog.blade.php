@extends('masterLayout.admin.masterAdminHome')
@section('section_name')
    Danh Sách Tin Tức
@endsection
@section('section_content')
<style>
    nav{
        text-align: center;
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
                                              <th style="width:50px;">STT</th> 
                                              <th style="width:120px;">Tiêu đề</th>  
                                              <th style="width:200px;">Tóm tắt</th> 
                                              <th style="width:250px;">Nội dung</th> 
                                              <th style="width:100px;">Loại tin tức</th>     
                                              <th style="width:150px;">Ảnh</th>
                                              <th style="width:150px;">Views</th>
                                              <th style="width:150px;">Thao tác</th>
                                            </tr>
                                          </thead>
                                          @foreach ($listblog as $blog)
                                            <tbody>
                                                <tr>
                                                    <th style="width:30px;">{{++$i}}</th>
                                                    <td style="width:100px;">{{substr($blog->tieu_de,0,100)}}... </td>
                                                    <td style="width:150px;">{{substr($blog->tom_tat,0,100)}}... </td>
                                                    <td style="width:300px;">{{substr($blog->noi_dung,0,300)}}...</td>
                                                    <td style="width:50px;">{{$blog->ten}}</td>
                                                    <td style="width:100px;"><img src="{{$blog->anh}}" style="width:150px;"alt=""></td>
                                                    <td style="width:10px;">{{$blog->views}}</td>
                                                    <td class="text-center">
                                                        <a href="{{route ('tintucs.edit', $blog->id)}}"><button style="width: 100px" class="btn btn-primary">Sửa</button></a>
                                                        <form action="{{route ('tintucs.destroy',$blog->id)}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" style="width: 100px" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này?')">Xóa</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            </tbody>
                                          @endforeach
    
                                      </table>
                                    </div>
                                    </div> <!-- End of cust-table-cont block -->
                                </div>
                            </div> <!-- ENd of row -->
                        
                        </div> <!-- /container -->
                        {{$listblog->links()}}
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
    <!-- /.container-fluid -->
</section>
@endsection