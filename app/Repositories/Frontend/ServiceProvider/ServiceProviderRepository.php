<?php

namespace App\Repositories\Frontend\ServiceProvider;

use App\User;
use App\Repositories\BaseRepository;
use Auth;
/**
 * Class ServiceProviderRepository.
 */
class ServiceProviderRepository extends BaseRepository
{
    public static function addServiceProvider($request){
        $user = new User();
        $user->fill($request);
        $user->password = bcrypt($request["password"]);
        if($user->save()){
            return true;
        }
    }
    public static function login($request){
        if (Auth::attempt(['email' => $request["email"], 'password' => $request["password"]])) {
            return true;
        }
    }
}