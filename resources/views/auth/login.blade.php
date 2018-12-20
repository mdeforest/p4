@extends('layouts.master')

@section('title')
    Log In
@endsection

@push('head')
    <link rel='stylesheet' type='text/css' href='css/pages/login_register.css'>
@endpush

@section('content')
    <div class='container'>
        <div class='row'>
            <div class="col">
                <div class='card mx-auto login-box'>
                    <img class='card-img-top mx-auto'
                         src='images/logo_transparent.png'>
                    <div class='card-body'>
                        <p class='card-text text-center title-text'>Login to Your Account</p>
                        <form method='POST' action='{{ route('login') }}'>
                            {{ csrf_field() }}
                            <div class='form-group'>
                                <input type='text'
                                       class='form-control'
                                       id='username'
                                       aria-describedby='username'
                                       name='username'
                                       value='{{ old('username') }}'
                                       required>
                                <label for='username'>Username</label>
                                @include('partials._field-error', ['field' => 'username'])
                            </div>
                            <div class='form-group'>
                                <input type='password'
                                       class='form-control'
                                       id='password'
                                       aria-describedby='password'
                                       name='password'
                                       required>
                                <label for='password'>Password</label>
                                @include('partials._field-error', ['field' => 'password'])
                            </div>
                            <div class='form-group'>
                                <label class='remember'>
                                    <input type='checkbox'
                                           name='remember' {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                            <div class='text-center'>
                                <button type="submit"
                                        class="btn btn-lg w-75 btn-pink">Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
