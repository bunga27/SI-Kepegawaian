<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticatedController extends Controller
{
    public function __invoke()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return redirect('login');
    }
}
