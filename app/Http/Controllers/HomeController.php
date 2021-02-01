<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home',[
            'layout'=>'home'
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $users = User::where('username','LIKE','%'.$search.'%')->get();
        return view('home',[
            'users' =>$users,
            'layout'=>'search'
        ]);

    }

}
