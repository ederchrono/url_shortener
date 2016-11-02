@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">URL list</div>

                    <table>
                        <tr>
                            <th>URL</th>
                            <th>hash</th>
                            <th>hits</th>
                        </tr>


                        <tr>
                            <td>
                                {{$url->long}}
                            </td>
                            <td>
                                <a href="{!! url($url->hash) !!}">{{$url->hash}}</a>
                            </td>
                            <td>
                                {{$url->hits}}
                            </td>
                        </tr>

                    </table>

                    @foreach($url->stats as $stat)
                        <p style="text-align:right; padding-right: 20px">
                            {!! $stat->created_at !!}
                        </p>
                    @endforeach



                </div>
            </div>
        </div>
    </div>
@endsection
