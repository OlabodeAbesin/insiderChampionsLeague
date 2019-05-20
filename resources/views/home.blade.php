@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Standings</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if(count($teams))
                    <table class="table table-responsive table-striped">
                        <tr>
                            <th>Position</th>
                            <th>Club</th>
                            <th>Played</th>
                            <th>Won</th>
                            <th>Drawn</th>
                            <th>Lost</th>
                            <th>GF</th>
                            <th>GA</th>
                            <th>GD</th>
                            <th>Points</th>
                        </tr>
                        @foreach($teams as $team)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$team->name}}</td>
                            <td>{{$team->played}}</td>
                            <td>{{$team->winCount}}</td>
                            <td>{{$team->drawCount}}</td>
                            <td>{{$team->lossCount}}</td>
                            <td>{{$team->GF}}</td>
                            <td>{{$team->GA}}</td>
                            <td>{{$team->GF - $team->GA}}</td>
                            <td>{{$team->points}}</td>
                        </tr>

                        @endforeach
                        @else
                        <p class="text-center text-danger">No teams available</p>
                        @endif

                    </table>

                </div>
                <div class="card-footer">
                    <a href="{{ url('/playAll') }}">
                        <button class="btn btn-primary pull-left">
                            <i class="glyphicon glyphicon-plus"></i> Play all
                        </button>
                    </a>
                        <a href="{{ url('/nextWeek') }}">
                            <button class="btn btn-success pull-right">

                                <i class="glyphicon glyphicon-plus"></i> Next week
                            </button>
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection