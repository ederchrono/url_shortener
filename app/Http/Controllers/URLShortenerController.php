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
        $url = Url::with('stats')->where('hash',$id)->first();
        if(!$url)
            return view('welcome',['error'=>'URL not found.']);

        return view('stats',['url'=>$url]);
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
        $this->validate($request, [
            'url' => 'required|active_url',
        ]);

        $url = Url::where('hash',$id)->first();

        if(!$url)
            return json_encode(['ok'=>false, 'message'=>'URL not found.']);

        $url->long = $request->get('url');
        return json_encode(['ok'=>true]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $url = Url::where('hash',$id)->first();

        if(!$url)
            return json_encode(['ok'=>false, 'message'=>'URL not found.']);

        $url->delete();

        return json_encode(['ok'=>true]);
    }
}
