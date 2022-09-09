<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function store(Request $request){

        
        $cred=[
            'email'=>$request->post('email'),
            'password'=>$request->post('password'),

        ];

        $remember=$request->boolean('remember'); //return input as boolean value

        if(!Auth::attempt($cred,$remember)) {
            throw ValidationException::withMessages([
                'email' => 'invalid username and password combination'
            ]);
    
        }
           //user already logged in
           return redirect()->intended(route('home'));

       
    }
    
    public function destroy(Request $request){
        Auth::logout();
        $request->session()->regenerateToken();
        $request->session()->invalidate();
        
        return redirect()->route('home');

    }
}
