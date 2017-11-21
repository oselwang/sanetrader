<?php

namespace App\Http\Controllers\Account;

use App\Request\UpdateProfileForm;
use Illuminate\Routing\Controller;

class AccountController extends Controller
{
    public function update(UpdateProfileForm $updateProfileForm)
    {
        $updateProfileForm->handle();

        return response()->json(true);
    }
}