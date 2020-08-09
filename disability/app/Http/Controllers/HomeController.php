<?php

namespace App\Http\Controllers;

use App\Disable;
use App\Services\NumberConverter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function getEnglishState($state) {
        if ($state == 'प्रदेश १') {
            return 1;
        } else if ($state == 'प्रदेश २') {
            return 2;
        } else if ($state == 'बागमती प्रदेश') {
            return 3;
        } else if ($state == 'गण्डकी प्रदेश') {
            return 4;
        } else if ($state == 'प्रदेश ५') {
            return 5;
        } else if ($state == 'कर्नाली प्रदेश') {
            return 6;
        } else {
            return 7;
        }
    }

    public function index(NumberConverter $numberConverter) {
        $wardNoArray = (Auth::user()->email == config('app.admin')) ? Disable::distinct()->pluck('state') : Disable::userID()->distinct()->pluck('ward_no');
        $engState = [];
        $wardNoValue = [];

        if (Auth::user()->email == config('app.admin')) {
            foreach ($wardNoArray as $ward) {
                array_push($engState, $this->getEnglishState($ward));
                $totalDisabilities = Disable::where('state', $ward)->count();
                array_push($wardNoValue, $totalDisabilities);
            }
            sort($engState);
        } else {
            foreach ($wardNoArray as $ward) {
                $totalDisabilities = Disable::userId()->where('ward_no', $ward)->count();
                array_push($wardNoValue, $totalDisabilities);
            }
        }


        return view('home')
            ->with('totalDisablePeoples', (Auth::user()->email == config('app.admin')) ? Disable::count() : Disable::userId()->count())
            ->with('totalMaleDisabilities', (Auth::user()->email == config('app.admin')) ? Disable::where('gender', 'male')->count() : Disable::userId()->where('gender', 'male')->count())
            ->with('totalFemaleDisabilities', (Auth::user()->email == config('app.admin')) ? Disable::where('gender', 'female')->count() : Disable::userId()->where('gender', 'female')->count())
            ->with('totalOtherDisabilities', (Auth::user()->email == config('app.admin')) ? Disable::where('gender', 'other')->count() : Disable::userId()->where('gender', 'other')->count())
            ->with('wardNoArray', (Auth::user()->email == config('app.admin')) ? $engState : $wardNoArray)
            ->with('isAdmin', (Auth::user()->email == config('app.admin')) ? 1 : 0)
            ->with('wardNoValue', $wardNoValue);
    }
}
