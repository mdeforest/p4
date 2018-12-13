@extends('layouts.master')

@section('title')
Register
@endsection

@push('head')
    <link rel='stylesheet' type='text/css' href='css/pages/login_register.css'>
@endpush

@section('content')
    <div class='container'>
        <div class='row'>
            <div class="col">
                <div class='card mx-auto login-box'>
                    <img class='card-img-top mx-auto' src='images/logo_transparent.png'>
                    <div class='card-body'>
                        <p class='card-text text-center title-text'>Sign Up for an Account</p>
                        <form method='POST' action='{{ route('register') }}'>
                            {{ csrf_field() }}
                            <div class='form-group'>
                                <input type='email' class='form-control' id='email' name='email' aria-describedby='email'>
                                <label for='email'>Email</label>
                            </div>
                            <div class='form-group'>
                                <input type='text' class='form-control' id='username' name='username' aria-describedby='username'>
                                <label for='username'>Username</label>
                            </div>
                            <div class='form-group'>
                                <input type='password' class='form-control' id='password' name='password' aria-describedby='password'>
                                <label for='password'>Password</label>
                            </div>
                            <div class='form-group'>
                                <input type='password' class='form-control' id='password-confirm' name='password_confirmation' aria-describedby='password-confirm'>
                                <label for='password-confirm'>Confirm Password</label>
                            </div>
                            <div class='text-center'>
                                <button type="submit" class="btn btn-lg w-75 btn-pink">Submit</button>
                            </div>
                        </form>
                        <p class='info-text text-center'>Already have an Account? <a href='/login'>Log in</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
