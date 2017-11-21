<?php

namespace App\Request;


use App\Exceptions\AuthException;
use App\User;
use Auth;
use Hash;
class UpdateProfileForm extends Form
{

    protected $rules = [
        'name'         => 'required',
        'password'     => 'required|min:8|confirmed',
        'email'        => 'required|email|unique:users',
        'current_password' => 'required'
    ];

    public function handle()
    {
        $this->isValid();
        if (!Hash::check($this->fields('current_password'),Auth::user()->password)) {
            throw new AuthException('Current password not match');
        }

        $user = Auth::user();
        $user->name = $this->fields('name');
        $user->email = $this->fields('email');
        $user->password = bcrypt($this->fields('password'));
        $user->save();

        return true;
    }
}