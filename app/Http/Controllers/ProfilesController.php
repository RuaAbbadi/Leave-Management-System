<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilesController extends Controller
{
    public function change(){

        return view('profile.change_password');

    }
    
    public function update(Request $request){

        $request->validate([
            'old_password'=>'required',
            'new_password'=>'required| max:100 |confirmed',
        ]);

       

        if(!Hash::check($request->old_password,auth()->user()->password)){

            return back()->with('error','Old Password Does not match!');
        }

           Employee::whereId(auth()->user()->id)->update([

                'password' => Hash::make($request->new_password)
            ]);

            return back()->with('status','Password Successfully Updated');   
    }
}
