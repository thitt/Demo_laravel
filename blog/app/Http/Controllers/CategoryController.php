<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $id = Auth::id();
        $user_request = $request->user();
        $user_check = Auth::check();
//        Auth::logout();
        $check_remember = Auth::viaRemember();
//        $user_login = Auth::login(User::find(1));
//        Auth::loginUsingId(1);
        Gate::allows('user');
    }

    public function create()
    {

    }
}
