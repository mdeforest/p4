@extends('layouts.master')

@section('title')
    Choose Platform
@endsection

@push('head')
    <link rel='stylesheet' type='text/css' href='/css/modules/confirmation.css'>
    <link rel='stylesheet' type='text/css' href='/css/modules/action_page.css'>
@endpush

@section('content')
    <div class='container-fluid'>
        <div class='row'>
            <div class='col'>
                <h1>Choose a Platform</h1>
                <form method='GET' action='/platform-process'>
                    <div class='form-row'>
                        <div class='form-group col-sm-6'>
                            <label for='platform'>Platform</label>
                            <select class='custom-select'
                                    id='platform'
                                    name='platform'>
                                @foreach($platforms as $platform)
                                    <option>{{ $platform }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class='form-row'>
                        <div class='col'>
                            <button type='submit'
                                    class='btn btn-lg btn-pink'>Continue
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection