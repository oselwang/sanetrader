<?php

namespace App\Request;

use App\Contact;

class ContactForm extends Form
{

    protected $rules = [
        'name'    => 'required',
        'email'   => 'required',
        'title'   => 'required',
        'message' => 'required'
    ];

    public function handle()
    {
        $this->isValid();

        $model = new Contact();
        $model->create([
            'name'    => $this->fields('name'),
            'email'   => $this->fields('email'),
            'title'   => $this->fields('title'),
            'message' => $this->fields('message')
        ]);

        return true;
    }
}