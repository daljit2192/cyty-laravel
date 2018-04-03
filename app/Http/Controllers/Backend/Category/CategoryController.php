<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\Category\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

/**
 * Class CategoryController.
 */
class CategoryController extends Controller {

    public function __construct() {
        
    }

    public function checkUser() {

        if (!Auth::check() || Auth::user()->role_id != 3) {
            return false;
        } else {
            return true;
        }
    }

    public function add_category() {
        if ($this->checkUser()) {
            return view('backend.category.add_category');
        } else {
            return redirect("/admin/login");
        }
    }

    public function get_all_categories() {
        if ($this->checkUser()) {
            $categories = CategoryRepository::get_all_categories();
            return view("backend.category.show_all_categories", ['categories' => $categories]);
        } else {
            return redirect("/admin/login");
        }
    }

    public function get_category($id) {
        if ($this->checkUser()) {
            $category = CategoryRepository::get_category($id);
            return view("backend.category.edit_category", ['category' => $category]);
        } else {
            return redirect("/admin/login");
        }
    }

    public function save_category(Request $request) {
        /* Validator is used to validate all the details which are recived in the $request */
        $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:191',
        ]);

        /* fails() will return tru only if any of details which validator checks is no valid */
        if ($validator->fails()) {
            $errors = $validator->getMessageBag()->toArray();
            return view("backend.category.add_category", ['errors' => $errors]);
        } else {
            $categorySave = CategoryRepository::save_catgeory($request->all());
            if ($categorySave) {
                return redirect('/admin/categories');
            } else {
                return view("backend.category.add_category", ['class' => "error", 'message' => "Error occured while saving categories, please try again."]);
            }
        }
    }

    public function delete_category($id) {
        if ($id !== "") {
            $deleteCategory = CategoryRepository::delete_category($id);
            if ($deleteCategory) {
                return redirect('/admin/categories');
            }
        }
    }

    public function update_category(Request $request) {
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
