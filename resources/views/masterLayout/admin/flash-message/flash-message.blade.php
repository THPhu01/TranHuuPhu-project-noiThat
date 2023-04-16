@if ($message = Session::get('success'))
<div class = "alert alert-success alert-block" > 
	<button type = "button" class = "close" data-dismiss = "alert" > × </button>   	
        <strong> {{ $message }} </strong>
</div>
@endif

@if ($message = Session::get('thongbao'))
<div class = "alert alert-success alert-block" > 
	<button type = "button" class = "close" data-dismiss = "alert" > × </button>   	
        <strong style="font-size : 20px;"> {{ $message }} </strong>
</div>
@endif


<!-- @if ($message = Session::get('error'))
<div class = "alert alert-danger alert-block" > 
	<button type = "button" class = "close" data-dismiss = "alert" > × </button>   	
        <strong> {{ $message }} </strong>
</div>
@endif -->


<!-- @if ($message = Session::get('cảnh báo'))
<div class = "alert alert-warning alert-block" > 
	<button type = "button" class = "close" data-dismiss = "alert" > × </button>   	
	<strong> {{ $message }} </strong>
</div>
@endif -->


<!-- @if ($message = Session::get('info'))
<div class = "alert alert-info alert-block" > 
	<button type = "button" class = "close" data-dismiss = "alert" > × </button>   	
	<strong> {{ $message }} </strong>
</div>
@endif -->


<!-- @if ($errors->any())
<div class = "alert alert-danger" > 
	<button type = "button" class = "close" data-dismiss = "alert" > × </button>   	
	Vui lòng kiểm tra mẫu dưới đây để tìm lỗi
</div>
@endif -->