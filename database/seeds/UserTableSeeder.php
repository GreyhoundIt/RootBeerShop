<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User([
          'name' => 'Admin',
          'email' => 'admin@test.com',
          'password' => '123456',
          'isAdmin' => true
        ]);
        $user->save();

        $user = new User([
          'name' => 'user',
          'email' => 'user@test.com',
          'password' => '123456',
          'isAdmin' => false
        ]);
        $user->save();


    }
}
