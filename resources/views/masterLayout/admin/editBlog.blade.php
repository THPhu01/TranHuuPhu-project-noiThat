@extends('masterLayout.admin.masterAdminHome')
@section('section_name')
    Sửa Bài Viết
@endsection
@section('section_content')
<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">

                    <form class="form-horizontal" action="{{route ('tintucs.update',$editblog->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="text" class="col-sm-2 control-label">Tiêu đề</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="text" name="tieu_de" value="{{$editblog->tieu_de}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="predefined" class="col-sm-2 control-label">Danh mục</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_dm_tt">
                                    @foreach ( $dmtt as $lt )
                                        @if($lt->id == $editblog->id_dm_tt)
                                            <option selected value="{{$lt->id}}">{{$lt->ten}}</option>
                                        @else
                                        <option value="{{$lt->id}}">{{$lt->ten}}</option>
                                        @endif
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Ảnh</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="formFile" name="file_upload">
                            </div>
                            <img src="{{$editblog->anh}}" style="width: 100px;padding-bottom: 20px" alt="">
                        </div>

                        <div class="form-group">
                            <label for="textarea" class="col-sm-2 control-label">Tóm tắt</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="textarea" placeholder="Default Textarea" rows="5" name="tom_tat">{{$editblog->tom_tat}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textarea" class="col-sm-2 control-label">Nội dung</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="editor1" placeholder="Default Textarea" rows="20" name="noi_dung">{{$editblog->noi_dung}}</textarea>
                            </div>
                        </div>
                        <script>
                            CKEDITOR.replace( 'editor1' );
                        </script>
                        <div class="form-group">
                            <label for="text" class="col-sm-2 control-label">Views</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="text" name="views" value="{{$editblog->views}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Sửa</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col-md-12 -->
    </div>
</section>
@endsection