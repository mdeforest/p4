<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $user = User::updateOrCreate(
            ['email' => 'jill@harvard.edu', 'username' => 'jillharvard', 'name' => 'Jill Harvard'],
            ['password' => Hash::make('helloworld')
            ]);

        $user = User::updateOrCreate(
            ['email' => 'jamal@harvard.edu', 'username' => 'jamalharvard', 'name' => 'Jamal Harvard'],
            ['password' => Hash::make('helloworld')
            ]);

        $user = User::updateOrCreate(
            ['email' => 'sophia@harvard.edu', 'username' => 'sophiaharvard', 'name' => 'Sophia Harvard'],
            ['password' => Hash::make('helloworld')
            ]);
    }
}
