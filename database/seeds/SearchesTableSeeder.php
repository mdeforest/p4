<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Search;
use App\Platform;
use App\User;
use App\Criterion;

class SearchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $q_topics = [
            'gaming',
            'makeup',
            'sports',
            'animals',
            'cooking',
            'baking',
            'fashion',
            'programming',
            'snowboarding',
            'watches',
            'lifestyle',
            'family',
            'baby'
        ];

        for ($i = 0; $i < 13; $i++) {
            $search = new Search();

            $search->created_at = Carbon::now()->toDateTimeString();
            $search->updated_at = Carbon::now()->toDateTimeString();
            $search->last_run = Carbon::now()->toDateTimeString();

            $search->name = Str::random();
            $search->frequency_value = rand(30, 2000);

            $search->platform_id = Platform::where('name', 'Youtube')->pluck('id')->first();
            $search->user_id = User::inRandomOrder()->pluck('id')->first();

            $id = Criterion::where('name', 'q')->pluck('id')->first();

            $search->save();

            $search->criteria()->attach($id, ['value' => $q_topics[$i]]);
        }
    }
}
