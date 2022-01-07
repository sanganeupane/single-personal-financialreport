<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::insert([

            'name' => 'santoshneupane',
            'username'=>'santosh',
            'address'=>'Balaju',
            'phone'=>'9860001244',
            'email' => 'neupane.santosh55@gmail.com',
            'password' => bcrypt('santosh002'),
            'image'=>'',
            'status'=>1,
            'role'=>'admin',

        ]);
    }
}
