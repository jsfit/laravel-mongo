<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Team;

class TeamController extends Controller
{

    public function index()
    {
        $team = Team::with("projects")->get();

        return response()->json(['teams'=>$team]);
    }

}
