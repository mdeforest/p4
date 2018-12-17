@extends('layouts.master')

@section('title')
Search Created!
@endsection

@push('head')
<link rel='stylesheet' type='text/css' href='/css/modules/confirmation.css'>
@endpush

@section('content')
<div class='container-fluid'>
    <div class='row'>
        <div class='col text-center'>
            <h1>New Search Created!</h1>
            <a class='links top' href='/modify'>View All Searches</a>
            <a class='links bottom' href='/search/platform'>Create a New Search</a>
        </div>
    </div>
</div>
@endsection