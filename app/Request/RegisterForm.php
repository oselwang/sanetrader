<?php

namespace App\Request;

use App\User;
use Carbon\Carbon;

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
            'name'          => $this->fields('name'),
            'email'         => $this->fields('email'),
            'session_id'    => \Session::getId(),
            'last_activity' => Carbon::now()->toDateTimeString(),
            'password'      => bcrypt($this->fields('password')),
        ]);
        \Auth::login($user_registered);
        return $user_registered;
    }
}