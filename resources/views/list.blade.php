@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">URL list</div>

                    <ul>
                        @foreach($urls as $url)
                            <li>
                                {{$url->hash}}
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
@endsection
