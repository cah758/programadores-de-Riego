<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
        'name' => 'System',
        'last_name'  => 'Administrator',
        'email'      => 'postmaster@domain.com',
        'password'   =>  Hash::make('secret')
      ]);
    }
}
