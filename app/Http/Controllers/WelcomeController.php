<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        // index page

        return view('welcome.index');
    }

    public function welcome(Request $request)
    {
        // Welcome page

        return view('welcome.welcome');
    }
}
