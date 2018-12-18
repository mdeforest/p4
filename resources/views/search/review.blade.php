@extends('layouts.master')

@section('title')
Review
@endsection

@push('head')
<link rel='stylesheet' type='text/css' href='/css/modules/action_page.css'>
<link rel='stylesheet' type='text/css' href='/css/pages/review.css'>
@endpush

@section('content')
<div class='container-fluid'>
    <div class='row page-header-action'>
        <div class='col-sm-6'>
            <h2 class='page-header'>Review</h2>
        </div>
        <div class='col-sm-6 text-right'>
            <button class='btn btn-lg btn-pink'>Run Now</button>
        </div>
    </div>
    <div class='row'>
        <div class='table-responsive'>
            <table class='table table-bordered'>
                <thead class='thead-dark'>
                    <tr>
                        <th scope='col'>Channel Name</th>
                        <th scope='col'>Platform</th>
                        <th scope='col'>Url</th>
                        <th scope='col'>Followers</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($results as $result)
                        <tr>
                            <td>{{ $result->channel_name }}</td>
                            <td>{{ $result->platform->name }}</td>
                            <td>{{ $result->url }}</td>
                            <td>{{ $result->followers }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection