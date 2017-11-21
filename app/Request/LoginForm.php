<?php

namespace App\Request;

use App\Exceptions\AuthException;
use Auth;

class LoginForm extends Form
{

    protected $rules = [
        'email'    => 'required|email',
        'password' => 'required'
    ];

    public function handle()
    {
        $credentials = [
            'email'    => $this->fields('email'),
            'password' => $this->fields('password')
        ];
        $this->isValid();
        if (Auth::attempt($credentials)) {
            if (Auth::user()->is_logged_in) {
                Auth::logout();
                throw new AuthException('You are logged in on another device. Please logout first');
            }
            Auth::user()->is_logged_in = true;
            Auth::user()->save();
            return true;
        } else {
            throw new AuthException('We cannot process these credential');
        }
    }
}