<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Auth;

/**
 * Class AuthController.
 */
class AuthController extends Controller {

    public function login() {
        if (Auth::check()) {
            if (Auth::check()->role_id == 3) {
                return view('backend.home');
            } else {
                return redirect('/admin/login');
            }
        } else {
            return view("backend.auth.login");
        }
    }

    public function home() {
        if (Auth::check()) {
            if (Auth::user()->role_id == 3) {
                return view('backend.home');
            } else {
                return redirect('/admin/login');
            }
        } else {
            return redirect('/');
        }
    }

    public function loginAdmin(Request $request) {
        if (Auth::attempt(['email' => $request["email"], 'password' => $request["password"]])) {
            return view('backend.home');
        }
    }

}
