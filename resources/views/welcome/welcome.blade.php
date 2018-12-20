@extends('layouts.master')

@section('title')
    Welcome
@endsection

@push('head')
    <link rel='stylesheet' type='text/css' href='css/modules/confirmation.css'>
@endpush

@section('content')
    <div class='container-fluid'>
        <div class='row'>
            <div class='col text-center'>
                <h1>Welcome to Social Search!</h1>
                <p>
                    Welcome to Social Search! Social Search allows agents, businesspeople, and just about anyone else find new social media influencers and potential clients. Social Search started when a Talent Agent needed a faster way to find new potential stars within the gaming industry. It was taking too long for him to look through potential clients and pick out good ones from millions of possibilities. Social Search now allows him to narrow his potential matches down and focus on the most likely candidates.
                </p>
                <p>
                    To get started with Social Search, Create a new Search that will be set up to run at a certain frequency. Over time a list of results will appear in the "Review" tab with links to their social media profiles. We currently only support "Youtube" but hope to support many more platforms in the future.
                </p>
            </div>
        </div>
    </div>
@endsection