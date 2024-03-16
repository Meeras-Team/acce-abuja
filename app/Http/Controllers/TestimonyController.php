<?php

namespace App\Http\Controllers;

use App\Http\Resources\TestimoniesAPiResource;
use App\Models\Testimony;
use Illuminate\Http\Request;

class TestimonyController extends Controller
{
    public function index()
    {
        return TestimoniesAPiResource::collection(Testimony::all());
    }
}
