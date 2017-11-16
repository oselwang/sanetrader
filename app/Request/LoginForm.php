<?php

namespace App\Request;

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
            return true;
        } else {
            throw new \Exception('We cannot process these credential');
        }
    }
}