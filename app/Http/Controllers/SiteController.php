<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
use App\Contact;

class SiteController extends Controller
{
    //
    public function index() {
        return Portfolio::orderBy('highlight', 'DESC')->get()->load('gallery');
    }

    public function sendForm(Request $contact) {
        return Contact::create([
            'name' => $contact->name,
            'phone' => $contact->phone,
            'email' => $contact->email,
            'message' => $contact->message,
        ]);
    }
}
