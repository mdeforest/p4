<?php

use Illuminate\Database\Seeder;
use App\Platform;

class PlatformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $string = file_get_contents(database_path('/data/platforms_criteria.json'));
        $criteria_data = json_decode($string, true);

        foreach($criteria_data as $platform_name => $data) {
            $platform = new Platform();

            $platform->created_at = Carbon\Carbon::now()->toDateTimeString();
            $platform->updated_at = Carbon\Carbon::now()->toDateTimeString();
            $platform->name = $platform_name;

            $platform->save();
        }
    }
}
