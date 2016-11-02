@extends('layouts.app')

@section('meta')
    <meta http-equiv="refresh" content="0; url={!! $url->long !!}" />
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Redirecting to <strong>{{$url->long}}</strong></div>
                </div>
            </div>
        </div>
    </div>
@endsection
