@extends('layouts.master')

@section('title')
    Account
@endsection

@push('head')
    <link rel='stylesheet' type='text/css' href='css/pages/account.css'>
    <link rel='stylesheet' type='text/css' href='css/modules/action_page.css'>
@endpush

@section('content')
    <div class='container-fluid'>
        <div class='row'>
            <div class='col'>
                <h2 class='page-header'>My Account</h2>
                <div class='info'>
                    <p class='data-edit'>
                        <span class='data'>{{ $user->name }}</span>
                    </p>
                    <p class='help'>Name</p>
                    <p class='data-edit'>
                        <span class='data'>{{ $user->username }}</span>
                    </p>
                    <p class='help'>Username</p>
                </div>
            </div>
        </div>
        <div class='row fixed-bottom'>
            <div class='col text-left btn-bottom-left'>
                <a class="btn btn-lg btn-pink" href='/account/edit'>Update</a>
            </div>
        </div>
    </div>
@endsection