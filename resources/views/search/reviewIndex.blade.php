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
        @while(count($searches) >= 5)
            <div class='row'>
                <div class='col'>
                    <div class='card-deck'>
                        @include('partials._search_card', ['route' => 'review'])
                        @include('partials._search_card', ['route' => 'review'])
                        @include('partials._search_card', ['route' => 'review'])
                        @include('partials._search_card', ['route' => 'review'])
                        @include('partials._search_card', ['route' => 'review'])
                    </div>
                </div>
            </div>
        @endwhile
        <div class='row bottom-row'>
            <div class='col'>
                <div class='card-deck'>
                    @while(count($searches) > 0)
                        @include('partials._search_card', ['route' => 'review'])
                    @endwhile
                </div>
            </div>
        </div>
    </div>
@endsection