<?php

namespace App\Services\ServicesWeb;

use App\Services\ServicesInterface\UserServiceInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\AccountException;
use Symfony\Component\OptionsResolver\Exception\AccessException;
use Illuminate\Http\Request;

class UserService implements UserServiceInterface
{
    protected $request;

    public function __construct(
        Request $request
    ) {
        $this->request = $request;
    }
    /**
     * Login
     *
     * @param array $param
     * @return mixed
     */
    public function userLogin(array $param, bool $remember_me)
    {
        if (Auth::attempt($param, $remember_me)) {
            $this->request->session()->regenerate();
        } else {
            throw new AccountException('Email hoặc mật khẩu không chính xác !');
        }
    }

    /**
     * User register new account
     *
     * @param array $params
     * @return User
     */
    public function userRegisterAccount(array $params): User
    {
        /** check user exist */
        $checkAccount = User::where('email', '=', $params['email'])->get();
        // throw exception
        if ($checkAccount->isNotEmpty()) {
            throw new AccountException('Email đã được đăng ký !');
        }
        return User::create($params);
    }
    
    public function userUpdateAccount(array $param , int $user): void
    {
        $updateUser = User::where('id',$user)->first();
        if(empty($updateUser)) {
            throw new AccountException('Cập nhật không thành công !');
        }
        // check email and mobile duplicate in model user
        $getAllAccount = User::all();
        foreach ($getAllAccount as $account) {
            if ($account->email === $param['email'] && $account->id != $user) {
                throw new AccountException('Email của đã tồn tại !');
            }
            if ($account->phone === $param['phone'] && $account->id != $user) {
                throw new AccountException('Số điện thoại của đã tồn tại !');
            }
        }
        $updateUser->update($param);
    }

    public function userChangeAccount(array $data , $user): void
    {   
        if ($data['current_password'] != $user->passwordChange) {
            throw new AccountException('Mật khẩu hiện tại không chính xác !');
        }   
        if ($data['password_1'] != $data['password_2']) {
            throw new AccountException('Mật khẩu không trùng nhau !');
        }
        $param = [
            'password' => bcrypt($data['password_1']),
            'passwordChange' => $data['password_1']
        ];
        User::where('email',$user->email)->update($param);        
    }

    public function isExits($email)
    {
        return User::where('email', $email)->first();
    }
}
