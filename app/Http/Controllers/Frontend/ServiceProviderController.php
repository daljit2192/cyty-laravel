<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Repositories\Frontend\ServiceProvider\ServiceProviderRepository;

class ServiceProviderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginServiceProvider()
    {
        return view("frontend.serviceproviderlogin");
    }
    
    public function registerServiceProvider()
    {
        return view("frontend.serviceproviderregister");
    }
    public function addServiceProvider(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'licence_img' => 'required|string|max:191',
            'email' => ['required', 'string', 'email', 'max:191', Rule::unique('users')],
            'password' => 'required|string|min:6|confirmed'
        ]);
        if ($validator->fails()) {
            $errors = $validator->getMessageBag()->toArray();
            echo "fail";die;
        } else {
            
            $userRegisterStatus = ServiceProviderRepository::addServiceProvider($request->all());
            if($userRegisterStatus){
                return view("frontend.serviceproviderlogin");
            }
        }
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:191'],
            'password' => 'required|string|min:6|'
        ]);
        if ($validator->fails()) {
            $errors = $validator->getMessageBag()->toArray();
            echo "fail";die;
        } else {
            
            $userLoginStatus = ServiceProviderRepository::login($request->all());
            if($userLoginStatus){
                return redirect('/');
            }
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
