<?php

namespace App\Http\Controllers;

use App\Disable;
use App\District;
use App\Http\Requests\DisableRequest;
use App\LocalLevel;
use App\Services\NumberConverter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class DisableController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    // function to direct user to the index page
    public function index(Request $request, NumberConverter $numberConverter) {
        // check if the request method is post
        if ($request->method() == "POST") {
            $disables = Disable::query();

            // check for the state
            if ($request->state) {
                $disables->userId()->where('state', $request->state);
            }

            // check for the district
            if ($request->district) {
                $disables->userId()->where('district', $request->district);
            }

            // check for the local level
            if ($request->local_level) {
                $disables->userId()->where('local_level', $request->local_level);
            }

            // check for the ward no
            if ($request->ward_no) {
                $disables->userId()->where('ward_no', $request->ward_no);
            }

            // check for the disability category
            if ($request->disability_category) {
                $disables->userId()->where('disability_category', $request->disability_category);
            }

            // check for disability_severity
            if ($request->disability_severity) {
                $disables->userId()->where('disability_severity', $request->disability_severity);
            }

            $disables = $disables->get();

        } else {
            $disables = Disable::userId()->get();
        }
        return view('disable.index')
            ->with('i', $i=0)
            ->with('disables', $disables)
            ->with('districtNames', District::pluck('nep_name'))
            ->with('localLevelNames', LocalLevel::pluck('nep_name'))
            ->with('numberConverter', $numberConverter);
    }

    // function to direct user to the create view page
    public function create(Disable $disable, NumberConverter $numberConverter) {
        return view('disable.create')
            ->with('disable', $disable)
            ->with('districtNames', District::pluck('nep_name'))
            ->with('localLevelNames', LocalLevel::pluck('nep_name'))
            ->with('numberConverter', $numberConverter);
    }

    // function to store data into the table
    public function store(DisableRequest $request) {
        try {
            $imageName = null;
            if($request->file('image')) {
                // get the image object
                $image = $request->file('image');

                // add new name to the image based on name and citizenship_no
                $imageName = $request->eng_name."_".$request->citizenship_no.".".$image->getClientOriginalExtension();

                // move the image to the destined folder
                $image->move(dirname(base_path()).'\img\disable', $imageName);
            }

            $request->user()->disables()->create($request->validated() + ['image' => $imageName]);

            Session::flash('success', 'अपाङ्ग व्यक्ती विवरण सफलतापूर्वक थपियो');
            return redirect()->route('disable.index');
        } catch (\Exception $error) {
            Session::flash('error', $error->getMessage());
            return redirect()->back()
                ->withInput();
        }
    }

    public function show(Disable $disable, NumberConverter $numberConverter) {
        $cardColor = ''; $nepaliType = ''; $engType = ''; $severity = ''; $nepGender = ''; $category = '';

        if ($disable->gender == 'male') {
            $nepGender = 'पुरुष';
        } else if ($disable->gender == 'male') {
            $nepGender = 'महिला';
        } else {
            $nepGender = 'तेस्रो लिङ्गी';
        }

        if ($disable->disability_severity == 'पूर्ण') {
            $cardColor = 'purna';
            $nepaliType = 'क';
            $engType = 'A';
            $severity = 'Complete';
        } else if ($disable->disability_severity == 'अति असक्त') {
            $cardColor = 'asakta';
            $nepaliType = 'ख';
            $engType = 'B';
            $severity = 'Severe';
        } else if ($disable->disability_severity == 'मध्यम') {
            $cardColor = 'madyam';
            $nepaliType = 'ग';
            $engType = 'C';
            $severity = 'Medium';
        } else {
            $cardColor = 'samanya';
            $nepaliType = 'घ';
            $engType = 'D';
            $severity = 'Normal';
        }

        if ($disable->disability_category == "शारीरिक अपाङ्गता") {
            $category = 'Physical disability';
        } else if ($disable->disability_category == "स्वर बोलाई अपाङगता") {
            $category = 'Speech Impaired';
        } else if ($disable->disability_category == "बहिरा") {
            $category = 'Hearing Impaired';
        } else if ($disable->disability_category == "वौद्धिक अपाङ्ग वा सुस्त मनस्थिति") {
            $category = 'Mentally retarded';
        } else if ($disable->disability_category == "अटिजम") {
            $category = 'Autism';
        } else if ($disable->disability_category == "होमोफेलिया") {
            $category = 'Homophilia';
        } else if ($disable->disability_category == "मनो समाजीक अपाङ्गता") {
            $category = 'Psychosocial disability';
        } else if ($disable->disability_category == "वहु अपाङगता") {
            $category = 'Multiple disabilities';
        } else if ($disable->disability_category == "पूर्ण दृस्टी बिहिन") {
            $category = 'Completely blind';
        } else if ($disable->disability_category == "दृस्टी बिहिन") {
            $category = 'Blindness';
        } else if ($disable->disability_category == "न्युन दृस्टी बिहिन") {
            $category = 'Low vision';
        } else {
            $category = 'Dull hearing';
        }
        
        return view('disable.card', compact('disable', 'numberConverter', 'cardColor', 'nepaliType', 'engType', 'severity', 'nepGender', 'category'));
    }

    public function edit(Disable $disable, NumberConverter $numberConverter) {
        return view('disable.edit')
            ->with('disable', $disable)
            ->with('districtNames', District::pluck('nep_name'))
            ->with('localLevelNames', LocalLevel::pluck('nep_name'))
            ->with('numberConverter', $numberConverter);
    }

    public function update(DisableRequest $request, Disable $disable) {
        try {
            if ($request->file('image')) {
                // get the image object
                $image = $request->file('image');

                // add new name to the image based on name and citizenship_no
                $imageName = $request->eng_name."_".$request->citizenship_no.".".$image->getClientOriginalExtension();

                // move the image to the destined folder
                $image->move(dirname(base_path()).'\img\disable', $imageName);
            } else {
                $imageName = $request->old_image;
            }

            $disable->update($request->validated() + ['image' => $imageName, 'user_id' => Auth::id()]);

            Session::flash('success', 'अपाङ्ग व्यक्ती विवरण सफलतापूर्वक परिवर्तन गरियो');
            return redirect()->route('disable.index');
            
        } catch (\Exception $error) {
            return redirect()->back()
                ->withInput()
                ->withErrors($error->getMessage());
        }
    }

    public function destroy(Disable $disable) {
        $imgPath = dirname(base_path()).'\img\disable\\'.$disable->image;
        if (File::exists($imgPath)) {
            File::delete($imgPath);
        }
        $disable->delete();
        return response($disable->nep_name.'को विवरण सफलतापूर्वक हटाइयो');
    }
}
