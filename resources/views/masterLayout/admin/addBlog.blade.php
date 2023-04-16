@extends('masterLayout.admin.masterAdminHome')
@section('section_name')
    Thêm Bài Viết
@endsection
@section('section_content')
<section class="section">
    <div class="row">
        <div class="col-md-10">
            <div class="panel">
                <div class="panel-body">

                    <form class="form-horizontal" action="{{route ('tintucs.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="text" class="col-sm-2 control-label">Tiêu đề</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="text" name="tieu_de">
                                @error('tieu_de')
                                     <span style="color:red">Lỗi : {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="predefined" class="col-sm-2 control-label">Danh mục</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_dm_tt">
                                    @foreach ( $dmtt as $lt )
                                        <option value="{{$lt->id}}">{{$lt->ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Ảnh</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="formFile" name="file_upload">
                                @error('file_upload')
                                     <span style="color:red">Lỗi : {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textarea" class="col-sm-2 control-label">Tóm tắt</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="textarea" placeholder="Default Textarea" rows="5" name="tom_tat"></textarea>
                                @error('tom_tat')
                                     <span style="color:red">Lỗi : {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textarea" class="col-sm-2 control-label">Nội dung</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="editor1" placeholder="Default Textarea" rows="20" name="noi_dung"></textarea>
                                @error('noi_dung')
                                     <span style="color:red">Lỗi : {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="text" class="col-sm-2 control-label">Views</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="text" name="views">
                                @error('views')
                                     <span style="color:red">Lỗi : {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Thêm bài</button>
                            </div>
                        </div>
                        <script>
                            CKEDITOR.replace( 'editor1' );
                        </script>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col-md-12 -->
    </div>
</section>
@endsection