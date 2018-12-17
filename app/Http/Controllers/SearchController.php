<?php

namespace App\Http\Controllers;

use App\Criterion;
use App\Platform;
use App\Search;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchPlatform(Request $request) {
        // Choose a platform

        $platforms = Platform::all()->pluck('name');

        dump($platforms);

        return view('search.searchPlatform')->with(['platforms' => $platforms]);
    }

    public function processPlatform(Request $request) {
        // Process platform form

        $request->validate([
            'platform' => 'required'
        ]);

        $platform = $request->input('platform');

        return redirect('/search')->with(['platform' => $platform]);
    }

    public function create(Request $request) {
        // create new search

        $platform = $request->session()->get('platform', null);

        if ($platform) {
            $criteria = Criterion::whereHas('platform', function($query) use ($platform) {
                $query->where('name', '=', $platform);
            })->orderBy('name', 'desc')->get();

            return view('search.create')->with([
                'platform' => $platform,
                'criteria' => $criteria
            ]);
        } else {
            return redirect('/search/platform');
        }
    }

    public function processSearch(Request $request) {
        // process created search form

        $request->session()->put('platform', $request->input('platform'));

        $validation = [
            'searchName' => 'required',
            'platform' => 'required',
            'searchFrequency-value' => 'required',
            'searchFrequency-type' => 'required'
        ];

        $result_value = preg_grep("/^criteria-.*-value$/", array_keys($request->all()));

        foreach ($result_value as $value) {
            $validation[$value] = 'required_if:' . preg_replace('/-value/', '', $value) . ',on';
        }

        $request->validate($validation);

        $platform = $request->input('platform');
        $platform_id = Platform::where('name', $platform)->pluck('id')->first();

        $searchName = $request->input('searchName');
        $searchFrequencyValue = $request->input('searchFrequency-value');
        $searchFrequencyType = $request->input('searchFrequency-type');
        $criteria_ids = [];

        foreach(preg_grep("/^criteria-((?!-value).)*$/", array_keys($request->all())) as $criterion) {
            $id = Criterion::where('name', preg_replace('/criteria-/', '', $criterion))->pluck('id')->first();
            $criteria_ids[$id] = ['value' => $request->input($criterion . "-value")];
        }

        $search = new Search();

        $search->name = $searchName;
        $search->frequency_value = $searchFrequencyValue;
        $search->frequency_unit = $searchFrequencyType;
        $search->platform_id = $platform_id;
        $search->user_id = \Auth::id();
        $search->save();

        $search->criteria()->attach($criteria_ids);

        return redirect('/search/created');

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

    public function test(Request $request) {
        youtube_search(Search::first());
    }
}
