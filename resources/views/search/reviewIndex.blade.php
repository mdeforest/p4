@extends('layouts.master')

@section('title')
Review Searches
@endsection

@push('head')
<link rel='stylesheet' type='text/css' href='css/modules/action_page.css'>
@endpush

@section('content')
<div class='container-fluid'>
    <div class='row'>
        <div class='col'>
            <h2 class='page-header'>Review</h2>
            <p class='page-details'>Choose a Search from the list below to review results</p>
        </div>
    </div>
    <div class='row'>
        <div class='col'>
            <div class='card-deck'>
                <a class='card-link' href='#'>
                    <div class='card'>
                        <div class='card-body'>
                            <h5 class='card-title text-center'>Search Name</h5>
                        </div>
                        <ul class='list-group list-group-flush text-center'>
                            <li class='list-group-item'>Platform</li>
                            <li class='list-group-item'>Frequency</li>
                            <li class='list-group-item'>Criteria</li>
                        </ul>
                    </div>
                </a>
                <div class='card'>
                    <div class='card-body'>
                        <h5 class='card-title text-center'>Search Name</h5>
                    </div>
                    <ul class='list-group list-group-flush text-center'>
                        <li class='list-group-item'>Platform</li>
                        <li class='list-group-item'>Frequency</li>
                        <li class='list-group-item'>Criteria</li>
                    </ul>
                </div>
                <div class='card'>
                    <div class='card-body'>
                        <h5 class='card-title text-center'>Search Name</h5>
                    </div>
                    <ul class='list-group list-group-flush text-center'>
                        <li class='list-group-item'>Platform</li>
                        <li class='list-group-item'>Frequency</li>
                        <li class='list-group-item'>Criteria</li>
                    </ul>
                </div>
                <div class='card'>
                    <div class='card-body'>
                        <h5 class='card-title text-center'>Search Name</h5>
                    </div>
                    <ul class='list-group list-group-flush text-center'>
                        <li class='list-group-item'>Platform</li>
                        <li class='list-group-item'>Frequency</li>
                        <li class='list-group-item'>Criteria</li>
                    </ul>
                </div>
                <div class='card'>
                    <div class='card-body'>
                        <h5 class='card-title text-center'>Search Name</h5>
                    </div>
                    <ul class='list-group list-group-flush text-center'>
                        <li class='list-group-item'>Platform</li>
                        <li class='list-group-item'>Frequency</li>
                        <li class='list-group-item'>Criteria</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class='row bottom-row'>
        <div class='col'>
            <div class='card-deck'>
                <div class='card'>
                    <div class='card-body'>
                        <h5 class='card-title text-center'>Search Name</h5>
                    </div>
                    <ul class='list-group list-group-flush text-center'>
                        <li class='list-group-item'>Platform</li>
                        <li class='list-group-item'>Frequency</li>
                        <li class='list-group-item'>Criteria</li>
                    </ul>
                </div>
                <div class='card'>
                    <div class='card-body'>
                        <h5 class='card-title text-center'>Search Name</h5>
                    </div>
                    <ul class='list-group list-group-flush text-center'>
                        <li class='list-group-item'>Platform</li>
                        <li class='list-group-item'>Frequency</li>
                        <li class='list-group-item'>Criteria</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection