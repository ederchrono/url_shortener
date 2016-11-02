<?php

namespace App\Http\Controllers;

use App\Stats;
use App\Url;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    function index($hash)
    {
        $url = Url::where('hash',$hash)->first();
        if(!$url)
            return view('welcome',['error'=>'URL not found.']);

        //saving stats
        $url->hits++;
        $url->save();

        $hit = new Stats;
        $hit->url_id = $url->id;
        $hit->user_id = 0;//anonymous user

        return view('redirect',['url'=>$url]);
    }
}
