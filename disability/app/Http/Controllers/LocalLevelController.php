<?php

namespace App\Http\Controllers;

use App\LocalLevel;
use Illuminate\Http\Request;

class LocalLevelController extends Controller
{
    public function __invoke() {
        return view('local_level')->with('i', $i=0)->with('localLevels', LocalLevel::all());
    }
}
