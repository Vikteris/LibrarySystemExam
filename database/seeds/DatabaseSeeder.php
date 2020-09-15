<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
            DB::table('users')->insert([
                'name' => 'Viktoras',
                'email' => 'egzaminas@bit.lt',
                'password' => Hash::make('egzaminas'),
            ]);

            

    }
}
