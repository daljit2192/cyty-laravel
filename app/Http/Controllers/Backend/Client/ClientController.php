<?php

namespace App\Http\Controllers\Backend\Client;

use App\Http\Controllers\Controller;
use App\Category;
use App\Repositories\Backend\Client\ClientRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class ClientController.
 */
class ClientController extends Controller {

    public function add_client() {
        $categories = Category::all();
        return view('backend.client.add_client',["categories"=>$categories->toArray()]);
    }

    public function get_all_clients() {
        $clients = ClientRepository::get_all_clients();
        return view("backend.client.show_all_clients", ['clients' => $clients]);
    }
//
//    public function get_product($id) {
//        $product = ProductRepository::get_product($id);
//        return view("backend.product.edit_product", ['product' => $product]);
//    }
//
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
            $clientSave = ProductRepository::save_product($request->all());
            if ($clientSave) {
                return view("backend.client.show_all_clients", ['class' => "success", 'message' => "Client saved successfully"]);
            } else {
                $categories = Category::all();
                return view("backend.client.add_clients", ["categories"=>$categories->toArray(),'class' => "error", 'message' => "Error occured while saving categories, please try again."]);
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
//    public function update_product(Request $request) {
//        /* Validator is used to validate all the details which are recived in the $request */
//        $validator = Validator::make($request->all(), [
//                    'name' => 'required|string|max:191',
//        ]);
//
//        /* fails() will return tru only if any of details which validator checks is no valid */
//        if ($validator->fails()) {
//            $errors = $validator->getMessageBag()->toArray();
//            return view("backend.category.edit_category", ['errors' => $errors]);
//        } else {
//            $productUpdate = ProductRepository::update_product($request->all());
//            if ($productUpdate) {
//                return redirect('products');
//            } else {
//                return view("backend.product.edit_category", ['class' => "error", 'message' => "Error occured while saving categories, please try again."]);
//            }
//        }
//    }
}
