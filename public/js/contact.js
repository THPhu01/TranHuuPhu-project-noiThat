$(document).ready(function(){
    var form = '#contact';
    
    $(form).on('submit' , function(event){
        event.preventDefault();

        $.ajax({
            url: '/guilienhe',
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(response)
            {
                $(form).trigger("reset");
                alert(response.success)
            },
            error: function(response) {
            }
        });
    })
})