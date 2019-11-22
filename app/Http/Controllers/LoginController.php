<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $this->validate($request, [
            'email' =>'required|email',
            'password'=>'required|min:6'
        ]);

        if (Auth::guard('web')->attempt(['email'=>$request->email, 'password'=>$request->password],
            $request->get('remember')))
        {
            return redirect()->intended('/home');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
}
