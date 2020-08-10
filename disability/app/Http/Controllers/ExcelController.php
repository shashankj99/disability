<?php

namespace App\Http\Controllers;

use App\Services\Excel\DisabilityImport;
use App\Services\Excel\SeniorImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    private function customValidation($request) {
        $rule = [
            'select_file'  => 'required|mimes:xls,xlsx'
        ];
        $custom_message = [
            'required' => "कृपया यो फिल्ड खाली नराख्नुहोस्",
            'select_file.mimes' => "कृपया एक्सेल फाइल मात्र चयन गर्नुहोस्"
        ];
        $this->validate($request, $rule, $custom_message);
    }

    public function index() {
        return view('excel');
    }

    public function disability(Request $request) {
        try {
            $this->customValidation($request);

            Excel::import(new DisabilityImport(), $request->file('select_file'));

            Session::flash('success', "डाटा सफलतापूर्वक आयात गरियो");
            return redirect()->back();

        } catch (\Exception $error) {
            Session::flash('error', $error->getMessage());
            return redirect()->back();
        }
    }

    public function senior(Request $request) {
        try {
            $this->customValidation($request);

            Excel::import(new SeniorImport(), $request->file('select_file'));

            Session::flash('success', "डाटा सफलतापूर्वक आयात गरियो");
            return redirect()->back();
            
        } catch (\Exception $error) {
            Session::flash('error', $error->getMessage());
            return redirect()->back();
        }
    }
}
