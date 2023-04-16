<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ServicesInterface\UserServiceInterface;
use App\Services\ServicesInterface\ProductServiceInterface;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\AccountException;
use App\Models\User;
use App\Models\TinTuc;
use App\Models\SanPham;
use App\Models\GioHang;
use App\Models\DonHang;
use App\Models\Banner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use App\Models\wishlist;
use App\Mail\AccountSendMail;
use App\Http\Controllers\Client\File;

class ClientController extends Controller
{
    /**
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * @var ProductServiceInterface
     */
    protected $productService;
    /**
     * @var UserServiceInterface
     */
    protected $userService;

    public function __construct(
        Request $request,
        UserServiceInterface $userService,
        ProductServiceInterface $productService
    ) {
        $this->request = $request;
        $this->userService = $userService;
        $this->productService = $productService;
    }

    public function clientHome()
    {
        $banner = Banner::all();
        $blogs = TinTuc::inRandomOrder()->limit(4)->get()->toArray();
        $products = SanPham::orderBy('view', 'desc')->get()->toArray();
        $short_collection = [
            'img' => 'short1.jpg',
            'img' => 'short2.jpg',
        ];
        $data = [
            'sales' => [
                [
                    'name' => 'BÀN ĂN SALE',
                    'img' => 'sale5.jpeg',
                    'key' => ''
                ],
                [
                    'name' => 'SOFA SALE',
                    'img' => 'sale4.jpeg',
                    'key' => ''
                ],
                [
                    'name' => 'GIƯỜNG SALE',
                    'img' => 'bed.jpeg',
                    'key' => ''
                ],
                [
                    'name' => 'PHỤ KIỆN',
                    'img' => 'phukien2.jpeg',
                    'key' => ''
                ],

            ],
            'collections' => [
                [
                    'name' => 'Cabo',
                    'img' => 'Cabo.jpg',
                    'id' => 1
                ],
                [
                    'name' => 'Osaka',
                    'img' => 'Osaka.jpg',
                    'id' => 2
                ],
                [
                    'name' => 'Mây',
                    'img' => 'Mây.jpg',
                    'id' => 3
                ],
                [
                    'name' => 'Maxine',
                    'img' => 'Maxine.jpg',
                    'id' => 4
                ],
                [
                    'name' => 'Victoria',
                    'img' => 'victoria.jpg',
                    'id' => 5
                ],
                [
                    'name' => 'Jazz',
                    'img' => 'jazz.jpg',
                    'id' => 6
                ]
            ],
            'user_comment' => [
                [
                    'name' => 'Lâm Huỳnh Trân',
                    'img' => 'huynhtran.jpg',
                    'rate' => 5,
                    'description' => 'Sản phẩm quá tuyệt vời !',
                    'content' => 'Sản phẩm bên Diamond House quá tuyệt vời luôn , mình đã mua nhiều món đồ bên shop và cực kỳ ưng bụng luôn.
                         Mình sẽ tiếp tục mua hàng cho năm sao nha !       
                    '
                ],
                [
                    'name' => 'Mộng Cầm',
                    'img' => 'duongngoc.jpg',
                    'rate' => 4,
                    'description' => 'Rất hài lòng !',
                    'content' => 'Quá hài lòng khi mua hàng ở đây , mình đã có cho mình những món đồ ưng ý tại nơi này giá cả hợp với túi tiền của mình và trên hết là sản phẩm rất chất lượng sẽ tiếp tục ủng hộ shop mãi yêu!'
                ],
                [
                    'name' => 'Lục Thúy Vân',
                    'img' => 'thuyvan.jpg',
                    'rate' => 5,
                    'description' => 'Tôi yêu Osaka',
                    'content' => 'Mình là một người yêu văn hóa đơn giản và không cầu kì , may thay Diamond có bộ sưu tập Osaka
                                mình đỡ phải mất công đi tìm kiếm và cũng đã có cho mình những sản phẩm mà mình yêu thích !
                    '
                ],
                [
                    'name' => 'Minh Phương',
                    'img' => 'minhphuong.jpg',
                    'rate' => 5,
                    'description' => 'Thiết kế tuyệt vời',
                    'content' => 'Những sản phẩm của Diamond nhìn rất sang trọng về mặt hình thức và thiết kế . Loại thiết kế dành cho gia đình và 
                                cho cả mình ! cảm ơn Diamond House rất nhiều vì đã cung cấp cho mình những nội thất tuyệt vời.
                    '
                ],
            ],
            'short_collection' => $short_collection,
            'cate' => [
                [
                    'name' => 'Phụ kiện',
                    'img' => '1.jpeg',
                    'key' => ''
                ],
                [
                    'name' => 'Công nghiệp',
                    'img' => '2.jpeg',
                    'key' => ''
                ],
                [
                    'name' => 'Kiểu mẫu',
                    'img' => '3.jpeg',
                    'key' => ''
                ],
                [
                    'name' => 'Candinavia',
                    'img' => '4.jpeg',
                    'key' => ''
                ],
            ]
        ];
        foreach ($blogs as $blog) {
            $attributes = [
                'id' => $blog['id'],
                'description' => $blog['tieu_de'],
                'shortContent' => $blog['tom_tat'],
                'img' =>  $blog['anh'],
                'content' => substr($blog['noi_dung'], 0, 30) . " ..."
            ];
            $data['blogs'][] = $attributes;
        }
        //   dd($data['banners'][0]['img']);
        $data['toprating'] = [];
        $data['tophot'] = [];
        $data['topfeatured'] = [];
        foreach ($products as $product) {
            if ($product['rate'] == 5 && count($data['toprating']) < 12) {
                $data['toprating'][] = $product;
            }
            if ($product['hot'] == 1 && count($data['tophot']) < 12) {
                $data['tophot'][] = $product;
            }
            if ($product && count($data['topfeatured']) < 12) {
                $data['topfeatured'][] = $product;
            }
        }

        if ($this->request->ajax()) {
            $products = SanPham::where('tenSP', 'like', $this->request->search . '%')->get();
            $output = '';
            if (count($products) > 0) {
                $output = '<ul class="items-search">';
                foreach ($products as $key => $product) {
                    $output .= '<li class="item-search">
                    <a class="item-image" href="' . route('shop_detail.show', ['shop_detail' => $product->id]) . '">
                        <img class="pull-left" src="' . $product->anh . '">
                    </a>
                    <div class="item-content">
                        <a href="' . route('shop_detail.show', ['shop_detail' => $product->id]) . '" title="' . $product->tenSP . '">
                            <span>' . $product->tenSP . '</span>
                        </a>
                        <div class="price">' . number_format($product->gia_goc, 0, '', '.')
                        . '<span class="price">đ</span> </div>
                    </div>
                </li>';
                }
                $output .= '</ul>';
            } else {
                $output = '<li class="item-search">Sản phẩm không tồn tại</li>';
            }

            return $output;
        }

        // dd($data);
        return view('masterLayout.client.homeClient', compact('data', 'banner'));
    }

    public function shopProduct()
    {
    }
    public function shopProductId($id)
    {
    }

    public function mainShop()
    {
        return view('masterLayout.client.mainShop');
    }

    public function shopDetail($id)
    {
    }

    public function shopCheckout()
    {
        return view('masterLayout.client.shop_checkout');
    }
    public function shopWishlist()
    {
        $banner = Banner::all();
        if (empty(Auth::check())) {
            return redirect()->route('viewLogin');
        }
        return view('masterLayout.client.shop_wishlist', compact('banner'));
    }

    public function showProductInWishlist()
    {
        if (!auth::user()) {
            return redirect()->route('viewLogin')->with('error', 'you');
        }
        $data = wishlist::where('user_id', '=', auth::user()->id)->with('product')->paginate(8)->toArray();
        return response()->json(
            $data
        );
    }

    public function countProductInWishlist()
    {
        if (auth::user()) {
            $currUser = auth::user()->id;
            $data = wishlist::where('user_id', '=', $currUser)->get();
            return response()->json([
                'status' => 'success',
                'data' => count($data)
            ], 200);
        } else {
            return response()->json([
                'status' => 'fail',
                'data' => 0
            ], 400);
        }
    }

    public function countCart()
    {
        if (empty(Auth::check())) {
            return response()->json(
                [
                    'slug' => 0
                ]
            );
        }
        $data = GioHang::where('user_id', Auth::user()->id)->get();
        return response()->json(
            [
                'slug' => count($data)
            ]
        );
    }

    public function addToCartByQuickView()
    {
        $validator = validator::make(
            $this->request->all(),
            [
                'idProductQuickView' => 'required',
                'quantity' => 'required'
            ],
            [
                'idProductQuickView.required' => 'ID sản phẩm không được bỏ trống!',
                'quantity.required' => 'Số lượng phải lớn hơn 0'
            ]
        );
        if ($validator->fails()) {
            return response()->json(
                $validator->errors()->messages()
            );
        }
        // check user 
        if (empty(Auth::user())) {
            return redirect()->route('viewLogin')->with('errorLogin', 'Bạn cần phải đăng nhập trước khi thêm sản phẩm vào giỏ hàng!');
        }

        try {
            $param = [
                'session_id' => $this->request->get('idProductQuickView'),
                'user_id' => Auth::user()->id,
                'quatity' => $this->request->get('quantity')
            ];
            Giohang::create($param);
            return redirect('/giohangs');
        } catch (\Throwable $th) {
            return response()->json(
                $th->getMessage()
            );
        }
    }
    /**
     * add wishlist
     *
     * @return void
     */
    public function addWishlist()
    {
        $validator = validator::make(
            $this->request->all(),
            [
                'idProduct' => 'required'
            ],
            [
                'idProduct.required' => 'Product not null !'
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Product not null !'
            ], 400);
        }

        if (!auth::user()) {
            return response()->json(
                [
                    'need_login' => 1,
                    'message' => 'Bạn cần đăng nhập vào tài khoản!'
                ]
            );
        }

        $currUser = auth::user()->id;
        if ($this->request->get('idProduct')) {
            $idProduct = $this->request->get('idProduct');
        }
        $param = [
            'user_id' => $currUser,
            'product_id' => $idProduct
        ];
        // check wishlist duplicate
        $setUp = wishlist::where($param)->first();
        if (!empty($setUp)) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Sản phẩm đã ở trong wishlist !'
            ]);
        } else {
            wishlist::create($param);
            return response()->json([
                'status' => 'success',
                'message' => 'Đã thêm vào danh sách yêu thích !'
            ], 200);
        }
    }

    /**
     * remove wishlist
     *
     * @return void
     */
    public function removeWishlist()
    {
        // make validator
        $validator = validator::make(
            $this->request->all(),
            [
                'id_wishlist' => 'required'
            ],
            [
                'id_wishlist.required' => 'Mã wishlist không tồn tại !'
            ]
        );
        if ($validator->fails()) {
            $errorsData = $validator->errors()->messages();
            // return response json
            return response()->json([
                'status' => 'errorIdWishlist',
                'message' => $errorsData
            ], 403);
        }
        // check product
        // check auth exits
        if (auth::user()) {
            $idWishlist = (int)$this->request->get('id_wishlist');
            $currUser = (int)auth::user()->id;
            try {
                $this->productService->removeWishlistById($idWishlist, $currUser);
                return response()->json([
                    'status' => 'success',
                    'message' => 'Đã xóa thành công !'
                ], 200);
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => 'fail',
                    'message' => 'Sản phẩm không thể xóa'
                ], 403);
            }
        }
    }

    public function blogCate()
    {
        // return view('masterLayout.client.blogCate');
    }

    public function blogDetail()
    {
        // return view('masterLayout.client.blogDetail');
    }
    public function about()
    {
        $banner = Banner::all();
        return view('masterLayout.client.aboutUs', compact('banner'));
    }

    /**
     * Login and register account
     *
     * @return view('masterLayout.client.loginRegister)
     */
    public function viewRegister()
    {
        $banner = Banner::all();
        return view('masterLayout.client.viewRegister', compact('banner'));
    }

    /**
     * View login
     *
     * @return view('masterLayout.client.viewRegister')
     */
    public function viewLogin()
    {
        $banner = Banner::all();
        // nếu auth đã được xác thực
        if (Auth::check()) {
            $this->request->session()->flash('AuthExist', 'Bạn đã đăng nhập vào shop hãy chắc chắn rằng bạn đã đăng xuất trước khi đăng nhập lại !');
        }
        return view('masterLayout.client.viewLogin', compact('banner'));
    }
    /**
     * login
     *
     * @return [type]
     */
    public function login()
    {
        $credential = validator::make(
            $this->request->all(),
            [
                'emailLogin' => 'required|email',
                'passwordLogin' => 'required|string',
            ],
            [
                'emailLogin.required' => "Email không được bỏ trống !",
                'emailLogin.email' => "Không đúng định dạng email!",
                'passwordLogin.required' => "Mật khẩu không được trống",
                'passwordLogin.string' => "Mật khẩu phải là chuỗi",
            ]
        );
        if ($credential->fails()) {
            $errorsData = $credential->errors()->messages();
            // return response json
            return response()->json([
                'status' => 'errorValidate',
                'message' => $errorsData
            ]);
        }
        $remember_me = false;
        if (!empty($this->request->get('remember_me'))) {
            $remember_me = true;
        }
        $paramLogin = [
            'email' => $this->request->get('emailLogin'),
            'password' => $this->request->get('passwordLogin')
        ];
        // call user Service
        try {
            $this->userService->userLogin($paramLogin, $remember_me);
            return redirect()->route('homeClient');
        } catch (AccountException $e) {
            return redirect()->back()->with('errorLogin', $e->getMessage());
        }
    }

    public function logout()
    {
        Auth::logout();
        $this->request->session()->invalidate();
        return redirect()->route('homeClient');
    }
    /**
     * register account
     *
     * @return [type]
     */
    public function register()
    {
        /** custom messages */
        $messages = [
            'username.required' => 'Tên không được bỏ trống!',
            'email.required' => "Email không được bỏ trống !",
            'email.email' => "Không đúng định dạng email!",
            'email.max' => "Email không được dài quá 32 ký tự !",
            'password.required' => "Mật khẩu không được trống",
            'password.string' => "Mật khẩu phải là chuỗi",
            'password.min' => "Mật khẩu không được ngắn quá 8 kí tự",
            'password.max' => "Mật khẩu không được dài quá 16 kí tự",
            'phone.required' => 'Điện thoại không được bỏ trống!',
            'address.required' => 'Không được để trống địa chỉ'
        ];
        /** validate request */
        $validator = validator::make(
            $this->request->all(),
            [
                'username' => 'required',
                'email' => "required|email|max:32",
                'password' => "required|string|min:8|max:16",
                'phone' => 'required',
                'address' => 'required'
            ],
            $messages
        );
        if ($validator->fails()) {
            $errorsData = $validator->errors()->messages();
            // return response json
            return response()->json([
                'status' => 'errorValidate',
                'message' => $errorsData
            ]);
        }
        $param = [];
        if (!empty($this->request->get('email')) && !empty($this->request->get('password'))) {
            /** get user name  */
            $param = [
                'is_admin' => 0,
                'name' => $this->request->get('username'),
                'email' => $this->request->get('email'),
                'password' => bcrypt($this->request->get('password')),
                'passwordChange' => $this->request->get('password'),
                'phone' => $this->request->get('phone'),
                'diaChi' => $this->request->get('address')
            ];
        }
        try {
            $this->userService->userRegisterAccount($param);
            /** send email to user */
            $paramMail = [
                'username' =>  $this->request->get('username'),
                'email' => $this->request->get('email')
            ];
            Mail::to($this->request->get('email'))->send(new AccountSendMail($paramMail));
            /** return successfully register account */
            return response()->json([
                'status' => 'success'
            ]);
        } catch (AccountException $e) {
            // exception register account
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }
    public function myAccount()
    {
        $banner = Banner::all();
        $session_user = Auth::user()->id;
        // get don hang 
        $donHang = DonHang::where('id_user', $session_user)->get();
        $User = User::where('id', $session_user)->first();
        $data = [
            'donHang' => $donHang,
            'user' => $User
        ];
        return view('masterLayout.client.myAccount', compact('data', 'banner'));
    }
    public function changePasswordUser()
    {
        $messages = [
            'current_password.required' => 'Không được bỏ trống mật khẩu!',
            'password_1.required' => "Không được bỏ trống mật khẩu !",
            'password_2.required' => "Không được bỏ trống mật khẩu!",
        ];
        /** validate request */
        $validator = validator::make(
            $this->request->all(),
            [
                'current_password' => 'required',
                'password_1' => "required",
                'password_2' => "required",
            ],
            $messages
        );
        if ($validator->fails()) {
            $errorsData = $validator->errors()->messages();
            // return response json
            return response()->json([
                'status' => 'errorValidate',
                'message' => '',
                'data' => $errorsData
            ]);
        }
        // redirect user to view login 
        if (empty(Auth::check())) {
            return redirect()->route('viewLogin');
        }
        $attribute = [
            'email' => Auth::user()->email,
        ];
        $dataChangeAccount = $this->request->all();
        $getUser = User::where('email', $attribute)->first();
        try {
            $this->userService->userChangeAccount($dataChangeAccount, $getUser);
            return response()->json(
                [
                    'status' => 'success',
                    'message' => 'Cập nhật tài khoản thành công !',
                    'data' => []
                ]
            );
        } catch (AccountException $e) {
            return response()->json(
                [
                    'status' => 'failed',
                    'message' => $e->getMessage(),
                    'data' => []
                ]
            );
        }
    }
    public function myAccountStore(Request $request)
    {
        if ($request->account_email == Auth::user()->email) {
            return redirect()->back()->withErrors(['messaggeNotExits' => 'Email  tồn tại trong hệ thống']);
        }
        Auth::user()->update([
            'name' => $request->account_display_name,
            'email' => $request->account_email,
            'hoTen' => $request->account_first_name,
            'phone' => $request->account_phone,
        ]);
        return redirect()->back();
    }

    public function changeAccount()
    {
        $validator = validator::make(
            $this->request->all(),
            [
                'account_display_name' => 'required',
                'account_phone' => 'required',
                'account_email' => 'required'
            ],
            [
                'account_display_name.required' => 'Tên không được để trống !',
                'account_phone.required' => 'Số điện thoại không được để trống !',
                'account_email.required' => 'Email không được để trống !'
            ]
        );
        if ($validator->fails()) {
            return response()->json(
                $validator->errors()->messages()
            );
        }
        if (empty(Auth::check())) {
            return redirect()->route('viewLogin');
        }
        // update account
        $paramUpdate = [
            'name' => $this->request->get('account_display_name'),
            'phone' => $this->request->get('account_phone'),
            'email' => $this->request->get('account_email')
        ];
        $session_user = Auth::user()->id;
        // update account 
        try {
            $this->userService->userUpdateAccount($paramUpdate, $session_user);
            Mail::to($this->request->get('email'))->send(new AccountSendMail($paramUpdate)); // gửi một cái mail thông báo 
            #TODO : push một cái noti thông báo rằng đã thay đổi email

            #END-TODO
            return response()->json(
                [
                    'status' => 'success',
                    'message' => 'Cập nhật tài khoản thành công !'
                ]
            );
        } catch (AccountException $e) {
            return response()->json(
                [
                    'status' => 'failed',
                    'message' => $e->getMessage()
                ]
            );
        }
    }
    public function repassmyAccount(Request $request)
    {
        if ($request->password_1 != $request->password_2) {
            return redirect()->back()->withErrors(['passErrors2' => 'Vui lòng nhập giống nhau!']);
        }
        $password = $request->password_current;
        $HashedPassword = Auth::user()->password;
        if (Hash::check($password, $HashedPassword) && $request->password_1 === $request->password_2) {
            $request->user()->fill([
                'password' => Hash::make($request->password_1)
            ])->update();
        } else {
            return redirect()->back()->withErrors(['passErrors' => 'Mật khẩu không giống!']);
        }

        return redirect()->back()->with('resetSucess', 'Đổi mật khẩu thành công');
    }
    public function forgotPassword()
    {
        $banner = Banner::all();
        return view('masterLayout.client.forgotPassword',compact('banner'));
    }
    public function sendForgotPassword()
    {
        $user =  $this->userService->isExits($this->request->email);
        if (!$user) {
            return redirect()->back()->withErrors(['messaggeNotExits' => 'Email không tồn tại trong hệ thống']);
        }
        $token = Password::createToken($user);
        Mail::send(
            'emails.forgotPasword',
            array('link' =>  $this->request->root() . '/client/reset-password' . '/' . $token),
            function ($message) use ($user) {
                $message->from('unghuyrichard07@gmail.com')->to($user->email)->subject('TODOParrot Feedback');
            }
        );
        return redirect()->back()->with('successSendMail', 'Mail xác nhận mật khẩu đã gửi');
    }

    public function contact()
    {
        $banner = Banner::all();
        return view('masterLayout.client.contact', compact('banner'));
    }
    public function contact2()
    {
        return view('masterLayout.client.contact2');
    }
    public function faq()
    {
        $banner = Banner::all();
        return view('masterLayout.client.faq', compact('banner'));
    }
    public function page404()
    {
        return view('masterLayout.client.page404');
    }

    /**
     * Function search product
     */
    public function quickViewProduct()
    {
        $validator = validator::make(
            $this->request->all(),
            [
                'id' => 'required'
            ],
            [
                'id.required' => 'Không tồn tại sản phẩm !'
            ]
        );
        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => $validator->getMessageBag()->toArray()
                ]
            );
        }
        $id = 0;
        if (!empty($this->request->get('id'))) {
            (int)$id = $this->request->get('id');
        }
        $data = SanPham::where('id', '=', $id)->first();
        return response()->json(
            $data
        );
    }

    public function resetPasswordForm()
    {
        return view('masterLayout.client.resetPassword2', ['token' => $this->request->token]);
    }
    public function postResetPassword()
    {
        $this->request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
        $status = Password::reset(
            $this->request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );
        return $status === Password::PASSWORD_RESET
            ? redirect()->route('viewLogin')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
        return;
    }

    // Cập nhật địa chỉ user
    public function capNhatDiaChi(Request $request){
        $user = User::find(Auth::id());
        $json = file_get_contents("../data.json");
        $data = json_decode($json, true);

        for($i = 0; $i < count($data) ; $i++){
             $tinhJson = $data[$i]['Id'];
             $phanTu = $i;
             if($tinhJson == $request->tinh){
                $tinhData = $data[$i]['Name'];
                $quanJson = $data[$phanTu]['Districts'];
             }
             
        }
        for($i = 0 ; $i < count($quanJson); $i++){
            $quan = $quanJson[$i]['Id'];
            $phanTuQuan = $i;
            if($quan == $request->quan){
                $quanData = $quanJson[$i]['Name'];
                $phuongJson = $quanJson[$phanTuQuan]['Wards'];
            }
                
        }
        for($i = 0 ; $i < count($phuongJson) ; $i++){
            $phuong = $phuongJson[$i]['Id'];
            if($phuong == $request->phuong){
                $phuongData = $phuongJson[$i]['Name'];
            }
        }
        $duong = $request->duong;
        $user->diaChi = $duong . " " . $phuongData ." ".  $quanData . " , " . $tinhData;
        $user->save();
        return redirect('client/my_account');
        
    }
}
