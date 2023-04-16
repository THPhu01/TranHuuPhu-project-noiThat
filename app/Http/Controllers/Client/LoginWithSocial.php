<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Services\ServicesInterface\LoginSocialServiceInterface;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Laravel\Socialite\Two\AbstractProvider;

class LoginWithSocial extends Controller
{

    protected LoginSocialServiceInterface $loginSocial;

    public function __construct(
        LoginSocialServiceInterface $loginSocial
    ) {
        $this->loginSocial = $loginSocial;
    }

    public function redirectFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function loginFacebook()
    {
        $faceUser = Socialite::driver('facebook')->stateless()->user();
        // check user
        $user = User::where('facebook_id', '=', $faceUser->id)->first();
        if ($user) {
            auth::login($user, true);
        } else {
            $paramUserFace = [
                'facebook_id' => $faceUser->id,
                'name' => $faceUser->name,
                'email' => $faceUser->email,
                'avatar' => $faceUser->avatar,
                'is_admin' => 0,
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt(str::random(20))
            ];
            $user = User::create($paramUserFace);
            auth::login($user, true);
            return redirect()->route('homeClient');
        }
        return redirect()->route('homeClient');
    }

    /**
     * Redirect driver
     *
     * @return void
     */
    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Auth google
     *
     * @return void
     */
    public function loginGoogle()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        // check user exist in database
        $user = User::where('google_id', '=', $googleUser->getId())->first();
        // if user exits in database
        if ($user) {
            auth::login($user, true);
        } else {
            $paramUser = [
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'avatar' => $googleUser->getAvatar(),
                'is_admin' => 0,
                'google_id' => $googleUser->getId(),
                'password' => bcrypt(str::random(20)),
                'email_verified_at' => Carbon::now(),
            ];
            // create database
            $user = User::create($paramUser);
            // login
            auth::login($user, true);
            return redirect()->route('homeClient');
        }
        return redirect()->route('homeClient');
    }
}
