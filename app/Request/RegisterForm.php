<?php

namespace App\Request;

use App\User;

class RegisterForm extends Form
{

    protected $rules = [
        'name'     => 'required',
        'password' => 'required|min:8|confirmed',
        'email'    => 'required|email|unique:users',
    ];

    public function handle()
    {
        $user = New User;
        $this->isValid();

        $user_registered = $user->create([
            'name'     => $this->fields('name'),
            'email'    => $this->fields('email'),
            'password' => bcrypt($this->fields('password')),
        ]);

        return $user_registered;
    }
}