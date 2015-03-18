<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder {

    public function run()
    {
        \DB::table('users')->insert(array (
            'first_name'  => 'Duilio',
            'last_name'   => 'Palacios',
            'email'       => 'i@duilio.me',
            'password'    => \Hash::make('secret'),
            'type'        => 'admin',
            'full_name'   => 'Duilio Palacios'
        ));

        \DB::table('user_profiles')->insert(array (
            'user_id' => 1,
            'birthdate' => '1983/09/23'
        ));
    }

} 