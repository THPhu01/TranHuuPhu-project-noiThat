
function showProductInWishlistByUser(page) {
    $.ajax({
        url: '/client/showProductInWishlist',
        data: {
            page: page
        },
        method: 'GET',
        success: function (res) {
            const wishlists = res.data;
            var html = '';
            console.log(res.data.length)
            if (res.data.length == 0) {
                html += `
                    <div class="oops">
                        <div class="row">
                            <div class="col-12 d-flex flex-row justify-content-center">
                             <img src="../img-home/pngegg.png" alt="" width="500px" height="100px">
                            </div>
                        </div>
                    </div>
                `
            }
            for (var i = 0; i < wishlists.length; i++) {
                var wishlist = wishlists[i];
                var status = 'Hết hàng';
                if (wishlist.product.tinh_trang == 1) {
                    var status = 'Còn hàng';
                }
                html += `
                        <tr class="wishlist-item">
                        <td class="wishlist-item-remove"><span class="iconRemove" id-productWishlist=${wishlist.id}></span></td>
                        <td class="wishlist-item-image">
                            <a href="/client/shop_detail/${wishlist.id}">
                                <img width="600" height="600" src="${wishlist.product.anh}" alt="">
                            </a>
                        </td>
                        <td class="wishlist-item-info">
                            <div class="wishlist-item-name">
                                <a href="/client/shop_detail/${wishlist.id}">${wishlist.product.tenSP}</a>
                            </div>
                            <div class="wishlist-item-price">
                                <span>${new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(wishlist.product.gia_goc)}</span>
                            </div>
                            <div class="wishlist-item-time">Tình trạng : ${status}</div>
                        </td>
                        <td class="wishlist-item-actions">
                            <div class="wishlist-item-add">
                                <div class="btn-add-to-cart" data-title="Add to cart">
                                    <a rel="nofollow" href="#" class="product-btn button">Thêm vào giỏ</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                `;
            }
            $('#output').html(html); // show product
        }
    })
}
function countProductInWishlistByUser2() {
    $.ajax({
        url: '/client/countProductInWishlist',
        method: 'GET',
        success: function (data) {
            $('#countProductInWishlist').html(data.data)
        }
    })
}
$('document').ready(function () {
    function countProductInWishlistByUser() {
        $.ajax({
            url: '/client/countProductInWishlist',
            method: 'GET',
            success: function (data) {
                $('#countProductInWishlist').html(data.data)
            }
        })
    }
    countProductInWishlistByUser();
    showProductInWishlistByUser(1);
})
$('body').delegate('.iconRemove', 'click', function (e) {
    e.preventDefault();
    confirm('Xóa khỏi danh sách yêu thích ?')
    const idProductWishlist = $(this).attr('id-productWishlist');
    if (idProductWishlist != null) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/client/removeWishlist',
            method: 'POST',
            data: {
                id_wishlist: idProductWishlist
            },
            success: function (res) {
                if (res.status == 'success') {
                    $.notify(res.message, "success");
                }
                if (res.status == 'fail') {
                    $.notify(res.message, "info");
                }
            }
        })
        showProductInWishlistByUser(1);
        countProductInWishlistByUser2();
    }
});