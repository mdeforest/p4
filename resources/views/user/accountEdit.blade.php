@extends('layouts.master')

@section('title')
    Account
@endsection

@push('head')
    <link rel='stylesheet' type='text/css' href='/css/pages/account.css'>
    <link rel='stylesheet' type='text/css' href='/css/modules/action_page.css'>
@endpush

@section('content')
<div class='container-fluid'>
    <h2 class='page-header'>My Account</h2>
    <form method='POST' action='/account-process'>
        {{ method_field('put') }}

        {{ csrf_field() }}
        <div class='form-row'>
            <div class='form-group col-sm-4'>
                <label for='name'>Name</label>
                <input class='form-control' type='text' id='name' name='name' value='{{ $user->name }}'>
            </div>
        </div>
        <div class='form-row'>
            <div class='form-group col-sm-4'>
                <label for='username'>Username</label>
                <input class='form-control' type='text' id='username' name='username' value='{{ $user->username }}'>
            </div>
        </div>
        <div class='form-row'>
            <div class='col-sm-2'>
                <button type='submit' class="btn btn-lg btn-pink">Save</button>
            </div>
            <div class='col-sm-2 text-right'>
                <a class="btn btn-lg btn-pink" href='/account'>Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection