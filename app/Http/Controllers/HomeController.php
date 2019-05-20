<?php

namespace App\Http\Controllers;

use App\Team;
use App\Fixture;
use Illuminate\Http\Request;
use Laravel\RoundRobin\RoundRobin;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $teams = Team::orderBy('points', 'desc')->get();
        if($teams->isEmpty()){
            return view('welcome');
        }
        return view('home', compact('teams'));
    }

    public function setUp(){
        $teams = Team::all();
        if( $teams->isEmpty()){
            Team::create([
                'name' => 'Chelsea',
                'score' => 75
            ]);
            Team::create([
                'name' => 'Arsenal',
                'score' => 73
            ]);
            Team::create([
                'name' => 'Manchester City',
                'score' => 89
            ]);
            Team::create([
                'name' => 'Liverpool',
                'score' => 88
            ]);
        } 
        $this->fixMatches();
        return redirect('/');
    }

    public function fixMatches(){
        $teams = Team::pluck('name');
        $roundRobin = new RoundRobin($teams->toArray());
        $roundRobin->doubleRoundRobin();
        $roundRobin = $roundRobin->build();

        foreach ($roundRobin as $key => $value) {
            foreach ($value as $fixture) {
                Fixture::create(['week' => $key, 'teamA' => $fixture[0], 'teamB' => $fixture[1]]);
            }
        }
    }
}
