<?php

namespace App\Http\Controllers\Backend\Client;

use App\Http\Controllers\Controller;
use App\Category;
use App\Repositories\Backend\Client\ClientRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
/**
 * Class ClientController.
 */
class ClientController extends Controller {

    public function checkUser() {
        if (!Auth::check() || Auth::user()->role_id != 3) {
            return false;
        } else {
            return true;
        }
    }

    public function add_client() {
        if ($this->checkUser()) {
            $categories = Category::all();
            return view('backend.client.add_client', ["categories" => $categories->toArray()]);
        } else {
            return redirect("/admin/login");
        }
    }

    public function get_all_clients() {
        if ($this->checkUser()) {
            $clients = ClientRepository::get_all_clients();
            return view("backend.client.show_all_clients", ['clients' => $clients]);
        } else {
            return redirect("/admin/login");
        }
    }

    public function get_client($id) {
        if ($this->checkUser()) {
            $client = ClientRepository::get_client($id);
            return view("backend.client.edit_client", ['client' => $client]);
        } else {
            return redirect("/admin/login");
        }
    }

    public function save_client(Request $request) {
        /* Validator is used to validate all the details which are recived in the $request */
        $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:191',
        ]);

        /* fails() will return tru only if any of details which validator checks is no valid */
        if ($validator->fails()) {
            $errors = $validator->getMessageBag()->toArray();
            return view("backend.client.add_client", ['errors' => $errors]);
        } else {
            $clientSave = ClientRepository::save_client($request->all());
            if ($clientSave) {
                return view("backend.client.show_all_clients", ['class' => "success", 'message' => "Client saved successfully"]);
            } else {
                $categories = Category::all();
                return view("backend.client.add_clients", ["categories" => $categories->toArray(), 'class' => "error", 'message' => "Error occured while saving categories, please try again."]);
            }
        }
    }

//
//    public function delete_product($id) {
//        if($id!==""){
//            ProductRepository::delete_product($id);
//        }
//    }
//
    public function update_client(Request $request) {
        /* Validator is used to validate all the details which are recived in the $request */
        $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:191',
        ]);

        /* fails() will return tru only if any of details which validator checks is no valid */
        if ($validator->fails()) {
            $errors = $validator->getMessageBag()->toArray();
            return view("backend.category.edit_category", ['errors' => $errors]);
        } else {
            $clientUpdate = ClientRepository::update_client($request->all());
            if ($clientUpdate) {
                return redirect('/admin/clients');
            } else {
                return view("backend.client.edit_client", ['class' => "error", 'message' => "Error occured while updating clients, please try again."]);
            }
        }
    }

}
