@extends('layouts.master')

@section('title')
Create a New Search
@endsection

@push('head')
<link rel='stylesheet' type='text/css' href='css/modules/action_page.css'>
@endpush

@section('content')
<div class='container-fluid'>
    <div class='row'>
        <div class='col'>
            <h2 class='page-header'>Create a New Search</h2>
            <p class='page-details'>A search is created to monitor social media based on certain criteria</p>
            <form method='GET' action='/search-process'>
                <div class='form-row'>
                    <div class='form-group col-sm-6'>
                        <label for='searchName'>Search Name</label>
                        <input type='text' class='form-control' id='searchName' name='searchName' value=' {{ old('searchName') }}'>
                        @include('partials._field-error', ['field' => 'searchName'])
                    </div>
                    @include('partials._criteria_input')
                </div>
                <div class='form-row'>
                    <div class='form-group col-sm-6'>
                        <label for='platform'>Platform</label>
                        <select class='custom-select' id='platform' name='platform' disabled>
                            <option selected>{{ $platform ? $platform : old('platform') }}</option>
                        </select>

                        @if($platform)
                            <input type='hidden' name='platform' value='{{ $platform }}'>
                        @else
                            <input type='hidden' name='platform' value='{{ old('platform') }}'>
                        @endif

                    </div>
                    @include('partials._criteria_input')
                </div>
                <div class='form-row'>
                    <div class='form-group col-sm-6'>
                        <fieldset>
                            <legend>Search Frequency</legend>
                            <div class='row'>
                                <div class='col-sm-2 no-padding-right'>
                                    <p class='form-extra'>Every</p>
                                </div>
                                <div class='col-sm-2 no-padding-left no-padding-right'>
                                    <label for='searchFrequency-value' class='hidden'>Search Frequency Value</label>
                                    <input type='text' class='form-control' id='searchFrequency-value' name='searchFrequency-value' value=' {{ old('searchFrequency-value') }}'>
                                </div>
                                <div class='col-sm-6'>
                                    <label for='searchFrequency-type' class='hidden'>Search Frequency Type</label>
                                    <select class='custom-select' id='searchFrequency-type' name='searchFrequency-type'>
                                        <option {{ (old('searchFrequency-type') == "Minutes") ? 'selected' : '' }}>Minutes</option>
                                        <option {{ (old('searchFrequency-type') == "Hours") ? 'selected' : '' }}>Hours</option>
                                        <option {{ (old('searchFrequency-type') == "Days") ? 'selected' : '' }}>Days</option>
                                    </select>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col'>
                                    @include('partials._field-error', ['field' => 'searchFrequency-value'])
                                    @include('partials._field-error', ['field' => 'searchFrequency-type'])
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    @include('partials._criteria_input')
                </div>
                @while(count($criteria) > 1)
                    <div class='form-row justify-content-end'>
                        <div class='col-sm-3'>
                            <div class='form-check additional-col'>
                                <input class='form-check-input' type='checkbox' id='criteria-{{ $criteria->last()->name }}' name='criteria-{{ $criteria->last()->name }}' onchange='textDisable(this)' {{ old('criteria-' . $criteria->last()->name) ? 'checked' : '' }}>
                                <label class='form-check-label' for='criteria-{{ $criteria->last()->name }}'>{{ $criteria->last()->name }}</label>
                            </div>
                            <div class='form-group checkbox-value'>
                                <label for='criteria-{{ $criteria->last()->name }}-value' class='hidden'>Value for {{ $criteria->last()->name }}</label>
                                <input type='text' class='form-control' id='criteria-{{ $criteria->last()->name }}-value' name='criteria-{{ $criteria->last()->name }}-value' placeholder='Value' value='{{ old('criteria-' . $criteria->last()->name . '-value') }}' {{ old('criteria-' . $criteria->last()->name) ? '' : 'disabled' }}>
                                @include('partials._field-error', ['field' => 'criteria-' . $criteria->last()->name . '-value'])
                            </div>
                        </div>
                        @php($criteria->pop())
                        <div class='col-sm-3'>
                            <div class='form-check additional-col'>
                                <input class='form-check-input' type='checkbox' id='criteria-{{ $criteria->last()->name }}' name='criteria-{{ $criteria->last()->name }}' onchange='textDisable(this)' {{ old('criteria-' . $criteria->last()->name) ? 'checked' : '' }}>
                                <label class='form-check-label' for='criteria-{{ $criteria->last()->name }}'>{{ $criteria->last()->name }}</label>
                            </div>
                            <div class='form-group checkbox-value'>
                                <label for='criteria-{{ $criteria->last()->name }}-value' class='hidden'>Value for {{ $criteria->last()->name }}</label>
                                <input type='text' class='form-control' id='criteria-{{ $criteria->last()->name }}-value' name='criteria-{{ $criteria->last()->name }}-value' placeholder='Value' value='{{ old('criteria-' . $criteria->last()->name . '-value') }}' {{ old('criteria-' . $criteria->last()->name) ? '' : 'disabled' }}>
                                @include('partials._field-error', ['field' => 'criteria-' . $criteria->last()->name . '-value'])
                            </div>
                        </div>
                    </div>
                    @php($criteria->pop())
                @endwhile

                @if(count($criteria) > 0)
                    <div class='form-row justify-content-end'>
                        <div class='col-sm-3'>
                            <div class='form-check additional-col'>
                                <input class='form-check-input' type='checkbox' id='criteria-{{ $criteria->last()->name }}' name='criteria-{{ $criteria->last()->name }}' onchange='textDisable(this)' {{ old('criteria-' . $criteria->last()->name) ? 'checked' : '' }}>
                                <label class='form-check-label' for='criteria-{{ $criteria->last()->name }}'>{{ $criteria->last()->name }}</label>
                            </div>
                            <div class='form-group checkbox-value'>
                                <label for='criteria-{{ $criteria->last()->name }}-value' class='hidden'>Value for {{ $criteria->last()->name }}</label>
                                <input type='text' class='form-control' id='criteria-{{ $criteria->last()->name }}-value' name='criteria-{{ $criteria->last()->name }}-value' placeholder='Value' value='{{ old('criteria-' . $criteria->last()->name . '-value') }}' {{ old('criteria-' . $criteria->last()->name) ? '' : 'disabled' }}>
                                @include('partials._field-error', ['field' => 'criteria-' . $criteria->last()->name . '-value'])
                            </div>
                        </div>
                    </div>
                    @php($criteria->pop())
                @endif
                <div class='form-row justify-content-end'>
                    <div class='col-sm-3 text-right'>
                        <button class="btn btn-lg btn-pink">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection