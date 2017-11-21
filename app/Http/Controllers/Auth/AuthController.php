<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Request\LoginForm;
use App\Request\RegisterForm;
use App\User;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function login(LoginForm $loginForm)
    {
        $loginForm->handle();

        return response()->json(true);
    }

    public function logout()
    {
        Auth::user()->is_logged_in = false;
        Auth::user()->save();
        Auth::logout();

        return redirect('/');
    }

    public function register(RegisterForm $registerForm)
    {
        $registerForm->handle();

        return response()->json(true);
    }
}
