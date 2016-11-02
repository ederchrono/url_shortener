<?php

use App\Stats;
use Illuminate\Database\Seeder;

class StatsSeeder extends Seeder
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
            Stats::create([
                'url_id' => rand(0,100),
                'user_id' => rand(0,20)
            ]);
        }
    }
}
