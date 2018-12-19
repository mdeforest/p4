<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function account(Request $request) {

        return view('user.account')->with(['user' => $request->user()]);
    }

    public function accountEdit(Request $request) {

        return view('user.accountEdit')->with(['user' => $request->user()]);
    }

    public function processAccount(Request $request) {
        $user = \Auth::user();

        $user->name = $request->input('name');
        $user->username = $request->input('username');

        $user->save();

        return redirect('/account');
    }
}
