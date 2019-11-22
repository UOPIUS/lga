<?php

namespace App\Http\Controllers;

use App\LocalGovernment;
use App\Role;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function registerForm()
    {
        $lgs = LocalGovernment::all();
        $roles = Role::all();
        return view('auth.register', compact('roles', 'lgs'));
    }


}
