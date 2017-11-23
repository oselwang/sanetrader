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
            $new_session = \Session::getId();
            try{
                $previous_session = \Session::getHandler()->read(Auth::user()->session_id);
                if ($previous_session) {
                    \Session::getHandler()->destroy(Auth::user()->session_id);
                }
            }catch (\Exception $exception){

            }
            Auth::user()->session_id = $new_session;
            Auth::user()->save();
            return true;
        } else {
            throw new AuthException('We cannot process these credential');
        }
    }
}