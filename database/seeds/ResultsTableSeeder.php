<?php

use Illuminate\Database\Seeder;
use App\Search;

class ResultsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $searches = Search::all();

        foreach($searches as $search) {
            run_search($search);
        }
    }
}
