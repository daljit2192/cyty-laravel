<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\Category\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class CategoryController.
 */
class CategoryController extends Controller {

    public function add_category() {
        return view('backend.category.add_category');
    }

    public function get_all_categories() {
        $categories = CategoryRepository::get_all_categories();
        return view("backend.category.show_all_categories", ['categories' => $categories]);
    }

    public function get_category($id) {
        $category = CategoryRepository::get_category($id);
        return view("backend.category.edit_category", ['category' => $category]);
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
                return view("backend.category.add_category", ['class' => "success", 'message' => "Category saved successfully"]);
            } else {
                return view("backend.category.add_category", ['class' => "error", 'message' => "Error occured while saving categories, please try again."]);
            }
        }
    }

    public function delete_category($id) {
        if($id!==""){
            CategoryRepository::delete_category($id);
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
                return redirect('categories');
            } else {
                return view("backend.category.edit_category", ['class' => "error", 'message' => "Error occured while saving categories, please try again."]);
            }
        }
    }

}
