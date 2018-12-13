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
        $platform = new Platform();

        $platform->created_at = Carbon\Carbon::now()->subDays(1)->toDateTimeString();
        $platform->updated_at = Carbon\Carbon::now()->subDays(1)->toDateTimeString();
        $platform->name = 'Youtube';

        $platform->save();
    }
}
