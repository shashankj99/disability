<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\NumberConverter;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    // function to return user to the index page
    public function index(NumberConverter $numberConverter) {
        return view('user.index')
            ->with('users', User::all())
            ->with('i', $i=0)
            ->with('numberConverter', $numberConverter);
    }

    // function to return user to the create page
    public function create() {
        return view('user.create');
    }

    public function store(UserRequest $request) {
        try {
            if ($request->password == $request->password_confirmation) {
                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'password' => Hash::make($request->password)
                ]);

                Session::flash('success', "नयाँ प्रयोगकर्ता सफलतापूर्वक दर्ता गरिएको छ।");
                return redirect()->route('user.index');
            } else {
                return redirect()->back()
                    ->withErrors('password did not match')
                    ->withInput();
            }
            
        } catch (\Exception $error) {
            return redirect()->back()
                ->withInput()
                ->withErrors($error->getMessage());
        }
    }

    // this route is not necessary
    public function show(User $user) {
        Session::flash('info', "यो URL अवस्थित छैन");
        return redirect()->back();
    }

    // function to direct user to the edit view
    public function edit(User $user) {
        return view('user.edit', compact('user'));
    }

    // function to update the user detail
    public function update(Request $request, User $user) {
        try {
            if (empty($request->password)) {
                $user->update($request->validate([
                    'name' => "required|string|max:255",
                    'email' => "required|email|max:255|unique:users,email,".$user->id,
                    'address' => "required|string",
                ]) + ['phone' + $request->phone]);
            } else if ($request->password == $request->password_confirmation) {
                $formData = array(
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'password' => Hash::make($request->password)
                );
                $user->update($formData);
            }

            Session::flash('success', "प्रयोगकर्ता सफलतापूर्वक अपडेट गरियो");
            return redirect()->route('user.index');            
        } catch (\Exception $error) {
            return redirect()->back()
                ->withInput()
                ->withErrors($error->getMessage());
        }
    }

    // function to delete the user details
    public function destroy(User $user) {
        if ($user) {
            $user->delete();
            return response('प्रयोगकर्ता '. $user->name. ' सफलतापूर्वक हटाइएको छ');
        } else {
            return response('माफ गर्नुहोस्! प्रयोगकर्ता फेला पार्न असमर्थ');
        }
        
    }
}
