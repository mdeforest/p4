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
                        <input type='text' class='form-control' id='searchName'>
                    </div>
                    <div class='col-sm-3'>
                        <div class='form-check additional-col'>
                            <input class='form-check-input' type='checkbox' id='criteria1' value='criteria1'>
                            <label class='form-check-label' for='criteria1'>Criteria 1</label>
                        </div>
                        <div class='form-group checkbox-value'>
                            <label for='criteria1-value' class='hidden'>Value for Criteria 1</label>
                            <input type='text' class='form-control' id='criteria1-value' placeholder='Value'>
                        </div>
                    </div>
                    <div class='col-sm-3'>
                        <div class='form-check additional-col'>
                            <input class='form-check-input' type='checkbox' id='criteria2' value='criteria2'>
                            <label class='form-check-label' for='criteria2'>Criteria 2</label>
                        </div>
                        <div class='form-group checkbox-value'>
                            <label for='criteria2-value' class='hidden'>Value for Criteria 2</label>
                            <input type='text' class='form-control' id='criteria2-value' placeholder='Value'>
                        </div>
                    </div>
                </div>
                <div class='form-row'>
                    <div class='form-group col-sm-6'>
                        <label for='platform'>Platform</label>
                        <select class='custom-select' id='platform'>
                            <option>Youtube</option>
                        </select>
                    </div>
                    <div class='col-sm-3'>
                        <div class='form-check additional-col'>
                            <input class='form-check-input' type='checkbox' id='criteria3' value='criteria3'>
                            <label class='form-check-label' for='criteria3'>Criteria 3</label>
                        </div>
                        <div class='form-group checkbox-value'>
                            <label for='criteria3-value' class='hidden'>Value for Criteria 3</label>
                            <input type='text' class='form-control' id='criteria3-value' placeholder='Value'>
                        </div>
                    </div>
                    <div class='col-sm-3'>
                        <div class='form-check additional-col'>
                            <input class='form-check-input' type='checkbox' id='criteria4' value='criteria4'>
                            <label class='form-check-label' for='criteria4'>Criteria 4</label>
                        </div>
                        <div class='form-group checkbox-value'>
                            <label for='criteria4-value' class='hidden'>Value for Criteria 4</label>
                            <input type='text' class='form-control' id='criteria4-value' placeholder='Value'>
                        </div>
                    </div>
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
                                    <input type='text' class='form-control' id='searchFrequency-value'>
                                </div>
                                <div class='col-sm-6'>
                                    <label for='searchFrequency-type' class='hidden'>Search Frequency Type</label>
                                    <select class='custom-select' id='searchFrequency-type'>
                                        <option>Minutes</option>
                                        <option>Hours</option>
                                        <option>Days</option>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class='col-sm-3'>
                        <div class='form-check additional-col'>
                            <input class='form-check-input' type='checkbox' id='criteria5' value='criteria5'>
                            <label class='form-check-label' for='criteria5'>Criteria 5</label>
                        </div>
                        <div class='form-group checkbox-value'>
                            <label for='criteria5-value' class='hidden'>Value for Criteria 5</label>
                            <input type='text' class='form-control' id='criteria5-value' placeholder='Value'>
                        </div>
                    </div>
                    <div class='col-sm-3'>
                        <div class='form-check additional-col'>
                            <input class='form-check-input' type='checkbox' id='criteria6' value='criteria6'>
                            <label class='form-check-label' for='criteria6'>Criteria 6</label>
                        </div>
                        <div class='form-group checkbox-value'>
                            <label for='criteria6-value' class='hidden'>Value for Criteria 6</label>
                            <input type='text' class='form-control' id='criteria6-value' placeholder='Value'>
                        </div>
                    </div>
                </div>
                <div class='form-row justify-content-end'>
                    <div class='col-sm-3'>
                        <div class='form-check additional-col'>
                            <input class='form-check-input' type='checkbox' id='criteria7' value='criteria7'>
                            <label class='form-check-label' for='criteria7'>Criteria 7</label>
                        </div>
                        <div class='form-group checkbox-value'>
                            <label for='criteria7-value' class='hidden'>Value for Criteria 7</label>
                            <input type='text' class='form-control' id='criteria7-value' placeholder='Value'>
                        </div>
                    </div>
                    <div class='col-sm-3'>
                        <div class='form-check additional-col'>
                            <input class='form-check-input' type='checkbox' id='criteria8' value='criteria8'>
                            <label class='form-check-label' for='criteria8'>Criteria 8</label>
                        </div>
                        <div class='form-group checkbox-value'>
                            <label for='criteria8-value' class='hidden'>Value for Criteria 8</label>
                            <input type='text' class='form-control' id='criteria8-value' placeholder='Value'>
                        </div>
                    </div>
                </div>
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