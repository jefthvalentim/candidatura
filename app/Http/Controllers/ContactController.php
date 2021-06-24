<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    //
    public function index() {
        $messages = Contact::orderBy('created_at', 'desc')->paginate(10);
        return view('contact.index', compact('messages'));
    }

    public function edit(Contact $message) {
        $message->read_at = now();
        $message->save();
        return redirect()->back()->with(['success' => 'Mensagem visualizada']);
    }

    public function destroy(Contact $message) {
        $message->delete();
        return redirect()->back();
    }
}
