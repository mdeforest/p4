<?php

use Illuminate\Database\Seeder;
use App\Criterion;
use App\Platform;

class CriteriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $criteria = new Criterion();

        $criteria->created_at = Carbon\Carbon::now()->subDays(1)->toDateTimeString();
        $criteria->updated_at = Carbon\Carbon::now()->subDays(1)->toDateTimeString();
        $criteria->name = 'type';

        $platform_id = Platform::where('name', '=', 'Youtube')->pluck('id')->first();
        $criteria->platform_id = $platform_id;

        $criteria->save();


    }
}
