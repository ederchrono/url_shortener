<?php

use App\URL;
use Illuminate\Database\Seeder;

class URLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<100;$i++)
        {
            $url = "http://ederdiaz.com/".str_random(10);
            Url::create([
                'long' => $url,
                'hash' => "http://edr.com/".bcrypt($url),
                'hits' => 0,
            ]);
        }
        
    }
}
