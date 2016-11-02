<?php

namespace App\Http\Controllers;

use App\Url;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    function index($hash)
    {
        return Url::where('hash',$hash)->first();

    }
}
