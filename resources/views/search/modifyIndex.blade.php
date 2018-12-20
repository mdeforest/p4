@extends('layouts.master')

@section('title')
    Modify a Search
@endsection

@push('head')
    <link rel='stylesheet' type='text/css' href='css/modules/action_page.css'>
@endpush

@section('content')
    <div class='container-fluid'>
        <div class='row'>
            <div class='col'>
                <h2 class='page-header'>Modify a Search</h2>
                <p class='page-details'>Choose a search from the list below to modify</p>
            </div>
        </div>
        @while(count($searches) >= 5)
            <div class='row'>
                <div class='col'>
                    <div class='card-deck'>
                        @include('partials._search_card', ['route' => 'modify'])
                        @include('partials._search_card', ['route' => 'modify'])
                        @include('partials._search_card', ['route' => 'modify'])
                        @include('partials._search_card', ['route' => 'modify'])
                        @include('partials._search_card', ['route' => 'modify'])
                    </div>
                </div>
            </div>
        @endwhile
        <div class='row bottom-row'>
            <div class='col'>
                <div class='card-deck'>
                    @while(count($searches) > 0)
                        @include('partials._search_card', ['route' => 'modify'])
                    @endwhile
                </div>
            </div>
        </div>
    </div>
@endsection