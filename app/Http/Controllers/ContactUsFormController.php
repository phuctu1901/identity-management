<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactUsFormController extends Controller
{
    public function ContactUsForm(Request $request) {

        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'content' => 'required'
        ]);

//        return $request;
        //  Store data in database
        Contact::create($request->all());


        //
        return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
    }
}
