<?php

namespace App\Http\Controllers;

use App\Http\Resources\TeamsAPiResource;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        return TeamsAPiResource::collection(Team::all());
    }
}
