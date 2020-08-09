<?php

namespace App\Http\Controllers;

use App\District;
use App\Http\Requests\SeniorCitizenRequest;
use App\LocalLevel;
use App\SeniorCitizen;
use App\Services\NumberConverter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class SeniorCitizenController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Match the request type POST for filter operation and GET for normal view page
     */
    public function index(Request $request, NumberConverter $numberConverter) {
        // check if the request method is post
        if ($request->method() == "POST") {
            $seniorCitizens = SeniorCitizen::query();

            // check for the state
            if ($request->state) {
                $seniorCitizens->where('state', $request->state);
            }

            // check for the district
            if ($request->district) {
                $seniorCitizens->where('district', $request->district);
            }

            // check for the local level
            if ($request->local_level) {
                $seniorCitizens->where('local_level', $request->local_level);
            }

            // check for the ward no
            if ($request->ward_no) {
                if (Auth::user()->email == config('app.admin')) {
                    $seniorCitizens->where('ward_no', $request->ward_no);
                } else {
                    $seniorCitizens->userId()->where('ward_no', $request->ward_no);
                }
            }

            // check for gender
            if ($request->gender) {
                if (Auth::user()->email == config('app.admin')) {
                    $seniorCitizens->where('gender', $request->gender);
                } else {
                    $seniorCitizens->userId()->where('gender', $request->gender);
                }
            }

            $seniorCitizens = $seniorCitizens->get();

        } else {
            $seniorCitizens = (Auth::user()->email == config('app.admin')) ? SeniorCitizen::all() : SeniorCitizen::userId()->get();
        }
        return view('senior_citizen.index')
            ->with('i', $i=0)
            ->with('seniorCitizens', $seniorCitizens)
            ->with('districtNames', District::pluck('nep_name'))
            ->with('localLevelNames', LocalLevel::pluck('nep_name'))
            ->with('numberConverter', $numberConverter);
    }

    /**
     * Direct the user to the create blade page
     */
    public function create(SeniorCitizen $seniorCitizen, NumberConverter $numberConverter) {
        return view('senior_citizen.create')
            ->with('seniorCitizen', $seniorCitizen)
            ->with('districtNames', District::pluck('nep_name'))
            ->with('localLevelNames', LocalLevel::pluck('nep_name'))
            ->with('numberConverter', $numberConverter);
    }

    /**
     * Get the data from the form and store in the DB
     */
    public function store(SeniorCitizenRequest $request) {
        try {
            $imageName = null;
            if($request->file('image')) {
                // get the image object
                $image = $request->file('image');

                // add new name to the image based on name and citizenship_no
                $imageName = $request->eng_name."_".$request->citizenship_no.".".$image->getClientOriginalExtension();

                // move the image to the destined folder
                $image->move(dirname(base_path()).'\img\senior_citizen', $imageName);
            }

            $request->user()->seniorCitizens()->create($request->validated() + ['spouse_name' => $request->spouse_name, 'facilities' => $request->facilities, 'certificate_no' => $request->certificate_no, 'home_care_name' => $request->home_care_name, 'disease' => $request->disease, 'medicine' => $request->medicine, 'image' => $imageName]);

            Session::flash('success', 'जेष्ठ नागरिक विवरण सफलतापूर्वक थपियो');
            return redirect()->route('senior.index');
        } catch (\Exception $error) {
            Session::flash('error', $error->getMessage());
            return redirect()->back()
                ->withInput();
        }
    }

    public function show(SeniorCitizen $senior, NumberConverter $numberConverter) {
        return view('senior_citizen.card', compact('senior', 'numberConverter'));
    }

    public function edit(SeniorCitizen $senior, NumberConverter $numberConverter) {
        return view('senior_citizen.edit')
            ->with('senior', $senior)
            ->with('districtNames', District::pluck('nep_name'))
            ->with('localLevelNames', LocalLevel::pluck('nep_name'))
            ->with('numberConverter', $numberConverter);
    }

    public function update(SeniorCitizenRequest $request, SeniorCitizen $senior) {
        try {
            if ($request->file('image')) {
                // get the image object
                $image = $request->file('image');

                // add new name to the image based on name and citizenship_no
                $imageName = $request->eng_name."_".$request->citizenship_no.".".$image->getClientOriginalExtension();

                // move the image to the destined folder
                $image->move(dirname(base_path()).'\img\senior_citizen', $imageName);
            } else {
                $imageName = $request->old_image;
            }

            $senior->update($request->validated() + ['spouse_name' => $request->spouse_name, 'facilities' => $request->facilities, 'certificate_no' => $request->certificate_no, 'home_care_name' => $request->home_care_name, 'disease' => $request->disease, 'medicine' => $request->medicine, 'image' => $imageName, 'user_id' => Auth::id()]);

            Session::flash('success', 'जेष्ठ नागरिक विवरण सफलतापूर्वक परिवर्तन गरियो');
            return redirect()->route('senior.index');
            
        } catch (\Exception $error) {
            return redirect()->back()
                ->withInput()
                ->withErrors($error->getMessage());
        }
    }

    public function destroy(SeniorCitizen $senior) {
        $imgPath = dirname(base_path()).'\img\disable\\'.$senior->image;
        if (File::exists($imgPath)) {
            File::delete($imgPath);
        }
        $senior->delete();
        return response($senior->name.'को विवरण सफलतापूर्वक हटाइयो');
    }
}
