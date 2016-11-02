<?php

namespace App\Http\Controllers;

use App\Url;
use Illuminate\Http\Request;

class URLShortenerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('list',['urls'=>Url::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'url' => 'required|active_url',
        ]);

        $long_url = $request->get('url');

        $url = Url::where('long', $long_url)->first();

        if(!$url)
        {
            //generating url
            $url = new Url;
            $url->long = $long_url;
            $url->hits = 0;

            $urlHash = Url::generateHash( rand() );
            
            //regenerate hash nif it already exists
            while(Url::where('hash', $urlHash)->first())
            {
                $urlHash = Url::generateHash( rand() );
            }
            
            $url->hash = Url::generateHash( rand() );
            $url->save();


        }

        echo $url->getShortURL();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Url::where('hash',$id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
