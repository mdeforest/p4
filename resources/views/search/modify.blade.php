@extends('layouts.master')

@section('title')
Modify Search
@endsection

@push('head')
<link rel='stylesheet' type='text/css' href='/css/modules/action_page.css'>
@endpush

@section('content')
    <div class='container-fluid'>
        <div class='row page-header-action'>
            <div class='col-sm-6'>
                <h2 class='page-header'>Modify a Search</h2>
            </div>
            <div class='col-sm-6 text-right'>
                <form method='POST' action='/remove'>
                    {{ method_field('delete') }}

                    {{ csrf_field() }}

                    <input type='hidden' name='search' value='{{ $name }}'>
                    <button type='submit' class='btn btn-lg btn-pink'>Remove</button>
                </form>
            </div>
        </div>
        <div class='row'>
            <div class='col'>
                <form method='POST' action='/modify-process'>
                    {{ method_field('put') }}

                    {{ csrf_field() }}

                    <input type='hidden' name='search' value='{{ $name }}'>

                    <div class='form-row'>
                        <div class='form-group col-sm-6'>
                            <label for='searchName'>Search Name</label>
                            <input type='text' class='form-control' id='searchName' name='searchName' value='{{ $search->name }}'>
                        </div>
                        @include('partials._criteria_input_modify')
                    </div>
                    <div class='form-row'>
                        <div class='form-group col-sm-6'>
                            <label for='platform'>Platform</label>
                            <select class='custom-select' id='platform' name='platform' disabled>
                                <option selected>{{ $search->platform->name  }}</option>
                            </select>

                            <input type='hidden' name='platform' value='{{ $search->platform->name }}'>
                        </div>
                        @include('partials._criteria_input_modify')
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
                                        <input type='text' class='form-control' id='searchFrequency-value' name='searchFrequency-value' value='{{ $search->frequency_value }}'>
                                    </div>
                                    <div class='col-sm-6'>
                                        <label for='searchFrequency-type' class='hidden'>Search Frequency Type</label>
                                        <select class='custom-select' name='searchFrequency-type' id='searchFrequency-type'>
                                            <option selected>Minutes</option>
                                            <option>Hours</option>
                                            <option>Days</option>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        @include('partials._criteria_input_modify')
                    </div>
                    @while(count($criteria) > 1)
                        <div class='form-row justify-content-end'>
                            <div class='col-sm-3'>
                                <div class='form-check additional-col'>
                                    <input class='form-check-input' type='checkbox' id='criteria-{{ $criteria->last()->name }}' name='criteria-{{ $criteria->last()->name }}' onchange='textDisable(this)' {{ $search->criteria->where('name', $criteria->last()->name)->first() ? 'checked' : '' }}>
                                    <label class='form-check-label' for='criteria-{{ $criteria->last()->name }}'>{{ $criteria->last()->name }}</label>
                                </div>
                                <div class='form-group checkbox-value'>
                                    <label for='criteria-{{ $criteria->last()->name }}-value' class='hidden'>Value for {{ $criteria->last()->name }}</label>
                                    <input type='text' class='form-control' id='criteria-{{ $criteria->last()->name }}-value' name='criteria-{{ $criteria->last()->name }}-value' placeholder='Value' value='{{ $search->criteria->where('name', $criteria->last()->name)->first() ? $search->criteria->where('name', $criteria->last()->name)->first()->pivot->value : '' }}' {{ $search->criteria->where('name', $criteria->last()->name)->first() ? '' : 'disabled' }}>
                                    @include('partials._field-error', ['field' => 'criteria-' . $criteria->last()->name . '-value'])
                                </div>
                            </div>
                            @php($criteria->pop())
                            <div class='col-sm-3'>
                                <div class='form-check additional-col'>
                                    <input class='form-check-input' type='checkbox' id='criteria-{{ $criteria->last()->name }}' name='criteria-{{ $criteria->last()->name }}' onchange='textDisable(this)' {{ $search->criteria->where('name', $criteria->last()->name)->first() ? 'checked' : '' }}>
                                    <label class='form-check-label' for='criteria-{{ $criteria->last()->name }}'>{{ $criteria->last()->name }}</label>
                                </div>
                                <div class='form-group checkbox-value'>
                                    <label for='criteria-{{ $criteria->last()->name }}-value' class='hidden'>Value for {{ $criteria->last()->name }}</label>
                                    <input type='text' class='form-control' id='criteria-{{ $criteria->last()->name }}-value' name='criteria-{{ $criteria->last()->name }}-value' placeholder='Value' value='{{ $search->criteria->where('name', $criteria->last()->name)->first() ? $search->criteria->where('name', $criteria->last()->name)->first()->pivot->value : '' }}' {{ $search->criteria->where('name', $criteria->last()->name)->first() ? '' : 'disabled' }}>
                                    @include('partials._field-error', ['field' => 'criteria-' . $criteria->last()->name . '-value'])
                                </div>
                            </div>
                            @php($criteria->pop())
                        </div>
                    @endwhile
                    @if(count($criteria) > 0)
                        <div class='col-sm-3'>
                            <div class='form-check additional-col'>
                                <input class='form-check-input' type='checkbox' id='criteria-{{ $criteria->last()->name }}' name='criteria-{{ $criteria->last()->name }}' onchange='textDisable(this)' {{ $search->criteria->where('name', $criteria->last()->name)->first() ? 'checked' : '' }}>
                                <label class='form-check-label' for='criteria-{{ $criteria->last()->name }}'>{{ $criteria->last()->name }}</label>
                            </div>
                            <div class='form-group checkbox-value'>
                                <label for='criteria-{{ $criteria->last()->name }}-value' class='hidden'>Value for {{ $criteria->last()->name }}</label>
                                <input type='text' class='form-control' id='criteria-{{ $criteria->last()->name }}-value' name='criteria-{{ $criteria->last()->name }}-value' placeholder='Value' value='{{ $search->criteria->where('name', $criteria->last()->name)->first() ? $search->criteria->where('name', $criteria->last()->name)->first()->pivot->value : '' }}' {{  $search->criteria->where('name', $criteria->last()->name)->first() ? '' : 'disabled' }}>
                                @include('partials._field-error', ['field' => 'criteria-' . $criteria->last()->name . '-value'])
                            </div>
                        </div>
                        @php($criteria->pop())
                    @endif
                    <div class='form-row'>
                        <div class='col-sm-3'>
                            <a href='/modify' class='btn btn-lg btn-pink'>Cancel</a>
                        </div>
                        <div class='col-sm-9 text-right'>
                            <button type='submit' class="btn btn-lg btn-pink">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection