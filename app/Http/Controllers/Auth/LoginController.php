<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Profile;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function github()
    {
        return Socialite::driver('github')->redirect();
    }

    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function githubRedirect()
    {
        try {
            $githubUser = Socialite::driver('github')->user();
            if ($githubUser->name === null) $name=$githubUser->nickname;
            else $name=$githubUser->name;
            $existUserByEmail = User::where('email', $githubUser->email)->first();
            $existUserByUsername = User::where('username', $githubUser->nickname)->first();

            if ($existUserByEmail) {
                Auth::loginUsingId($existUserByEmail->id);
            } else if ($existUserByUsername) {
                Auth::loginUsingId($existUserByUsername->id);
            } else {
                $user = new User;
                $user->name = $name;
                $user->username = $githubUser->nickname;
                $user->email = $githubUser->email;
                $user->password = Hash::make(Str::random(24));
                $user->save();
                $profile = new Profile();
                $profile->title = $user->username;
                $profile->description = 'Description n/a';
                $profile->image = 'images/profile/anonymus.jpg';
                $user->profile()->save($profile);
                Auth::loginUsingId($user->id);
            }
            return redirect()->to('/home');
        } catch (Exception $e) {
            return 'Error';
        }
    }

    public function googleRedirect()
    {
        try {

            $googleUser = Socialite::driver('google')->user();
            $arr = explode("@", $googleUser->email, 2);
            $username = $arr[0];
            $existUserByEmail = User::where('email', $googleUser->email)->first();
            $existUserByUsername = User::where('username', $username)->first();

            if ($existUserByEmail) {
                Auth::loginUsingId($existUserByEmail->id);
            } else if ($existUserByUsername){
                Auth::loginUsingId($existUserByUsername->id);
            } else {
                $user = new User;
                $user->name = $googleUser->name;
                $user->username = $username;
                $user->email = $googleUser->email;
                $user->password = Hash::make(Str::random(24));
                $user->save();
                $profile = new Profile();
                $profile->title = $user->username;
                $profile->description = 'Description n/a';
                $profile->image = 'images/profile/anonymus.jpg';
                $user->profile()->save($profile);
                Auth::loginUsingId($user->id);
            }
            return redirect()->to('/home');
        } catch (Exception $e) {
            return 'Error';
        }
    }
}
