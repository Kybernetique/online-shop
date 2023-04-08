<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function user()
    {
        $user = Auth::user();
        return view('users.user', compact('user'));
    }
}
