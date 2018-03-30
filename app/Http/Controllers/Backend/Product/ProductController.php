<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Category;
use App\Repositories\Backend\Product\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class ProductController.
 */
class ProductController extends Controller {

    public function add_product() {
        $categories = Category::all();
        return view('backend.product.add_product',["categories"=>$categories->toArray()]);
    }

    public function get_all_products() {
        $products = ProductRepository::get_all_products();
        return view("backend.product.show_all_products", ['products' => $products]);
    }
//
//    public function get_product($id) {
//        $product = ProductRepository::get_product($id);
//        return view("backend.product.edit_product", ['product' => $product]);
//    }
//
    public function save_product(Request $request) {
        /* Validator is used to validate all the details which are recived in the $request */
        $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:191',
        ]);

        /* fails() will return tru only if any of details which validator checks is no valid */
        if ($validator->fails()) {
            $errors = $validator->getMessageBag()->toArray();
            return view("backend.product.add_product", ['errors' => $errors]);
        } else {
            $productSave = ProductRepository::save_product($request->all());
            if ($productSave) {
                return view("backend.product.show_all_products", ['class' => "success", 'message' => "Category saved successfully"]);
            } else {
                $categories = Category::all();
                return view("backend.product.add_products", ["categories"=>$categories->toArray(),'class' => "error", 'message' => "Error occured while saving categories, please try again."]);
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