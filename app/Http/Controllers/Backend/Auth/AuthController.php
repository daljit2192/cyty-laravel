<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
/**
 * Class AuthController.
 */
class AuthController extends Controller {

    public function login(){
        return view("backend.auth.login");
    }
    
    public function loginAdmin(Request $request){
        if (Auth::attempt(['email' => $request["email"], 'password' => $request["password"]])) {
            return view('backend.home');
        }
    }

}
