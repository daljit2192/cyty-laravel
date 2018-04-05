<?php

namespace App\Http\Controllers\Backend\ServiceProvider;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\ServiceProvider\ServiceProviderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

/**
 * Class ServiceProviderController.
 */
class ServiceProviderController extends Controller {

    public function __construct() {
        
    }

    public function checkUser() {

        if (!Auth::check() || Auth::user()->role_id != 3) {
            return false;
        } else {
            return true;
        }
    }

    public function add_service_provider() {
        if ($this->checkUser()) {
            return view('backend.serviceprovider.add_service_provider');
        } else {
            return redirect("/admin/login");
        }
    }

    public function get_all_service_providers() {
        if ($this->checkUser()) {
            $seriviceProviders = ServiceProviderRepository::get_all_service_providers();
            return view("backend.serviceprovider.show_all_service_providers", ['serivice_providers' => $seriviceProviders]);
        } else {
            return redirect("/admin/login");
        }
    }

    public function get_service_provider($id) {
        if ($this->checkUser()) {
            $service_provider = ServiceProviderRepository::get_service_provider($id);
            return view("backend.serviceprovider.edit_service_provider", ['service_provider' => $service_provider]);
        } else {
            return redirect("/admin/login");
        }
    }

    public function save_service_provider(Request $request) {
        /* Validator is used to validate all the details which are recived in the $request */
        $validator = Validator::make($request->all(), [
//                    'user["name"]' => 'required|string|max:191',
        ]);

        /* fails() will return tru only if any of details which validator checks is no valid */
        if ($validator->fails()) {
            $errors = $validator->getMessageBag()->toArray();
            print_r($errors);die;
            return view("backend.serviceprovider.add_category", ['errors' => $errors]);
        } else {
            $serviceProviderSave = ServiceProviderRepository::save_service_provider($request->all());
            if ($serviceProviderSave) {
                return redirect('/admin/serviceproviders');
            } else {
                return view("backend.category.add_category", ['class' => "error", 'message' => "Error occured while saving categories, please try again."]);
            }
        }
    }

    public function delete_service_provider($id) {
        if ($id !== "") {
            $deleteCategory = CategoryRepository::delete_category($id);
            if ($deleteCategory) {
                return redirect('/admin/categories');
            }
        }
    }

    public function update_service_provider(Request $request) {
        /* Validator is used to validate all the details which are recived in the $request */
        $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:191',
        ]);

        /* fails() will return tru only if any of details which validator checks is no valid */
        if ($validator->fails()) {
            $errors = $validator->getMessageBag()->toArray();
            return view("backend.category.edit_category", ['errors' => $errors]);
        } else {
            $categoryUpdate = CategoryRepository::update_catgeory($request->all());
            if ($categoryUpdate) {
                return redirect('/admin/categories');
            } else {
                return view("backend.category.edit_category", ['class' => "error", 'message' => "Error occured while saving categories, please try again."]);
            }
        }
    }

}
