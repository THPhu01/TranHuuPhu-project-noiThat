$('document').ready(function () {
    /** validate form with jquery plugin */
    $('#registerForm').validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required : true,
            },
            username : {
                required : true,
            },
            phone : {
                required : true,
            },
            address : {
                required : true,
            }
        },
        messages: {
            email: {
                required: "Email không được bỏ trống",
                email: "Địa chỉ email không chính xác !",
            },
            password: {
                required : "Không được bỏ trống mật khẩu !",
            },
            username : {
                required : "Không được bỏ trống họ và tên"
            },
            phone : {
                required : "Không được bỏ trống số điện thoại"
            },
            address : {
                required : "Không được bỏ trống địa chỉ"
            }
        },
        submitHandler: function (form) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // send ajax 
            $.ajax({
                url: "/client/register",
                type: "POST",
                dataType: "json",
                data: $(form).serialize(),
                success: function (data) {
                    /** condition alert */
                    // success
                    if(data.status === "success") {
                        $.notify("Đăng ký tài khoản thành công !", "success");
                        // set redirect route login 
                        setTimeout( function() {
                            window.location.href = "/client/viewLogin";
                            },3000
                        );
                    }
                    // error
                    else if (data.status === "failed"){
                        $.notify(data.message, "error");
                    }
                    // otherwise
                    else {
                       $.each(data.message,function(index,value){
                            if(index === 'email') {
                                $('#errorEmailRegister').html(value)
                            } 
                            if(index === 'password') {
                                $('#errorPasswordRegister').html(value) 
                            }
                       })
                    }
                },
            })
        }
    });
    //
    $('#emailRegister').on('blur',function () { 
        $('#errorEmailRegister').html("");
    });
    $('#passwordRegister').on('blur',function () { 
        $('#errorPasswordRegister').html("");
    });
    // validate form login
    $('#formLogin').validate({
        rules: {
            emailLogin : "required",
            passwordLogin : "required"
        },
        messages : {
            emailLogin : "Email không được bỏ trống !",
            passwordLogin : "Mật khẩu không được bỏ trống !"
        }
    })
})

