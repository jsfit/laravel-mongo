<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    //
    public function Index()
    {
        $projects = Project::with("teams")->get();

        return response()->json(['projects'=>$projects]);

    }
}
