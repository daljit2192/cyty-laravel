<?php

namespace App\Repositories\Backend\Product;

use Illuminate\Support\Facades\DB;
use App\Product;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use File;

class ProductRepository extends BaseRepository {

    public static function save_product($request) {
        $datetime = Carbon::now();
        $name = explode(".", $request["images"]->getClientOriginalName());
        $imageName = $name[0] . $datetime->toDateTimeString();
        $imageName = preg_replace('/[^a-zA-Z0-9]/', '', $imageName);
        $request["images"]->move(public_path("user-images/product/"), $imageName . "." . $request["images"]->getClientOriginalExtension());
        $product = new Product();
        $product->fill($request);
        $product->images = $imageName . "." . $request["images"]->getClientOriginalExtension();
        if ($product->save()) {
            return true;
        } else {
            return false;
        }
    }

    public static function update_product($request) {
        $product = Product::find($request["id"]);
        $product->fill($request);
        $datetime = Carbon::now();
        if (isset($request["images"])) {
            $name = explode(".", $request["images"]->getClientOriginalName());
            $imageName = $name[0] . $datetime->toDateTimeString();
            $imageName = preg_replace('/[^a-zA-Z0-9]/', '', $imageName);
            $request["images"]->move(public_path("user-images/product/"), $imageName . "." . $request["images"]->getClientOriginalExtension());
            $product->images = $imageName . "." . $request["images"]->getClientOriginalExtension();
        }
        if ($product->save()) {
            return true;
        } else {
            return false;
        }
    }

    public static function get_all_products() {
        $products = Product::all();
        if (count($products) > 0 && isset($products) && !empty($products)) {
            return $products->toArray();
        } else {
            return array();
        }
    }

    public static function get_product($id) {
        $product = Product::find($id);
        if (count($product->toArray()) > 0 && isset($product) && !empty($product)) {
            return $product->toArray();
        } else {
            return array();
        }
    }

    public static function delete_category($id) {
        Category::where("id", $id)->delete();
    }

}
