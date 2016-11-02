<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    //

    public static function shortenURL($long_url)
    {
        return "http://edr.com/".bcrypt($long_url);
    }
}
