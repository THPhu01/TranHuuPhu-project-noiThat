@extends('masterLayout.admin.masterAdminHome')
@section('section_name')
    Cập nhật danh mục
@endsection
@section('section_content')
<style>
    .col-md-12{
        padding-left: 20%;
        padding-right: 20%;
    }
</style>
<section class="section">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->

        <div class="row">

            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                            <form action="{{route ('danhmucblogs.update',$editdmbg->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ID</label>
                                    <input type="hide"  class="form-control" name="id" value="{{$editdmbg->id}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Danh mục</label>
                                    <input type="text" class="form-control" name="ten" value="{{$editdmbg->ten}}" placeholder="Nhập" autofocus="">
                                </div>
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </form>
                        
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection