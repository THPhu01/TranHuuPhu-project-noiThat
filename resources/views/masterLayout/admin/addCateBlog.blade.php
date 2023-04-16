@extends('masterLayout.admin.masterAdminHome')
@section('section_name')
    Thêm Loại Tin Tức
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
                <div class="panel">
                    <div class="panel-body">
                            <form action="{{route('danhmucblogs.store')}}" method="post">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Loại tin tức</label>
                                    <input type="text" class="form-control" name="ten" placeholder="Nhập" autofocus="">
                                    @error('ten')
                                        <span style="color:red">Lỗi : {{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </form>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection