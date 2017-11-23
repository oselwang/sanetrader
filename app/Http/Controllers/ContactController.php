<?php

namespace App\Http\Controllers;

use App\Request\ContactForm;
use Illuminate\Routing\Controller;

class ContactController extends Controller
{
    public function create(ContactForm $contactForm)
    {
        $contactForm->handle();

        return response()->json(true);
    }
}