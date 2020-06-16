<?php

use App\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::truncate();
        Profile::create(array(
            'user_id' => '1',
            'username' => 'admin',
            'image' => 'images/anonymus.jpg'));
    }
}
