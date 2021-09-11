<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function index() {
        return view('setting.index');
    }

    public function update(Request $request){
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        auth()->user()->name = $request->name;
        auth()->user()->email = $request->email;

        if(isset($request->password)){
            if(password_verify($request->old_password, auth()->user()->password)) {
                auth()->user()->password = bcrypt($request->password);
            }
            else return view('setting.index', ['message' => 'Senha antiga incorrecta!', 'success' => false]);
        }

        auth()->user()->save();

        return view('setting.index', ['message' => 'Dados actualizados', 'success' => true]);
        
    }
}
