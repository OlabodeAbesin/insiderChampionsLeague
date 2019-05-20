@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Teams</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if(count($teams))
                    <table class="table table-striped">
                        <tr>
                            <th>Position</th>
                            <th>Club Name</th>
                            <th>Strength score</th>
                            <th>Points</th>
                            <th>Action</th>
                        </tr>
                        @foreach($teams as $team)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$team->name}}</td>
                            <td>{{$team->score}}</td>
                            <td>{{$team->points}}</td>
                            <td> <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal" disabled>
                            <i class="glyphicon glyphicon-plus"></i> Edit Score
                        </button></td>
                        </tr>

                        @endforeach
                        @else
                        <p class="text-center text-danger">No teams available</p>
                        @endif

                    </table>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection