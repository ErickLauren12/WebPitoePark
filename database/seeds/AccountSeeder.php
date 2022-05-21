<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert(['username' => 'dani123', 'phone'=>'081332523444','password'=>Hash::make('Password123'), 'is_admin'=>'2']);
    }
}
