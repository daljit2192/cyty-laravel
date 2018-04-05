<?php

namespace App\Repositories\Backend\ServiceProvider;

use Illuminate\Support\Facades\DB;
use App\ServiceProvider;
use App\User;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use File;
use Auth;

class ServiceProviderRepository extends BaseRepository {

    public static function save_service_provider($request) {
        $datetime = Carbon::now();
        $name = explode(".", $request["user"]["licence_img"]->getClientOriginalName());
        $imageName = $name[0] . $datetime->toDateTimeString();
        $imageName = preg_replace('/[^a-zA-Z0-9]/', '', $imageName);
        $request["user"]["licence_img"]->move(public_path("user-images/ServiceProvider/"), $imageName . "." . $request["user"]["licence_img"]->getClientOriginalExtension());
        $service_provider = new ServiceProvider();
        $user = new User();
        $service_provider->fill($request["service_provider"]);
        $user->fill($request["user"]);
        $user->licence_img = $imageName . "." . $request["user"]["licence_img"]->getClientOriginalExtension();
        $user->password = bcrypt($request["user"]["password"]);
        $service_provider->created_by = Auth::user()->id;
        if ($user->save()) {
            $service_provider->user_id = $user->id;
            if ($service_provider->save()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function update_service_provider($request) {
        $service_provider = ServiceProvider::find($request["id"]);
        $service_provider->fill($request);
        if (isset($request["image"])) {
            $datetime = Carbon::now();
            $name = explode(".", $request["image"]->getClientOriginalName());
            $imageName = $name[0] . $datetime->toDateTimeString();
            $imageName = preg_replace('/[^a-zA-Z0-9]/', '', $imageName);
            $request["image"]->move(public_path("user-images/category/"), $imageName . "." . $request["image"]->getClientOriginalExtension());
            $service_provider->image = $imageName . "." . $request["image"]->getClientOriginalExtension();
        }
        if ($service_provider->save()) {
            return true;
        } else {
            return false;
        }
    }

    public static function get_all_service_providers() {
        $service_provider = ServiceProvider::with('user')->get();
        if (count($service_provider) > 0 && isset($service_provider) && !empty($service_provider)) {
            return $service_provider->toArray();
        } else {
            return array();
        }
    }

    public static function get_service_provider($id) {
        $service_provider = ServiceProvider::where("id",$id)->with("user")->first();
        if (count($service_provider->toArray()) > 0 && isset($service_provider) && !empty($service_provider)) {
            return $service_provider->toArray();
        } else {
            return array();
        }
    }

    public static function delete_service_provider($id) {
        $deleteServiceProvider = ServiceProvider::where("id", $id)->delete();
        if ($deleteServiceProvider) {
            return true;
        } else {
            return false;
        }
    }

}
