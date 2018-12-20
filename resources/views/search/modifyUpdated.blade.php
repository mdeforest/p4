@extends('layouts.master')

@section('title')
    Search Updated
@endsection

@push('head')
    <link rel='stylesheet' type='text/css' href='/css/modules/confirmation.css'>
@endpush

@section('content')
    <div class='container-fluid'>
        <div class='row'>
            <div class='col text-center'>
                <h1>Search Successfully Created!</h1>
                <a class='links top' href='/modify'>Modify Another Search</a>
                <a class='links bottom'
                   href='/modify/{{ $name }}'>Make More Modifications</a>
            </div>
        </div>
    </div>
@endsection