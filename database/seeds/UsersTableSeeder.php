<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'id' => 1,
                'name' => 'John Doe',
                'email' => 'john@test.com',
                'password' => Hash::make('secret_john')
            ],
            [
                'id' => 2,
                'name' => 'Jenny Doe',
                'email' => 'jenny@test.com',
                'password' => Hash::make('secret_jenny')
            ],
            [
                'id' => 3,
                'name' => 'Tester',
                'email' => 'test@test.com',
                'password' => Hash::make('secret')
            ]
        );

        foreach ($data as $it) {
            User::create($it);
        }
    }
}
