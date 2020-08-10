<?php

namespace App\Http\Controllers;

use App\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function __invoke() {
        return view('district')->with('i', $i=0)->with('districts', District::all());
    }
}
