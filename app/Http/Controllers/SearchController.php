<?php

namespace App\Http\Controllers;

use App\Criterion;
use App\Platform;
use App\Search;
use App\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SearchController extends Controller
{
    public function searchPlatform(Request $request)
    {
        // Choose a platform

        $platforms = Platform::all()->pluck('name');

        return view('search.searchPlatform')->with(['platforms' => $platforms]);
    }

    public function processPlatform(Request $request)
    {
        // Process platform form

        $request->validate([
            'platform' => 'required'
        ]);

        $platform = $request->input('platform');

        return redirect('/search')->with(['platform' => $platform]);
    }

    public function create(Request $request)
    {
        // create new search

        $platform = $request->session()->get('platform', null);

        if ($platform) {
            $criteria = Criterion::whereHas('platform', function ($query) use ($platform) {
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

    public function processSearch(Request $request)
    {
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

        foreach (preg_grep("/^criteria-((?!-value).)*$/", array_keys($request->all())) as $criterion) {
            $criteria = Criterion::where('name', preg_replace('/criteria-/', '', $criterion))->first();

            if ($criteria->validation) {
                $validation['criteria-' . $criteria->name . "-value"] = $criteria->validation;
            }
        }

        $request->validate($validation);

        $platform = $request->input('platform');
        $platform_id = Platform::where('name', $platform)->pluck('id')->first();

        $searchName = $request->input('searchName');
        $searchFrequencyValue = $request->input('searchFrequency-value');
        $searchFrequencyType = $request->input('searchFrequency-type');
        $criteria_ids = [];

        foreach (preg_grep("/^criteria-((?!-value).)*$/", array_keys($request->all())) as $criterion) {
            $id = Criterion::where('name', preg_replace('/criteria-/', '', $criterion))->pluck('id')->first();
            $criteria_ids[$id] = ['value' => $request->input($criterion . "-value")];
        }

        $search = new Search();

        $search->name = $searchName;
        $search->last_run = Carbon::now()->toDateTimeString();

        switch ($searchFrequencyType) {
            case 'Minutes':
                $search->frequency_value = $searchFrequencyValue;
                break;
            case "Hours":
                $search->frequency_value = $searchFrequencyValue * 60;
                break;
            case "Days":
                $search->frequency_value = $searchFrequencyValue * 1440;
                break;
        }

        $search->platform_id = $platform_id;
        $search->user_id = \Auth::id();
        $search->save();

        $search->criteria()->attach($criteria_ids);

        return redirect('/search/created');
    }

    public function searchCreated(Request $request)
    {
        // successful creation of search

        return view('search.searchCreated');
    }

    public function help(Request $request, $name)
    {
        return view('partials._' . str_replace('-', '_', $name) . '_help');
    }

    public function modifyIndex(Request $request)
    {
        // list all searches

        $searches = Search::with('criteria', 'platform')->where('user_id', \Auth::id())->orderBy('name', 'desc')->get();

        return view('search.modifyIndex')->with(['searches' => $searches]);
    }

    public function modify(Request $request, $name)
    {
        // modify a search

        $search = Search::with('criteria', 'platform')->where('user_id', \Auth::id())->where('name', $name)->first();
        $criteria = Criterion::where('platform_id', $search->platform->id)->get();

        return view('search.modify')->with(['name' => $name, 'search' => $search, 'criteria' => $criteria]);
    }

    public function processModify(Request $request)
    {
        // process modified search form

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

        foreach (preg_grep("/^criteria-((?!-value).)*$/", array_keys($request->all())) as $criterion) {
            $criteria = Criterion::where('name', preg_replace('/criteria-/', '', $criterion))->first();

            if ($criteria->validation) {
                $validation['criteria-' . $criteria->name . "-value"] = $criteria->validation;
            }
        }

        $request->validate($validation);

        $old_search_name = $request->input('search');

        $platform = $request->input('platform');
        $platform_id = Platform::where('name', $platform)->pluck('id')->first();

        $searchName = $request->input('searchName');
        $searchFrequencyValue = $request->input('searchFrequency-value');
        $searchFrequencyType = $request->input('searchFrequency-type');
        $criteria_ids = [];

        foreach (preg_grep("/^criteria-((?!-value).)*$/", array_keys($request->all())) as $criterion) {
            $id = Criterion::where('name', preg_replace('/criteria-/', '', $criterion))->pluck('id')->first();
            $criteria_ids[$id] = ['value' => $request->input($criterion . "-value")];
        }

        $search = Search::where('name', $old_search_name)->where('user_id', \Auth::id())->first();

        $search->name = $searchName;

        switch ($searchFrequencyType) {
            case 'Minutes':
                $search->frequency_value = $searchFrequencyValue;
                break;
            case "Hours":
                $search->frequency_value = $searchFrequencyValue * 60;
                break;
            case "Days":
                $search->frequency_value = $searchFrequencyValue * 1440;
                break;
        }

        $search->platform_id = $platform_id;

        $search->criteria()->sync($criteria_ids);
        $search->save();

        return redirect('/modify/' . $search->name . '/updated');
    }

    public function modifyUpdated(Request $request, $name)
    {
        // search successfully updated

        return view('search.modifyUpdated')->with(['name' => $name]);
    }

    public function reviewIndex(Request $request)
    {
        // list all search results

        $searches = Search::with('criteria', 'platform')->where('user_id', \Auth::id())->orderBy('name', 'desc')->get();

        return view('search.reviewIndex')->with(['searches' => $searches]);
    }

    public function review(Request $request, $name)
    {
        // review a search result

        $search_id = Search::where('name', $name)->where('user_id', \Auth::id())->pluck('id')->first();

        $results = Result::with('platform')->where('search_id', $search_id)->get();

        return view('search.review')->with(['results' => $results, 'name' => $name]);
    }

    public function run(Request $request)
    {
        $name = $request->input('search');
        $search = Search::where('name', $name)->where('user_id', \Auth::id())->first();

        run_search($search);

        return redirect('/review/' . $name);
    }

    public function remove(Request $request)
    {
        // remove search

        $name = $request->input('search');
        $search_id = Search::where('name', $name)->where('user_id', \Auth::id())->pluck('id')->first();

        Search::delete($search_id);
    }
}
