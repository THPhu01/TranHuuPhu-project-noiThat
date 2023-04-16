@extends('masterLayout.admin.masterAdminHome')
@section('section_name')
    Cập nhật danh mục
@endsection
@section('section_content')
<style>
    .panel {
        margin: 50px 0 0 200px;
        height: auto;
    }
    button {
        width: 300px;
        margin-left: 230px;
        height: 50px;
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

            <div class="col-md-10">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h5>Cập Nhật Vật Liệu</h5>
                        </div>
                    </div>
                    <div class="panel-body">
                            <form action="{{route ('vatlieus.update', [ 'vatlieu'=>$vatLieu->id] )}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Vật Liệu</label>
                                    <input type="text" class="form-control" name="ten_vl" value="{{$vatLieu->ten_vl}}" placeholder="Nhập tên vật liệu" autofocus="">
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