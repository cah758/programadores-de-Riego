<?php

use Illuminate\Database\Seeder;
use App\User;
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
        'username'  => 'admin',
        'email'      => 'postmaster@domain.com',
        'password'   =>  Hash::make('1q2w3e4r5t')
      ]);
    }
}
