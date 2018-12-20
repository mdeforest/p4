<?php

use Illuminate\Database\Seeder;
use App\Criterion;
use App\Platform;

class CriteriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $string = file_get_contents(database_path('/data/platforms_criteria.json'));
        $criteria_data = json_decode($string, true);

        foreach ($criteria_data as $platform => $data) {
            foreach ($data as $criterion => $criterion_data) {
                $criteria = new Criterion();

                $criteria->created_at = Carbon\Carbon::now()->toDateTimeString();
                $criteria->updated_at = Carbon\Carbon::now()->toDateTimeString();
                $criteria->name = $criterion;

                $platform_id = Platform::where('name', '=', $platform)->pluck('id')->first();
                $criteria->platform_id = $platform_id;

                $criteria->api_call = $criterion_data['api_call'];
                $criteria->datatype = $criterion_data['datatype'];

                $criteria->help = isset($criterion_data['help']) ? $criterion_data['help'] : null;

                $validations = $criterion_data['validate'];
                $validation_string = '';

                foreach ($validations as $validation) {
                    $validation_string .= $validation . '|';
                }

                $validation_string = rtrim($validation_string, '|');

                if ($validation_string == '') {
                    $criteria->validation = null;
                } else {
                    $criteria->validation = $validation_string;
                }

                $criteria->save();
            }
        }
    }
}
