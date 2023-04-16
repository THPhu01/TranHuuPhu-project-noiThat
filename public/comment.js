$(document).ready(function () {
    load_comment();
    function load_comment() {
        var sanpham_id = $('.id_san_pham').val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{url('/load-comment')}}",
            method: "POST",
            data: {
                sanpham_id: sanpham_id,
                _token: _token
            },
            success: function (data) {
                $('#comment_show').html(data);
            }
        });
    }
});