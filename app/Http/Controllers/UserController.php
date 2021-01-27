<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller {

 // -------------------- [ user registration view ] -------------
    public function index() {
        return view('registration');
    }

// --------------------- [ Inregistrare user ] ----------------------
    public function userPostRegistration(Request $request) {

        // validare form
        $request->validate([
                'first_name'        =>      'required',
                'last_name'         =>      'required',
                'email'             =>      'required|email',
                'password'          =>      'required|min:6',
                'confirm_password'  =>      'required|same:password',
                'phone'             =>      'required|max:10'
            ]);

        $input          =           $request->all();

        // dupa validare pregatim o lista pt injectare
        $inputArray      =           array(
            'first_name'        =>      $request->first_name,
            'last_name'         =>      $request->last_name,
            'name'         =>      $request->first_name . " ". $request->last_name,  //name concatenam nume si prenume
            'email'             =>      $request->email,
            'password'          =>      Hash::make($request->password),
            'phone'             =>      $request->phone
        );

        // inregistrer user injectare
        $user           =           User::create($inputArray);

        // in caz de succes
        if(!is_null($user)) {
            return back()->with('success', 'Inregistrare reusita.');
        }

        // in caz de erroare
        else {
            return back()->with('error', 'Whoops! Probleme cu inregistrarea. Incercati din nou.');
        }
    }


// -------------------- [ User login view ] -----------------------
    public function userLoginIndex() {
        return view('login');
    }


// --------------------- [ User login ] ---------------------
    public function userPostLogin(Request $request) {

        $request->validate([
            "email"           =>    "required|email",
            "password"        =>    "required|min:6"
        ]);

        $userCredentials = $request->only('email', 'password');

        // check user using auth function
        if (Auth::attempt($userCredentials)) {
            return redirect()->intended('products'); //dashboard
        }

        else {
            return back()->with('error', 'Whoops! invalid username or password.');
        }
    }


// ------------------ [ User Dashboard Section ] ---------------------
    public function dashboard() {

        // check if user logged in
        if(Auth::check()) {
            return view('dashboard'); //dashboard
        }

        return redirect::to("user-login")->withSuccess('Oopps! You do not have access');
    }

// ------------------ [ User Products Section ] ---------------------
public function products() {

    // check if user logged in
    if(Auth::check()) {
        return view('products'); //dashboard
    }

    return redirect::to("user-login")->withSuccess('Oopps! You do not have access');
}

// ------------------- [ User logout function ] ----------------------
public function logout(Request $request ) {
    $request->session()->flush();
    Auth::logout();
    return Redirect('user-login');
    }
}
