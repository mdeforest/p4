<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function account(Request $request) {

        return view('user.account');
    }
}
