<?php

namespace App\Repositories\Frontend\ServiceProvider;

use App\User;
use App\Role;
use App\Repositories\BaseRepository;
use Auth;

/**
 * Class ServiceProviderRepository.
 */
class ServiceProviderRepository extends BaseRepository {

    public static function addServiceProvider($request) {
        $user = new User();
        $user->fill($request);
        $user->password = bcrypt($request["password"]);
        $role = Role::where("name", "service_manager")->first();
        $user->role_id = $role->id;
        if ($user->save()) {
            return true;
        }
    }

    public static function login($request) {
        $checkUser = User::where("email", $request["email"])->first();
        if (isset($checkUser)) {
            $checkRoleOfUser = User::where("email", $request["email"])->where("role_id", 2)->first();
            if ($checkRoleOfUser) {
                if (Auth::attempt(['email' => $request["email"], 'password' => $request["password"]])) {
                    $userData = User::where("email", $request["email"])->first();
                    return array(
                        "status" => true,
                        "user" => $userData,
                    );
                } else {
                    return array(
                        "status" => false,
                        "message" => "Invalid username or password."
                    );
                }
            } else {
                return array(
                    "status" => false,
                    "message" => "Not authorised to login."
                );
            }
        } else {
            return array(
                "status" => false,
                "message" => "Invalid username or password."
            );
        }
    }

}
        