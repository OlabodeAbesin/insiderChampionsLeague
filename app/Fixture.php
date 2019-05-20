<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    public $fillable = ['week', 'teamA', 'teamB', 'teamAGoals', 'teamBGoals', 'isGamePlayed', 'isGameEdited'];
}
