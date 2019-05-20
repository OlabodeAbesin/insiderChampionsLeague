<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fixture;
use App\Team;

class PlayController extends Controller
{
    public function nextWeek(){
        $weekId = Fixture::whereNull('isGamePlayed')->min('week');
        $this->simulate($weekId);
        return redirect('/');
    }

    public function simulate($weekId){
        $scores = [0,1,2,3,4,5,6,7];
        $teamAGoals = array_random($scores);
        $teamBGoals = array_random($scores);
        $fixtures = Fixture::where('week', $weekId)->get();
        foreach ($fixtures as $key => $match) {
            $match->teamAGoals = $teamAGoals;
            $match->teamBGoals = $teamBGoals;
            $match->isGamePlayed = 1;
            $match->save();
            $data = $this->pointsDeterminant($match);
            $this->effectStandingsChange($match, $data);
        }


    }
    public function effectStandingsChange($match, $data){
        $teamA = Team::where('name', $match->teamA)->first();
        $teamB = Team::where('name', $match->teamB)->first();
        $teamAPoints = $teamA->points + $data['teamAPoints'];
        $teamBPoints = $teamB->points + $data['teamBPoints'];
        $teamAplayed = $teamA->played + 1;
        $teamBplayed = $teamB->played + 1;
        $teamAWinCount = $teamA->winCount + $data['teamAWinCount'];
        $teamBWinCount = $teamB->winCount + $data['teamBWinCount'];
        $teamADrawCount = $teamA->DrawCount + $data['drawCount'];
        $teamBDrawCount = $teamB->DrawCount + $data['drawCount'];
        $teamAlossCount = $teamA->lossCount + $data['teamALossCount'];
        $teamBlossCount = $teamB->lossCount + $data['teamBLossCount'];
        $teamAGF = $teamA->GF + $match->teamAGoals;
        $teamAGA = $teamA->GA + $match->teamBGoals;
        $teamBGF = $teamB->GF + $match->teamBGoals;
        $teamBGA = $teamB->GA + $match->teamAGoals;
        $team = Team::where('name', $match->teamA)->update([ 'points' => $teamAPoints, 'played' => $teamAplayed, 'winCount' => $teamAWinCount, 'drawCount' => $teamADrawCount, 'lossCount' => $teamAlossCount, 'GF' => $teamAGF, 'GA' => $teamAGA]);
        $team = Team::where('name', $match->teamB)->update(['points' => $teamBPoints, 'played' => $teamBplayed, 'winCount' => $teamBWinCount, 'drawCount' => $teamBDrawCount, 'lossCount' => $teamBlossCount, 'GF' => $teamBGF, 'GA' => $teamBGA]);
    }
    public function pointsDeterminant($match)
    {
        if ($match->teamAGoals > $match->teamBGoals) { 
            $data =  collect(['teamAPoints' => 3, 'teamBPoints' => 0, 'teamAWinCount' => 1 , 'teamBWinCount' => 0, 'drawCount' => 0, 'teamALossCount' => 0, 'teamBLossCount' => 1]);
        } elseif ($match->teamAGoals == $match->teamBGoals) {
            $data =  collect(['teamAPoints' => 1, 'teamBPoints' => 1, 'teamAWinCount' => 0, 'teamBWinCount' => 0, 'drawCount' => 1,  'teamALossCount' => 0, 'teamBLossCount' => 0]);   
        } else{
            $data =  collect(['teamAPoints' => 0, 'teamBPoints' => 3, 'teamAWinCount' => 0 , 'teamBWinCount' => 1, 'drawCount' => 0,  'teamALossCount' => 1, 'teamBLossCount' => 0]);
        }
        return $data;
    }
    public function playAll(){
        for ($i=0; $i < 7; $i++) {
            $weekId = Fixture::whereNull('isGamePlayed')->min('week');
            $this->simulate($weekId); 
        }
        return redirect('/');
    }
}