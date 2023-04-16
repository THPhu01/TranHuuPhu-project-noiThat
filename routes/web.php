<?php

use App\Http\Controllers\Client\CheckoutController;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\ShopProduct;
use App\Http\Controllers\Client\shopProductId;
use App\Http\Controllers\Client\shopDetail;
use App\Http\Controllers\Client\blogCate;
use App\Http\Controllers\Client\blogDetail;
use App\Http\Controllers\Client\GioHangController;
use App\Http\Controllers\Client\LoginWithSocial;
use App\Mail\testSendMail;
use App\Mail\GuiEmail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/**
 * Route group for client
 */
Route::get('/test' , function(){
    return view ('masterLayout.client.test');
});
Route::prefix('client')->group(function () {
    // client home route
    Route::get('/home', [ClientController::class, 'clientHome'])->name('homeClient');

    // Route get shop number 2
    // Route::get('/shop_product', [ClientController::class, 'shopProduct']);
    // Route::get('/shop_product/{id}', [ClientController::class, 'shopProductId']);
    // Route::get('/shop_details/{id}', [ClientController::class, 'shopDetail']);
    Route::resources([
        'shop_products' => ShopProduct::class,
        'shop_detail' => ShopDetail::class,
        'shop_productId' => shopProductId::class,
        'blog_cate' => BlogCate::class,
        'blog_detail' => BlogDetail::class,
    ]);

    Route::post('/load-comment', [ShopProduct::class, 'loadComment'])->name('loadComment');
    Route::post('/send-comment', [ShopProduct::class, 'sendComment'])->name('sendComment');
    Route::post('/insert_rating', [ShopDetail::class, 'insertRating'])->name('insertRating');

    Route::get('/main_shop', [ClientController::class, 'mainShop'])->name('mainShop');
    Route::get('/shop_wishlist', [ClientController::class, 'shopWishlist']);
    Route::get('/showProductInWishlist', [ClientController::class, 'showProductInWishlist']);
    Route::post('/removeWishlist', [ClientController::class, 'removeWishlist']);
    Route::get('/showProductInWishlist', [ClientController::class, 'showProductInWishlist']);
    Route::post('/removeWishlist', [ClientController::class, 'removeWishlist']);
    // Route get blog
    // Route::get('/blog_cate', [ClientController::class, 'blogCate']);
    // Route::get('/blog_detail', [ClientController::class, 'blogDetail']);
    // Route get page
    Route::get('/my_account', [ClientController::class, 'myAccount'])->name('detailUser');
    Route::post('/my_account_store', [ClientController::class, 'myAccountStore'])->name('store-myAccount');
    Route::post('/my_account_repass', [ClientController::class, 'repassmyAccount'])->name('repass-myAccount');
    Route::post('/my_account_upDiachi' , [ClientController::class , 'capNhatDiaChi'])->name('update-Address');
    Route::get('/login_register', [ClientController::class, 'loginRegister'])->name('loginAndRegister');
    Route::get('/about', [ClientController::class, 'about']);
    Route::get('/forgot_password', [ClientController::class, 'forgotPassword'])->name('forgotPasswordView');
    Route::post('/send-forgot-password', [ClientController::class, 'sendForgotPassword'])->name('sendForgotPassword');
    Route::get('/contact', [ClientController::class, 'contact']);
    Route::get('/faq', [ClientController::class, 'faq']);
    Route::get('/page404', [ClientController::class, 'page404']);
    Route::get('/quickViewProduct', [ClientController::class, 'quickViewProduct'])->name('quickViewProduct');
    Route::post('/login', [ClientController::class, 'login'])->name('login');
    Route::post('/register', [ClientController::class, 'register'])->name('register');
    Route::get('/logout', [ClientController::class, 'logout'])->name('clientlogout');
    Route::post('/changeAccount', [ClientController::class, 'changeAccount']);
    Route::post('/changePasswordUser', [ClientController::class, 'changePasswordUser']);
    Route::get('/viewRegister', [ClientController::class, 'viewRegister'])->name('viewRegister');
    Route::get('/viewLogin', [ClientController::class, 'viewLogin'])->name('viewLogin');
    Route::get('/countProductInWishlist', [ClientController::class, 'countProductInWishlist']);
    Route::get('/reset-password/{token}', [ClientController::class, 'resetPasswordForm']);
    Route::post('/addWishlistByUser', [ClientController::class, 'addWishlist']);
    Route::post('/addWishlistByUser', [ClientController::class, 'addWishlist']);
    Route::get('/countCart', [ClientController::class, 'countCart']);
    Route::post('/reset-password-post', [ClientController::class, 'postResetPassword'])->name('postResetPassword');
    Route::post('/addToCartByQuickView', [ClientController::class, 'addToCartByQuickView'])->name('addToCartByQuickView');
});

Route::get('/', [ClientController::class, 'clientHome']);
/** facebook */
Route::get('/auth/facebook', [LoginWithSocial::class, 'redirectFacebook'])->name('redirectFace');
Route::get('/auth/facebook/callback', [LoginWithSocial::class, 'loginFacebook']);
/** google */
Route::get('/auth/google', [LoginWithSocial::class, 'redirectGoogle'])->name('redirectGoole');
Route::get('/auth/google/callback', [LoginWithSocial::class, 'loginGoogle']);
Route::get('/auth/google', [LoginWithSocial::class, 'redirectGoogle'])->name('redirectGoole');
Route::get('/auth/google/callback', [LoginWithSocial::class, 'loginGoogle']);
Route::resources([
    'giohangs' =>  GioHangController::class,
]);
Route::get('/giohang/checkout', [CheckoutController::class, 'index']);
Route::post('/giohang/checkout/create', [CheckoutController::class, 'create'])->name('checkout');
Route::get('/giohang/checkout', [CheckoutController::class, 'index']);
Route::post('/giohang/checkout/create', [CheckoutController::class, 'create'])->name('checkout');

Route::get('send-mail', function () {

    $user = [
        'username' => 'NGUYEN LAM TRUONG',
        'email' => 'nguyenlamtruong.dev@gmail.com'
    ];

    \Mail::to('nguyenlamtruong.albert@gmail.com')->send(new \App\Mail\testSendMail($user));

    dd("Email is Sent.");
});

Route::get('template', function () {
    return view('emails.MailAccount');
});
// Gửi mailer
Route::post('/guilienhe', function (Illuminate\Http\Request $request) {
    $arr = request()->post();
    $ht = trim(strip_tags($arr['name']));
    $em = trim(strip_tags($arr['email']));
    $nd = trim(strip_tags($arr['message']));
    $adminEmail = 'unghuyrichard07@gmail.com';
    Mail::mailer('smtp')->to($adminEmail)
        ->send(new GuiEmail($ht, $em, $nd));

    return response()->json(['success' => 'Cảm ơn bạn đã liên hệ với chúng tôi! Chúng tôi sẽ phản hồi trong vòng 24h làm việc']);
});
