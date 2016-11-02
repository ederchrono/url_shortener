<?php

use App\URL_user;
use Illuminate\Database\Seeder;

class URLUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<200;$i++)
        {
            URL_user::create([
                'url_id' => rand(0,100),
                'user_id' => rand(0,20)
            ]);
        }
    }
}
