<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Vinkla\Hashids\Facades\Hashids;

class Url extends Model
{
    //

    public static function generateHash($id)
    {
        return Hashids::encode($id);
    }
    
    public function getShortURL()
    {
        return "http://edr.com/".$this->hash;
    }
}
