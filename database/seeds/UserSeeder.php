<?php

use App\User;
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
        User::truncate();
        User::create(array(
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@admin.final',
            'password' => bcrypt('12345678'),
            'role' => 'administrator'));
    }
}
