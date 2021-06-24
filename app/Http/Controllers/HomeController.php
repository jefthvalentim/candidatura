<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
use App\Contact;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $portfolios = Portfolio::get()->count();
        $mensagens = Contact::get()->count();
        $mensagens_lidas = Contact::where('read_at', '!=', null)->get()->count();
        $mensagens_n_lidas = Contact::where('read_at', null)->get()->count();
        return view('home', compact('portfolios', 'mensagens', 'mensagens_lidas', 'mensagens_n_lidas'));
    }
}
