@extends('masterLayout.admin.masterAdminHome')
@section('section_name')
    Thêm Danh Mục
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
                            <h5>Thêm Danh Mục</h5>
                        </div>
                    </div>
                    <div class="panel-body">
                            <form action="{{route ('danhmucs.store')}}" method="post">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Danh mục</label>
                                    <input type="text" class="form-control" name="ten_dm" placeholder="Nhập tên danh mục" autofocus="">
                                </div>
                                <button type="submit" class="btn btn-primary">Thêm Danh Mục</button>
                            </form>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection