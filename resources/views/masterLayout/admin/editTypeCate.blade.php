@extends('masterLayout.admin.masterAdminHome')
@section('section_name')
Sửa loại
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
<div class="row">

    <div class="col-md-10">
        <div class="panel">

            <div class="panel-body">

                <form action="{{route('loaidanhmucs.update',[$loaidanhmuc->id])}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Tên loại</label>
                        <input type="text" class="form-control" name="tenloai" value="{{$loaidanhmuc->ten}}">
                    </div>
                    <div class="form-group">
                        <label>Danh mục</label>
                        <div>
                            <select class="form-control" name="danhmuc">
                                @foreach($danhmuc as $item)
                                <option value="{{$item->id}}" {{$item->id == $loaidanhmuc->id_dm ? 'selected' : ''}}>
                                    {{$item->ten_dm}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>

                <div class="col-md-12 mt-15 src-code">
                    <pre class="language-html"><code class="language-html">
&lt;form&gt;
&lt;div class="form-group"&gt;
&lt;label for="exampleInputEmail1"&gt;Email address&lt;/label&gt;
&lt;input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" autofocus=""&gt;
&lt;/div&gt;
&lt;div class="form-group"&gt;
&lt;label for="exampleInputPassword1"&gt;Password&lt;/label&gt;
&lt;input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"&gt;
&lt;/div&gt;
&lt;div class="checkbox"&gt;
&lt;label&gt;
&lt;input type="checkbox"&gt; Check me out
&lt;/label&gt;
&lt;/div&gt;
&lt;button type="submit" class="btn btn-primary"&gt;Submit&lt;/button&gt;
&lt;/form&gt;
                </code></pre>
                </div>
                <!-- /.col-md-12 -->
            </div>
        </div>
    </div>
    <!-- /.col-
md-6 -->
    @endsection
