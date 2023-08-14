<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //

    public function redirect()
    {
        $user = User::find(Auth::id());

        if ($user->hasRole('admin')) {
            return to_route('dashboard');
        } else {
            return to_route('students');
        }
    }
}