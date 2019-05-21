@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Fixtures</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if(count($fixtures))
                    @foreach($fixtures as $fixture)
                    <table style="width: 100% !important" class="table table-striped">
                        <tbody style="width: 100% !important">
                            <h4>Week {{$loop->iteration}}</h4>
                            <tr>
                                <th style="width: 50% !important">Team A</th>
                                <th style="width: 50% !important">Team B</th>
                            </tr>

                            @foreach($fixture as $match)
                            <tr style="width: 50% !important">
                                <td>{{$match->teamA}}<span style="float: right">[{{$match->teamAGoals}}]</span></td>
                                <td>{{$match->teamB}}<span style="float: right">[{{$match->teamAGoals}}]</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    @endforeach
                    @else
                    <p class="text-center text-danger">No fixtures available</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection