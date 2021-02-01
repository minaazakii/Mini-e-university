<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view ('auth.register');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'username'=> 'required|max:255',
            'password'=> 'required|confirmed',
            'email'=>'required|email|max:255',
            'faculty'=>'required'
        ]);
        User::create([
            'username' =>$request->username,
            'email' =>$request->email,
            'password' =>Hash::make($request->password),
            'faculty'=>$request->faculty
        ]);

        auth()->attempt($request->only('username','password'));

        return redirect()->route('login');
    }
}
