$('document').ready(function () {
    function showProductInWishlistByUser(page) {
        $.ajax({
            url: '/client/shop_wishlist',
            method: 'GET',
            data: {
                page: page
            },
            success: function (data) {
                console.log(data)
            }
        })
    }
    function countProductInWishlist() {
        $.ajax({
            url: '/client/countProductInWishlist',
            method: 'GET',
            success: function (data) {
                $('.count-wishlist').html(data.data)
            }
        })
        showProductInWishlistByUser(1);
    }
    function countCart() {
        $.ajax({
            url: '/client/countCart',
            method: 'GET',
            success: function (res) {
                $('.cart-count').html(res.slug)
            }
        })
    }
    countProductInWishlist(); // function count product in wishlist by user
    countCart();
    // add product
    $('.addWishlist').on('click', function () {
        var idproduct = $(this).attr('value-product');
        if (idproduct != null) {
            addProductInWishlistByUser(idproduct);
            countProductInWishlist(); // call function count product
        }
    })

    function addProductInWishlistByUser(idProduct) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/client/addWishlistByUser',
            method: 'POST',
            data: {
                idProduct: idProduct
            },
            dataType: 'JSON',
            success: function (data) {
                if (data.status == 'success') {
                    $.notify(data.message, "success");
                }
                if (data.status == 'fail') {
                    $.notify(data.message, "info");
                }
                if (data.need_login) {
                    $.notify(data.message, "info");
                }
            }
        })
    }

    function formatCash(str) {
        return str.split('').reverse().reduce((prev, next, index) => {
            return ((index % 3) ? next : (next + '.')) + prev
        })
    }
    // remove product
    function quickViewProduct(id) {
        $.ajax({
            url: '/client/quickViewProduct',
            method: 'GET',
            data: {
                id: id
            },
            success: function (res) {
                var rate = `<span style="width:80%">đánh giá : <strong class="rating">${res.rate}</strong> trên 5 <span class="rating">1</span> khách hàng đã đánh giá !</span>`;
                var userView = `<a href="#" class="review-link">(<span class="count">${res.view}</span> Đã xem)</a>`;
                var description = `<p>${res.mo_ta}</p>`;
                // print 
                $('.nameProduct').html(res.tenSP)
                $('.imgQuickView1').attr('src', res.anh)
                $('.imgQuickView2').attr('src', res.anh)
                $('.descriptionQuickView').html(description)
                $('#UserViewProduct').html(userView)
                $('#rateQuickView').html(rate)
                $('.priceDelCurr').html(formatCash(res.gia_goc) + ' VND')
                $('.priceProductCurr').html(formatCash(res.gia_khuyen_mai) + ' VND')
                $('.idProductQuickView').val(res.id)
            }
        })
    }
    $('.quickview-data').on('click', function () {
        const id_quick_view = $(this).attr('value-quickview');
        quickViewProduct(id_quick_view);
    })
    // show product paginate
    $('.btnchangeDetail').on('click', function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/client/changeAccount',
            method: 'POST',
            data: {
                account_display_name : $('.account_display_name').val(),
                account_phone : $('.account_phone').val(),
                account_email : $('.account_email').val(), 
            },
            success: function (res) {
                if (res.status == 'success') {
                    $.notify(res.message, "success");
                } else {
                    $.notify(res.message, "info");
                }
            }
        })
    })

    // change password user 
    function changePassword(current_password,password_1,password_2) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/client/changePasswordUser',
            method: 'POST',
            data: {
                current_password : current_password,
                password_1 : password_1,
                password_2 : password_2, 
            },
            success: function (res) {
                if (res.status == 'success') {
                    $.notify(res.message, "success");
                } 
                if (res.status == 'failed') {
                    $.notify(res.message, "error");
                }
                if (res.status == 'errorValidate') {
                    $.each(res.data,function(index,value){
                        if(index === 'current_password') {
                            $('.current_password').html(value)
                        } 
                        if(index === 'password_1') {
                            $('.new_password1').html(value) 
                        }
                        if(index === 'password_2') {
                            $('.new_password2').html(value) 
                        }
                   })
                }
            }
        })
    }

    $('[name="save_account_details"]').on('click',function() {
        let current_password = $('[name="password_current"]').val();
        let password_1 = $('[name="password_1"]').val();
        let password_2 = $('[name="password_2"]').val();
        // callback function change password
        changePassword(current_password,password_1,password_2);
    })
    // focus input
    $('.form-row .input-text').on('focus',function () { 
        $('.form-row .input-text .text-error') = $(this).html('')
    })
})