<?php

namespace App\Http\Controllers;

use App\Certifier;
use App\Http\Requests\CertifierRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use function GuzzleHttp\Promise\all;

class CertifierController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('certifier.index')
            ->with('i', $i=0)
            ->with('certifiers', (Auth::user()->email == config('app.admin')) ? Certifier::all() : Certifier::userId()->get());
    }

    public function create(Certifier $certifier) {
        return view('certifier.create', compact('certifier'));
    }

    public function store(CertifierRequest $request) {
        try {
            $request->user()->certifiers()->create($request->validated());

            Session::flash('success', 'प्रमाणित गर्ने व्यक्ती विवरण सफलतापूर्वक थपियो');
            return redirect()->route('certifier.index');
        } catch (\Exception $error) {
            Session::flash('error', $error->getMessage());
            return redirect()->back()
                ->withInput();
        }
    }

    public function edit(Certifier $certifier) {
        return view('certifier.edit', compact('certifier'));
    }

    public function update(CertifierRequest $request, Certifier $certifier) {
        try {
            $certifier->update($request->validated() + ['user_id' => Auth::id()]);

            Session::flash('success', 'प्रमाणित गर्ने व्यक्ती विवरण सफलतापूर्वक परिवर्तन गरियो');
            return redirect()->route('certifier.index');
        } catch (\Exception $error) {
            Session::flash('error', $error->getMessage());
            return redirect()->back()
                ->withInput();
        }
    }

    public function destroy(Certifier $certifier) {
        $certifier->delete();

        return response($certifier->nep_name.'को विवरण सफलतापूर्वक हटाइयो');
    }
}
