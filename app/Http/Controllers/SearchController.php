<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Search;

class SearchController extends Controller
{
    public function create(Request $request) {
        // create new search

        return view('search.create');
    }

    public function processSearch(Request $request) {
        // process created search form
    }

    public function searchCreated(Request $request) {
        // successful creation of search

        return view('search.searchCreated');
    }

    public function modifyIndex(Request $request) {
        // list all searches

        return view('search.modifyIndex');
    }

    public function modify(Request $request) {
        // modify a search

        return view('search.modify');
    }

    public function processModify(Request $request) {
        // process modified search form
    }

    public function modifyUpdated(Request $request) {
        // search successfully updated

        return view('search.modifyUpdated');
    }

    public function reviewIndex(Request $request) {
        // list all search results

        return view('search.reviewIndex');
    }

    public function review(Request $request) {
        // review a search result

        return view('search.review');
    }

    public function remove(Request $request) {
        // remove search
    }
}
