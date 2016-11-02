<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Vinkla\Hashids\Facades\Hashids;

class Url extends Model
{
    //

    public static function shortenURL($long_url)
    {
        
        return "http://edr.com/".Hashids::encode(rand(0,100));
    }
}
