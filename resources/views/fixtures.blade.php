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
                    <table class="table table-striped">
                        <h4>Week {{$loop->iteration}}</h4>
                        <tr>
                            <th>Team A</th>
                            <th>Team B</th>
                        </tr>

                        @foreach($fixture as $match)
                        <tr>
                            <td>{{$match->teamA}}</td>
                            <td>{{$match->teamB}}</td>
                        </tr>
                        @endforeach
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